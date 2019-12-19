<?php

class Mobile_Model extends Base_Model
{
    protected $table = 'mobile';

    // Dien thoai gia soc co truong giamGia >= 1 000 000 VND
    function getMobileGiaSoc()
    {
        $query = "select * from {$this->table} where giamGia >= 1000000 and visibleOnHome = 1 limit 4";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }

    public function updateVisibleBasePrice()
    {
        $allBasePrice = $this->getData('mobile');
        // Set all banner is not visible
        for ($j = 0; $j < sizeof($allBasePrice); $j++) {
            $this->updateRecord('mobile', 'idMobile', $allBasePrice[$j]['idMobile'], 'visibleOnHome', 0);
        }
        // Set all banner from post is visible
        $post = isset($_POST) ? $_POST : null;
        foreach ($post as $key => $val) {
            $idMobile = trim($key, "visibleOnHomeBase");
            $this->updateRecord('mobile', 'idMobile', intval($idMobile), 'visibleOnHome', 1);
        }
        return true;
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

    public function updateVisibleNew()
    {
        $allNew = $this->getDataNew('mobile');
        // Set all banner is not visible
        for ($j = 0; $j < sizeof($allNew); $j++) {
            $this->updateRecord('mobile', 'idMobile', $allNew[$j]['idMobile'], 'visibleOnHome', 0);
        }
        // Set all banner from post is visible
        $post = isset($_POST) ? $_POST : null;
        foreach ($post as $key => $val) {
            $idMobile = trim($key, "visibleOnHomeBase");
            $this->updateRecord('mobile', 'idMobile', intval($idMobile), 'visibleOnHome', 1);
        }
        return true;
    }

    // Dien thoai noi bat co idTheloai = 6
    function getMobileNoiBat()
    {
        $query = "select * from {$this->table} where Theloai_idTheloai = 6 and visibleOnHome = 1 limit 4 ";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }

    public function updateVisibleExpress()
    {
        $allExpress = $this->getDataExpress('mobile');
        // Set all banner is not visible
        for ($j = 0; $j < sizeof($allExpress); $j++) {
            $this->updateRecord('mobile', 'idMobile', $allExpress[$j]['idMobile'], 'visibleOnHome', 0);
        }
        // Set all banner from post is visible
        $post = isset($_POST) ? $_POST : null;
        foreach ($post as $key => $val) {
            $idMobile = trim($key, "visibleOnHomeBase");
            $this->updateRecord('mobile', 'idMobile', intval($idMobile), 'visibleOnHome', 1);
        }
        return true;
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
