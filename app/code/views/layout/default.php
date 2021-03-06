<?php
// define()
define('CSS_PATH', BASE_URL . 'static/css/');
define('JS_PATH', BASE_URL . 'static/js/');
define('IMAGE_PATH', BASE_URL . 'static/image/');
$currentUser = isset($_SESSION['username']) ? $_SESSION['username'] : null;
$idUser = isset($_SESSION['idUser']) ? $_SESSION['idUser'] : '';
$userName = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$userPhone = isset($_SESSION['phone']) ? $_SESSION['phone'] : '';
$userAddress = isset($_SESSION['address']) ? $_SESSION['address'] : '';


$isSignedIn = isset($_SESSION['username']) ? true : false;
echo "<script type='text/javascript'>
        var baseurl = '" . BASE_URL . "';
        var idUser = '" . $idUser . "';
        var userName = '" . $userName . "';
        var userPhone = '" . $userPhone . "';
        var userAddress = '" . $userAddress . "';
    </script>";

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
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?php echo IMAGE_PATH; ?>logo/mobileshop.png">
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>../font/simple-line-icon/simple-line-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>../font/gotham/gotham.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>../font/awesome/awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>default.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>home.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>product-detail.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>user-login.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>user-index-edit.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>user-change-password.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>user-wishlist.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>user-cart.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>user-order.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>search-result.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>grid.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>user-forgetPass.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>user-enter-new-pass.css"/>
    <title>Mobile Shop</title>
</head>

<body>

