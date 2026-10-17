<?php
// index.php - Front Controller (MVC Router)
session_start();

try {
    // Nạp file cấu hình database (hỗ trợ cả hoa/thường trên Linux)
    $dbConfigPath = __DIR__ . '/config/dbConect.php';
    if (!file_exists($dbConfigPath) && file_exists(__DIR__ . '/config/dbconect.php')) {
        $dbConfigPath = __DIR__ . '/config/dbconect.php';
    }
    require_once $dbConfigPath;

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
    $rawController = preg_replace('/\.php$/i', '', $rawController);

    if (!empty($rawController)) {
        // Chuẩn hóa tên controller sang PascalCase (ví dụ: dac-san-mien-bac -> DacSanMienBacController)
        $cleanName = str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $rawController)));
        $controllerName = $cleanName . 'Controller';
    } else {
        $controllerName = 'TrangChuController';
    }

    $action = isset($_GET['action']) ? trim($_GET['action']) : 'index';

    // Kiểm tra nếu Controller tồn tại
    if (class_exists($controllerName)) {
        $controllerObject = new $controllerName($pdo);
        if (method_exists($controllerObject, $action)) {
            $controllerObject->$action();
        } else {
            // Thử bỏ dấu gạch ngang/gạch dưới trong action (ví dụ: dang-nhap -> dangnhap)
            $cleanAction = str_replace(['-', '_'], '', $action);
            if (method_exists($controllerObject, $cleanAction)) {
                $controllerObject->$cleanAction();
            } else {
                $controllerObject->index();
            }
        }
    } else {
        // Nếu không tìm thấy controller yêu cầu, mặc định chuyển về TrangChuController
        if (class_exists('TrangChuController')) {
            $controllerObject = new TrangChuController($pdo);
            $controllerObject->index();
        } else {
            die("<h3>Lỗi hệ thống: Không tìm thấy thư mục Controller trên hosting.</h3><p>Vui lòng dùng <b>FileZilla</b> tải đầy đủ thư mục <b>app/controllers/</b> và <b>app/models/</b> lên thư mục <b>htdocs/app/</b> trên InfinityFree!</p>");
        }
    }
} catch (Throwable $e) {
    echo "<div style='font-family:sans-serif;max-width:700px;margin:40px auto;padding:20px;border:1px solid #f5c2c7;background:#f8d7da;color:#842029;border-radius:8px;'>";
    echo "<h3>⚠️ Lỗi khởi chạy hệ thống</h3>";
    echo "<p><b>Chi tiết lỗi:</b> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><small>File: " . htmlspecialchars($e->getFile()) . " (Dòng " . $e->getLine() . ")</small></p>";
    echo "</div>";
}
?>
