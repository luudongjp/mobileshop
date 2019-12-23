<?php


class Category_Controller extends Base_Controller
{
    public function list()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/category/category-list');
    }

}