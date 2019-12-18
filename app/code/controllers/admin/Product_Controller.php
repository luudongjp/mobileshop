<?php


class Product_Controller extends Base_Controller
{
    public function listBasePrice()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $arrayMobiles = [];
        $listBasePrice = $this->model->mobile->getData('mobile');
        foreach($listBasePrice as $item){
            $mobile = $this->model->mobile->getById('mobile', 'idMobile', $item['idMobile']);
            // only need base image so other image we passed an empty array []
            linkImageAndMobile($mobile, $this->model->hinhanh->getBaseImage($item['idMobile']), []);
            $arrayMobiles[$item['idMobile']] = $mobile;
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/product/product-listBasePrice', [
            'basePrice'=>$listBasePrice,
            'arrayMobiles'=>$arrayMobiles
        ]);
    }

    public function listNew()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $arrayMobiles = [];
        $listBasePrice = $this->model->mobile->getDataNew('mobile');
        foreach($listBasePrice as $item){
            $mobile = $this->model->mobile->getById('mobile', 'idMobile', $item['idMobile']);
            // only need base image so other image we passed an empty array []
            linkImageAndMobile($mobile, $this->model->hinhanh->getBaseImage($item['idMobile']), []);
            $arrayMobiles[$item['idMobile']] = $mobile;
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/product/product-listNew', [
            'arrayMobiles'=>$arrayMobiles
        ]);
    }

    public function listExpress()
    {
        $arrayMobiles = [];
        $listBasePrice = $this->model->mobile->getDataExpress('mobile');
        foreach($listBasePrice as $item){
            $mobile = $this->model->mobile->getById('mobile', 'idMobile', $item['idMobile']);
            // only need base image so other image we passed an empty array []
            linkImageAndMobile($mobile, $this->model->hinhanh->getBaseImage($item['idMobile']), []);
            $arrayMobiles[$item['idMobile']] = $mobile;
        }
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/product/product-listExpress', [
            'arrayMobiles'=>$arrayMobiles
        ]);
    }
}