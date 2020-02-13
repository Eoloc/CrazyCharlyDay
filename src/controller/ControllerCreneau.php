<?php


namespace crazycharlyday\controllers;

use crazycharlyday\Model\Creneau;
use crazycharlyday\Vue\VueMembres;

class ControllerCreneau extends Controller
{
    public function __construct($a = NULL)
    {
        parent::__construct($a);
    }

    public function getCreneau($id){
        $creneau = Creneau::where('idcreneau', '=', $id)->first();
        $vue = new VueMembres($creneau);
        //$vue->render(VueMembres::Creneau);
    }

    public function seeFormCrea() {

    }
}