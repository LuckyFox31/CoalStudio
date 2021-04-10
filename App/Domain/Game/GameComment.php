<?php

namespace App\Domain\Game;

use App\Database\Table;

class GameComment {

    private $table;

    public function __construct(string $db, string $comment_table) {
        $table = new Table($db);
        $this->table = $comment_table;
    }

    /**
     * Function pour ajouter un commentaire.
     *
     * @param integer $user_id
     * @param string $message
     * @param integer $game_id
     * @return void
     */
    public function add_comment(int $user_id, string $message, int $game_id) {
        $table = new Table(DB_NAME);
        $table->getTable(COMMENT_TABLE);

        $msg = htmlspecialchars($message);

        $table->insert('user_id, comment, game_id, created_at', '?, ?, NOW()', [$user_id, $msg, $game_id]);
    }

    /**
     * Function pour chercher les commentaire d'un jeux.
     *
     * @param integer $game_id
     * @return void
     */
    public function get_comment(int $game_id) {
        $table = new Table(DB_NAME);
        $table->getTable(COMMENT_TABLE);

        $comment = $table->look_for('*', 'game_id = ?', [$game_id]);
        return $comment;
    }

    /**
     * Function pour éditer un jeux.
     *
     * @param integer $comment_id
     * @return void
     */
    public function edit_comment(int $comment_id) {
        $table = new Table(DB_NAME);
        $table->getTable(COMMENT_TABLE);

        $table->edit('comment = ?', 'id = ?', [$comment_id]);
    }

}