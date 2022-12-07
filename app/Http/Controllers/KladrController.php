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
        $kladr = Kladr::skip(0)->take(10)->get();
        dd($kladr);

    }
}
