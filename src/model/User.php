<?php

namespace crazycharlyday\model;

class User
{

    protected $table = 'user';
    protected $primarykey = 'iduser';
    public $timestamps = false;
    public function Evenements() {
        return $this->hasManyThrough("crazycharlyday\model\Inscription",
            "crazycharlyday\models\Besoin",
            "iduser",
            "idbesoin",
            "iduser",
            "idbesoin");
    }
}