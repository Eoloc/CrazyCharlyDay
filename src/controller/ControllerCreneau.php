<?php


namespace crazycharlyday\controller;

use crazycharlyday\Model\Creneau;
use crazycharlyday\Vue\VueCreneau;

class ControllerCreneau
{
    public function __construct()
    {

    }

    public function getCreneau($id){
        $creneau = Creneau::where('idcreneau', '=', $id)->first();
        $vue = new VueCreneau($creneau);
        $vue->render('SINGLE_VIEW');
    }

    public function listCreneau(){
        $m = Creneau::all();

        $v = new VueCreneau($m);
        $v->render('LIST');
    }

    public function seeFormCrea() {
        $v = new VueCreneau();
        $v->render('FORM');
    }

    public function ajouterCreneau($j, $s, $hd, $hf){
        $c = new Creneau();
        $c->jour = $j;
        $c->semaine = $s;
        $c->heuredeb = $hd;
        $c->heurefin = $hf;

        $c->save();
    }
}