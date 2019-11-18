<?php
class Mobile_Controller extends Base_Controller
{
    public function index()
    {
        $mobile = $this->model->mobile->getAll();
        $this->view->load('frontend/mobile/index', [
            'mobile' => $mobile
        ]);
    }
    public function upload()
    {
        // Get parameters
        $param = [];
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/mobileshop/static/image/mobile/";
        $link = "static/image/mobile/";
        $error = null;
        if (isset($_POST['mobile'])) {
            $mobile = $_POST['mobile'];
            array_push($param, $mobile);
        }
        if (isset($_POST['logo'])) {
            $logo = $_POST['logo'];
            array_push($param, 1);
        } else {
            array_push($param, 0);
        }
        if (isset($_FILES['image'])) {
            $image = $_FILES['image']['name'];
            array_push($param, $image);
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            if($_FILES['image']['error']<=0){
                if (file_exists($target_file)) {
                    $error = "da ton tai file";
                } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        $error = "upload thanh cong";
                    } else {
                        $error = "upload that bai";
                    };
                }
            }

            array_push($param, $error);
            array_push($param, $link.$_FILES['image']['name']);
        }
        // Insert into database
        $this->model->hinhanh->uploadImage($param);

        $this->view->load('frontend/mobile/upload', [
            'param' => $param
        ]);
    }
}
