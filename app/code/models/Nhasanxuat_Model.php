
<?php
class   Nhasanxuat_Model extends Base_Model
{
    protected $table = 'nhasanxuat';

    function getNhaSX(){
        $query = "select * from {$this->table}";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }

    public function saveNewNhaSX()
    {
        try {
            $query = "INSERT INTO nhasanxuat (tenNhaSX, diaChi, dienThoai, moTa) VALUES (?,?,?,?)";
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

    public function searchNhaSX($nameNhaSX)
    {
        try {
            $query = "select tenNhaSX from {$this->table} where tenNhaSX = :name";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':name' => $nameNhaSX
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
?>