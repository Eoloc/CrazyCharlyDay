<?php


namespace crazycharlyday\controllers;

use Slim\Slim;

class  Controller
{
    protected $app;

    /**
     * ItemController constructor.
     * @param $a App Objet slim injecté dans le contoleur
     */
    public function __construct($a = NULL)
    {
        $this->app = $a;
    }
}