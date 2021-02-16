<?php
if(isset($_POST['delete_game'])) {
    $game->delete_game($_POST['delete_game']);
}

if(isset($_POST['modif_game'])) {
    if(!empty($_POST['new_desc'])) {

        $new_description = $_POST['new_desc']; 
    } else {
        $new_description = null;
    }
    if(empty($_FILES['new_file_game'])) {echo "Le file ne doit pas etre vide."; return; }
    $game->edit_game($_POST['modif_game'], $_FILES['new_file_game'], $new_description);
}