<?php
// USE

use App\Controlleurs\FormControlleur;
use App\Database\DBConnexion;
use App\Panel\Community\Cookie;

// INSTANCE
$cookie = new Cookie("coalstudio");
$form = new FormControlleur;
$bdd = new DBConnexion(DB_NAME);

// Verification des identifiant de l'user.
if(isset($_POST['submit_sigin'])) {
    if(isset($_POST['pseudo']) AND isset($_POST['password']) AND !empty($_POST['pseudo']) AND !empty($_POST['password'])) {
        
        // Traitement du contenue du Formulaire par des functions.
        $pseudo = $form->pseudo($_POST['pseudo']);

        // Cherche mail dans BDD
        $pseudoExist = $bdd->getPdo()->prepare("SELECT * FROM user WHERE pseudo = ?");
        $pseudoExist->execute([$pseudo]);

        // Verification de si il n'y a aucun message d'erreur
        if($form->error == "Aucunne erreur.") {

            // Verifier si l'email existe bien
            if($pseudoExist->rowCount()) {
           
                // Chercher le mot de passe assosier.
                $pass_verified = $pseudoExist->fetch();
                
                // Comparaison des mdp
                if(password_verify($_POST['password'], $pass_verified['pass'])) {

                    

                    // Création d'un cookie.
                    $cookie->getCookie($pass_verified['token'], time()+3600*24*365);
                    header("Location: ");
                } else {
                    echo "ID non valid";
                }
            } else {
                echo "ID non valid";
            }
            
            
        } else {

            echo $form->error;
            
        }

        
    }
}
?>

<!-- 
    HTML | CSS | JS
    exemple From : 
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