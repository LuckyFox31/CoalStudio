<?php
// USE
use App\Panel\Community\Sigin;
use App\Database\Table;
use App\Panel\Community\Cookie;

// INSTANCE
$sigin = new Sigin();
$table = new Table("coalstudio");
$cookie = new Cookie("coalstudio");

// Verification des identifiant de l'user.
if(isset($_POST['pseudo']) AND isset($_POST['password']) AND !empty($_POST['pseudo']) AND !empty($_POST['password'])) {
    
    // Traitement du contenue du Formulaire par des functions.
    $pseudo = $sigin->charset($_POST['pseudo']);
    $password = $sigin->pass($_POST['password']);

    // Verif de l'existance de l'user
    $fetchUser = $table->query("user", "pseudo", $pseudo);
    if($fetchUser == 1) {

        $cookie->getCookie('test', time()+3600*24*365);
    } else {

        echo "Non";
    }
}
?>

<!-- 
    HTML Front
-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Community</title>
</head>
<body>
    <form method="post">
        <label>Votre pseudo : 
            <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo" >
        </label>

        <label>Votre password : 
            <input type="password" name="password" id="password" placeholder="Votre password" >
        </label>

        <input type="submit" name="submit_sigin" >
    </form>
</body>
</html>