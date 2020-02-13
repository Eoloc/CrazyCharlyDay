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

    public function affPlanning(){
        $m = Creneau::join('besoin', 'creneau.idcreneau', '=', 'besoin.idcreneau')
            ->join('inscription','besoin.idbesoin', '=', 'inscription.idbesoin')
            ->select('*')
            ->where('inscription.iduser', 'ISNULL', null, 'and')
            ->get();

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