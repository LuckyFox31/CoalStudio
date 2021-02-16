<?php

use App\Database\DBConnexion;
use App\Panel\Community\Community;
use App\Panel\Community\Game;

$community = new Community('test');
$bdd = new DBConnexion(DB_NAME);
$game = new Game;

$cookie_content = $_COOKIE['coalstudio'];

$lu = $bdd->getPdo()->query("SELECT * FROM user ORDER BY id DESC");
$l_g = $bdd->getPdo()->query("SELECT * FROM game ORDER BY id DESC");

$userExist = $bdd->getPdo()->prepare("SELECT * FROM user WHERE token = ?");
$userExist->execute([$cookie_content]);

// Verification de Token
if($userExist->rowCount()) {

    $user_info = $userExist->fetch();

} else {
    echo "Une erreur c'est produite...";
    setCookie('coalstudio', "", time());
    return;
}

// Verification d'adminnistration.
include ROOT . "view/page/php/user.admin.php";

// Add d'un jeux : 
include ROOT . "view/page/php/user.game_add.php";

// Suprimer un jeux : 
include ROOT . "view/page/php/user.game_delete_edit.php";
?>
<!-- 
    HTML Front
-->
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum dolores quam nostrum eos qui ipsam commodi dolorum consequuntur. Nam deserunt omnis, fugit tempora minima illo? Obcaecati quibusdam temporibus laborum fugit ipsam laudantium non at. Reiciendis eveniet amet distinctio adipisci quibusdam nemo nobis similique nulla voluptas accusantium minima, quis consequuntur impedit!</p>

<hr />

<!-- 
    HTML Form (method="POST"/enctype="multipart/form-data")

    input text(pseudo) = name : name
    input text(description) = name : description
    input file(img)(multiple) = name : img_file[] // exemple : <input type="file" name="img_file[]" multiple>
    input checkbox(mature) = name : mature
    input file(file game) = name : zip_file
    imput number(version) = name : version
    input text(credit) = name : credit
    input submit = name : valid_game_add

 -->

<?php
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
        echo '<option value="' . $du['id'] .'">' . $du['pseudo'] .'</option>';
    }

}
?>
<hr />

<div>
    <?php

    /**
     * Html Form Edit/Suppr Game
     * input submit = name : delete_game 
     * 
     * input file = name : new_file_game
     * input text = name : new_desc
     * input submit = name : modif_game
     */
    while($view_ = $l_g->fetch()) {

        // Card Game.
        
    }
    ?>
</div>