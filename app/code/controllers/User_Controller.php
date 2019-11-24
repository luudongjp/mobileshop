<?php
class User_Controller extends Base_Controller
{
    function index()
    {

        $this->view->load('frontend/user/index');
    }
    function login()
    {

        $this->view->load('frontend/user/login');
    }
    function searchAccount()
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
    function wishlist()
    {

        $this->view->load('frontend/user/wishlist');
    }
    function cart()
    {

        $this->view->load('frontend/user/cart');
    }
}
