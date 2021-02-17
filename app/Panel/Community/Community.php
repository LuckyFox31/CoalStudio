<?php

namespace App\Panel\Community;

use App\Controlleurs\FormControlleur;
use App\Database\DBConnexion;

class Community {

    private $user;
<<<<<<< Updated upstream
=======
    private $token;
>>>>>>> Stashed changes
    public $reply;

    public function __construct($user) {
        $this->user = $user;
    }

<<<<<<< Updated upstream
    /** User function */
=======
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
>>>>>>> Stashed changes

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
<<<<<<< Updated upstream
        $user_token = sha1($user_pass);

        $insert = $bdd->getPdo()->prepare("INSERT INTO user(pseudo, pass, admin, token, created_at) VALUE(?, ?, 0, ?, NOW())");
        $insert->execute([$user_pseudo, $user_pass_hash, $user_token]);
=======

        $insert = $bdd->getPdo()->prepare("INSERT INTO user(pseudo, pass, admin, token, created_at) VALUE(?, ?, 0, ?, NOW())");
        $insert->execute([$user_pseudo, $user_pass_hash, $this->token]);
>>>>>>> Stashed changes

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
<<<<<<< Updated upstream
    public function edit_user(int $user_id) {
        // Edite de compte prochainement.
=======
    public function edit_user(int $user_id, string $edit_pass = "", string $edit_token = "") {
        $bdd = new DBConnexion(DB_NAME);
        $form = new FormControlleur;

        if($edit_pass != "") {
            
            $new = $form->password($edit_pass);
            $edit = $bdd->getPdo()->prepare("UPDATE user SET pass = ? WHERE id = ?");
            $edit->execute([$new, $user_id]);

        } elseif($edit_token != "") {

            $new = $this->token($edit_token);
            $edit = $bdd->getPdo()->prepare("UPDATE user SET token = ? WHERE id = ?");
            $edit->execute([$new, $user_id]);

        }

>>>>>>> Stashed changes
    }
}