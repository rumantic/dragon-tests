<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sitebill\Dragon\Eloquent\Traits\AnyModel;

class Street extends Model
{
    use AnyModel;

    protected $table = 'street';
    protected $primaryKey = 'code';
    public $timestamps = false;
}
