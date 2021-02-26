<?php

namespace App\Domain\Game;

class Game {

    public $game_name;
    public $game_desc;
    public $game_v;
    public $game_credits;
    public $game_imgs;
    public $game_file;
    public $game_yt;

    public $counter;
    public $error = "";

    /**
     * Fonction qui permet de compter pour récuperer des ID unique.
     *
     * @return void
     */
    protected function counter() {
        $counter_file = fopen(ROOT . 'storage/compteur.txt', "r+");
        $counter = fgets($counter_file);
        $counter++;
        fseek($counter_file, 0);
        fputs($counter_file, $counter);
        fclose($counter_file);
        $this->counter = $counter;
    }

    /**
     * Ajout un tire a son jeux
     *
     * @param string $title
     * @return void
     */
    public function add_title(string $title) {
        $game_name = htmlspecialchars($title);

        $this->game_name = $game_name;
    }

    /**
     * ajout une description a son jeux
     *
     * @param string $descritpion
     * @return void
     */
    public function add_description(string $descritpion) {
        $game_desc = htmlspecialchars($descritpion);

        $this->game_desc = $game_desc;
    }

    /**
     * Ajout une/des images a son jeux
     *
     * @param array $img
     * @param integer $size
     * @return void
     */
    public function add_img(array $img, int $size) {

        $string = "";

        $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');

        for($i = 0; $i < count($img['name']); $i++) {
            $img_name = $img['name'][$i];

            $extensionUpload = strtolower(substr(strrchr($img_name, '.'), 1));

            if($img['size'][$i] <= $size) {

                if(in_array($extensionUpload, $extensionsValides)) {

                    $this->counter();

                    $path = ROOT . 'storage/img/' . $this->counter . '.' . $extensionUpload;
                    if(move_uploaded_file($img['tmp_name']["$i"],$path))  {
                        $string .= $this->counter . '.' . $extensionUpload . "@";
                    }

                } else {
                    $this->error = 'une image est n\'a pas la bonne extension (jpg, gif, jpeg, png).';
                    break;
                }
            } else {
                
                $this->error = 'une image est trop lourde.';
                break;
            }
        }
        $this->game_imgs = $string;
    }

    /**
     * Ajout le fichier de son jeux
     *
     * @param array $file
     * @return void
     */
    public function add_file(array $file) {

        if($this->error !== "") {
            return;
        }

        $extensionsValides = ["zip"];
        $extensionUpload = strtolower(substr(strrchr($file['name'], '.'), 1));

        if(in_array($extensionUpload, $extensionsValides)) {
            $path = ROOT . 'storage/zip_game/' . $this->counter . '.' . $extensionUpload;
            if(move_uploaded_file($file['tmp_name'],$path))  {
                
                $this->game_file = $this->counter . '.' . $extensionUpload;
            }
        } else {
            $this->error = "Votre fichier doit etre un fichier zip.";
        }

    }

    /**
     * Ajout une url d'une vidéo
     *
     * @param string $url
     * @return void
     */
    public function add_video(string $url) {
        if (filter_var($url, FILTER_VALIDATE_URL) !== false) {
            $this->game_yt = $url;
        } else {
            $this->error = "URL non valide";
            
        }
    }

    /**
     * Ajout une version de son jeux
     *
     * @param integer $version
     * @return void
     */
    public function add_version(int $version) {
        if(is_numeric($version)) {
            $this->game_v = $version;
        } else {
            $this->error = "La version doit être un chiffre";
        }
    }

    /**
     * Ajout des credits a son jeux
     *
     * @param string $credits
     * @return void
     */
    public function add_credits(string $credits) {
        $this->game_credits = htmlspecialchars($credits);
    }

}