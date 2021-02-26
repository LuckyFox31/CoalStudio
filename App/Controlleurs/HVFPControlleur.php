<?php

namespace App\Controlleurs;

class HVFPControlleur {

    public function parser(string $file, string $html_var, string $replace) {
        return $file = str_replace($html_var, $replace, $file);
    }

}