<?php
if(isset($_POST['valid_game_add'])) {

    $game_mature = 0;

    if(empty($_POST['name']) OR empty($_POST['description']) OR empty($_FILES['img_file']) OR empty($_FILES['zip_file']) OR empty($_POST['version']) OR empty($_POST['credit']) OR empty($_POST['video'])) {
        echo "Il faut remplir tout les champs";
        return;
    }

    if(isset($_POST['mature'])) {
        $game_mature = 1;
    }

    $game->add_title($_POST['name']);
    $game->add_description($_POST['description']);
    $game->add_version($_POST['version']);
    $game->add_credits($_POST['credit']);
    $game->add_video($_POST['video']);
    $game->add_img($_FILES['img_file'], 2097152);
    $game->add_file($_FILES['zip_file']);

    if($game->error !== "") {
        echo $game->error;
        return;
    }

    $game_add = $bdd->getPdo()->prepare("INSERT INTO game(id_user, game_name, game_description, mature, imgs, game_file, game_video, game_version, credits, created_at) VALUE(?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
    $game_add->execute([$user_info['id'], $game->game_name, $game->game_desc, $game_mature, $game->game_imgs, $game->game_file, $game->game_yt, $game->game_v, $game->game_credits]);

}