<div class="home-page">
    <a href="#" name="top-page"></a>
    <div class="header-container" id="header-content">
        <div class="top-header">
            <div class="top-nav" id="top-nav">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-md-offset-3 col-lg-offset-3">
                            <div class="navbar-right">
                                <ul class="nav navbar-nav new-menu-nav">
                                    <li class="nav-item-top fist"
                                        style="display: <?php echo ($currentUser != null) ? 'inline-block' : 'none'; ?>">
                                        Hi
                                        <span class="hi-user">
                                           <?php echo $currentUser; ?>
                                        </span>
                                    </li>
                                    <li class="nav-item-top">
                                        <a href="<?php echo ($currentUser != null) ? baseUrl('user/index') : baseUrl('user/login'); ?>">
                                            <div id="customer-account" class="nav-links"></div>
                                        </a>
                                    </li>
                                    <li class="nav-item-top">
                                        <a href="<?php echo ($currentUser != null) ? baseUrl('user/wishlist') : baseUrl('user/login'); ?>">
                                            <div id="customer-wishlist" class="nav-links"></div>
                                        </a>
                                        <span style="display: <?php echo $isSignedIn ? 'block' : 'none'; ?>"
                                              id="wcount">(0)</span>
                                    </li>
                                    <li class="nav-item-top">
                                        <a href="<?php echo ($currentUser != null) ? baseUrl('user/cart') : baseUrl('user/login'); ?>">
                                            <div id="customer-cart" class="nav-links"></div>
                                        </a>
                                        <span style="display: <?php echo $isSignedIn ? 'block' : 'none'; ?>"
                                              id="ccount">(0)</span>
                                    </li>
                                    <li class="nav-item-top"
                                        style="display: <?php echo ($currentUser != null) ? 'block' : 'none'; ?>">
                                        <a href="<?php echo baseUrl('user/logout'); ?>">
                                            <div id="customer-logout" class="nav-links"></div>
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
                            <a href="<?php echo BASE_URL; ?>">
                                <img src="<?php echo IMAGE_PATH; ?>logo/mobileshop.png"/>
                            </a>
                        </div>
                        <div class="col col-md-4">
                            <form method="post" action="<?php echo baseUrl('product/search'); ?>">
                                <div class="search">
                                    <input type="text" name="search" placeholder="B???n t??m g??..."/>
                                    <div class="button-search">
                                        <button type="submit">
                                            <span class="icon-search"></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col col-md-2">
                            <div class="menu-item">
                                <a href="<?php echo baseUrl('product/productByNew'); ?>">S???N PH???M M???I</a>
                            </div>
                        </div>
                        <div class="col col-md-2">
                            <div class="menu-item hover1">
                                <a href="<?php echo baseUrl(''); ?>">H??NG S???N XU???T</a>
                            </div>
                        </div>
                        <div class="col col-md-2">
                            <div class="menu-item hover2">
                                <a href="<?php echo baseUrl(''); ?>">M???C GI??</a>
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
                $number_nsx_1_col = ceil($number_nsx / 4);  // we have 4 column, each column is col-md-3
                ?>
                <div class="row hover-nhasanxuat">
                    <div class="col col-md-3">
                        <?php for ($i = 0; $i <= $number_nsx_1_col - 1; $i++) : ?>
                            <div class="item item-<?php echo $result[$i]['idNhaSanXuat']; ?>">
                                <a href="<?php echo baseUrl('product/productByManufacturer/' . $result[$i]['idNhaSanXuat']); ?>"><?php echo $result[$i]['tenNhaSX']; ?></a>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <div class="col col-md-3">
                        <?php for ($j = $number_nsx_1_col; $j <= 2 * $number_nsx_1_col - 1; $j++) : ?>
                            <div class="item item-<?php echo $result[$j]['idNhaSanXuat']; ?>">
                                <a href="<?php echo baseUrl('product/productByManufacturer/' . $result[$j]['idNhaSanXuat']); ?>"><?php echo $result[$j]['tenNhaSX']; ?></a>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <div class="col col-md-3">
                        <?php for ($k = 2 * $number_nsx_1_col; $k <= 3 * $number_nsx_1_col - 1; $k++) : ?>
                            <div class="item item-<?php echo $result[$k]['idNhaSanXuat']; ?>">
                                <a href="<?php echo baseUrl('product/productByManufacturer/' . $result[$k]['idNhaSanXuat']); ?>"><?php echo $result[$k]['tenNhaSX']; ?></a>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <div class="col col-md-3">
                        <?php for ($v = 3 * $number_nsx_1_col; $v <= 4 * $number_nsx_1_col - 1; $v++) : ?>
                            <div class="item item-<?php echo $result[$v]['idNhaSanXuat']; ?>">
                            <a href="<?php echo baseUrl('product/productByManufacturer/' . $result[$v]['idNhaSanXuat']); ?>"><?php echo $result[$v]['tenNhaSX']; ?></a>
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
                            <a href="<?php echo baseUrl('product/productByMoney/1000000/0'); ?>">D?????i 1 tri???u</a>
                        </div>
                    </div>
                    <div class="col col-md-2">
                        <div class="item-mucgia">
                            <a href="<?php echo baseUrl('product/productByMoney/1000000/3000000'); ?>">T??? 1 ?????n 3 tri???u </a>
                        </div>
                    </div>
                    <div class="col col-md-2">
                        <div class="item-mucgia">
                            <a href="<?php echo baseUrl('product/productByMoney/3000000/6000000'); ?>">T??? 3 ?????n 6 tri???u</a>
                        </div>
                    </div>
                    <div class="col col-md-2">
                        <div class="item-mucgia">
                            <a href="<?php echo baseUrl('product/productByMoney/6000000/10000000'); ?>">T??? 6 ?????n 10 tri???u </a>
                        </div>
                    </div>
                    <div class="col col-md-2">
                        <div class="item-mucgia">
                            <a href="<?php echo baseUrl('product/productByMoney/10000000/15000000'); ?>">T??? 10 ?????n 15 tri???u </a>
                        </div>
                    </div>
                    <div class="col col-md-2">
                        <div class="item-mucgia">
                            <a href="<?php echo baseUrl('product/productByMoney/15000000/0'); ?>">Tr??n 15 tri???u </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="loading">
        <img src="<?php echo IMAGE_PATH; ?>loading/loading.gif"/>
    </div>
    <div class="success">
        <div id="success"></div>
    </div>
    <div class="error">
        <div id="error"></div>
    </div>

    <!-- Dynamic content area is where view be included inside -->
    <div class="dynamic-content">
        <?php echo $content; ?>
    </div>

    <div id="footer">
        <ul>
            <li><i class="f1"></i><span>Giao h??ng ho??? t???c trong 1 gi???</span></li>
            <li><i class="f2"></i><span>Thanh to??n ti???n l???i b???ng ti???n m???t</span></li>
            <li><i class="f3"></i><span>Tr???i nghi???m s???n ph???m t???i nh??</span></li>
            <li><i class="f4"></i><span>L???i ?????i t???i nh?? trong 1 ng??y</span></li>
            <li><i class="f5"></i><span>H??? tr??? su???t th???i gian s??? d???ng. Hotline: <a href="tel:0965351741">0965351741</a></span>
            </li>
        </ul>
    </div>
    <div class="rowfoot1">
        <ul class="colfoot">
            <li>
                <a href="">Gi???i thi???u v??? c??ng ty</a>
            </li>
            <li>
                <a href="">C??u h???i th?????ng g???p mua h??ng</a>
            </li>
            <li>
                <a href="">Ch??nh s??ch b???o m???t</a>
            </li>
            <li>
                <a href="">Quy ch??? ho???t ?????ng</a>
            </li>
        </ul>
        <ul class="colfoot">
            <li>
                <a href="">Tin tuy???n d???ng</a>
            </li>
            <li>
                <a href="">Tin khuy???n m??i</a>
            </li>
            <li>
                <a href="">H?????ng d???n mua h??ng</a>
            </li>
            <li>
                <a href="">Ch??nh s??ch ?????i tr???</a>
            </li>
        </ul>
        <ul class="colfoot col3">
            <li>
                <a href="">H??? th???ng c???a h??ng</a>
            </li>
            <li>
                <a href="">H??? th???ng b??o h??nh</a>
            </li>
            <li>
                <a href="">G???i g??p ?? khi???u n???i</a>
            </li>
            <li>
                <a href="">Xem b???n mobile</a>
            </li>
        </ul>
        <ul class="colfoot collast">
            <li>
                    <span>
                        G???i mua h??ng : 0965351741 (7:30-22:00)
                    </span>
            </li>
            <li>
                    <span>
                        G???i khi???u n???i : 0965351741 (8:00-21:30)
                    </span>
            </li>
            <li>
                    <span>
                        G???i b???o h??nh : 0965351741 (8:00-21:00)
                    </span>
            </li>
            <li>
                    <span>
                        G???i k??? thu???t : 0965351741 (7:30-22:00)
                    </span>
            </li>
        </ul>
    </div>
    <div class="rowfoot2">
        <div class="foot-left">
            <p>
                C??ng ty TNHH MobileShop. ?? 2019 All Rights Reserved. ?????a ch???: S??? 1 ?????i C??? Vi???t, Gi???i Ph??ng, H?? N???i.
            </p>
        </div>
        <div class="foot-right">
            <div class="social-network">
                <a href="">
                    <img src="<?php echo IMAGE_PATH; ?>logo/mobileshop.png"/>
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

<script type="text/javascript" src="<?php echo JS_PATH; ?>bootstrap/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>frontend/default.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>frontend/login-register.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>frontend/user-edit-info.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>frontend/user-change-password.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>frontend/user-cart.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>frontend/user-change-newpass.js"></script>

</body>

</html>