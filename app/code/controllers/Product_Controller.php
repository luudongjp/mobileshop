<?php
class Product_Controller extends Base_Controller
{
    function index()
    {
        // Get idMobile on URL that user want to view detail
        $param = getParameter();
        if (isset($param[0])) {
            if (is_numeric($param[0])) {
                $mobile = $this->model->mobile->getById('mobile', 'idMobile', $param[0]);
                if ($mobile == null) {
                    redirect('notfound/index');
                } else {
                    // Link mobile and it's images ( base image and other images)
                    linkImageAndMobile($mobile, $this->model->hinhanh->getBaseImage($param[0]), $this->model->hinhanh->getOtherImage($param[0]));
                    // get all other images
                    $images = $this->model->hinhanh->getOtherImage($param[0]);
                }
            } else {
                redirect('notfound/index');
            }
        } else {
            redirect('notfound/index');
        }
        // Send data mobile to view and load view
        $this->view->load('frontend/product/index', [
            'mobile' => $mobile,
            'images' => $images
        ]);
    }
}
