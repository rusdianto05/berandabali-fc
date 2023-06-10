<?php

namespace App\Services;

use App\Models\User;
use App\Models\Notification;
use Kreait\Firebase\Messaging\CloudMessage;
use Illuminate\Database\Eloquent\Collection;
use Kreait\Firebase\Messaging\Notification as Notif;


class BroadcastServices
{
    public static function sendTo($title, $body,User $user, $payload = null,$image = null){
        $messaging = app('firebase.messaging');
        $payload ? $type = get_class($payload):$type = null;
        $payload['notification_type'] =  str_replace('App\\Models\\', '', $type);
        $data = [
            'title' => $title,
            'body'  => $body,
            'payload'  => $payload,
            'type'      => str_replace('App\\Models\\', '', $type),
            'reference_id'  => $payload->id,
            'channel_id' => 'com.cancreative.jaktivity',
            'user_id' => $user->id
        ];
        if($user->fcm_token){
            try {
                $message = CloudMessage::withTarget('token', $user->fcm_token)
                ->withNotification($data)
                    ->withData($data)
                ;
                $messaging->send($message);
    
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
    
        return Notification::create($data);
    }
    
    
    public static function sendSome($title, $body, Collection $user, $payload = null,$image= null){
        $payload ? $type = get_class($payload):$type = null;
        $payload['notification_type'] =  str_replace('App\\Models\\', '', $type);
        $messaging = app('firebase.messaging');
        $data = [];
        foreach ($user as $value) {
            $item = [
                'title'     => $title,
                'body'      => $body,
                'user_id'   => $value->id,
                'payload'   => $payload,
                'type'      => str_replace('App\\Models\\', '', $type),
                'reference_id'=> $payload->id,
                'channel_id' => 'com.cancreative.jaktivity',
                'created_at'=> now()->toDateTimeString(),
                'updated_at'=> now()->toDateTimeString(),
            ];
            $data[] = $item;
            try {
                $message = CloudMessage::withTarget('token', $value->fcm_token)
                    ->withNotification($item)
                        ->withData($item)
                    ;
                $messaging->send($message);
    
    
            } catch (\Throwable $th) {
               return $th->getMessage();
            }
        }
        $chunks = array_chunk($data, 5000);
        foreach ($chunks as $value) {
            Notification::insert($value);
        }
    
        return $payload;
    
    
    }
    
    public static function sendToTopic($title, $body, $topic, $payload = null,$image = null){
        $payload ? $type = get_class($payload):$type = null;
        $payload['notification_type'] =  str_replace('App\\Models\\', '', $type);
        $messaging = app('firebase.messaging');
        $user = User::whereNotNull('fcm_token')->get()->pluck('id');
        $data = [];
        foreach ($user as $value) {
            $data[] = [
                'title'     => $title,
                'body'      => $body,
                'user_id'   => $value,
                'payload'   => $payload,
                'type'      => str_replace('App\\Models\\', '', $type),
                'reference_id'=> $payload->id,
                'channel_id' => 'com.cancreative.jaktivity',
                'created_at'=> now()->toDateTimeString(),
                'updated_at'=> now()->toDateTimeString(),
            ];
        }
    
        $chunks = array_chunk($data, 5000);
        foreach ($chunks as $value) {
            Notification::insert($value);
        }
        try {
            $notification = Notif::create($title, $body);
            if (!empty($image)) {
              $notification = $notification->withImageUrl($image);
            }
    
            $message = CloudMessage::fromArray([
                'topic' => $topic,
                'notification' => $notification, // optional
                'data' => ['type'=>$topic], // optional
            ]);
            $messaging->send($message);
    
            return $message;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    
}
