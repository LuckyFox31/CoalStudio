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
     * @param array $img
     * @param string $video
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

        foreach($img as $i) {
            echo $i;
        }
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
    public function create_user($pseudo, $mail, $pass) {

        $form = new FormControlleur;
        $bdd = new DBConnexion(DB_NAME);

        $user_pseudo = $form->pseudo($pseudo);
        $user_mail = $form->mail($mail);
        $user_pass = $form->password($pass);

        $insert = $bdd->getPdo()->prepare("INSERT INTO user(pseudo, mail, pass, created_at) VALUE(?, ?, ?, NOW())");
        $insert->execute([$user_pseudo, $user_mail, $user_pass]);

        echo "User Enregistrais !";

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
    public function list_user() {
        $bdd = new DBConnexion(DB_NAME);

        $user_list = $bdd->getPdo()->prepare("SELECT * FROM user");
        $user_list->execute();
        $result = $user_list->fetchAll();

        return $result;
    }
}