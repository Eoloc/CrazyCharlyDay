

<?php
session_start();

use crazycharlyday\controller\BesoinController;
use crazycharlyday\controller\CompteController;
use crazycharlyday\vue\VueAccueil;
use crazycharlyday\vue\VueMembres;
use Illuminate\Database\Capsule\Manager as DB;
use Slim\Slim;

require_once 'vendor/autoload.php';

$app = new Slim();

$app->get('/', function () {
    $vueIndex = new VueAccueil();
    $vueIndex->render(1);
})->setName("Menu");


$app->get('/connect', function () {
    $cCont = new \crazycharlyday\controller\CompteController();
    $cCont->formConn();
})->setName('connect');

$app->post('/connect', function () {
    $cCont = new CompteController();
    $cCont->auth();
});

$app->get('/besoins', function () {
    $cCont = new BesoinController();
    $cCont->showAll();
})->setName('besoins');

$app->get('/membres', function() {
   $cont = new \crazycharlyday\controller\ControllerMembres();
   $cont->getMembres();
});

$app->get('/membres/:id', function ($id) {
    $cont = new \crazycharlyday\controller\ControllerMembres();
    $cont->getMembre($id);
});

$app->get("/createcompte", function () {
    $compteController = new \crazycharlyday\controller\CompteController();
    $compteController->compteCrea();
})->setName("createcompte");

$app->post("/createcompte", function () {
    $compteController = new \crazycharlyday\controller\CompteController();
    $compteController->postCompteCrea();
});

$app->get('/creneaux', function () {
    $cont = new \crazycharlyday\controller\ControllerCreneau();
    $cont->listCreneau();
});

$app->get('/creneau/:id', function ($id) {
    $cont = new \crazycharlyday\controller\ControllerCreneau();
    $cont->creneauParId($id);
});

$app->get('/formcreneaux', function () {
    $cont = new \crazycharlyday\controller\ControllerCreneau();
    $cont->seeFormCrea();
});

$app->get('/ajoutcreneau', function () {
    $cont = new \crazycharlyday\controller\ControllerCreneau();
    $cont->ajouterCreneau($_POST['jour'], $_POST['semaine'], $_POST['heuredep'], $_POST['heurefin']);
});

$app->get('/creabesoin', function () {
    $cont = new BesoinController();
    $cont->formCrea();
})->setName('creabesoins');

$db = new DB();
$db->addConnection(parse_ini_file("src/conf/conf.ini"));
$db->setAsGlobal();
$db->bootEloquent();

$app->run();
