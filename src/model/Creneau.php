<?php


namespace crazycharlyday\model;

use Illuminate\Database\Eloquent\Model;

class Creneau extends Model
{
    protected $table = 'creneau';
    protected $primaryKey = 'idcreneau';
    public $timestamps = false;
}