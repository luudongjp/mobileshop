<?php
define('BASE_PATH', __DIR__);
define('APP_PATH', BASE_PATH . '/app/frontend');
define('BASE_URL', 'localhost/mobileshop');

require BASE_PATH . '/core/Router.php';

load_app();
