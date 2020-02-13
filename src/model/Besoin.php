<?php
namespace crazycharlyday\model;

use Illuminate\Database\Eloquent\Model;

class Besoin extends Model{
    protected $table = 'besoin';
    protected $primaryKey = 'idbesoin';
    public $timestamps = false;
}