<?php
class Khachhang_Model extends Base_Model
{
    protected $table = 'khachhang';

    // Neu khong ton tai email thi tra ve true, nguoc lai tra ve false
    public function searchEmail($email)
    {
        $query = "select email from {$this->table} where email = :email";
        $pre = $this->db->prepare($query);
        $pre->execute([
            ':email' => $email
        ]);
        $data = $pre->fetch(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }

    // Tim kiem va tra ve 1 object khachhang
    public function searchAccount($email)
    {
        $query = "select * from {$this->table} where email = :email";
        $pre = $this->db->prepare($query);
        $pre->execute([
            ':email' => $email
        ]);
        $data = $pre->fetch(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }
}
