<?php
class Home_Controller extends Base_Controller
{
    function index()
    {
        $this->layout->set('admin_default');
        $this->view->load('admin/home/index');
     }
}
