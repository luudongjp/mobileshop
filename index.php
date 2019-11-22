<?php
define('BASE_PATH', __DIR__);
define('APP_PATH', BASE_PATH . '/app/code');
$config = require BASE_PATH . '/config/config.php';

define('BASE_URL', $config['host']);

require_once BASE_PATH . '/core/Router.php';

session_start();

$router = new Router();
$router->load_app();
