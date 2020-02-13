<?php
namespace crazycharlyday\vue;

use Slim\Slim;

abstract class Vue
{
    public abstract function render($sel);

    protected final function renduTitre(){
        return "<!DOCTYPE html>
<html lang=\"en\">

<head>

  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
  <meta name=\"description\" content=\"\">
  <meta name=\"author\" content=\"\">

  <title>GEG - Gestion</title>

  <!-- Bootstrap core CSS -->
  <link href=\"/vendor/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">

  <!-- Custom styles for this template -->
  <link href=\"/css/simple-sidebar.css\" rel=\"stylesheet\">

    </head>";

    }


    protected final function renduMenu(){
        $slim = Slim::getInstance();
        $request = $slim->request;
        $url = $request->getRootUri() . "/connect";
  return "<body>

  <div class=\"d-flex\" id=\"wrapper\">

    <!-- Sidebar -->
    <div class=\"bg-light border-right\" id=\"sidebar-wrapper\">
      <div class=\"sidebar-heading\">GEG Gestion </div>
      <div class=\"list-group list-group-flush\">
      <div class=\"dropdown-divider\"></div>
      <a id=\"adminpanel\" href=\"\#\" class=\"list-group-item list-group-item-action bg-light\">Panel Admin</a>
      <div class=\"dropdown-divider\"></div>
      <a href=\"creneaux\" class=\"list-group-item list-group-item-action bg-light\">Planning</a>
      <a href=\"membres\" class=\"list-group-item list-group-item-action bg-light\">Membres</a>
      <a href=\"\besoins\" class=\"list-group-item list-group-item-action bg-light\">Besoins</a>
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
            <li class=\"nav-item\">
              <button id=\"connexion\" class=\"btn btn-success\" id=\"menu-toggle\">Connexion</button>
            </li>
            <li class=\"nav-item active\">
              <a class=\"nav-link\" href=\"/\">Accueil <span class=\"sr-only\">(current)</span></a>
            </li>
            <li class=\"nav-item dropdown\">
              <a class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" role=\"button\" aria-expanded=\"false\" aria-haspopup=\"true\" href=\"#\" data-toggle=\"dropdown\">
                Options
              </a>
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

    protected final function rendufooter(){


  return "
  <div class=\"container-fluid\">
  </div>
  </div>
  <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src=\"/vendor/jquery/jquery.min.js\"></script>
  <script src=\"/vendor/bootstrap/js/bootstrap.bundle.min.js\"></script>


  </body>
  <script src=\"/vendor/jquery/jquery.min.js\"></script>
  <script src=\"/vendor/bootstrap/js/bootstrap.bundle.min.js\"></script>
  <script type=\"module\"  src='/js/index.js'></script>
</body>

</html>";
    }

}

?>