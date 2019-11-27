<?php

class User_Controller extends Base_Controller
{
    // trang mac dinh cua khach hang
    function index()
    {
        if (!isset($_SESSION['username'])) {
            redirect('notfound/index');
        } else {
            $this->view->load('frontend/user/index');
        }
    }

    // chuyen toi trang login
    function login()
    {
        if (isset($_SESSION['username'])) {
            redirect('user/index');
        } else {
            $this->view->load('frontend/user/login');
        }
    }

    // logout tai khoan
    function logout()
    {
        session_unset();
        session_destroy();
        redirect('user/login');
    }

    // kiem tra tai khoan khach hang khi bam nut dang nhap
    function checkLogin()
    {
        $email = isset($_POST['login-email']) ? trim($_POST['login-email']) : '';
        $password = isset($_POST['login-password']) ? trim($_POST['login-password']) : '';
        // Tim kiem theo email va neu tim thay thi tra ve 1 account
        $account = $this->model->khachhang->searchAccount($email);
        if (!empty($account)) {
            // $validAccount = true if (===email and ===password)
            $validEmail = ($_POST['login-email'] === $account['email']) ? true : false;
            $validPassword = password_verify($_POST['login-password'] . $_POST['login-email'], $account['matKhau']);
            $validateAccount = $validEmail && $validPassword;
            if ($validateAccount) {
                // Dung mat khau
                // Neu account chua duoc kich hoat thi chuyen sang trang thong bao can kich hoat tai khoan
                if ($account['status'] == 0) {
                    redirect('user/notice');
                } else {
                    $_SESSION['idUser'] = $account['idKhachHang'];
                    $_SESSION['username'] = $account['tenKhachHang'];
                    $_SESSION['email'] = $account['email'];
                    $_SESSION['phone'] = $account['soDienThoai'];
                    $_SESSION['address'] = $account['diaChi'];
                    $_SESSION['date'] = $account['ngayTao'];
                    $_SESSION['status'] = $account['status'];
                    redirect('user/index');
                }
                redirect('home/index');
            } else {
                // Sai mat khau
                $_SESSION['wrong-password'] = 'Mật khẩu của bạn không đúng !';
                redirect('user/login');
            }

        }
    }

    // ham thuc hien luu thong tin nguoi dung moi vao database va gui link xac thuc tai khoan moi vao hom thu cua khach hang
    function register()
    {
        $saveData = null;
        // result is an array data if save data to db success, else it is false
        $saveData = $this->model->khachhang->registerCustomerAccount();
        // if save data success, send mail to user
        if ($saveData != false) {
            $linkVerify = baseUrl('user/verify/') . $saveData['activation'];
            $title = "Verification Link | MobileShop| Subscription";
            $content = "";
            $content .= "Xin chào " . $saveData['username'] . ",<br /><br />";
            $content .= "Vui lòng kích vào nút bên dưới để xác nhận tài khoản của bạn trên website " . BASE_URL . ".<br />";
            $content .= "<span style='background-color:#07c;margin-top:15px;width: 115px;height: 40px;display:block;border-radius: 40px;cursor: pointer;'>
                            <span style='display:block;padding:10px;cursor: pointer;'>
                                <a href='{$linkVerify}' target='_blank' style='color:white;'>
                                    VERIFY EMAIL
                                </a>
                            </span>
                          </span>";
            $nTo = $saveData['username'];
            $mTo = $saveData['email'];
            $diachicc = "";
            $mailSuccess = sendMail($title, $content, $nTo, $mTo, $diachicc);
            if ($mailSuccess) {
                redirect('user/success');
            } else {
                redirect('user/fail');
            }
        } else {
            redirect('user/fail');
        }

    }

    // kiem tra activation code cua khach co trong database hay khong ? va neu co thi account do da duoc active truoc do hay khong ( status = 0 ? 1 )
    function verify()
    {
        $activation = null;
        $param = getParameter();
        if (!empty($param[0])) {
            $activation = $param[0];
        }
        $resultActive = $this->model->khachhang->activeAccount($activation);
        switch ($resultActive) {
            case 1 :
                redirect('user/active_expire');
                break;
            case 2:
                redirect('user/active_success');
                break;
            case 3:
                redirect('user/active_fail');
                break;
        }
    }

    // ham duoc ajax goi den de tim kiem email nguoi dung (kiem email dang ky moi da ton tai trong database hay chua)
    function searchEmail()
    {
        $this->layout->set('null');
        $result = null;
        $emailPrepareRegister = null;
        $param = getParameter();
        if (!empty($param[0])) {
            $emailPrepareRegister = $param[0];
            $result = $this->model->khachhang->searchEmail($emailPrepareRegister);
        }
        $this->view->load('frontend/null', [
            'result' => $result
        ]);
    }

    // hien thi view success khi luu duoc thong tin tai khoan moi vao csdl va gui duoc email cho khach (email chua link xac thuc tai khoan)
    function success()
    {
        $message = null;
        $message = "Một email đã được gửi tới hòm thư của bạn. <br />";
        $message .= "Vui lòng kiểm tra hộp thư đến và kích hoạt tài khoản.";
        $this->view->load('frontend/user/register_success', [
            'message' => $message
        ]);
    }

