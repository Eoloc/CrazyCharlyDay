<?php


namespace crazycharlyday\controller;

use crazycharlyday\vue\VueMembres;
use \Psr\Http\Message\ServerRequestInterface as Request;
use crazycharlyday\model\Besoin;
use crazycharlyday\vue\VueBesoin;

use Slim\Slim;

/**
 * Classe du Controller de Besoin.
 * @package crazycharlyday\controller
 */
class BesoinController
{

    public function showAll()
    {
        $b = Besoin::all();
        $vue = new VueMembres($b);
        $vue->render(VueMembres::BESOINS);
    }

    public function formCrea()
    {
        $msg = "";
        if (isset($_COOKIE['Error'])) {
            $msg = $_COOKIE['Error'];
            setcookie("Error", "", 1);
        }
        $vue = new VueBesoin($msg);
        $vue->render(VueBesoin::CREABESOINS);
    }

    private function postCreaForm()
    {
        $slim = Slim::getInstance();
        if (isset($_POST['selectRole']) && $_POST['selectRole'] !== "" && isset($_POST['selectCreneau']) && $_POST['selectCreneau'] !== "") {
            $besoin = new Besoin();
            //$besoin->idrole =


        } else {
            setcookie("Error", "Il y a une erreur dans le formulaire", time() + 10);
            $slim->redirect($slim->urlFor("creabesoins"), 302);
        }
    }
}
