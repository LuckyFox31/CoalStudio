<?php
// USE

use App\Controlleurs\FormControlleur;
use App\Database\DBConnexion;
use App\Database\Table;

// INSTANCE
$form = new FormControlleur;
$bdd = new DBConnexion(DB_NAME);
$table = new Table(DB_NAME);

$table->getTable(USER_TABLE);

// Verification des identifiant de l'user.
if(isset($_POST['submit_sigin'])) {
    if(isset($_POST['pseudo']) AND isset($_POST['password']) AND !empty($_POST['pseudo']) AND !empty($_POST['password'])) {
        
        // Traitement du contenue du Formulaire par des functions.
        $pseudo = $form->pseudo($_POST['pseudo']);

        // Cherche pseudo dans BDD
        $pseudoExist = $table->real('*', 'pseudo = ?', [$pseudo]);

        // Verification de si il n'y a aucun message d'erreur
        if($form->error == "") {

            // Verifier si le pseudo existe bien
            if($pseudoExist) {
           
                // Chercher le mot de passe assosier.
                $pass_verified = $table->info;
                
                // Comparaison des mdp
                if(password_verify($_POST['password'], $pass_verified['pass'])) {

                    

                    // Création d'un cookie.
                    setcookie("coalstudio", $pass_verified['token'], time()+3600*24*365);
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