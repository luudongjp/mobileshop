<?php


class Supplier_Controller extends Base_Controller
{
    public function list()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $allSupplier = $this->model->nhacungcap->getSupplier();
        $this->layout->set('admin_default');
        $this->view->load('admin/supplier/supplier-list',[
            'supplier'=>$allSupplier
        ]);
    }
    public function add()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/supplier/supplier-add');
    }

    public function save()
    {
        $post = $_POST ?? null;
        $supplierName = $post['ten'];
        $folderSupplier = preg_replace('/\s+/', '', $supplierName);
        // Update database
        $result = $this->model->nhacungcap->saveNewSupplier();
        if ($result == true) {
            $_SESSION['addNewSupplierSuccess'] = "Thêm nhà cung cấp mới thành công !";
        } else {
            $_SESSION['addNewSupplierFail'] = "Thêm nhà cung cấp mới thất bại !";
        }
        redirect('supplier/list');
    }

    public function searchName()
    {
        $result = null;
        $nameSupplier = null;
        $param = getParameter();
        if (!empty($param[0])) {
            $nameSupplier = $param[0];
            $result = $this->model->nhacungcap->searchSupplier($nameSupplier);
        }
        $this->layout->set('null');
        $this->view->load('admin/searchSupplierByName', [
            'result' => $result
        ]);
    }

}