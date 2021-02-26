<?php

namespace App\Domain\User;

use App\Controlleurs\FormControlleur;
use App\Database\DBConnexion;

class User {

    private $token;
    public $reply;

    /**
     * Génération d'un token (CoalToken)
     *
     * @param string $key
     * @return void
     */
    public function token(string $key) {

        $bdd = new DBConnexion(DB_NAME);

        $user_token = sha1($key);

        $tokenExist = $bdd->getPdo()->prepare("SELECT * FROM user WHERE token = ?");
        $tokenExist->execute([$user_token]);

        if($tokenExist->rowCount()) {
            $user_token = sha1(uniqid());
            $this->token($user_token);

        } else {
            $this->token = $user_token;
        }

        

    }

    /**
     * create_user function
     *
     * @param string $pseudo
     * @param string $mail
     * @param string $pass
     * @return void
     */
    public function create_user(string $pseudo) {

        $form = new FormControlleur;
        $bdd = new DBConnexion(DB_NAME);

        $user_pseudo = $form->pseudo($pseudo);
        $user_pass = uniqid(substr($user_pseudo, 0, 1) . "_");
        $user_pass_hash = $form->password($user_pass);
        $this->token($user_pseudo);

        $insert = $bdd->getPdo()->prepare("INSERT INTO user(pseudo, pass, admin, token, created_at) VALUE(?, ?, 0, ?, NOW())");
        $insert->execute([$user_pseudo, $user_pass_hash, $this->token]);

        $this->user = $user_pseudo;

        $this->reply = "User Enregistré ! \n mot de passe : $user_pass ";

    }
}