<?php

namespace App\Panel\Community;

use App\Controlleurs\FormControlleur;
use App\Database\DBConnexion;

class Community {

    private $user;
    public $reply;

    public function __construct($user) {
        $this->user = $user;
    }

    /** User function */

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
        $user_token = sha1($user_pass);

        $insert = $bdd->getPdo()->prepare("INSERT INTO user(pseudo, pass, admin, token, created_at) VALUE(?, ?, 0, ?, NOW())");
        $insert->execute([$user_pseudo, $user_pass_hash, $user_token]);

        $this->reply = "User Enregistrais ! \n mot de passe : $user_pass ";

    }

    /**
     * delete_user function
     *
     * @param int $user_id
     * @return void
     */
    public function delete_user(int $user_id) {
        $bdd = new DBConnexion(DB_NAME);

        $delete = $bdd->getPdo()->prepare("DELETE FROM user WHERE id = ?");
        $delete->execute([$user_id]);

        $this->reply = "supprimer avec succes !";
    }

    /**
     * Edite de compte
     *
     * @param integer $user_id
     * @return void
     */
    public function edit_user(int $user_id) {
        // Edite de compte prochainement.
    }
}