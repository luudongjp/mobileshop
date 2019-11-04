<?php
class Core_Controller{
    protected $layout;
    protected $view;
    protected $model;

    function __construct()
    {
        // load layout
        require BASE_PATH."/core/loaders/Layout_Loader.php";
        $this->layout = new Layout_Loader;
        
        // load view
        require BASE_PATH."/core/loaders/View_Loader.php";
        $this->view = new View_Loader;
       
        // load model
        require BASE_PATH."/core/loaders/Model_Loader.php";
        $this->model = new Model_Loader;
    }
}