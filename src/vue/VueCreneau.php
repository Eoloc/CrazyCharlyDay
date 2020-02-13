<?php
namespace crazycharlyday\vue;

class VueCreneau extends Vue
{
    private $list;

    function __construct($l){
        $this->list = $l;
    }

    public function render($sel)
    {
        switch($sel){
            case 'LIST' : {
                $cont = $this->listView();
                break;
            }
            case 'FORM' : {
                $cont = $this->formulaireCreneau();
                break;
            }
        }
        $head = parent::renduTitre();
        $menu = parent::renduMenu();
        $foot = parent::rendufooter();

        echo $head . $menu . $cont . $foot;
    }

    public function listView(){
        $html = "<div class = creneaux>
<table>";
        foreach ($this->list as $key => $value){
            $jour = $value['jour'];
            $semaine = $value['semaine'];
            $heured = $value['heuredeb'];
            $heuref = $value['heurefin'];
            $html .= <<< EOF
    <tr>
        <td>Date du creneau {calc_date($semaine,$jour)}</td>
        <td>Heure de debut : $heured</td>
        <td>Heure de fin : $heuref</td>
    </tr>
EOF;

        }
        $html .= '</table>
</div>';
        return $html;
    }

    public function formulaireCreneau(){
        $html = <<< EOF
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Ajout d'un creneau</legend>

<!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="">Jour</label>  
        <div class="col-md-4">
        <input class="form-control input-md" type="text" placeholder="">
        </div>
    </div>

<!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="">Semaine</label>  
        <div class="col-md-4">
        <input class="form-control input-md" type="text" placeholder="">
        </div>
    </div>

<!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="">Heure de départ</label>  
        <div class="col-md-4">
        <input class="form-control input-md" type="text" placeholder="">
        </div>
    </div>

<!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Heure de fin</label>  
        <div class="col-md-4">
        <input name="textinput" class="form-control input-md" id="textinput" type="text" placeholder="">
        </div>
    </div>
</fieldset>
</form>
EOF;
        return $html;
    }
}