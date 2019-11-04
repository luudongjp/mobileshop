<?php
class Home_Controller extends Base_Controller
{
    function index()
    {
        // set layout, if not set, default layout will be loaded 
        //$this->layout->set('layout_name_string');

        // load view
        $this->view->load('home/index');

        // load model
        $this->model->load('category');

        // call any function to query or update data
        $this->model->category->getAllCategories();
    }

    function show()
    { }
}
