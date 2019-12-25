<?php
class Order_Controller extends Base_Controller
{
    public function listNotApprove()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $listOrders = $this->model->donmuahang->getAllOrders(null, 'xuất hàng', 'chưa phê duyệt');
        $this->layout->set('admin_default');
        $this->view->load('admin/order/order-listNotApprove', [
            'listOrders' => array_reverse($listOrders)
        ]);
    }

    public function listApproved()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/order/order-listApproved');
    }

    public function listShipping()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/order/order-listShipping');
    }

    public function listAlreadyCheckout()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/order/order-listAlreadyCheckout');
    }

    public function index()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $param = getParameter();
        if (!empty($param[0])) {
            if (intval($param[0]) != 0) {
                $idOrder = intval($param[0]);
                // lay ve object don hang
                $donHang = $this->model->donmuahang->getById('donmuahang', 'idDonHang', $idOrder);
                // lay ve object khach hang
                $khachHang = $this->model->khachhang->getById('khachhang', 'idKhachHang', $donHang['khachhang_idKhachHang']);
                // lay ve tat ca chi tiet mua hang
                $allOrderDetails = $this->model->chitietmuahang->getAll('chitietmuahang', 'donmuahang_idDonHang', $idOrder);
                $this->layout->set('admin_default');
                $this->view->load('admin/order/order-index', [
                    'khachHang' => $khachHang,
                    'donHang' => $donHang,
                    'allOrderDetails' => $allOrderDetails
                ]);
            } else {
                redirect('notfound/index');
            }
        } else {
            redirect('notfound/index');
        }
    }
}
