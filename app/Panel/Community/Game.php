<?php

namespace App\Panel\Community;

use App\Database\DBConnexion;

class Game {

    public $game_name;
    public $game_desc;
    public $game_v;
    public $game_credits;
    public $game_imgs;
    public $game_file;

    public $counter;

    /**
     * Fonction qui permet de compter pour récuperer des ID unique.
     *
     * @return void
     */
    private function counter() {
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

            if($img['size'] <= $size) {

                if(in_array($extensionUpload, $extensionsValides)) {

                    $this->counter();

                    $path = ROOT . 'storage/img/' . $this->counter . '.' . $extensionUpload;
                    if(move_uploaded_file($img['tmp_name']["$i"],$path))  {
                        $string .= $this->counter . '.' . $extensionUpload . "@";
                    }

                }
            } else {
                echo 'une image est trop lourde.';
                break;
                return;
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

        $extensionsValides = ["zip"];
        $extensionUpload = strtolower(substr(strrchr($file['name'], '.'), 1));

        if(in_array($extensionUpload, $extensionsValides)) {
            $path = ROOT . 'storage/zip_game/' . $this->counter . '.' . $extensionUpload;
            if(move_uploaded_file($file['tmp_name'],$path))  {
                echo "success file save";
                $this->game_file = $this->counter . '.' . $extensionUpload;
            }
        } else {
            echo "Votre fichier doit etre un fichier zip.";
            return;
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
            echo "La version doit être un chiffre";
            return;
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

    public function delete_game(int $id) {
        $bdd = new DBConnexion(DB_NAME);
        $fetch_game = $bdd->getPdo()->prepare("SELECT imgs, game_file FROM game WHERE id = ?");
        $fetch_game->execute([$id]);
        $info_game = $fetch_game->fetch();

        $_imgs = explode("@", $info_game['imgs']);
        for($i = 0; $i < $_imgs; $i++) {
            @unlink(ROOT . 'storage/img/' . $_imgs[$i]);
        }

        $delete = $bdd->getPdo()->prepare("DELETE FROM game WHERE id = ?");
        $delete->execute([$id]);

    }

    public function edit_game(int $id, array $new_file, string $new_description) {
        $bdd = new DBConnexion(DB_NAME);

        $this->counter();
        $this->add_file($new_file);

        if($new_description === null) {
            $new = $bdd->getPdo()->prepare("UPDATE game SET game_file = ? WHERE id = ?");
            $new->execute([$this->game_file, $id]);
        } else {
            $new = $bdd->getPdo()->prepare("UPDATE game SET game_file = ?, game_description = ? WHERE id = ?");
            $new->execute([$this->game_file, htmlspecialchars($new_description), $id]);
        }

    }

}