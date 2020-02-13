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
            case 'LIST' : $menu = $this->listView();
        }
        $head = parent::renduTitre();
        $menu = parent::renduMenu();
        $foot = parent::rendufooter();

        echo $head . $menu . $foot;
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
    <td>
        <tr>Date du creneau {calc_date($semaine,$jour)}</tr>
        <tr>Heure de debut : $heured</tr>
        <tr>Heur de fin : $heuref</tr>
    </td>
EOF;

        }
        $html .= '</table>
</div>';
        return $html;
    }
}