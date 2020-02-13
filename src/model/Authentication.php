<?php


namespace crazycharlyday\model;


use crazycharlyday\exception\AuthException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use crazycharlyday\model\User;

class Authentication
{
    public static function createUser($nom, $prenom, $mail,$tel, $login, $password, $statut ) {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
        } else {
            throw new AuthException("Email invalide");
        }
        if (User::where("login", "=", $login)->first() != null) {
            throw new AuthException("Login déjà utilisé");
        }
        $user = new User();
        $user->nom = $nom;
        $user->prenom = $prenom;
        $user->mail = $mail;
        $user->tel = $tel;
        $user->login = $login;
        $user->mdp = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
        $user->nombreAbs=0;
        $user->permanence=3;
        $user->statut=$statut;
        $user->save();
        try {
            self::loadProfile($user->iduser);
        } catch (AuthException $e) {
        }
    }

    private static function generateUID() {
        do {
            $uid = bin2hex(openssl_random_pseudo_bytes(32));
        } while (User::where('iduser', "=", $uid)->first() !== null);
        return $uid;
    }

    /**
     * @param $uid String l'uid
     * @throws AuthException si il y a une erreur lors de la charge du profil
     */
    private static function loadProfile($uid) {
        $u = User::where("iduser", '=', $uid)->first();
        if ($u === null) {
            throw new AuthException('Erreur lors de la connexion');
        }
        unset($_SESSION['id']);
        $_SESSION['id'] = ["login" => $u->login, "iduser" => $uid];
    }

    public static function authenticate($username, $password) {
        try {
            $u = User::where("login", "=", $username)->firstOrFail();
            if (password_verify($password, $u->mdp)) {
                self::loadProfile($u->iduser);
            } else {
                throw new AuthException("Erreur lors de l'authentification");
            }
        } catch (ModelNotFoundException $ignored) {
            throw new AuthException("Erreur lors de l'authentification");
        } catch (AuthException $e) {
        }
    }

    public static function checkAccessRights($required) {


    }
}