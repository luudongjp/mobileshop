<!DOCTYPE html>
<html lang="en">
<?php
// define()
define('CSS_PATH', BASE_URL.'static/css/');
define('JS_PATH', BASE_URL.'static/js/');
define('IMAGE_PATH', BASE_URL.'static/image/');
?>
<?php
// Get all category from database to show on header
try {
    $conn = null;

    $config = require BASE_PATH . "/config/database.php";
    $host = $config['host'];
    $username = $config['username'];
    $password = $config['password'];
    $database = $config['database'];

    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8");
    $stmt = $conn->prepare("SELECT tenNhaSX, idNhaSanXuat FROM nhasanxuat");
    $stmt->execute();

    // set the resulting array to associative
    // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?php echo IMAGE_PATH; ?>logo/mobileshop.png">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>../font/simple-line-icon/simple-line-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>../font/gotham/gotham.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>../font/awesome/awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>default.css" />
    <title>Mobile Shop</title>
</head>

<body>

    <div class="home-page">
        <div class="header-container" id="header-content">
            <div class="top-header">
                <div class="top-nav" id="top-nav">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-md-offset-3 col-lg-offset-3">
                                <div class="navbar-right">
                                    <ul class="nav navbar-nav new-menu-nav">
                                        <li class="nav-item-top">
                                            <a href="">
                                                <div id="customer-account" class="nav-links"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item-top">
                                            <a href="">
                                                <div id="customer-wishlist" class="nav-links"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item-top">
                                            <a href="">
                                                <div id="customer-cart" class="nav-links"></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-top" id="menu-top">
                <div class="header-menu">
                    <div class="container menu-container">
                        <div class="row cate-title">
                            <div class="col col-md-2">
                                <a href="">
                                    <img src="<?php echo IMAGE_PATH; ?>logo/mobileshop.png" />
                                </a>
                            </div>
                            <div class="col col-md-4">
                                <form action="">
                                    <div class="search">
                                        <input type="text" name="search" placeholder="Bạn tìm gì..." />
                                        <div class="button-search">
                                            <button type="submit">
                                                <span class="icon-search"></span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col col-md-2">
                                <div class="menu-item hover1">
                                    <a href="">HÃNG SẢN XUẤT</a>
                                </div>
                            </div>
                            <div class="col col-md-2">
                                <div class="menu-item hover2">
                                    <a href="">MỨC GIÁ</a>
                                </div>
                            </div>
                            <div class="col col-md-2">
                                <div class="menu-item">
                                    <a href="">SẢN PHẨM MỚI</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="container hover-container1">
                    <?php
                    $number_nsx = sizeof($result);
                    $number_nsx_1_col =  ceil($number_nsx / 4);  // we have 4 column, each column is col-md-3

                    ?>
                    <div class="row hover-nhasanxuat">
                        <div class="col col-md-3">
                            <?php for ($i = 0; $i <= $number_nsx_1_col - 1; $i++) : ?>
                                <div class="item item-<?php echo $result[$i]['idNhaSanXuat']; ?>">
                                    <a href=""><?php echo $result[$i]['tenNhaSX']; ?></a>
                                </div>
                            <?php endfor; ?>
                        </div>
                        <div class="col col-md-3">
                            <?php for ($j = $number_nsx_1_col; $j <= 2 * $number_nsx_1_col - 1; $j++) : ?>
                                <div class="item item-<?php echo $result[$j]['idNhaSanXuat']; ?>">
                                    <a href=""><?php echo $result[$j]['tenNhaSX']; ?></a>
                                </div>
                            <?php endfor; ?>
                        </div>
                        <div class="col col-md-3">
                            <?php for ($k = 2 * $number_nsx_1_col; $k <= 3 * $number_nsx_1_col - 1; $k++) : ?>
                                <div class="item item-<?php echo $result[$k]['idNhaSanXuat']; ?>">
                                    <a href=""><?php echo $result[$k]['tenNhaSX']; ?></a>
                                </div>
                            <?php endfor; ?>
                        </div>
                        <div class="col col-md-3">
                            <?php for ($v = 3 * $number_nsx_1_col; $v <= 4 * $number_nsx_1_col - 1; $v++) : ?>
                                <div class="item item-<?php echo $result[$v]['idNhaSanXuat']; ?>">
                                    <a href=""><?php echo $result[$v]['tenNhaSX']; ?></a>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="container hover-container2">
                    <div class="row hover-mucgia">
                        <div class="col col-md-2">
                            <div class="item-mucgia">
                                <a href="">Dưới 1 triệu</a>
                            </div>
                        </div>
                        <div class="col col-md-2">
                            <div class="item-mucgia">
                                <a href="">Từ 1 đến 3 triệu </a>
                            </div>
                        </div>
                        <div class="col col-md-2">
                            <div class="item-mucgia">
                                <a href="">Từ 3 đến 6 triệu</a>
                            </div>
                        </div>
                        <div class="col col-md-2">
                            <div class="item-mucgia">
                                <a href="">Từ 6 đến 10 triệu </a>
                            </div>
                        </div>
                        <div class="col col-md-2">
                            <div class="item-mucgia">
                                <a href="">Từ 10 đến 15 triệu </a>
                            </div>
                        </div>
                        <div class="col col-md-2">
                            <div class="item-mucgia">
                                <a href="">Trên 15 triệu </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dynamic content area is where view be included inside -->
        <div class="dynamic-content">
            <?php echo $content ?>
        </div>

        <div id="footer">
            <ul>
                <li><i class="f1"></i><span>Giao hàng hoả tốc trong 1 giờ</span></li>
                <li><i class="f2"></i><span>Thanh toán tiện lợi bằng tiền mặt</span></li>
                <li><i class="f3"></i><span>Trải nghiệm sản phẩm tại nhà</span></li>
                <li><i class="f4"></i><span>Lỗi đổi tại nhà trong 1 ngày</span></li>
                <li><i class="f5"></i><span>Hỗ trợ suốt thời gian sử dụng. Hotline: <a href="tel:0965351741">0965351741</a></span></li>
            </ul>
        </div>
        <div class="rowfoot1">
            <ul class="colfoot">
                <li>
                    <a href="">Giới thiệu về công ty</a>
                </li>
                <li>
                    <a href="">Câu hỏi thường gặp mua hàng</a>
                </li>
                <li>
                    <a href="">Chính sách bảo mật</a>
                </li>
                <li>
                    <a href="">Quy chế hoạt động</a>
                </li>
            </ul>
            <ul class="colfoot">
                <li>
                    <a href="">Tin tuyển dụng</a>
                </li>
                <li>
                    <a href="">Tin khuyến mãi</a>
                </li>
                <li>
                    <a href="">Hướng dẫn mua hàng</a>
                </li>
                <li>
                    <a href="">Chính sách đổi trả</a>
                </li>
            </ul>
            <ul class="colfoot col3">
                <li>
                    <a href="">Hệ thống cửa hàng</a>
                </li>
                <li>
                    <a href="">Hệ thống báo hành</a>
                </li>
                <li>
                    <a href="">Gửi góp ý khiếu nại</a>
                </li>
                <li>
                    <a href="">Xem bản mobile</a>
                </li>
            </ul>
            <ul class="colfoot collast">
                <li>
                    <span>
                        Gọi mua hàng : 0965351741 (7:30-22:00)
                    </span>
                </li>
                <li>
                    <span>
                        Gọi khiếu nại : 0965351741 (8:00-21:30)
                    </span>
                </li>
                <li>
                    <span>
                        Gọi bảo hành : 0965351741 (8:00-21:00)
                    </span>
                </li>
                <li>
                    <span>
                        Gọi kỹ thuật : 0965351741 (7:30-22:00)
                    </span>
                </li>
            </ul>
        </div>
        <div class="rowfoot2">
            <div class="foot-left">
                <p>
                    Công ty TNHH MobileShop. © 2019 All Rights Reserved. Địa chỉ: Số 1 Đại Cồ Việt, Giải Phóng, Hà Nội.
                </p>
            </div>
            <div class="foot-right">
                <div class="social-network">
                    <a href="">
                        <img src="<?php echo IMAGE_PATH; ?>logo/mobileshop.png" />
                    </a>
                    <a href="">
                        <div class="i-facebook"></div>
                    </a>
                    <a href="">
                        <div class="i-youtube"></div>
                    </a>
                    <a href="">
                        <div class="i-instagram"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo JS_PATH; ?>bootstrap/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH; ?>bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).mousemove(function() {
                /* style when hover HANG-SAN-XUAT*/
                if ($('.hover1').is(':hover')) {
                    $('.hover-container1').css('display', 'block')
                }
                if ((!$('.hover1').is(':hover')) && (!$('.hover-container1').is(':hover'))) {
                    $('.hover-container1').css('display', 'none')
                }
                /* style when hover MUC GIA*/
                if ($('.hover2').is(':hover')) {
                    $('.hover-container2').css('display', 'block')
                }
                if ((!$('.hover2').is(':hover')) && (!$('.hover-container2').is(':hover'))) {
                    $('.hover-container2').css('display', 'none')
                }
            })
        })
    </script>
</body>

</html>