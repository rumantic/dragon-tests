<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sitebill\Dragon\Eloquent\Traits\AnyModel;

class Doma extends Model
{
    use AnyModel;

    protected $table = 'doma';
    protected $primaryKey = 'code';
    public $timestamps = false;
}
