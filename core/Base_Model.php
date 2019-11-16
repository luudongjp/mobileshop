<?php
class Base_Model extends Core_Model
{
    /**
     * function to fetch all records of a table
     */
    function getAll()
    {
        $query = "select * from {$this->table}";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }

    /**
     * function to fetch a record of a table by id
     */
    function getById($id)
    {
        $query = "select * from {$this->table} where id = :id";
        $pre = $this->db->prepare($query);
        $pre->execute([
            ':id' => $id
        ]);
        $data = $pre->fetch(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }
}
