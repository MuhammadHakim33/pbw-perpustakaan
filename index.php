<?php

require_once 'controllers/HomeController.php';
require_once 'controllers/BookController.php';
require_once 'controllers/AdminController.php';
require_once 'controllers/AuthController.php';

// Membersihkan url
$url = ltrim($_SERVER['REQUEST_URI'], '/');
$url = explode('/', $url);

// Default
$controller = 'home';
$method = 'index';
$params = [];


if(!empty($url[0])) {
    $controller = $url[0];
    unset($url[0]);
}
if(!empty($url[1])) {
    $method = $url[1];
    unset($url[1]);
}
if(!empty($url)) {
    $params = $url;
}


// Routing
switch($controller) {
    case 'home':
        $home = new HomeController();
        call_user_func_array([$home, $method], $params);
        break;
    case 'book':
        $book = new BookController();
        call_user_func_array([$book, $method], $params);
        break;
    case 'admin':
        $admin = new AdminController();
        call_user_func_array([$admin, $method], $params);
        break;
    case 'auth':
        $auth = new AuthController();
        call_user_func_array([$auth, $method], $params);
        break;
    default:
        echo '404';
        break;
}



// if(!method_exists($book, $url[1])) {
//     call_user_func_array([$book, 'index'], $params);
//     break;
// }
// var_dump($url);
// var_dump($controller);
// var_dump($method);
// die;

// var_dump($params);

// echo $controller;
// echo '<br>';
// echo $method;
// echo '<br>';
// var_dump($params);


// case 'home/book':
//     $home->book();
//     break;
// case 'home/return':
//     $id_peminjaman = $url[2];
//     $home->bringback($id_peminjaman);
//     break;