<?php


namespace crazycharlyday\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Post
 *
 * @mixin Builder
 */
class Creneau extends Model
{
    protected $table = 'creneau';
    protected $primaryKey = 'idcreneau';
    public $timestamps = false;


}