<?php


namespace crazycharlyday\vue;

use crazycharlyday\date\CalcDate;
use crazycharlyday\model\Besoin;
use crazycharlyday\model\Creneau;
use crazycharlyday\model\Role;

/**
 * Affichage des listes
 * @package wishlist\views
 */
class VueBesoin extends Vue
{

    const CREABESOINS = 1;
    protected $tableau;


    public function __construct($tab) {
        $this->tableau = $tab;
    }

    public function render($sel)
    {
        $cont = "";
        $head = parent::renduTitre();
        $menu = parent::renduMenu();
        $foot = parent::rendufooter();

        switch($sel){
            case self::CREABESOINS:
                $cont .= $this->renderCreabesoins();
                break;
        }

        $html = "
        $head
        $menu
        <div class=\"container\">
        $cont
        </div>
        $foot
        ";

        echo $html;
    }

    private function renderCreabesoins() {
        $text = "";
        $roles = Role::all();
        $creneaux = Creneau::all();

        $text .= "
        <form class=\"form-horizontal\">
                <fieldset>
                
                <!-- Form Name -->
                <legend>Créer un besoin</legend>
                
                <!-- Select Basic -->
                <div class=\"form-group\">
                  <label class=\"col-md-4 control-label\" for=\"selectRole\">Rôle</label>
                  <div class=\"col-md-4\">
                    <select id=\"selectRole\" name=\"selectRole\" class=\"form-control\">
";

        foreach($roles as $role){

            $text .= "<option value=$role->idrole>$role->label</option>";

        };

        $text .= "
                    </select>
                  </div>
                </div>
                
                <!-- Select Basic -->
                <div class=\"form-group\">
                  <label class=\"col-md-4 control-label\" for=\"selectCreneau\">Créneau</label>
                  <div class=\"col-md-4\">
                    <select id=\"selectCreneau\" name=\"selectCreneau\" class=\"form-control\">
                      ";
        $calc = new CalcDate();
        foreach($creneaux as $key => $value){
            $tmp=$calc->calc_date('2020-01-20',$value['semaine'] ,$value['jour'],0);
            $text .= "<option value=$value[$key]['idcreneau']>$tmp->jour_no/$tmp->mois_no/$tmp->annee_no {$value[$key]['heuredeb']} {$value[$key]['heurefin']}</option>";

        };

        $text .="
                    </select>
                  </div>
                </div>
                
                <!-- Button -->
                <div class=\"form-group\">
                <label class=\"col-md-4 control-label\" for=\"submit\"></label>
  <div class=\"col-md-4\">
    <button id=\"submit\" name=\"submit\" class=\"btn btn-primary\">Valider</button>
  </div>
</div>
                
                </fieldset>
                </form>";


        return $text;

    }





    /* public function vue(string $vue)
     {
         switch ($vue) {
             case 'showAll':
                 $this->showAll();
                 break;
             default:
                 break;
         }
     }

     /**
      * Affiche toutes les listes
      */
    /*
     private function showAll()
     {
         $this->content.= "coucou";
     }*/

    /*
     *
                      }
     */
}