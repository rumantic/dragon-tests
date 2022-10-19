<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sitebill\Dragon\Eloquent\Traits\AnyModel;

class Data extends Model
{
    use AnyModel;

    protected $table = 'data';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function country_id () {
        return $this->hasOne(Country::class, 'country_id', 'country_id');
    }
}
