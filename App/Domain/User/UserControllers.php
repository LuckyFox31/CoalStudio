<?php

namespace App\Domain\User;

use App\Database\Table;
use App\Controlleurs\FormControlleur;
use App\Database\DBConnexion;

class UserControllers extends User {

    /**
     * delete_user function
     *
     * @param int $user_id
     * @return void
     */
    public function delete_user(int $user_id) {
        $table = new Table(DB_NAME);
        $table->delete('id = ?', [$user_id]);

        $this->reply = "supprimer avec succes !";
    }

    /**
     * Edite de compte
     *
     * @param integer $user_id
     * @return void
     */
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

    }

}