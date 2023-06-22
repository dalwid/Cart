<?php

namespace app\database\models;

class Read extends Model
{
    public function all($table, $fields='*')
    {
        try {
            $query = $this->connect->query("select {$fields} from {$table}");
            $query->execute();

            return $query->fetchAll();
        } catch (\Throwable $th) {
            var_dump($th->getMessage());
        }
    }

    public function find($id)
    {
        //Lógica do find
    }
}