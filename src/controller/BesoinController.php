<?php


namespace crazycharlyday\controller;
use crazycharlyday\vue\VueMembres;
use \Psr\Http\Message\ServerRequestInterface as Request;
use crazycharlyday\model\Besoin;
use crazycharlyday\vue\VueBesoin;

/**
 * Classe du Controller de Besoin.
 * @package crazycharlyday\controller
 */
class BesoinController
{

    public function showAll(){
        $b = Besoin::all();
        $vue = new VueMembres($b);
        $vue->render(VueMembres::BESOINS);

    }

}