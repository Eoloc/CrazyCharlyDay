<?php


namespace crazycharlyday\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Post
 *
 * @mixin Builder
 */
class Creneau extends Model
{
    protected $table = 'creneau';
    protected $primarykey = 'idcreneau';
    public $timestamps = false;

    function nouveauCreneau($jour, $semaine, $heuredeb, $heurefin, ...$activation){
        $c = new Creneau();
        $c->jour = $jour;
        $c->semaine = $semaine;
        $c->heuredeb = $heuredeb;
        $c->heurefin = $heurefin;
        $c->activation = $activation;

        $c->save();
    }

    function byId($id){
        return Creneau::where('idcreneau', '=',$id)->get();
    }

    function listeCreneaux(){
        return Creneau::all();
    }
}