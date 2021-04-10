<?php

namespace App\Controlleurs;

class HVFPControlleur {

    /**
     * Function parser
     *
     * @param string $file
     * @param string $html_var
     * @param string $replace
     * @return void
     */
    public function parser(string $file, string $html_var, string $replace) {
        return $file = str_replace($html_var, $replace, $file);
    }

}