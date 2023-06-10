<?php 

namespace App\Services;

use App\Models\User;
use App\Models\Level;
use App\Models\HistoryRun;
use App\Models\HistoryPoint;
use App\Models\ExperiencePoint;
use Illuminate\Support\Facades\Auth;
use App\Models\HistoryExperiencePoint;

class LevelServices
{

    //get total step user
    // function get_step($user_id = 0){

    //     if ($user_id == 0) {
    //     $user_id = Auth::guard('api')->user()->id;
    //     }else{
    //         $user_id = $user_id;
    //     }

    //     return HistoryRun::where('user_id',$user_id)->sum('step');
    // }

    public static function getExperiencePoint($user_id = 0)
    {
        $user_id = $user_id ?: Auth::guard('api')->user()->id;
        $xp = $user_id ? ExperiencePoint::where('user_id', $user_id)->first() : null;
        return $xp ? $xp->walk + $xp->run + $xp->bike : 0;
    }

    public static function get_next_level(){
        $data = Level::select('name', 'xp', 'point', 'badge')->where('xp', '>', Auth::user()->experience_point)->orderBy('xp','ASC')->first(); 
        return $data;
    }

    // check is new level up or not when get new point
    public static function check_up_level($xp){
        $next_level = LevelServices::get_next_level();
        $xp_now = LevelServices::getExperiencePoint() + $xp;

        if ($next_level) {
            if ($xp_now >= $next_level->xp) {
            $user = User::find(Auth::guard('api')->user()->id);
            $latest_point = $user->point + $next_level->point;
            $user->update(['point' => $latest_point]);

            HistoryPoint::create([
                'note'      => 'Level Up to '.$next_level->name.'',
                'point'     =>  $next_level->point,
                'user_id'   =>  $user->id,
                'status'    =>  'ACTIVE'
            ]);

            return ['point' => $next_level->point,
                    'step'  => $next_level->step,
                    'badge' => $next_level->badge,
                    'tier'  => LevelServices::getExperiencePoint(),
                    ];
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public static function addHistoryXP($xp, $history_run)
    {
        $user = Auth::guard('api')->user();
        $history_xp = HistoryExperiencePoint::create([
            'user_id' => $user->id,
            'xp' => $xp,
             'status' => HistoryExperiencePoint::STATUS_ACTIVE,
            'note' => 'Mendapatkan ' . $xp . ' XP dari ' . $history_run->mode .' Tipe ' . HistoryRun::TYPE_FREE,
        ]);
    }
}

?>