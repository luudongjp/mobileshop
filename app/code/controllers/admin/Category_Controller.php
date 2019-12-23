<?php


class Category_Controller extends Base_Controller
{
    public function list()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $allCategory = $this->model->theloai->getCategory();
        $this->layout->set('admin_default');
        $this->view->load('admin/category/category-list', [
            'categorys' => $allCategory
        ]);
    }

    public function add()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/category/category-add');
    }

    public function save()
    {
        $post = $_POST ?? null;
        $categoryName = $post['ten'];
        $folderCategory = preg_replace('/\s+/', '', $categoryName);
        // Update database
        $result = $this->model->theloai->saveNewCategory();
        if ($result == true) {
            $_SESSION['addNewCategorySuccess'] = "Thêm thể loại mới thành công !";
        } else {
            $_SESSION['addNewCategoryFail'] = "Thêm thể loại mới thất bại !";
        }
        redirect('category/list');
    }

    public function searchName()
    {
        $result = null;
        $nameCategory = null;
        $param = getParameter();
        if (!empty($param[0])) {
            $nameCategory = $param[0];
            $result = $this->model->theloai->searchCategory($nameCategory);
        }
        $this->layout->set('null');
        $this->view->load('admin/searchCategoryByName', [
            'result' => $result
        ]);
    }
}