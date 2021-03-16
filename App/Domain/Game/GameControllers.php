<?php

namespace App\Domain\Game;

use App\Database\Table;

class GameControllers extends Game {

    public function delete_game(int $id) {
        $table = new Table(DB_NAME);
        $table->getTable(GAME_TABLE);

        $info_game = $table->look_for('imgs, game_file', 'id = ?', [$id]);

        if(file_exists(ROOT . 'storage/zip_game/' . $info_game['game_file'])) {
            if($info_game['game_file'] != '') {
                unlink(ROOT . 'storage/zip_game/' . $info_game['game_file']);
            }
        }

        $_imgs = explode("@", $info_game['imgs']);
        for($i = 0; $i < count($_imgs); $i++) {

            if($_imgs[$i] != '') {
                var_dump($_imgs[$i]);
                if(file_exists(ROOT . 'storage/img/' . $_imgs[$i])) {
                    unlink(ROOT . 'storage/img/' . $_imgs[$i]);
                }

            }
            
        }

        $table->delete('id = ?', [$id]);

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
        $table = new Table(DB_NAME);
        $table->getTable(GAME_TABLE);

        $this->counter();
        $this->add_file($new_file);

        if($new_description === null) {
            $table->edit('game_file = ?', 'id = ?', [$this->game_file, $id]);
        } else {
            $table->edit('game_file = ?, game_description = ?', 'id = ?', [$this->game_file, htmlspecialchars($new_description), $id]);
        }

    }

}