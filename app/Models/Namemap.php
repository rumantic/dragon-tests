<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sitebill\Dragon\Eloquent\Traits\AnyModel;

class Namemap extends Model
{
    use AnyModel;

    protected $table = 'namemap';
    protected $primaryKey = 'code';
    public $timestamps = false;
}
