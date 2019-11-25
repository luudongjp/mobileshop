<?php

class User_Controller extends Base_Controller
{
    // trang mac dinh cua khach hang
    function index()
    {
        $this->view->load('frontend/user/index');
    }

    // chuyen toi trang login
    function login()
    {
        $this->view->load('frontend/user/login');
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
                    $_SESSION['username'] = $account['tenKhachHang'];
                    $_SESSION['email'] = $account['email'];
                    $_SESSION['phone'] = $account['soDienThoai'];
                    $_SESSION['address'] = $account['diaChi'];
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
        if (isset($param[0])) {
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
        if (isset($param[0])) {
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

    function wishlist()
    {

        $this->view->load('frontend/user/wishlist');
    }

    function cart()
    {

        $this->view->load('frontend/user/cart');
    }
}
