<?php
// app/controllers/BaseController.php

class BaseController {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Hàm hiển thị giao diện
     * @param string $view Tên file view (nằm trong app/views/client/)
     * @param array $data Dữ liệu truyền sang view
     */
    protected function render($view, $data = []) {
        // Giải nén mảng data thành các biến riêng lẻ để dùng trong view
        extract($data);
        
        $dir = __DIR__ . '/../views/client/';
        $view_path = $dir . "{$view}.php";
        
        // Hỗ trợ cả tên file chữ thường hoặc khác chữ hoa/thường trên máy chủ Linux
        if (!file_exists($view_path)) {
            $view_lower = strtolower($view);
            if (file_exists($dir . "{$view_lower}.php")) {
                $view_path = $dir . "{$view_lower}.php";
            } elseif (is_dir($dir)) {
                $files = scandir($dir);
                foreach ($files as $f) {
                    if (strcasecmp($f, $view . '.php') === 0 || strcasecmp($f, $view_lower . '.php') === 0) {
                        $view_path = $dir . $f;
                        break;
                    }
                }
            }
        }
        
        if (file_exists($view_path)) {
            include_once $view_path;
        } else {
            echo "Lỗi: Không tìm thấy file giao diện tại $view_path";
        }
    }
}
