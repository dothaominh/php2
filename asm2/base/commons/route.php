<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
$router->get('/', function(){
    return "trang chủ";
});
$router->get('list-product', [App\Controllers\productController::class, 'getproduct']);
// chức năng thêm
$router->get('add-product', [App\Controllers\productController::class, 'addproduct']);
$router->post('post-product', [App\Controllers\productController::class, 'postproduct']);
// chức năng sửa
$router->get('detail-product/{id}', [App\Controllers\productController::class, 'detailproduct']);
$router->post('edit-product/{id}', [App\Controllers\productController::class, 'editproduct']);
// chức năng xóa
$router->get('delete-product/{id}', [App\Controllers\productController::class, 'deleteproduct']);




$router->get('list-category', [App\Controllers\categoryController::class, 'getcategory']);
// chức năng thêm
$router->get('add-category', [App\Controllers\categoryController::class, 'addcategory']);
$router->post('post-category', [App\Controllers\categoryController::class, 'postcategory']);
// chức năng sửa
$router->get('detail-category/{id}', [App\Controllers\categoryController::class, 'detailcategory']);
$router->post('edit-category/{id}', [App\Controllers\categoryController::class, 'editcategory']);
// chức năng xóa
$router->get('delete-category/{id}', [App\Controllers\categoryController::class, 'deletecategory']);
# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);
// echo $url;
// die();
// Print out the value returned from the dispatched function
echo $response;


?>