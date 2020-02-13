

<?php
session_start();

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

$app->get('/membres', function () {
  $vueIndex = new VueMembres();
  $vueIndex->render(1);
})->setName("Membres");

$app->get('/connect', function () {
    $cCont = new CompteController();
    $cCont->formConn();
})->setName('connect');

$app->post('/connect', function () {
    $cCont = new CompteController();
    $cCont->auth();
});

$db = new DB();
$db->addConnection(parse_ini_file("src/conf/conf.ini"));
$db->setAsGlobal();
$db->bootEloquent();

$app->run();
