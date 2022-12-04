<?php
require_once 'vendor/autoload.php';
define('APP_PATH', './');
define('BASE_URL', 'http://localhost/project_nbCarwash/');

define('CONTROLLER_PATH', APP_PATH . 'controllers/');
define('VIEW_PATH', APP_PATH . 'views/');
define('API_CONTROLLER_PATH', APP_PATH . 'controllers/api/');
define('MODELS_PATH', APP_PATH . 'models/');
define('TRAIT_PATH', APP_PATH . 'traits/');
define('ASSET_PATH',APP_PATH.'assets/');
define('URL_PATH', $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);

error_reporting(E_ALL);
ini_set('display_errors', 'On');


/**
 * @Author: Muhammad Adi Saputro
 * github.com/xyz970
 * 
 * Note:
 * URI adalah karakter umum yang mengidentifikasi sebuah resource web menggunakan nama, lokasi, atau nama dan lokasi resource tersebut. 
 *  Baik resource pada internet, maupun tidak.
 *  ex. localhost/test/index.php/
 * 
 * URL merupakan kepanjangan dari Uniform Resource Locator hal ini berkaitan dengan karakter tertentu.
 *  biasanya terdiri dari angka, huruf dan simbol yang menuju ke alamat www (World Wide Web)
 * ex. http://localhost/test/index.php/
 * URL == URI Tapi URI != URL
 *  
 */

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);
// var_dump($uri);
if (strtolower($uri[2]) == "api") {
    $class = ucfirst($uri[4]);
    $requestMethod = strtolower($_SERVER['REQUEST_METHOD']);
    $targetClass = $class . 'Controller';
    $controller = new $targetClass();
    if (empty($uri[6])) {
        $strMethodName = $requestMethod . 'Index';
    }else{
        $strMethodName = $requestMethod . ucfirst($uri[5]);
    }
    $controller->$strMethodName();
} else {
    if ($uri[2] == "") {
        $indx = new IndexController();
        $indx->getIndex();
    } else {
        $class = ucfirst($uri[2]);
        $requestMethod = strtolower($_SERVER['REQUEST_METHOD']);
        $targetClass = $class . 'Controller';
        $controller = new $targetClass();
        
        if (empty($uri[3])) {
            $strMethodName = $requestMethod . 'Index';
        }else{
            $strMethodName = $requestMethod . ucfirst($uri[3]);
            // var_dump($strMethodName);
        }
        $controller->$strMethodName();
        // var_dump($controller->$strMethodName);
    }
}
