<?php


namespace crazycharlyday\controllers;

use Slim\Slim;


class CompteController
{

    public function formConn() {
            $msg = "";
            $v = new VueCompte($msg);
            $v->render(VueCompte::LOGIN);
    }

    private function isConnected() {
        return isset($_SESSION['id']);
    }
}