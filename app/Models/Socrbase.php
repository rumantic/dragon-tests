<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sitebill\Dragon\Eloquent\Traits\AnyModel;

class Socrbase extends Model
{
    use AnyModel;

    protected $table = 'socrbase';
    protected $primaryKey = 'kod_t_st';
    public $timestamps = false;
}
