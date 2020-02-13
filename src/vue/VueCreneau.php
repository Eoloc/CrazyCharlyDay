<?php
namespace crazycharlyday\vue;

class VueCreneau extends Vue
{
    private $list;

    function __construct($list){
        $this->list = $list;
    }

    public function render($sel)
    {
        switch($sel){
            case 'LIST' : $cont = $this->listView();
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
}