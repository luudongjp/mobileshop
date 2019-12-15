<?php

class Nhanvien_Model extends Base_Model
{
    protected $table = 'nhanvien';

    public function createAdminAccount()
    {
        $username = addslashes(trim($_POST['r-username'] ?? ''));
        $email = addslashes(trim($_POST['r-email'] ?? ''));
        $gioitinh = addslashes(trim($_POST['r-gioitinh'] ?? ''));
        $ngaysinh = addslashes(trim($_POST['r-ngaysinh'] ?? ''));
        $diachi = addslashes(trim($_POST['r-address'] ?? ''));
        $cmnd = addslashes(trim($_POST['r-cmnd'] ?? ''));
        $dienthoai = addslashes(trim($_POST['r-phone'] ?? ''));
        $chucvu = addslashes(trim($_POST['r-chucvu'] ?? ''));
        $ghichu = addslashes(trim($_POST['r-ghichu'] ?? ''));
        $status = addslashes(trim($_POST['r-status'] ?? ''));
        echo $username;
        // Mật khẩu mặc định: Mobileshop123
        $password = password_hash('MobileShop123' . $email, PASSWORD_DEFAULT);
        $result = $this->insertAdminAccount($username, $gioitinh, $ngaysinh, $diachi, $cmnd, $dienthoai, $chucvu, $ghichu, $email, $password, $status);
        return $result;
    }

    // Them moi 1 account, chen data vao csdl
    public function insertAdminAccount($username, $gioitinh, $ngaysinh, $diachi, $cmnd, $dienthoai, $chucvu, $ghichu, $email, $password, $status)
    {
        $id = null;
        $date = strtotime($ngaysinh);
        $ngaysinh = date('Y-m-d', $date);
        if ($status === "Đã kích hoạt") {
            $status = 1;
        } else {
            $status = 0;
        }
        try {
            $query = "INSERT INTO {$this->table} (tenNhanVien, gioiTinh, ngaySinh, queQuan, cmnd, soDienThoai, chucvu, ghiChu, email, matKhau, status)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $pre = $this->db->prepare($query);
            $pre->execute([$username, $gioitinh, $ngaysinh, $diachi, $cmnd, $dienthoai, $chucvu, $ghichu, $email, $password, $status]);
            $count = $pre->rowCount();
            if ($count === 0) {
                return false;
            } else {
                $id = $this->db->lastInsertId();
                return [
                    'id' => $id,
                    'ten' => $username,
                    'email' => $email,
                    'chucvu' => $chucvu
                ];
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return $e->getMessage();
        }
        return false;
    }

    // Tim kiem email. Neu khong ton tai email thi tra ve null, nguoc lai tra ve email tim thay
    public function searchEmail($email)
    {
        try {
            $query = "select email from {$this->table} where email = :email";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':email' => $email
            ]);
            $data = $pre->fetch(PDO::FETCH_ASSOC);
            $pre->closeCursor();
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return null;
        }
        return $data;
    }

    // Tim kiem va tra ve 1 object nhanvien
    public function searchAccount($email)
    {
        try {
            $query = "select * from {$this->table} where email = :email";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':email' => $email
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
     * Get password of a admin member
     * @param int $idUser id of user
     * @return  string hash of password
     */
    function getAdminPassword($idUser)
    {
        try {
            $query = "select matKhau from {$this->table} where idNhanVien = :idUser";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':idUser' => $idUser
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
     * Update password of a admin member
     * @param int $idNV id of user
     * @param string $newPass new plaintext password
     * @return boolean true update success
     * @return boolean false update fail
     */
    function updateNVPassword($idNV, $newPassText)
    {
        try {
            $query = "update {$this->table} set matKhau = :newPass where idNhanVien = :idNV";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':idNV' => $idNV,
                ':newPass' => password_hash(addslashes($newPassText . $_SESSION['emailNV']), PASSWORD_DEFAULT)
            ]);
            $rowCount = $pre->rowCount();
            if ($rowCount > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return false;
        }
        return true;
    }

    function saveCodeChangePass($emailForgetPass, $codeChangePass)
    {
        try {
            $query = "UPDATE nhanvien SET codeChangePass = :code WHERE email = :emailNV";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':emailNV' => $emailForgetPass,
                ':code' => $codeChangePass
            ]);
            $count = $pre->rowCount();
            if ($count > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return false;
        }
        return true;
    }

    // Ham tim kiem ban ghi chua codeChangePass, neu tim thay, tra ve 1 ban ghi nhanvien
    public function findCode($codeChangePass)
    {
        try {
            $query = "select * from {$this->table} where codeChangePass = :code";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':code' => $codeChangePass
            ]);
            $data = $pre->fetch(PDO::FETCH_ASSOC);
            $pre->closeCursor();
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return null;
        }
        return $data;
    }

    // Luu mat khau moi cua nhan vien
    public function saveNewPassword($emailNeedChangePass, $newPassword)
    {
        $newHashPass = password_hash($newPassword . $emailNeedChangePass, PASSWORD_DEFAULT);
        try {
            $query = "UPDATE {$this->table} SET matKhau = :newMK WHERE email = :emailNV";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':emailNV' => $emailNeedChangePass,
                ':newMK' => $newHashPass
            ]);
            $count = $pre->rowCount();
            if ($count > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return false;
        }
        return true;
    }
}
