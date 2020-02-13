<?php

namespace crazycharlyday\model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = 'user';
    protected $primarykey = 'iduser';
    public $timestamps = false;
    public function Inscriptions() {
        return $this->hasManyThrough("crazycharlyday\model\Inscription",
            "crazycharlyday\model\Besoin",
            "iduser",
            "idbesoin",
            "iduser",
            "idbesoin");
    }
}