<?php


namespace crazycharlyday\vue;


use crazycharlyday\vue\Vue;
use Slim\Slim;

class VueCompte extends Vue
{
  const CREA = 1;
  const LOGIN = 2;
  const NORMAL = 30;
  private $message;
  private $listes;
  private $user;

  public function __construct($message = "")
  {
    $this->message = $message;
  }


  public function render($sel)
  {
    $cont = "";
    if ($this->message !== "") {
      $cont = <<<END
    <div class="alert alert-danger" role="alert">
     $this->message
    </div>
END;
    }
    switch ($sel) {
      case self::CREA:
        $cont .= $this->renderForm();
        break;
      case self::LOGIN:
        $cont .= $this->renderLog();
        break;
      case self::NORMAL:
        $cont .= $this->renderAufMenu();
        break;
    }

    $head = parent::renduTitre();
    $menu = parent::renduMenu();
    $foot = parent::rendufooter();
    $html = "
    $head
    $menu
    <div class=\"container\">
    $cont
    </div>
    $foot
    ";
    echo $html;
  }

  private function renderForm()
  {
    return "
        <div class=\"formconnexion\">
          <form method=\"post\" action=\"\">
            <h5>Créer votre compte utilisateur !</h5>
            <div class=\"form-row\">
              <div class=\"form-group col-md-6\">
                <label for=\"name\">Nom</label>
                <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" placeholder=\"Nom\" required>
              </div>
              <div class=\"form-group col-md-6\">
                <label for=\"prenom\">Prénom</label>
                <input type=\"text\" class=\"form-control\" id=\"prenom\" name=\"prenom\" placeholder=\"Prenom\" required>
              </div>
            </div>
              <div class=\"form-row\">
                <div class=\"form-group col-md-6\">
                <label for=\"login\">Téléphone</label>
                <input type=\"text\" class=\"form-control\" id=\"tel\" name=\"tel\" placeholder=\"téléphone\" required>
              </div>
              <div class=\"form-group col-md-6\">
                <label for=\"mail\">Mail</label>
                <input type=\"email\" class=\"form-control\" id=\"mail\" name=\"mail\" placeholder=\"Email\" required>
              </div> </div>
            <div class=\"form-row\">
                <div class=\"form-group col-md-6\">
                <label for=\"login\">Login</label>
                <input type=\"text\" class=\"form-control\" id=\"login\" name=\"login\" placeholder=\"login\" required>
              </div>
              <div class=\"form-group col-md-6\">
                <label for=\"login\">Statut de l'utilisateur</label>
                <input type=\"text\" class=\"form-control\" id=\"statut\" name=\"statut\" placeholder=\"statut\" required>
              </div>
                </div>
            <div class=\"form-row\">
            <div class=\"form-group col-md-6\">
                <label for=\"password\">Password</label>
                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" placeholder=\"Password\" required>
              </div>
              <div class=\"form-group col-md-6\">
                <label for=\"passwordConf\">Password</label>
                <input type=\"password\" class=\"form-control\" id=\"passwordConf\" name=\"passwordConf\" placeholder=\"Password\" required>
              </div> </div>
            <button type=\"submit\" class=\"btn btn-primary\">Validez</button>
          </form>
        </div>
        ";
  }

  private function renderLog()
  {
    $slim = Slim::getInstance();
    $request = $slim->request;
    return "
        <div class=\"formconnexion\">
          <form method=\"post\">
            <h4>Connexion</h4>
            <div class=\"form-row\">
              <div class=\"form-group col-md-6\">
                <label for=\"login\">Login</label>
                <input type=\"text\" class=\"form-control\" id=\"login\" name=\"login\" placeholder=\"login\" required>
              </div>
              <div class=\"form-group col-md-6\">
                <label for=\"password\">Password</label>
                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" placeholder=\"Password\" required>
              </div>
            </div>
            <div class=\"form-row\">
              <div class=\"col-md-6\">    
                <input  type=\"submit\" class=\"btn-success btn\" id=\"subM\" value=\"Se connecter \"/>
              </div>
              <div class=\"col-md-6\">
              </div>
              <div>
              </div>
            </div>
          </form>
        </div>
        ";
  }


  private function renderAufMenu()
  {
    $slim = Slim::getInstance();
    $request = $slim->request;
    $url = $request->getPath();
    $urlLogout = $request->getRootUri() . "/logout";
    return "
<div class=\"row\">
  <div class=\"col-3\">
    <div class=\"nav flex-column nav-pills\" role=\"tablist\" aria-orientation=\"vertical\">
      <a class=\"nav-link\"  href=\"$urlLogout\" role=\"tab\">Déconnexion</a>
    </div>
  </div>
  <div class=\"col-9\">
    <div class=\"tab-content\" id=\"v-pills-tabContent\">
      <div>
      
</div>
    </div>
  </div>
</div>
";
  }

  public function __set($property, $value)
  {
    if (property_exists($this, $property)) {
      $this->$property = $value;
    }
  }
}
