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
    const MEMBRE = 7;
    const BESOINS = 8;

    protected $tableau;


    public function __construct($tab)
    {
        $this->tableau = $tab;
    }

    public function render($sel)
    {
        $cont = "";
        $head = parent::renduTitre();
        $menu = parent::renduMenu();
        $foot = parent::rendufooter();

        switch ($sel) {
            case self::LISTE:
                $cont .= $this->renderListe();
                break;
            case self::LOGIN:
                $cont .= $this->renderListeAdv();
                break;
            case self::MEMBRE:
                $cont .= $this->renderMembre();
                break;
            case self::BESOINS:
                $cont .= $this->renderBesoins();
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

    private function renderListeAdv()
    {
    }

    private function renderListe()
    {
        $membres = $this->tableau;

        $text = "";

        foreach ($membres as $user) {
            $text .= "
            <div class=\"card\" style=\"width: 18rem;\">
            <div class=\"card-body\">
                <h5 class=\"card-title\">$user->nom $user->prenom</h5>
                <p class=\"card-text\">Mail : $user->mail</p>
                <p class=\"card-text\">Telephone : $user->tel</p>
                <p class=\"card-text\">Absences : $user->nombreAbs</p>
                <p class=\"card-text\">Permanances : $user->permanence</p>
                <p class=\"card-text\">Statut : $user->statut</p>
                <a href=\"membres/$user->iduser\" class=\"btn btn-primary\">Profil</a>
            </div>
            </div>";
        }

        return <<<END
        <nav class="navbar navbar-light bg-light">
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Nom" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher</button>
            </form>
        </nav>
        <div class="cartes">
        $text
        </div>
END;
    }

    private function renderMembre()
    {
        $tableau = $this->tableau;

        $value = "<p>$tableau->nom</p>";
        $value .= "<p> $tableau->prenom</p>";

        return $value;
    }

    private function renderBesoins()
    {
        $besoins = $this->tableau;
        //$creneaux = $besoins->Creneau;
        $text = "";

        foreach ($besoins as $besoin) {
            $text .= "
            <div class=\"card\" style=\"width: 18rem;\">
            <div class=\"card-body\">
                <h5 class=\"card-title\">$besoin->idcreneau $besoin->idbesoin</h5>
                
            </div>
            </div>";
        }

        return <<<END
        <nav class="navbar navbar-light bg-light">
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Nom" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher</button>
            </form>
        </nav>
        <div>
        $text
        </div>
END;
    }
}
