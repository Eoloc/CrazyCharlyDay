<?php

namespace crazycharlyday\vue;

use crazycharlyday\date\CalcDate;

class VueCreneau extends Vue
{
    private $liste;
    private $date;

    function __construct(...$l){
        $this->liste = $l;
        $this->date = new CalcDate();
    }

    public function render($sel)
    {
        switch ($sel) {
            case 'LIST': {
                $cont = $this->listView();
                break;
            }
            case 'FORM': {
                $cont = $this->formulaireCreneau();
                break;
            }
            case 'SINGLE_VIEW': {
                $cont = $this->singleView();
                break;
            }
        }
        $head = parent::renduTitre();
        $menu = parent::renduMenu();
        $foot = parent::rendufooter();

        echo $head . $menu . $cont . $foot;
    }

    public function singleView()
    {
        $dateObj = $this->date->calc_date('2020-01-20', $this->liste[0]['semaine'], $this->liste[0]['jour'],0);
        $jour = $dateObj->jour_no;
        $mois = $dateObj->mois_no;
        $annee = $dateObj->annee_no;
        $heured = $this->liste[0]['heuredeb'];
        $heuref = $this->liste[0]['heurefin'];

        return <<< EOF
<ul>
    <li>Date du créneau : $jour/$mois/$annee</li>
    <li>Heure de début : $heured</li>
    <li>Heure de fin : $heuref</li>
</ul>
EOF;
    }

    public function listView()
    {
        $html = "
    <div class = creneaux>
        <table>";
        return $html . implode($this->liste);
        foreach ($this->liste as $key => $value){
            $dateObj = $this->date->calc_date('2020-01-20', $value[$key]['semaine'], $value[0]['jour'],0);
            $jour = $dateObj->jour_no;
            $mois = $dateObj->mois_no;
            $annee = $dateObj->annee_no;
            $heured = $value[$key]['heuredeb'];
            $heuref = $value[$key]['heurefin'];
            $html .= <<< EOF
    
        <tr>
            <td>Date du creneau : $jour/$mois/$annee</td>
            <td>Heure de debut : $heured</td>
            <td>Heure de fin : $heuref</td>
        </tr>

EOF;
        }
        $html .= '    </table>
    </div>';
        return $html;
    }

    public function formulaireCreneau()
    {
        $html = <<< EOF
<form class="form-creneau" method="POST" action=../../index.php/ajoutercreneau>
<fieldset>

<!-- Form Name -->
<legend>Ajout d'un creneau</legend>

<!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="">Jour</label>  
        <div class="col-md-4">
        <input class="form-control input-md" type="text" placeholder="" name="jour">
        </div>
    </div>

<!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="">Semaine</label>  
        <div class="col-md-4">
        <input class="form-control input-md" type="text" placeholder="" name="semaine">
        </div>
    </div>

<!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="">Heure de départ</label>  
        <div class="col-md-4">
        <input class="form-control input-md" type="text" placeholder="" name="heuredep">
        </div>
    </div>

<!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Heure de fin</label>  
        <div class="col-md-4">
        <input class="form-control input-md" id="textinput" type="text" placeholder="" name="heurefin">
        </div>
    </div>
    
    <div class="button-ajout">
        <input type=submit value='Ajouter creneau'</input>
    </div>
</fieldset>
</form>
EOF;
        return $html;
    }
}
