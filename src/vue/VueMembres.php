<?php
namespace crazycharlyday\vue;

class VueMembres extends Vue
{
    const TITRE = 1;
    const MENU = 2;
    const FOOTER = 99;
    const LISTE = 5;
    const LOGIN = 4;
    const LISTERECHERCHE = 6;


    public function __construct() {}

    public function render($sel)
    {
        $cont = "";
        $head = parent::renduTitre();
        $menu = parent::renduMenu();
        $foot = parent::rendufooter();

        switch($sel){
            case self::LISTE:
                $cont .= $this->renderListe();
                break;
            case self::LOGIN:
                $cont .= $this->renderListeAdv();
                break;
        }

        $html = <<<END
        $head
        $menu
        <div class="container">
        $cont
        </div>
        $foot
        END;

        echo $html;
    }

    private function renderListe(){
        return <<<END
        <nav class="navbar navbar-light bg-light">
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Nom ..." aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher</button>
        </form>
        </nav>
        END;
    }



}
?>


