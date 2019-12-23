<?php


class Product_Controller extends Base_Controller
{
    public function list()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $allMobiles = $this->model->mobile->getAll('mobile', null, null);
        // Link mobile and it's images ( base image and other images)
        foreach ($allMobiles as &$mobile) {
            linkImageAndMobile($mobile, $this->model->hinhanh->getBaseImage($mobile['idMobile']), []);
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/product/product-list', [
            'mobiles' => $allMobiles
        ]);
    }

    public function index()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $param = getParameter();
        if (!empty($param[0])) {
            if (intval($param[0]) != 0) {
                $mobile = $this->model->mobile->getById('mobile', 'idMobile', $param[0]);
                $this->layout->set('admin_default');
                linkImageAndMobile($mobile, $this->model->hinhanh->getBaseImage($mobile['idMobile']), $this->model->hinhanh->getOtherImage($mobile['idMobile']));
                $this->view->load('admin/product/product-index', [
                    'mobile' => $mobile
                ]);
            } else {
                redirect('notfound/index');
            }
        } else {
            redirect('notfound/index');
        }
    }

    public function search()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $key = isset($_POST['searchProduct']) ? $_POST['searchProduct'] : null;
        if ($key == null) {
            redirect('product/list');
        } else {
            // Tìm kiếm tên sản phẩm theo key là tên sản phẩm hoặc tên
            $arrayProducts = $this->model->mobile->search($key);
            // Link mobile and it's images ( base image and other images)
            foreach ($arrayProducts as &$mobile) {
                linkImageAndMobile($mobile, $this->model->hinhanh->getBaseImage($mobile['idMobile']), $this->model->hinhanh->getOtherImage($mobile['idMobile']));
            }
            $this->layout->set('admin_default');
            $this->view->load('admin/product/product-list', [
                'key' => $key,
                'mobiles' => $arrayProducts
            ]);
        }
    }

    public function searchName()
    {
        $result = null;
        $namePhone = null;
        $param = getParameter();
        if (!empty($param[0])) {
            $namePhone = $param[0];
            $result = $this->model->mobile->searchPhone($namePhone);
        }
        $this->layout->set('null');
        $this->view->load('admin/searchPhoneByName', [
            'result' => $result
        ]);
    }

    public function add()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $listTheloai = $this->model->theloai->getAll('theloai', null, null);
        $listNSX = $this->model->nhasanxuat->getAll('nhasanxuat', null, null);
        $listNCC = $this->model->nhacungcap->getAll('nhacungcap', null, null);
        $this->layout->set('admin_default');
        $this->view->load('admin/product/product-add', [
            'listTheloai' => $listTheloai,
            'listNSX' => $listNSX,
            'listNCC' => $listNCC
        ]);
    }

    public function edit()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $listTheloai = $this->model->theloai->getAll('theloai', null, null);
        $listNSX = $this->model->nhasanxuat->getAll('nhasanxuat', null, null);
        $listNCC = $this->model->nhacungcap->getAll('nhacungcap', null, null);
        $param = getParameter();
        if (!empty($param[0])) {
            if (intval($param[0]) != 0) {
                $mobile = $this->model->mobile->getById('mobile', 'idMobile', $param[0]);
                $this->layout->set('admin_default');
                linkImageAndMobile($mobile, $this->model->hinhanh->getBaseImage($mobile['idMobile']), $this->model->hinhanh->getOtherImage($mobile['idMobile']));
                $this->view->load('admin/product/product-edit', [
                    'mobile' => $mobile,
                    'listTheloai' => $listTheloai,
                    'listNSX' => $listNSX,
                    'listNCC' => $listNCC
                ]);
            } else {
                redirect('notfound/index');
            }
        } else {
            redirect('notfound/index');
        }
    }

    public function editImage()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $param = getParameter();
        if (!empty($param[0])) {
            if (intval($param[0]) != 0) {
                $mobile = $this->model->mobile->getById('mobile', 'idMobile', $param[0]);
                $this->layout->set('admin_default');
                linkImageAndMobile($mobile, $this->model->hinhanh->getBaseImage($mobile['idMobile']), $this->model->hinhanh->getOtherImage($mobile['idMobile']));
                $this->view->load('admin/product/product-editImage', [
                    'mobile' => $mobile
                ]);
            } else {
                redirect('notfound/index');
            }
        } else {
            redirect('notfound/index');
        }
    }

    // save new mobile
    public function save()
    {
        $post = $_POST ?? null;
        $mobileName = $post['ten'];
        // loai bo khoang trang trong ten dien thoai, ghep lai thanh ten folder
        $folderMobile = preg_replace('/\s+/', '', $mobileName);
        $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/mobileshop/static/image/mobile/' . $folderMobile . '/';
        mkdir($uploaddir);
        chmod($uploaddir, 0777);
        $logo = $uploaddir . basename($_FILES['logo']['name']);
        $anh1 = $uploaddir . basename($_FILES['anh1']['name']);
        $anh2 = $uploaddir . basename($_FILES['anh2']['name']);
        $anh3 = $uploaddir . basename($_FILES['anh3']['name']);
        $anh4 = $uploaddir . basename($_FILES['anh4']['name']);
        // Upload 5 image into folder
        move_uploaded_file($_FILES['logo']['tmp_name'], $logo);
        move_uploaded_file($_FILES['anh1']['tmp_name'], $anh1);
        move_uploaded_file($_FILES['anh2']['tmp_name'], $anh2);
        move_uploaded_file($_FILES['anh3']['tmp_name'], $anh3);
        move_uploaded_file($_FILES['anh4']['tmp_name'], $anh4);
        exec("chmod -R 0777 '" . $uploaddir . "'");
        // Save name file and url to session
        $_SESSION['nameLogo'] = $_FILES['logo']['name'];
        $_SESSION['urlLogo'] = 'static/image/mobile/' . $folderMobile . '/' . $_FILES['logo']['name'];
        $_SESSION['nameAnh1'] = $_FILES['anh1']['name'];
        $_SESSION['urlAnh1'] = 'static/image/mobile/' . $folderMobile . '/' . $_FILES['anh1']['name'];
        $_SESSION['nameAnh2'] = $_FILES['anh2']['name'];
        $_SESSION['urlAnh2'] = 'static/image/mobile/' . $folderMobile . '/' . $_FILES['anh2']['name'];
        $_SESSION['nameAnh3'] = $_FILES['anh3']['name'];
        $_SESSION['urlAnh3'] = 'static/image/mobile/' . $folderMobile . '/' . $_FILES['anh3']['name'];
        $_SESSION['nameAnh4'] = $_FILES['anh4']['name'];
        $_SESSION['urlAnh4'] = 'static/image/mobile/' . $folderMobile . '/' . $_FILES['anh4']['name'];
        // Get id theloai, nhasanxuat, nhacungcap
        $theloai = $this->model->theloai->getAll('theloai', 'tentheloai', $_POST['theloai']);
        $_SESSION['idTheloai'] = $theloai[0]['idTheloai'];
        $nsx = $this->model->nhasanxuat->getAll('nhasanxuat', 'tenNhaSX', $_POST['nhasanxuat']);
        $_SESSION['idNSX'] = $nsx[0]['idNhaSanXuat'];
        // Update database
        $result = $this->model->mobile->saveNewMobile();
        // Unset session value
        unset($_SESSION['nameLogo']);
        unset($_SESSION['nameAnh1']);
        unset($_SESSION['nameAnh2']);
        unset($_SESSION['nameAnh3']);
        unset($_SESSION['nameAnh4']);
        unset($_SESSION['urlLogo']);
        unset($_SESSION['urlAnh1']);
        unset($_SESSION['urlAnh2']);
        unset($_SESSION['urlAnh3']);
        unset($_SESSION['urlAnh4']);
        unset($_SESSION['idTheloai']);
        unset($_SESSION['idNSX']);
        if ($result == true) {
            $_SESSION['addNewMobileSuccess'] = "Thêm điện thoại mới thành công !";
        } else {
            $_SESSION['addNewMobileFail'] = "Thêm điện thoại mới thất bại !";
        }
        redirect('product/add');
    }

    public function saveEdit()
    {
        // Get id theloai, nhasanxuat, nhacungcap
        $theloai = $this->model->theloai->getAll('theloai', 'tentheloai', $_POST['etheloai']);
        $_SESSION['theloaiId'] = $theloai[0]['idTheloai'];
        $nsx = $this->model->nhasanxuat->getAll('nhasanxuat', 'tenNhaSX', $_POST['enhasanxuat']);
        $_SESSION['nsxId'] = $nsx[0]['idNhaSanXuat'];
        $result = $this->model->mobile->saveEditMobile();
        if ($result == true) {
            $_SESSION['saveMobileSuccess'] = "Cập nhật thông tin điện thoại thành công !";
        } else {
            pretty($result);
            $_SESSION['saveMobileFail'] = "Bạn chưa thay đổi thông tin gì !";
        }
        unset($_SESSION['theloaiId']);
        unset($_SESSION['nsxId']);
        redirect('product/index/' . $_POST['idMobile']);
    }

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
            'listBasePrice' => $arrayMobiles
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
            'listNew' => $arrayMobiles
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
            'listExpress' => $arrayMobiles
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
