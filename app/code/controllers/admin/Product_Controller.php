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
        for ($i = 0; $i < sizeof($listBasePrice); $i++) {
            $mobile = $this->model->mobile->getById('mobile', 'idMobile', $listBasePrice[$i]['idMobile']);
            // only need base image so other image we passed an empty array []
            linkImageAndMobile($mobile, $this->model->hinhanh->getBaseImage($mobile['idMobile']), []);
            $arrayMobiles[$i] = $mobile;
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/product/product-listBasePrice', [
            'listBasePrice'=>$arrayMobiles
        ]);
    }

    public function updateVisibleBasePrice()
    {
        $result = $this->model->mobile->updateVisibleBasePrice();
        if ($result) {
            $_SESSION['updateVisibleBasePriceSuccess'] = "Cập nhật các sản phẩm giá sốc hiển thị trên homepage thành công !";
        } else {

        }
        redirect('product/listBasePrice');
    }

    public function listNew()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $arrayMobiles = [];
        $listNew = $this->model->mobile->getDataNew('mobile');
        for ($i = 0; $i < sizeof($listNew); $i++) {
            $mobile = $this->model->mobile->getById('mobile', 'idMobile', $listNew[$i]['idMobile']);
            // only need base image so other image we passed an empty array []
            linkImageAndMobile($mobile, $this->model->hinhanh->getBaseImage($mobile['idMobile']), []);
            $arrayMobiles[$i] = $mobile;
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/product/product-listNew', [
            'listNew'=>$arrayMobiles
        ]);
    }

    public function updateVisibleNew()
    {
        $result = $this->model->mobile->updateVisibleNew();
        if ($result) {
            $_SESSION['updateVisibleNewSuccess'] = "Cập nhật các sản phẩm mới hiển thị trên homepage thành công !";
        } else {

        }
        redirect('product/listNew');
    }

    public function listExpress()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $arrayMobiles = [];
        $listExpress = $this->model->mobile->getDataExpress('mobile');
        for ($i = 0; $i < sizeof($listExpress); $i++) {
            $mobile = $this->model->mobile->getById('mobile', 'idMobile', $listExpress[$i]['idMobile']);
            // only need base image so other image we passed an empty array []
            linkImageAndMobile($mobile, $this->model->hinhanh->getBaseImage($mobile['idMobile']), []);
            $arrayMobiles[$i] = $mobile;
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/product/product-listExpress', [
            'listExpress'=>$arrayMobiles
        ]);
    }

    public function updateVisibleExpress()
    {
        $result = $this->model->mobile->updateVisibleExpress();
        if ($result) {
            $_SESSION['updateVisibleExpressSuccess'] = "Cập nhật các sản phẩm nổi bật hiển thị trên homepage thành công !";
        } else {

        }
        redirect('product/listExpress');
    }
}