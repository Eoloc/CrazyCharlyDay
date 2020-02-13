<?php
namespace crazycharlyday\vue;

class VueMembres extends Vue
{
    public function render($sel)
    {
        $head = parent::renduTitre();
        $menu = parent::renduMenu();
        $foot = parent::rendufooter();

        echo $head . $menu . $foot;
    }
}
?>

<nav class="navbar navbar-light bg-light">
<form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Nom ..." aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher</button>
</form>
</nav>
