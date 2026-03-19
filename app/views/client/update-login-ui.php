<?php
/**
 * Script to update login/register UI in all view files
 * Replace static "Đăng ký" + "Đăng nhập" with session-aware conditional menu
 */

$viewsDir = __DIR__;
$files = glob($viewsDir . '/*.php');

$oldPattern = <<<'PHP'
            <li class="nav-item"><a class="nav-link" href="index.php?controller=GioHang&action=index">Giỏ hàng</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?controller=DangKy&action=index">Đăng ký</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?controller=TaiKhoan&action=dangnhap">Đăng nhập</a></li>
PHP;

$newPattern = <<<'PHP'
            <li class="nav-item"><a class="nav-link" href="index.php?controller=GioHang&action=index">Giỏ hàng</a></li>
            
            <?php if (isset($_SESSION['user'])): ?>
              <!-- Đã đăng nhập -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                  <i class="bi bi-person-circle"></i> <?php echo htmlspecialchars($_SESSION['user']['ten_dang_nhap']); ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="index.php?controller=TaiKhoan&action=index"><i class="bi bi-person me-2"></i>Tài khoản của tôi</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item text-danger" href="index.php?controller=TaiKhoan&action=dangxuat"><i class="bi bi-box-arrow-right me-2"></i>Đăng xuất</a></li>
                </ul>
              </li>
            <?php else: ?>
              <!-- Chưa đăng nhập -->
              <li class="nav-item"><a class="nav-link" href="index.php?controller=DangKy&action=index">Đăng ký</a></li>
              <li class="nav-item"><a class="nav-link" href="index.php?controller=TaiKhoan&action=dangnhap">Đăng nhập</a></li>
            <?php endif; ?>
PHP;

$updated = 0;
$skipped = 0;

echo "🔍 Tìm kiếm và cập nhật các file view...\n";

foreach ($files as $file) {
    $basename = basename($file);
    
    // Bỏ qua các file không phải view chính
    if (in_array($basename, ['update-login-ui.php', 'update-asset-paths.php', 'update-css-urls.php', 'update-links.php', 'xulylogin.php'])) {
        echo "⏭️  Bỏ qua: $basename\n";
        continue;
    }
    
    $content = file_get_contents($file);
    
    if (strpos($content, 'navbar-nav') === false) {
        $skipped++;
        continue;
    }
    
    // Kiểm tra đã có pattern mới chưa
    if (strpos($content, '<?php if (isset($_SESSION[\'user\']))') !== false) {
        echo "✅ Đã update: $basename\n";
        $updated++;
        continue;
    }
    
    // Kiểm tra có pattern cũ không
    if (strpos($content, '<li class="nav-item"><a class="nav-link" href="index.php?controller=DangKy&action=index">Đăng ký</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?controller=TaiKhoan&action=dangnhap">Đăng nhập</a></li>') === false) {
        echo "⚠️  Pattern không khớp: $basename (có thể đã sửa)\n";
        continue;
    }
    
    // Replace
    if (str_replace($oldPattern, $newPattern, $content) !== $content) {
        file_put_contents($file, str_replace($oldPattern, $newPattern, $content));
        echo "✔️  Cập nhật: $basename\n";
        $updated++;
    }
}

echo "\n✨ Hoàn thành!\n";
echo "📝 Cập nhật: $updated file\n";
echo "⏭️  Bỏ qua: $skipped file\n";
?>
