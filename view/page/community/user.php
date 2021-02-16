<?php

use App\Database\DBConnexion;
use App\Panel\Community\Community;
use App\Panel\Community\Game;

$community = new Community('test');
$bdd = new DBConnexion(DB_NAME);
$game = new Game;

$cookie_content = $_COOKIE['coalstudio'];

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


    HTML Form (method="POST" / enctype="multipart/form-data")

    input text(pseudo) = name : name
    input text(description) = name : description
    input file(img)(multiple) = name : img_file[] // exemple : <input type="file" name="img_file[]" multiple>
    input checkbox(mature) = name : mature
    input file(file game) = name : zip_file
    imput number(version)(step=0.01) = name : version
    input text(credit) = name : credit
    input url(video yt) = name : video

    input submit = name : valid_game_add

<form method="POST" enctype="multipart/form-data">
    <label>Votre name 
        <input type="text" name="name" >
    </label>

    <label>Votre description 
        <input type="text" name="description">
    </label>

    <label>Votre img_file[] 
        <input type="file" name="img_file[]" multiple>
    </label>

    <label>Votre mature
        <input type="checkbox" name="mature">
    </label>

    <label>Votre zip_file 
        <input type="file" name="zip_file">
    </label>

    <label>Votre version
        <input type="number" name="version">
    </label>

    <label>Votre credit
        <input type="text" name="credit">
    </label>

    <label>Votre yt
        <input type="url" name="video">
    </label>

    <button type="submit" name="valid_game_add"> test</button>
</form> -->


<?php
// liste un jeux | user : 
include ROOT . "view/page/php/user.list_game_user.php";
?>