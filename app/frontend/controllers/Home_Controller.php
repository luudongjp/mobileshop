<?php
class Home_Controller extends Base_Controller
{
    function index()
    {
        // set layout, if not set, default layout will be loaded 
        //$this->layout->set('layout_name_string');

        // call any function to query or update data
        $hangsanxuat = $this->model->nhasanxuat->getAll();

        // load view and pass data into view by an array
        $this->view->load('home/index', [
            'hsx' => $hangsanxuat
        ]);
    }

    function show()
    { }
}
