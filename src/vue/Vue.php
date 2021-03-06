<?php
namespace crazycharlyday\vue;

use crazycharlyday\model\User;
use Slim\Slim;

abstract class Vue
{
    public abstract function render($sel);

    protected final function renduTitre()
    {
        return "<!DOCTYPE html>
<html lang=\"en\">

<head>

  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
  <meta name=\"description\" content=\"\">
  <meta name=\"author\" content=\"\">

  <title>GEG - Gestion</title>

  <!-- Bootstrap core CSS -->
  <link href=\"/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">

  <!-- Custom styles for this template -->
  <link href=\"/css/simple-sidebar.css\" rel=\"stylesheet\">

    </head>";

    }


    protected final function renduMenu()
    {
        $slim = Slim::getInstance();
        $request = $slim->request;
        $url = $request->getRootUri() . "/connect";
        $url = $this->generateLink();
        $boutAdmin = $this->generatePanelAdmin();
        return "<body>

  <div class=\"d-flex\" id=\"wrapper\">

    <!-- Sidebar -->
    <div class=\"bg-light border-right\" id=\"sidebar-wrapper\">
      <div class=\"sidebar-heading\">GEG Gestion </div>
      <div class=\"list-group list-group-flush\">
      $boutAdmin
      <a href=\"creneaux\" class=\"list-group-item list-group-item-action bg-light\">Planning</a>
      <a href=\"membres\" class=\"list-group-item list-group-item-action bg-light\">Membres</a>
      <a href=\"besoins\" class=\"list-group-item list-group-item-action bg-light\">Besoins</a>
      <a href=\"\#\" class=\"list-group-item list-group-item-action bg-light\">Permanences</a>
      <a href=\"\#\" class=\"list-group-item list-group-item-action bg-light\">Répartitions</a>

      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id=\"page-content-wrapper\">

      <nav class=\"navbar navbar-expand-lg navbar-light bg-light border-bottom\">
        <button class=\"btn btn-primary\" id=\"menu-toggle\">◄ Affichage</button>

        <button class=\"navbar-toggler\" aria-expanded=\"false\" aria-controls=\"navbarSupportedContent\" aria-label=\"Toggle navigation\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\">
          <span class=\"navbar-toggler-icon\"></span>
        </button>

        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
          <ul class=\"navbar-nav ml-auto mt-2 mt-lg-0\">
            
            <li class=\"nav-item active\">
              <a class=\"nav-link\" href=\"/\">Accueil <span class=\"sr-only\">(current)</span></a>
            </li>
            <li class=\"nav-item dropdown\">
              <a class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" role=\"button\" aria-expanded=\"false\" aria-haspopup=\"true\" href=\"#\" data-toggle=\"dropdown\">
                Options
              </a>
              $url
              <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"navbarDropdown\">
                <a class=\"dropdown-item\" href=\"#\">...</a>
                <a class=\"dropdown-item\" href=\"#\">...</a>
                <div class=\"dropdown-divider\"></div>
                <a class=\"dropdown-item\" href=\"#\">...</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>";
    }

    protected final function rendufooter()
    {


        return "
  <div class=\"container-fluid\">
  </div>
  </div>
  <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src=\"./jquery/jquery.min.js\"></script>
  <script src=\"./bootstrap/js/bootstrap.bundle.min.js\"></script>


  </body>
  <script src=\"./jquery/jquery.min.js\"></script>
  <script src=\"./bootstrap/js/bootstrap.bundle.min.js\"></script>
  <script type=\"module\"  src='./js/index.js'></script>
</body>

</html>";
    }


    private final function generateLink()
    {
        $slim = Slim::getInstance();
        $request = $slim->request;
        if (!array_key_exists("id", $_SESSION)) {
            $url = $request->getRootUri() . "/connect";
            $url = "<li class=\"nav-item\">
              <button id=\"connexion\" class=\"btn btn-success\" id=\"menu-toggle\">Connexion</button>
            </li>";
        } else {
            $name = $_SESSION['id']['login'];
            $t = $request->getRootUri() . '/connected';
            $user = User::where("login", "=", $name)->first();
            $url = "<li class=\"nav-item active\">
              <a class=\"nav-link\" href=\"/\">Bienvenue $name<span class=\"sr-only\">(current)</span></a>
              </li>
              <li class=\"nav-item\">
              <button id=\"deconnexion\" class=\"btn btn-success\" id=\"menu-toggle\">Déconnexion</button>
            </li>";
            if ($user->statut == "admin") {
                $url .= "<li class=\"nav-item\">
              <button id=\"creerCompte\" class=\"btn btn-success\" id=\"menu-toggle\">Créer un compte</button>
            </li>";
            }
        }
        return $url;
    }

    private final function generatePanelAdmin()
    {
        $slim = Slim::getInstance();
        $request = $slim->request;
        $url = "";
        if (array_key_exists("id", $_SESSION)) {
            $name = $_SESSION['id']['login'];
            $user = User::where("login", "=", $name)->first();
            if ($user->statut == "admin") {
                $url = "<div class=\"dropdown-divider\"></div>
                <a id=\"adminpanel\" href=\"\#\" class=\"list-group-item list-group-item-action bg-light\">Panel Admin</a>
                <div class=\"dropdown-divider\"></div>";
            }
            return $url;
        }

    }
}

?>
