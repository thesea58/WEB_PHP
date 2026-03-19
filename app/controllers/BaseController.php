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
        
        $view_path = "app/views/client/{$view}.php";
        
        if (file_exists($view_path)) {
            include_once $view_path;
        } else {
            echo "Lỗi: Không tìm thấy file giao diện tại $view_path";
        }
    }
}
