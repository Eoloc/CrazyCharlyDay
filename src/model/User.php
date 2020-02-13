<?php

namespace crazycharlyday\model;

class User
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