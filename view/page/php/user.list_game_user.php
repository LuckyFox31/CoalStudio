<?php
$lu = $bdd->getPdo()->query("SELECT * FROM user ORDER BY id DESC");
$l_g = $bdd->getPdo()->query("SELECT * FROM game ORDER BY id DESC");

if($user_info['admin'] == 1) {

    /**
     * HTML Form nouveau user.
     * 
     * input text = name :user_created
     * input submit = name : valid_created_user
     */


    /**
     * HTML Form Suppr un joueur.
     * 
     * select = name : select_delete_user
     * input submit = name : valid_delete_user
     */

    /**
     * Code exemple
     */
    while($du = $lu->fetch()) {
        // echo '<option value="' . $du['id'] .'">' . $du['pseudo'] .'</option>';
    }

}

/**
     * Html Form Edit/Suppr Game
     * Delete /
     * input submit = name : delete_game 
     * 
     * Edite /
     * input file = name : new_file_game
     * input text = name : new_desc
     * input submit = name : modif_game
     */
    while($view_ = $l_g->fetch()) {

        // Card Game.
        
    }
?>