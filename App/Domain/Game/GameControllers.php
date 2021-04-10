<?php

namespace App\Domain\Game;

use App\Database\Table;

class GameControllers {

    protected $db_instance;
    protected $table;

    public function __construct(string $db, string $table) {

        $this->db_instance = new Table($db);
        $this->table = $table;

    }

}