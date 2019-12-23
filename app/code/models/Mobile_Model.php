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

    public function saveNewMobile()
    {
        try {
            $_4g = ($_POST['4g'] == "Có") ? 1 : 0;
            // luu du lieu khong phai hinh anh vao bang mobile
            $query1 = "INSERT INTO mobile (tenDienThoai, giaNhap, giaBan, giamGia, moTa, ngayNhapKho, soLuongTrongKho, mauSac, CPU, gpu, RAM, boNhoTrong, heDieuHanh, manHinh, cameraSau, cameraTruoc, dungLuongPin, sacNhanh, SIM, 4G, soLuotXem, soSao, mucDichSuDung, visibleOnHome, NhaCungCap_idNhaCungCap, NhaSanXuat_idNhaSanXuat, theloai_idTheloai) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $pre1 = $this->db->prepare($query1);
            $pre1->execute([
                $_POST['ten'],
                intval($_POST['gianhap']),
                intval($_POST['giaban']),
                intval($_POST['giamgia']),
                $_POST['mota'],
                null,
                0,
                $_POST['mausac'],
                $_POST['cpu'],
                $_POST['gpu'],
                $_POST['ram'],
                $_POST['bonhotrong'],
                $_POST['hedieuhanh'],
                $_POST['manhinh'],
                $_POST['camerasau'],
                $_POST['cameratruoc'],
                $_POST['pin'],
                $_POST['sacpin'],
                $_POST['sim'],
                $_4g,
                0,
                0,
                '1111',
                0,
                null,
                $_SESSION['idNSX'],
                $_SESSION['idTheloai']
            ]);
            $count = $pre1->rowCount();
            if ($count == 0) {
                return false;
            } else {
                $idMobile = $this->db->lastInsertId();
                // luu anh vao co so du lieu, bang hinhanh
                $query2 = "INSERT INTO hinhanh (tenAnh, url, logo, Mobile_idMobile) VALUES (?, ?, ?, ?)";
                $pre2 = $this->db->prepare($query2);
                // insert 1 logo
                $pre2->execute([
                    $_SESSION['nameLogo'],
                    $_SESSION['urlLogo'],
                    1,
                    $idMobile
                ]);
                // insert 4 anh phu
                $pre2->execute([
                    $_SESSION['nameAnh1'],
                    $_SESSION['urlAnh1'],
                    0,
                    $idMobile
                ]);
                $pre2->execute([
                    $_SESSION['nameAnh2'],
                    $_SESSION['urlAnh2'],
                    0,
                    $idMobile
                ]);
                $pre2->execute([
                    $_SESSION['nameAnh3'],
                    $_SESSION['urlAnh3'],
                    0,
                    $idMobile
                ]);
                $pre2->execute([
                    $_SESSION['nameAnh4'],
                    $_SESSION['urlAnh4'],
                    0,
                    $idMobile
                ]);
                return true;
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return $e->getMessage();
        }
        return true;
    }

    // Tim kiem dien thoai. Neu khong ton tai ten nhu vay thi tra ve null, nguoc lai tra ve tenDienThoai tim thay
    public function searchPhone($namePhone)
    {
        try {
            $query = "select tenDienThoai from {$this->table} where tenDienThoai = :name";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':name' => $namePhone
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
