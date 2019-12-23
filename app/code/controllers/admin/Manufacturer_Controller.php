<?php


class Manufacturer_Controller extends Base_Controller
{
    public function list()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $allNhaSX = $this->model->nhasanxuat->getNhaSX();
        $this->layout->set('admin_default');
        $this->view->load('admin/manufacturer/manufacturer-list', [
            'nhaSX'=>$allNhaSX
        ]);
    }
    
    public function add()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/manufacturer/manufacturer-add');
    }

    public function save()
    {
        $post = $_POST ?? null;
        $nhaSXName = $post['ten'];
        $folderNhaSX = preg_replace('/\s+/', '', $nhaSXName);
        // Update database
        $result = $this->model->nhasanxuat->saveNewNhaSX();
        if ($result == true) {
            $_SESSION['addNewCategorySuccess'] = "Thêm nhà sản xuất mới thành công !";
        } else {
            $_SESSION['addNewCategoryFail'] = "Thêm nhà sản xuất mới thất bại !";
        }
        redirect('manufacturer/list');
    }

    public function searchName()
    {
        $result = null;
        $nameNhaSX = null;
        $param = getParameter();
        if (!empty($param[0])) {
            $nameNhaSX = $param[0];
            $result = $this->model->nhasanxuat->searchNhaSX($nameNhaSX);
        }
        $this->layout->set('null');
        $this->view->load('admin/searchNhaSXByName', [
            'result' => $result
        ]);
    }
}