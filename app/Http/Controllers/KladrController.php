<?php

namespace App\Http\Controllers;


use App\Models\Country;
use App\Models\Data;
use App\Models\Kladr;
use Sitebill\Dragon\Eloquent\Casts\SelectBox;
use Sitebill\Dragon\Helpers\DragonHelper;

class KladrController extends Controller
{
    public function kladr () {
        $kladr_records = Kladr::where('region_id', 0)->take(10000)->get();
        foreach ( $kladr_records as $item ) {
            $parsed = $this->parse_kladr_code($item->code);
            $item->region_id =  $parsed['region_id'];
            $item->area_id =  $parsed['area_id'];
            $item->city_id =  $parsed['city_id'];
            $item->town_id =  $parsed['town_id'];
            $item->status_id =  $parsed['status_id'];
            $item->save();
            //echo "updated ".$item->code.'<br>';
        }
        echo 'complete';



    }

    private function parse_kladr_code( $code )
    {
        if ( strlen($code) < strlen('9500500012100') ) {
            $code = '0'.$code;
        }
        $result = array();
        $result['region_id'] = intval(substr($code, 0, 2));
        $result['area_id'] = intval(substr($code, 2, 3));
        $result['city_id'] = intval(substr($code, 5, 3));
        $result['town_id'] = intval(substr($code, 8, 3));
        $result['status_id'] = intval(substr($code, 11, 2));
        return $result;
    }
}
