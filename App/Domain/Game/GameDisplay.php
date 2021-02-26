<?php

namespace App\Domain\Game;

use App\Database\Table;

class GameDisplay {

    public $html_var = [
        "{name}",
        "{description}",
        "{user_id}",
        "{mature}",
        "{file}",
        "{video}",
        "{version}",
        "{credits}",
        "{created_at}"
    ];

    public function display(string $template, int $game_id) {
        $table = new Table(DB_NAME);
        $table->getTable('game');
        $result = $table->look_for('*', 'id = ?', [$game_id]);

        $template = str_replace($this->html_var[0], $result['game_name'], $template);
        $template = str_replace($this->html_var[1], $result['game_description'], $template);
        $template = str_replace($this->html_var[2], $result['id_user'], $template);
        $template = str_replace($this->html_var[3], $result['mature'], $template);
        $template = str_replace($this->html_var[4], $result['game_file'], $template);
        $template = str_replace($this->html_var[5], $result['game_video'], $template);
        $template = str_replace($this->html_var[6], $result['game_version'], $template);
        $template = str_replace($this->html_var[7], $result['credits'], $template);
        $template = str_replace($this->html_var[8], $result['created_at'], $template);

        return $template;
    }

}