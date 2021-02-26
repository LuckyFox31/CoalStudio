<?php

namespace App\Domain\Game;

use App\Database\DBConnexion;
use App\Database\Table;

class GameControllers extends Game {

    public function delete_game(int $id) {
        $bdd = new DBConnexion(DB_NAME);

        $fetch_game = $bdd->getPdo()->prepare("SELECT imgs, game_file FROM " . GAME_TABLE ." WHERE id = ?");
        $fetch_game->execute([$id]);
        $info_game = $fetch_game->fetch();

        $_imgs = explode("@", $info_game['imgs']);
        for($i = 0; $i < $_imgs; $i++) {
            @unlink(ROOT . 'storage/img/' . $_imgs[$i]);
        }

        $delete = $bdd->getPdo()->prepare("DELETE FROM " . GAME_TABLE ." WHERE id = ?");
        $delete->execute([$id]);

    }

    /**
     * Edite un ancien jeux
     *
     * @param integer $id
     * @param array $new_file
     * @param string $new_description
     * @return void
     */
    public function edit_game(int $id, array $new_file, string $new_description) {
        $bdd = new DBConnexion(DB_NAME);

        $this->counter();
        $this->add_file($new_file);

        if($new_description === null) {
            $new = $bdd->getPdo()->prepare("UPDATE " . GAME_TABLE ." SET game_file = ? WHERE id = ?");
            $new->execute([$this->game_file, $id]);
        } else {
            $new = $bdd->getPdo()->prepare("UPDATE " . GAME_TABLE ." SET game_file = ?, game_description = ? WHERE id = ?");
            $new->execute([$this->game_file, htmlspecialchars($new_description), $id]);
        }

    }

}