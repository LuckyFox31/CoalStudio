<?php

namespace App\Panel\Community;

use App\Controlleurs\FormControlleur;
use App\Database\DBConnexion;

class Community {

    private $user;

    public function __construct($user) {
        $this->user = $user;
    }

    /**
     * game_add function
     *
     * @param string $name
     * @param string $desc
     * @param string $img
     * @param url $video
     * @param string $mature
     * @param string $game_file
     * @param int $version
     * @param string $credits
     * @return void
     */
    public function game_add($name, $desc, $img, $video = null, $mature, $game_file, $version, $credits) {
        
        $form = new FormControlleur;
        $name_game = $form->pseudo($name);
        $desc_game = htmlspecialchars($desc);

        $img_game = str_replace(",", ".", $img);

        // foreach($img as $i) {
        //     echo $i;
        // }
    }

    /**
     * game_listing function
     *
     * @return void
     * 
     * utilisation de while : 
     * while($g = $game_listing()->fetch()) {
     *      echo ' ok';
     *  }
     */
    public function game_listing() {

        $bdd = new DBConnexion(DB_NAME);
        $games = $bdd->getPdo()->query("SELECT * FROM game ORDER BY id DESC");

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
    public function create_user($pseudo) {

        $form = new FormControlleur;
        $bdd = new DBConnexion(DB_NAME);

        $user_pseudo = $form->pseudo($pseudo);
        $user_pass = uniqid(substr($user_pseudo, 0, 1) . "_");
        $user_pass_hash = $form->password($user_pass);
        $user_token = sha1($user_pass);

        $insert = $bdd->getPdo()->prepare("INSERT INTO user(pseudo, pass, admin, token, created_at) VALUE(?, ?, 1, ?, NOW())");
        $insert->execute([$user_pseudo, $user_pass_hash, $user_token]);

        echo "User Enregistrais ! \n mot de passe : $user_pass ";

    }

    /**
     * delete_user function
     *
     * @param int $user_id
     * @return void
     */
    public function delete_user($user_id) {
        $bdd = new DBConnexion(DB_NAME);

        $delete = $bdd->getPdo()->prepare("DELETE FROM user WHERE id = ?");
        $delete->execute([$user_id]);

        echo "supprimer avec succes !";
    }

    /**
     * list_user function
     *
     * @return void
     */
    // public function list_user() {
    //     $bdd = new DBConnexion(DB_NAME);

    //     return $query = $bdd->getPdo()->query("SELECT * FROM user ORDER BY id DESC");

    // }
}