<?php
class Nhacungcap_Model extends Base_Model{
    protected $table = 'nhacungcap';

    function getSupplier(){
        $query = "select * from {$this->table}";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }

    public function saveNewSupplier()
    {
        try {
            $query = "INSERT INTO nhacungcap (tenNhaCC, diaChi, dienThoai, moTa) VALUES (?,?,?,?)";
            $pre = $this->db->prepare($query);
            $pre->execute([
                $_POST['ten'],
                $_POST['diachi'],
                $_POST['dienthoai'],
                $_POST['mota']
            ]);
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return $e->getMessage();
        }
        return true;
    }

    public function searchSupplier($nameSupplier)
    {
        try {
            $query = "select tenNhaCC from {$this->table} where tenNhaCC = :name";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':name' => $nameSupplier
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