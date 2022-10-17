<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sitebill\Dragon\Eloquent\Traits\AnyModel;

class Country extends Model
{
    use AnyModel;

    protected $table = 'country';
    protected $primaryKey = 'country_id';
    public $timestamps = false;
}
