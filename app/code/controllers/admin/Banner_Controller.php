<?php


class Banner_Controller extends Base_Controller
{

    public function list()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $banners = $this->model->banner->getAll('banner', null, null);
        $this->layout->set('admin_default');
        $this->view->load('admin/banner/banner-list', [
            'banners' => $banners
        ]);
    }

    public function updateVisibleBanner()
    {
        $result = $this->model->banner->updateVisibleBanner();
        if ($result) {
            $_SESSION['updateVisibleBannerSuccess'] = "Cập nhật các banner hiển thị trên homepage thành công !";
        } else {

        }
        redirect('banner/list');
    }
}