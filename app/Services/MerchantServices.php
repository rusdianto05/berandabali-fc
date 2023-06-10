<?php
namespace App\Services;

use App\Models\Merchant;
use Location\Coordinate;
use Location\Distance\Vincenty;


class MerchantServices
{
    public static function calculateDistance($latitude, $longitude)
    {
        $coordinate1 = new Coordinate($latitude, $longitude);
        $cordinate2 = Merchant::with(['categoryMerchant' => function($query) {
            $query->select('id','name');
        }])->select('id', 'name', 'address', 'latitude', 'longitude', 'logo','category_merchant_id')->where('is_active', 1)->get()->toArray();
        foreach ($cordinate2 as $key => $value) {
            $coordinate2 = new Coordinate($value['latitude'], $value['longitude']);
            $distance = $coordinate1->getDistance($coordinate2, new Vincenty());
            $cordinate2[$key]['distance'] = $distance;
        }
        // sort by distance
        usort($cordinate2, function ($item1, $item2) {
            return $item1['distance'] <=> $item2['distance'];
        });
        return $cordinate2;
    }
}
