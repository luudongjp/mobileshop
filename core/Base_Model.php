<?php

class Base_Model extends Core_Model
{
    /**
     * function to fetch all records of a table
     */
    function getAll($table, $option = [])
    {
        try {
            $clause = isset($option['where']) ? $option['where'] : '1';
            $query = "select * from {$table} where {$clause} ";
            $pre = $this->db->prepare($query);
            $pre->execute();
            $data = $pre->fetchAll(PDO::FETCH_ASSOC);
            $pre->closeCursor();
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return null;
        }
        return $data;
    }

    /**
     * function to fetch a record of a table by id
     */
    function getById($table, $idName, $value)
    {
        try {
            $query = "select * from {$table} where {$idName} = :id";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':id' => $value
            ]);
            $data = $pre->fetch(PDO::FETCH_ASSOC);
            $pre->closeCursor();
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return null;
        }
        return $data;
    }

    /**
     * function to update a record of a table by column
     */
    function updateRecord($table, $idName, $idVal, $colName, $colVal)
    {
        try {
            $query = "update {$table} set {$colName} = :colVal where {$idName} = :idVal ";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':idVal' => $idVal,
                ':colVal' => $colVal
            ]);
            $count = $pre->rowCount();
            if ($count === 0) {
                return 0;
            } else {
                return 1;
            }
            $pre->closeCursor();
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return 0;
        }
        return 1;
    }

    /**
     * function to upload image
     */
    public function uploadImage($param = [])
    {
        $tenAnh = $param[2];
        $url = $param[4];
        $logo = $param[1];
        $idMobile = $param[0];
        try {
            $query = "insert into {$this->table} (tenAnh, url, moTa, logo, Mobile_idMobile) 
            VALUES ( '{$tenAnh}', '{$url}', '' , {$logo}, {$idMobile})";
            $this->db->exec($query);
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }
}
