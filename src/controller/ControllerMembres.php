<?php


namespace crazycharlyday\controller;

use crazycharlyday\model\User;
use crazycharlyday\vue\VueMembres;
use Slim\Slim;

class ControllerMembres
{
    /**
     * ItemController constructor.
     * @param $a App Objet slim injecté dans le contoleur
     */
    public function __construct()
    {
    }

    public function getMembres()
    {
        $membre = User::get();
        $vue = new VueMembres($membre);
        $vue->render(VueMembres::LISTE);
    }

    public function getMembre($id)
    {
        $membre = User::where('iduser', '=', $id)->first();
        $vue = new VueMembres($membre);
        $vue->render(VueMembres::MEMBRE);
    }
}
