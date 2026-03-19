<?php
// index.php
session_start();
require_once 'config/dbConect.php';

// Kết nối database toàn cục
$pdo = connectDB();

// Autoload các file Model và Controller
spl_autoload_register(function ($className) {
    $paths = [
        'app/controllers/',
        'app/models/',
        'app/core/' 
    ];
    foreach ($paths as $path) {
        $file = $path . $className . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Lấy trang (Controller) và hành động (Action) từ URL
// Ví dụ: index.php?controller=SanPham&action=chitiet&id=1
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'TrangChuController';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Kiểm tra nếu Controller tồn tại
if (class_exists($controllerName)) {
    $controllerObject = new $controllerName($pdo);
    if (method_exists($controllerObject, $action)) {
        // Gọi hành động
        $controllerObject->$action();
    } else {
        // Mặc định gọi action index nếu không tìm thấy action cụ thể
        $controllerObject->index();
    }
} else {
    // Nếu không tìm thấy Controller, mặc định quay về Trang Chủ
    $controllerObject = new TrangChuController($pdo);
    $controllerObject->index();
}
?>
