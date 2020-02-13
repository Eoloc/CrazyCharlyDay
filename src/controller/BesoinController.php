<?php


namespace crazycharlyday\controller;
use \Psr\Http\Message\ServerRequestInterface as Request;
use crazycharlyday\model\Besoin;
use wishlist\views\VueBesoin;

/**
 * Classe du Controller de Besoin.
 * @package crazycharlyday\controller
 */
class BesoinController
{

    public function showAll(){
        $b = Besoin::select('*')->get();
        $arr = json_decode($b);
        $view = new VueBesoin($arr);
    }

}