<?php

use App\Database\Table;
use App\Domain\User\User;
use App\Domain\Game\Game;
use App\Domain\Game\GameControllers;

$table = new Table(DB_NAME);
$game = new Game;
$gameC = new GameControllers;

$cookie_content = $_COOKIE['coalstudio'];

$table->getTable(USER_TABLE);

$userExist = $table->real('*', 'token = ?', [$cookie_content]);

// Verification de Token
if($userExist) {

    $user_info = $table->info;
    $community = new User;

} else {
    echo "Une erreur c'est produite... <a href=\"\">Retour a l'accueil</a> ";
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
-->
<?php 
include ROOT . "view/template/form.html";


// liste un jeux | user : 
include ROOT . "view/page/php/user.list_game_user.php";

// Exemple //
$table->getTable(GAME_TABLE);


// $t = $table->look_for_all('*');

// foreach ($t as $k => $v) {
//     var_dump($v);
//     echo $v['game_name'];
// }

// $a = $table->look_for('*', 'id = ?', [2]);


?>