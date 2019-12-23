<?php
class Theloai_Model extends Base_Model
{
    protected $table = 'theloai';

    function getCategory(){
        $query = "select * from {$this->table}";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }

    public function saveNewCategory()
    {
        try {
            $query = "INSERT INTO theloai (tentheloai, moTa) VALUES (?,?)";
            $pre = $this->db->prepare($query);
            $pre->execute([
                $_POST['ten'],
                $_POST['mota']
            ]);
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return $e->getMessage();
        }
        return true;
    }

    public function searchCategory($nameCategory)
    {
        try {
            $query = "select tentheloai from {$this->table} where tentheloai = :name";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':name' => $nameCategory
            ]);
            $data = $pre->fetch(PDO::FETCH_ASSOC);
            $pre->closeCursor();
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return null;
        }
        return $data;
    }

}
