<!DOCTYPE html>
<html lang="en">
<?php
define('CSS_PATH', 'static/css/');
define('JS_PATH', 'static/js/');
define('IMAGE_PATH', 'static/image/');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>../font/simple-line-icon/simple-line-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>../font/gotham/gotham.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>home.css" />
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
                        <div class="row">
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
                                <div class="menu-item">
                                    <a href="">HÃNG SẢN XUẤT</a>
                                </div>
                            </div>
                            <div class="col col-md-2">
                                <div class="menu-item">
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
            <div class="">

            </div>
        </div>
        <article>
            <!-- <h1><?php echo $content ?></h1> -->
        </article>
        <footer>

        </footer>
    </div>

    <script type="text/javascript" src="<?php echo JS_PATH; ?>bootstrap/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH; ?>bootstrap/bootstrap.min.js"></script>
</body>

</html>