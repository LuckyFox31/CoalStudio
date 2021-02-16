<?php
if( $user_info['admin'] == 1) {

    // Création d'user
    if(isset($_POST['valid_created_user']) AND !empty($_POST['user_created'])) {
        $community->create_user($_POST['user_created']);
    }

    if(isset($_POST['valid_delete_user']) AND !empty($_POST['select_delete_user'])) {
        $community->delete_user($_POST['select_delete_user']);
    }

}