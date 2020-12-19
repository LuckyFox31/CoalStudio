<?php

namespace App\Panel\Community;

class Community {

    private $user;

    public function __construct($user) {
        $this->user = $user;
    }

    public function game_add($title, $description, $img, $mature, $file_game, $version, $credits, $video = null) {

    }

    public function game_listing() {
        
    }
}