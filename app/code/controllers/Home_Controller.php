<?php
class Home_Controller extends Base_Controller
{
    function index()
    {   
        $banners = $this->model->banner->getActiveBanners();
        
        $this->view->load('frontend/home/index', [
            'banners' => $banners
        ]);
    }

    function show()
    { }
}
