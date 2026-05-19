<?php
$url = $_GET['url'] ?? '';
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

// Xác định controller (mặc định: Product)
$controllerName = (isset($url[0]) && $url[0] !== '')
    ? ucfirst(strtolower($url[0])) . 'Controller'
    : 'ProductController';

// Xác định action (mặc định: index)
$action = (isset($url[1]) && $url[1] !== '') ? $url[1] : 'index';

// Kiểm tra file controller tồn tại
$controllerFile = 'app/controllers/' . $controllerName . '.php';
if (!file_exists($controllerFile)) {
    http_response_code(404);
    die('<h2>404 - Controller không tồn tại: ' . htmlspecialchars($controllerName) . '</h2>');
}

require_once $controllerFile;
$controller = new $controllerName();

// Kiểm tra action tồn tại
if (!method_exists($controller, $action)) {
    http_response_code(404);
    die('<h2>404 - Action không tồn tại: ' . htmlspecialchars($action) . '</h2>');
}

// Gọi action với tham số còn lại
call_user_func_array([$controller, $action], array_slice($url, 2));
