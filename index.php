<?php

//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


require_once './config/config.php';
require_once './app/core/Database.php';
require_once './app/controllers/BaseController.php';
require_once './app/models/BaseModel.php';


require 'vendor/autoload.php';


session_start();
if (!isset($_SESSION['is_login'])) {
    $_SESSION['is_login'] = false;
}


// Parse the URL
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';

// Check if the 'url' parameter is empty or not set
if (empty($url)) {
    header("Location: " . BASEPATH . "/home");
    exit();
}

$url = explode('/', $url);

// Load the appropriate controller and execute the action
$controllerName = ucfirst($url[0]) . 'Controller';
$controllerFile = './app/controllers/' . $controllerName . '.php';

require_once './app/views/base/head.php';


if (file_exists($controllerFile)) {
    include_once $controllerFile;
    $controller = new $controllerName();
    $action = isset($url[1]) ? $url[1] : 'index';
    if (method_exists($controller, $action)) {
        $controller->{$action}();
    } else {
        showError();
    }
} else {
    showError();
}

require_once './app/views/base/foot.php';

function showError()
{
    $controllerError = 'ErrorController';
    $controllerErrorFile = './app/controllers/' . $controllerError . '.php';
    require_once $controllerErrorFile;
    $action = 'index';
    $controller = new $controllerError();
    $controller->{$action}();
}