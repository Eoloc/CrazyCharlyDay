<?php
namespace crazycharlyday\vue;

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
  <link href=\"vendor/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">

  <!-- Custom styles for this template -->
  <link href=\"css/simple-sidebar.css\" rel=\"stylesheet\">

</head>";

    }


    protected final function renduMenu(){

  return "<body>

  <div class=\"d-flex\" id=\"wrapper\">

    <!-- Sidebar -->
    <div class=\"bg-light border-right\" id=\"sidebar-wrapper\">
      <div class=\"sidebar-heading\">Start Bootstrap </div>
      <div class=\"list-group list-group-flush\">
        <a class=\"list-group-item list-group-item-action bg-light\" href=\"#\">Dashboard</a>
        <a class=\"list-group-item list-group-item-action bg-light\" href=\"#\">Shortcuts</a>
        <a class=\"list-group-item list-group-item-action bg-light\" href=\"#\">Overview</a>
        <a class=\"list-group-item list-group-item-action bg-light\" href=\"#\">Events</a>
        <a class=\"list-group-item list-group-item-action bg-light\" href=\"#\">Profile</a>
        <a class=\"list-group-item list-group-item-action bg-light\" href=\"#\">Status</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id=\"page-content-wrapper\">

      <nav class=\"navbar navbar-expand-lg navbar-light bg-light border-bottom\">
        <button class=\"btn btn-primary\" id=\"menu-toggle\">Toggle Menu</button>

        <button class=\"navbar-toggler\" aria-expanded=\"false\" aria-controls=\"navbarSupportedContent\" aria-label=\"Toggle navigation\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\">
          <span class=\"navbar-toggler-icon\"></span>
        </button>

        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
          <ul class=\"navbar-nav ml-auto mt-2 mt-lg-0\">
            <li class=\"nav-item active\">
              <a class=\"nav-link\" href=\"#\">Home <span class=\"sr-only\">(current)</span></a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"#\">Link</a>
            </li>
            <li class=\"nav-item dropdown\">
              <a class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" role=\"button\" aria-expanded=\"false\" aria-haspopup=\"true\" href=\"#\" data-toggle=\"dropdown\">
                Dropdown
              </a>
              <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"navbarDropdown\">
                <a class=\"dropdown-item\" href=\"#\">Action</a>
                <a class=\"dropdown-item\" href=\"#\">Another action</a>
                <div class=\"dropdown-divider\"></div>
                <a class=\"dropdown-item\" href=\"#\">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class=\"container-fluid\">
        </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src=\"vendor/jquery/jquery.min.js\"></script>
  <script src=\"vendor/bootstrap/js/bootstrap.bundle.min.js\"></script>

  <!-- Menu Toggle Script -->
  <script>
    $(\"#menu-toggle\").click(function(e) {
      e.preventDefault();
      $(\"#wrapper\").toggleClass(\"toggled\");
    });
  </script>




</body>
    ";

    }

    protected final function rendufooter(){


  return "<!-- Bootstrap core JavaScript -->
  <script src=\"vendor/jquery/jquery.min.js\"></script>
  <script src=\"vendor/bootstrap/js/bootstrap.bundle.min.js\"></script>
  <script type=\"module\"  src='js/index.js'></script>
</body>

</html>";
    }

}