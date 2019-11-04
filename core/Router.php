<?php
function load_app()
{
    // routers
    $config = require BASE_PATH . '/config/config.php';
    $module = !empty($_GET['module']) ? $_GET['module'] : $config['default_module'];
    $action = !empty($_GET['action']) ? $_GET['action'] : $config['default_action'];
    
    // load base and core controller
    require BASE_PATH."/core/Core_Controller.php";
    require BASE_PATH."/core/Base_Controller.php";

    // load model
    require BASE_PATH."/core/Core_Model.php";
    require BASE_PATH."/core/Base_Model.php";

    $controller = ucfirst($module) . '_Controller';
    $controller_path = APP_PATH . "/controllers/{$controller}.php";

    // Check exist File
    if (!file_exists($controller_path)) {
        exit("File not found : " . $controller_path);
    }
    require $controller_path;

    // Check exist Class
    if (!class_exists($controller)) {
        exit("Class not found : " . $controller);
    }

    $object = new $controller;

    // Check exist action
    if (!method_exists($object, $action)) {
        exit("Action not found : " . $action . "()");
    }

    $object->$action();
}
