<?php


namespace crazycharlyday\controller;

use crazycharlyday\vue\VueCompte;
use crazycharlyday\model\Authentication;
use crazycharlyday\exception\AuthException;

use Slim\Slim;


class CompteController
{

    public function compteCrea() {
        if (!$this->isConnected()) {
            $msg = "";
            if (isset($_COOKIE['Error'])) {
                $msg = $_COOKIE['Error'];
                setcookie("Error", "", 1);
            }
            $vueCompte = new \crazycharlyday\vue\VueCompte($msg);
            $vueCompte->render(VueCompte::CREA);
        } else {
            $slim = Slim::getInstance();
            $slim->redirect($slim->urlFor("Menu"), 301);
        }
    }

    private function isConnected() {
        return isset($_SESSION['id']);
    }

    public function postCompteCrea() {
        $slim = Slim::getInstance();
        if (!$this->isConnected()) {
            $nom = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
            $prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_SPECIAL_CHARS);
            $email = $_POST['mail'];
            $tel = $_POST['tel'];
            $log = filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS);
            $pass = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
            $passC = filter_var($_POST['passwordConf'], FILTER_SANITIZE_SPECIAL_CHARS);
            $statut = filter_var($_POST['statut'], FILTER_SANITIZE_SPECIAL_CHARS);
            if ($pass === $passC) {
                try {
                    Authentication::createUser($nom, $prenom,$email, $tel, $log, $pass, $statut );
                    $slim->redirect($slim->urlFor("Menu"), 301);
                } catch (AuthException $e) {
                    setcookie("Error", $e->getMessage(), time() + 10);
                    $slim->redirect($slim->urlFor("createcompte"), 302);
                }
            } else {
                setcookie("Error", "Les mots de passe ne correspondent pas ", time() + 10);
                $slim->redirect($slim->urlFor("createcompte"), 302);
            }
        } else {
            $slim->redirect($slim->urlFor("Menu"), 301);
        }
    }

    public function formConn() {
        if (!$this->isConnected()) {
            $msg = "";
            if (isset($_COOKIE['Error'])) {
                $msg = $_COOKIE['Error'];
                setcookie("Error", "", 1);
            }
            $v = new VueCompte($msg);
            $v->render(VueCompte::LOGIN);
        } else {
            $slim = Slim::getInstance();
            $slim->redirect($slim->urlFor("Menu"), 301);
        }
    }

    public function auth() {
        $slim = Slim::getInstance();
        if (!$this->isConnected()) {
            $log = filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS);
            $pass = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
            try {
                \crazycharlyday\model\Authentication::authenticate($log, $pass);
                $slim->redirect($slim->urlFor("Menu"), 301);
            } catch (\crazycharlyday\exception\AuthException $e) {
                setcookie("Error", $e->getMessage(), time() + 10);
                $slim->redirect($slim->urlFor("connect"), 302);
            }
        }
    }

    public function connected() {
        $slim = Slim::getInstance();
        if ($this->isConnected()) {
            $msg = "";
            if (isset($_COOKIE['Error'])) {
                $msg = $_COOKIE['Error'];
                setcookie("Error", "", 1);
            }
            $vueCompte = new \crazycharlyday\vue\VueCompte($msg);
            $page = isset($_GET['page']) ? $_GET['page'] : "";
            $vueCompte->render(VueCompte::NORMAL);
        } else {
            $slim->redirect($slim->urlFor("connect"), 302);
        }
    }

    public function logout() {
        unset($_SESSION['id']);
        $slim = Slim::getInstance();
        $slim->redirect($slim->urlFor('Menu'));
    }
}