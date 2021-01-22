<?php

namespace App\Database;

class Table extends DBConnexion {
    private $table = null;

    public function getTable($table) {
        if($this->table === null) {
            $this->table = $table;
        }

        return $this->table;
    }
    public function all($order = "") {
        if($order != "") {
            $order = $order;
        }

        $all = $this->getPdo()->query("SELECT * FROM {$this->table} {$order} ");
    }

    public function insert($insert, $value)
    {
        $insert = $this->getPdo()->prepare("INSERT INTO {$this->table}({$insert}) VALUE{$value}");
        return $insert;
    }

    /**
     * exec function
     *
     * @param function $insert
     * @param array $value
     * @return void
     */
    public function exec($insert, array $value)
    {
        $insert->execute($value);
    }

    public function select($table) {
        $this->getPdo()->prepare("SELECT * INTO {$table} ");
    }

    /**
     * query function
     *
     * @param string $table
     * @param string $where
     * @param array $value
     * @return $verif
     * 
     * A refaire
     */
    public function query($table, $where, $value) {
        $exist = $this->getPdo()->prepare("SELECT * FROM {$table} {$where} ");
        $this->exec($exist, [$value]);
        $verif = $exist->rowCount();
        return $verif;
    }
}