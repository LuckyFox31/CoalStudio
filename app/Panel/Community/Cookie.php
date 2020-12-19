<?php

namespace App\Panel\Community;


class Cookie {

    public $cookie;

    public function __construct(string $cookie_name) {
        $this->cookie = $cookie_name;
    }

    public function getCookie($value = '', $option = []) {
        setcookie($this->cookie, $value, $option);
    }

}