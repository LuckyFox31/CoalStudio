<?php

namespace App\Controlleurs;

/**
 * WebControlleur class
 */
class WebControlleur {

    /**
     * index function
     *
     * @return include
     */
    public function index() {

        return include ROOT . 'view/php/index.php';
    }

    /**
     * games function
     *
     * @return include
     */
    public function games() {

        return include ROOT . 'view/php/games.php';
    }

    /**
     * community function
     *
     * @return include
     */
    public function community() {

        /**
         * Verification de l'existance du Cookie de connexion, puis inclusion du fichier corespondant.
         */
        if(isset($_COOKIE['coalstudio'])) {

            return include ROOT . 'view/page/community/user.php';
        } else {

            return include ROOT . 'view/page/community/index.php';
        }

       
    }
}