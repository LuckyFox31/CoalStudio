<?php

namespace App\Panel\Community;

class Sigin {

    public $pseudo;
    public $password;

    public function charset($pseudo) {
        if($pseudo < 255) {
            $pseudo_chars = htmlspecialchars($pseudo);
            return $this->pseudo = $pseudo_chars;
        } else {
            return false;
        }
    }

    public function pass($password) {
        $password = sha1($password);
        $this->password = $password;
    }
}