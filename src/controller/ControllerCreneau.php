<?php


namespace crazycharlyday\controller;

use crazycharlyday\Model\Creneau;
use crazycharlyday\Vue\VueCreneau;
use crazycharlyday\Vue\VueMembres;

class ControllerCreneau
{
    public function __construct()
    {

    }

    public function getCreneau($id){
        $creneau = Creneau::where('idcreneau', '=', $id)->first();
        $vue = new VueMembres($creneau);
        //$vue->render(VueMembres::Creneau);
    }

    public function listCreneau(){
        $m = new Creneau();
        $liste = $m->listeCreneaux();

        $v = new VueCreneau($liste);
        $v->render('LIST');
    }

    public function seeFormCrea() {
        $v = new VueCreneau();
        $v->render('FORM');
    }

    public function ajouterCreneau($j, $s, $hd, $hf){
        $m = new Creneau();
        $m->nouveauCreneau($j, $s, $hd, $hf);
        $this->listCreneau();
    }

    public function creneauParId($id){
        $c = new Creneau();
        $c->byId($id);

        $v = new VueCreneau();
        $v->render('SINGLE_VIEW');
    }
}