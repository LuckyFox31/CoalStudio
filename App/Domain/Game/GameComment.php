<?php

namespace App\Domain\Game;

use App\Database\Table;
use libs\Michelf\Markdown;

class GameComment {

    public function treat(string $message) {

        $html = Markdown::defaultTransform($message);
        return $html;

    }

    public function add_comment(int $user_id, string $message, int $game_id) {
        $table = new Table(DB_NAME);
        $table->getTable(COMMENT_TABLE);

        $msg = htmlspecialchars($message);

        $table->insert('user_id, comment, game_id, created_at', '?, ?, NOW()', [$user_id, $msg, $game_id]);
    }

    public function get_comment(int $game_id) {
        $table = new Table(DB_NAME);
        $table->getTable(COMMENT_TABLE);

        $comment = $table->look_for('*', 'game_id = ?', [$game_id]);
        return $comment;
    }

    public function edit_comment(int $comment_id) {
        $table = new Table(DB_NAME);
        $table->getTable(COMMENT_TABLE);

        $table->edit('comment = ?', 'id = ?', [$comment_id]);
    }

}