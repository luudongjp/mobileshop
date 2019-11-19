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
