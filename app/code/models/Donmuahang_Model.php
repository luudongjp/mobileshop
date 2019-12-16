<?php

class Donmuahang_Model extends Base_Model
{
    protected $table = 'donmuahang';

    public function createNewOrder($diaChiNhanHang, $totalPrice)
    {
        try {
            $query = "INSERT INTO {$this->table} (ngayTao, diaChiNhanHang, trangThaiDonHang, loaiDonHang, tongTien, biHuy, khachhang_idKhachHang)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
            $pre = $this->db->prepare($query);
            $this->db->beginTransaction();
            $pre->execute([
                date("Y-m-d H:i:s"),
                $diaChiNhanHang,
                'chưa phê duyệt',
                'xuất hàng',
                $totalPrice,
                0,
                $_SESSION['idUser']
            ]);
            $count = $pre->rowCount();
            if ($count === 0) {
                return null;
            } else {
                // Trả về id của đơn hàng vừa được tạo mới
                $id = $this->db->lastInsertId();
                $this->db->commit();
                return $id;
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return $e->getMessage();
        }
        return null;
    }
}
