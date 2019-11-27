<?php

class Khachhang_Model extends Base_Model
{
    protected $table = 'khachhang';

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

    // Tim kiem va tra ve 1 object khachhang
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

    // Them moi 1 account, chen data vao csdl
    public function insertAccount($username, $email, $password, $activation, $status, $phone, $address)
    {
        try {
            $query = "INSERT INTO {$this->table} (tenKhachHang, soDienThoai, email, matKhau, activation, status, ngayTao, diaChi)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $pre = $this->db->prepare($query);
            $pre->execute([$username, $phone, $email, $password, $activation, $status, date('Y-m-d'), $address]);
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return false;
        }
        return [
            'username' => $username,
            'email' => $email,
            'activation' => $activation
        ];
    }

    // Dang ky tai khoan
    public function registerCustomerAccount()
    {
        $data = [];
        $username = null;
        $email = null;
        $password = null;
        $address = null;
        $phone = null;
        $activation = null;
        $status = 0;

        if (isset($_POST['reg-name'])) {
            $username = addslashes(trim($_POST['reg-name']));
        }
        if (isset($_POST['reg-email'])) {
            $email = addslashes(trim($_POST['reg-email']));
        }
        // password in database = hash(password + email)
        if (isset($_POST['reg-password'])) {
            $password = password_hash(addslashes($_POST['reg-password'] . $email), PASSWORD_DEFAULT);
        }
        if (isset($_POST['reg-address'])) {
            $address = addslashes(trim($_POST['reg-address']));
        }
        if (isset($_POST['reg-phone'])) {
            $phone = addslashes(trim($_POST['reg-phone']));
        }
        // activation code = md5 (email + currentTime)
        $activation = md5($email . time());

        // insert data into database
        $result = $this->insertAccount($username, $email, $password, $activation, $status, $phone, $address);

        return $result;
    }

    /**
     * Ham tim kiem account moi dang ky theo activation code. Neu tim thay ma status = 0 thi set status = 1 va tra ve true. Nguoc lai thi tra ve false
     * @param string $activation ma hash md5 cua email va time
     * @return true xac minh thanh cong
     * @return false xac minh that bai
     */
    function activeAccount($activation)
    {
        try {
            // Khi khach kich vao link tu lan thu 2 tro di, ham luon tra ve 1 ( thong bao link het han, tk da duoc actived)
            $query0 = "select idKhachHang from {$this->table} where (activation = :activation and status = 1)";
            $pre0 = $this->db->prepare($query0);
            $pre0->execute([
                ':activation' => $activation
            ]);
            $data0 = $pre0->fetch(PDO::FETCH_ASSOC);
            if (!empty($data0)) {
                return 1;
            } else {
                // Kiem tra xem co ton tai activation code khong
                $query = "select idKhachHang from {$this->table} where (activation = :activation and status = 0)";
                $pre = $this->db->prepare($query);
                $pre->execute([
                    ':activation' => $activation
                ]);
                $data = $pre->fetch(PDO::FETCH_ASSOC);
                if (!empty($data)) {
                    $queryUpdate = "update {$this->table} set status = 1 where activation = :activation";
                    $pre1 = $this->db->prepare($queryUpdate);
                    $pre1->execute([':activation' => $activation]);
                    $pre1->closeCursor();
                    $pre->closeCursor();
                    return 2;
                } else {
                    $pre->closeCursor();
                    return 3;
                }
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            $pre->closeCursor();
            return 3;
        }
        return 2;
    }

    /**
     * Ham cap nhat thong tin ca nhan cua khach hang
     * @param int $idUser id cua khach hang
     * @param string $newName ten moi cua khach hang
     * @param string $newPhone so dien thoai moi cua khach hang
     * @param string $newAddress dia chi moi cua khach hang
     * @return boolean true cap nhat thanh cong
     * @return boolean false cap nhat that bai
     */
    function updateUserInfo($idUser, $newName, $newAddress, $newPhone)
    {
        try {
            $query = "UPDATE khachhang SET tenKhachHang = :tenKhachHang, diaChi = :diaChi, soDienThoai = :soDienThoai WHERE idKhachHang = :idKhachHang";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':idKhachHang' => $idUser,
                ':tenKhachHang' => $newName,
                ':diaChi' => $newAddress,
                ':soDienThoai' => $newPhone
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

    /**
     * Get password of a customer
     * @param int $idUser id of user
     * @return  string hash of password
     */
    function getCustomerPassword($idUser)
    {
        try {
            $query = "select matKhau from {$this->table} where idKhachHang = :idUser";
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
     * Update password of a customer
     * @param int $idUser id of user
     * @param string $newPass new plaintext password
     * @return boolean true update success
     * @return boolean false update fail
     */
    function updateCustomerPassword($idUser, $newPassText)
    {
        try {
            $query = "update {$this->table} set matKhau = :newPass where idKhachHang = :idUser";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':idUser' => $idUser,
                ':newPass' => password_hash(addslashes($newPassText . $_SESSION['email']), PASSWORD_DEFAULT)
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

    /**
     * Add mobile to customer wishlist
     * @param int idMobile id cua mobile
     * @return boolean true add mobile into wishlist success
     * @return boolean false add to wishlist fail
     */
    function addToWishList($idMobile)
    {
        // wishlist trong database la 1 string (cac id phan cach nhau boi dau phay. vi du "1,12,23,5")
        try {
            // get wishlist string from database
            $query = "select wishlist from {$this->table} where idKhachHang = :idUser";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':idUser' => $_SESSION['idUser']
            ]);
            $data = $pre->fetch(PDO::FETCH_ASSOC);
            $pre->closeCursor();
            $data['wishlist'] .= "," . $idMobile;
            $tempArray = explode(",", $data['wishlist']);
            // Loai bo phan tu trung nhau trong array
            $tempArray = array_unique($tempArray);
            // newWishList la string
            $newWishList = implode(",", $tempArray);

            // save new wishlist into database
            $query1 = "update {$this->table} set wishlist = :wishlist where idKhachHang = :idKhachHang";
            $pre1 = $this->db->prepare($query1);
            $pre1->execute([
                ':idKhachHang' => $_SESSION['idUser'],
                ':wishlist' => $newWishList
            ]);
            $count = $pre1->rowCount();
            if ($count === 0) {
                return 0;
            } else {
                return 1;
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return 2;
        }
        return 1;
    }

    function getWishList($idUser)
    {
        $data = null;
        try {
            $query = "select wishlist from {$this->table} where idKhachHang = :idUser";
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
}
