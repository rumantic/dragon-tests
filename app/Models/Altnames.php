<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sitebill\Dragon\Eloquent\Traits\AnyModel;

class Altnames extends Model
{
    use AnyModel;

    protected $table = 'altnames';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