    // hien thi view fail khi khong luu duoc thong tin tai khoan moi vao csdl hoac khong gui duoc email cho khach ( khi khach dang ky tai khoan moi )
    function fail()
    {
        $message = null;
        $message = "Đăng ký tài khoản mới không thành công !. <br />";
        $this->view->load('frontend/user/register_fail', [
            'message' => $message
        ]);
    }

    // hien thi view success khi khach hang kich vao link trong email va duoc he thong xac thuc
    function active_success()
    {
        $message = null;
        $message = "Email của bạn là hợp lệ. Cảm ơn bạn !<br />";
        $message .= "Bây giờ bạn có thể đăng nhập.";
        $this->view->load('frontend/user/active_success', [
            'message' => $message
        ]);
    }

    // hien thi view fail khi he thong khong xac minh duoc tai khoan cua khach dang ky
    function active_fail()
    {
        $message = null;
        $message = "Không thể xác minh tài khoản !. <br />";
        $this->view->load('frontend/user/active_fail', [
            'message' => $message
        ]);
    }

    // hien thi view expire khi khach hang nhan vao link active nhieu lan
    function active_expire()
    {
        $message = null;
        $message = "Link hết hiệu lực. Tài khoản của bạn đã được kích hoạt trước đó !. <br />";
        $this->view->load('frontend/user/active_expire', [
            'message' => $message
        ]);
    }

    // hien thi view thong bao account chua duoc kich hoat
    function notice()
    {
        $message = null;
        $message = "Tài khoản của bạn chưa được kích hoạt !. <br />";
        $message .= "Vui lòng kích hoạt trước khi đăng nhập !. <br />";
        $this->view->load('frontend/user/notice', [
            'message' => $message
        ]);
    }

    // load page chinh sua thong tin ca nhan khach hang
    function editInfo()
    {
        $this->view->load('frontend/user/editInfo');
    }

    // luu thong tin ca nhan khach hang sau khi thay doi thong tin
    function saveInfo()
    {
        $idUser = isset($_SESSION['idUser']) ? $_SESSION['idUser'] : '';
        $newName = isset($_POST['user-edit-name']) ? $_POST['user-edit-name'] : '';
        $newPhone = isset($_POST['user-edit-phone']) ? $_POST['user-edit-phone'] : '';
        $newAddress = isset($_POST['user-edit-address']) ? $_POST['user-edit-address'] : '';
        $resutl = $this->model->khachhang->updateUserInfo($idUser, $newName, $newAddress, $newPhone);
        if ($resutl) {
            $_SESSION['username'] = $newName;
            $_SESSION['phone'] = $newPhone;
            $_SESSION['address'] = $newAddress;
            $_SESSION['success-update-customer-info'] = 'Thay đổi thông tin thành công !';
            redirect('user/index');
        } else {
            $_SESSION['fail-update-customer-info'] = 'Thay đổi thông tin thất bại!';
            redirect('user/index');
        }
    }

    // load page doi mat khau khach hang
    function changePassword()
    {
        $this->view->load('frontend/user/changePassword');
    }

    // xu li doi mat khau khach hang
    function savePassword()
    {
        // get real current password from database
        $realPassword = null;
        $dataReturn = $this->model->khachhang->getCustomerPassword($_SESSION['idUser']);
        if (!empty($dataReturn)) {
            $realPassword = $dataReturn['matKhau'];
        }
        // data user enter in form change password
        $currentPasswordText = isset($_POST['customer_password_current']) ? $_POST['customer_password_current'] : '';
        // kiem tra mat khau hien tai nhap vao co giong voi mat khau trong CSDL la $realPassword hay khong ?
        if (!password_verify(addslashes($currentPasswordText . $_SESSION['email']), $realPassword)) {
            // neu khong trung khop
            $_SESSION['error-changePassCustomer'] = 'Mật khẩu hiện tại không đúng !';
            redirect('user/changePassword');
        } else {
            $newPasswordText = isset($_POST['customer_password_new']) ? $_POST['customer_password_new'] : '';
            $resultUpdate = $this->model->khachhang->updateCustomerPassword($_SESSION['idUser'], $newPasswordText);
            if ($resultUpdate) {
                // neu luu mat khau moi thanh cong
                $_SESSION['success-changePassCustomer'] = 'Đổi mật khẩu mới thành công !';
                redirect('user/index');
            } else {

            }
        }
    }

    // load page wishlist
    function wishlist()
    {

        $this->view->load('frontend/user/wishlist');
    }

    // load page cart
    function cart()
    {

        $this->view->load('frontend/user/cart');
    }

    // add a mobile into cart
    function addToCart()
    {

    }

    // add a mobile into wishlist
    function addToWishList()
    {
        $idMobile = null;
        $param = getParameter();
        if (!empty($param[0])) {
            $idMobile = $param[0];
            $result = $this->model->khachhang->addToWishList($idMobile);

            if ($result) {
                echo "<script type='text/javascript'> alert('Them thanh cong')</script>";
            }
            $this->view->load('frontend/test');
        } else {
            redirect('notfound/index');
        }
    }

}
