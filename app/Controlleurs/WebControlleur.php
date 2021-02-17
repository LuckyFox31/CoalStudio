<?php

namespace App\Controlleurs;

class WebControlleur {

    /**
     * redirect function
     *
     * @return void
     */
    private function redirect() {
        $chemain = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $redirection = substr($chemain, -1);

        if($_GET['url'] != "/") {
            if($redirection == "/") {
                $header = substr(HTTP . $chemain, 0, -1);
                header("Location: " . $header);
            }
        }
        
    }

    /**
     * index function
     *
     * @return include
     */
    public function index() {

<<<<<<< Updated upstream
        return include ROOT . 'view/index/index.php';
=======
        return include ROOT . 'view/page/index/index.php';
>>>>>>> Stashed changes
    }

    /**
     * games function
     *
     * @return include
     */
    public function games() {

        $this->redirect();
<<<<<<< Updated upstream
        return include ROOT . 'view/index/games.php';
=======
        return include ROOT . 'view/page/index/games.php';
>>>>>>> Stashed changes
    }

    /**
     * community function
     *
     * @return include
     */
    public function community() {

        $this->redirect();
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