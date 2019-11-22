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
    function wishlist()
    {

        $this->view->load('frontend/user/wishlist');
    }
    function cart()
    {

        $this->view->load('frontend/user/cart');
    }
}
