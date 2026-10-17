<?php
// index.php - Front Controller (MVC Router)
session_start();
require_once 'config/dbConect.php';

// Kết nối database toàn cục
$pdo = connectDB();

// Autoload các file Model, Controller và Core (không phân biệt hoa/thường trên Linux)
spl_autoload_register(function ($className) {
    $paths = [
        __DIR__ . '/app/controllers/',
        __DIR__ . '/app/models/',
        __DIR__ . '/app/core/' 
    ];
    foreach ($paths as $path) {
        $file = $path . $className . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
        // Fallback: Tìm file không phân biệt chữ hoa/thường trên Linux
        if (is_dir($path)) {
            $files = scandir($path);
            foreach ($files as $f) {
                if (strcasecmp($f, $className . '.php') === 0) {
                    require_once $path . $f;
                    return;
                }
            }
        }
    }
});

// Lấy trang (Controller) và hành động (Action) từ URL
// Hỗ trợ cả: ?controller=DacSanMienBac, ?controller=dac-san-mien-bac, ?controller=dacsanmienbac
$rawController = isset($_GET['controller']) ? trim($_GET['controller']) : '';
if (!empty($rawController)) {
    // Chuẩn hóa tên controller sang PascalCase (ví dụ: dac-san-mien-bac -> DacSanMienBacController)
    $cleanName = str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $rawController)));
    $controllerName = $cleanName . 'Controller';
} else {
    $controllerName = 'TrangChuController';
}

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Kiểm tra nếu Controller tồn tại
if (class_exists($controllerName)) {
    $controllerObject = new $controllerName($pdo);
    if (method_exists($controllerObject, $action)) {
        $controllerObject->$action();
    } else {
        $controllerObject->index();
    }
} else {
    // Nếu không tìm thấy controller yêu cầu, mặc định chuyển về TrangChuController
    if (class_exists('TrangChuController')) {
        $controllerObject = new TrangChuController($pdo);
        $controllerObject->index();
    } else {
        die("<h3>Lỗi hệ thống: Không thể nạp TrangChuController.</h3><p>Vui lòng đảm bảo bạn đã upload đầy đủ thư mục <b>app/controllers/</b> và <b>app/models/</b> lên thư mục <b>htdocs</b> trên hosting!</p>");
    }
}
?>
