<?php

class Mobile_Model extends Base_Model
{
    protected $table = 'mobile';

    // Dien thoai gia soc co truong giamGia >= 1 000 000 VND
    function getMobileGiaSoc()
    {
        $query = "select * from {$this->table} where giamGia >= 1000000 limit 4";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }

    // Dien thoai moi hien thi o Home Page co idTheloai = 2 va truong visibleOnHome = 1
    function getMobileNew()
    {
        $query = "select * from {$this->table} where Theloai_idTheloai = 2 and visibleOnHome = 1 limit 4";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }

    // Dien thoai noi bat co idTheloai = 6
    function getMobileNoiBat()
    {
        $query = "select * from {$this->table} where Theloai_idTheloai = 6 limit 4 ";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }

    /**
     * @param $key tên sản phẩm hoặc tên nhà sản xuất
     */
    public function search($key)
    {
        $data = null;
        try {
            $query = "SELECT DISTINCT mobile.* FROM mobile, nhasanxuat WHERE mobile.tenDienThoai LIKE '%" . $key . "%' OR ( mobile.NhaSanXuat_idNhaSanXuat = nhasanxuat.idNhaSanXuat AND nhasanxuat.tenNhaSX LIKE '%" . $key . "%')";
            $pre = $this->db->prepare($query);
            $pre->execute();
            $data = $pre->fetchAll(PDO::FETCH_ASSOC);
            $pre->closeCursor();
            return $data;
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return $e->getMessage();
        }
        return $data;
    }
}
