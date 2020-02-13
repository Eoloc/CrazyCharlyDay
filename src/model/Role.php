<?php
namespace crazycharlyday\model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model{
    protected $table = 'role';
    protected $primaryKey = 'idrole';
    public $timestamps = false;
}