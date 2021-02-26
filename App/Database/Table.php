<?php

namespace App\Database;

class Table extends DBConnexion {

    public $table;
    public $info;

    /**
     * Fonction qui crée charche la table
     *
     * @param string $table
     * @return void
     */
    public function getTable(string $table) {
        return $this->table = $table;
    }

    /**
     * Fonction pour inserrer un objet dans le BDD
     *
     * @param string $columns
     * @param string $value
     * @param array $exec
     * @return void
     */
    public function insert(string $columns, string $value, array $exec) {
        $insert = $this->getPdo()->prepare("INSERT INTO $this->table($columns) VALUE($value)");
        $insert->execute($exec);
    }

    public function real(string $column, string $where, array $value) {
        $real = $this->getPdo()->prepare("SELECT $column FROM $this->table WHERE $where");
        $real->execute($value);

        if($real->rowCount()) {
            $this->info = $real->fetch();
            return true;
        } else {
            return false;
        }
    }

    /**
     * Fonction pour chercher une objet dans la BDD
     * 
     * @example look_for('*', 'id = ?', [2]) Premièrement la/les colomn(s) puis le Where et pour finir les valeurs a checher (soit un ID soit autre)
     * 
     * @param string $column
     * @param string $where
     * @param array $value
     * @return array
     */
    public function look_for(string $column, string $where, array $value) {
        $prepare = $this->getPdo()->prepare("SELECT $column FROM $this->table WHERE $where");
        $prepare->execute($value);

        return $prepare->fetch();
    }

    /**
     * Fonction pour chercher tout les objet d'une table dans un BDD.
     * Utilisez un foreach pour récuperer tout proprement.
     *
     * @param string $column
     * @return void
     */
    public function look_for_all(string $column) {
        $fetch = $this->getPdo()->query("SELECT $column FROM $this->table");
        return $fetch->fetchAll();
    }

    public function delete(string $where, array $exec) {
        $delete = $this->getPdo()->prepare("DELETE FROM $this->table WHERE $where");
        return $delete->execute($exec);
    }
}