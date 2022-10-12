<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sitebill\Dragon\Eloquent\Traits\AnyModel;

class Client extends Model
{
    use AnyModel;

    protected $table = 'client';
    protected $primaryKey = 'client_id';
    public $timestamps = false;
}
