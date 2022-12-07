<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sitebill\Dragon\Eloquent\Traits\AnyModel;

class Kladr extends Model
{
    //use AnyModel;

    protected $table = 'kladr';
    protected $primaryKey = 'code';
    public $timestamps = false;
}
