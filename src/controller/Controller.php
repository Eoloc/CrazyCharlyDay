<?php


namespace crazycharlyday\controller;

use Slim\App;

class  Controller
{
    protected $app;

    /**
     * Controller constructor.
     * @param $a App Objet slim injecté dans le contoleur
     */
    public function __construct($a = NULL)
    {
        $this->app = $a;
    }
}