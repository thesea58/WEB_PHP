<?php
/**
 * Update login/account UI across all view files
 * Handles two formats:
 * 1. Old: Simple "Đăng ký" + "Đăng nhập" links
 * 2. Account dropdown: "Tài khoản" with account links (hardcoded)
 */

$viewDir = __DIR__;
$files   = glob($viewDir . '/*.php');

$oldFormat = <<<'PHP'
           <li class="nav-item dropdown ms-lg-3">
              <a class="nav-link dropdown-toggle" href="index.php?controller=SanPham&action=index" role="button" data-bs-toggle="dropdown">
                Tài khoản
              </a>
              <ul class="dropdown-menu dropdown-menu-end border-brown shadow">
                <li><a class="dropdown-item" href="thong-tin-ca-nhan.php"><i class="bi bi-person me-2"></i>Cá nhân</a></li>
                <li><a class="dropdown-item" href="don-hang-cua-toi.php"><i class="bi bi-bag-check me-2"></i>Đơn hàng</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="index.php?controller=TrangChu&action=index"><i class="bi bi-box-arrow-right me-2"></i>Đăng xuất</a></li>
              </ul>
            </li>
PHP;

$newFormat = <<<'PHP'
           <?php if (isset($_SESSION['user'])): ?>
              <!-- Đã đăng nhập -->
              <li class="nav-item dropdown ms-lg-3">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                  <i class="bi bi-person-circle"></i> <?php echo htmlspecialchars($_SESSION['user']['ten_dang_nhap']); ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end border-brown shadow">
                  <li><a class="dropdown-item" href="index.php?controller=TaiKhoan&action=index"><i class="bi bi-person me-2"></i>Tài khoản của tôi</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item text-danger" href="index.php?controller=TaiKhoan&action=dangxuat"><i class="bi bi-box-arrow-right me-2"></i>Đăng xuất</a></li>
                </ul>
              </li>
            <?php else: ?>
              <!-- Chưa đăng nhập -->
              <li class="nav-item"><a class="nav-link" href="index.php?controller=DangKy&action=index">Đăng ký</a></li>
              <li class="nav-item"><a class="nav-link" href="index.php?controller=DangNhap&action=index">Đăng nhập</a></li>
            <?php endif; ?>
PHP;

$updated = 0;

// Update account dropdown format
foreach ($files as $file) {
    $basename = basename($file);
    
    if (in_array($basename, ['update-login-ui-v2.php', 'update-asset-paths.php', 'update-css-urls.php', 'update-links.php', 'update-login-ui.php', 'xulylogin.php'])) {
        continue;
    }
    
    $content = file_get_contents($file);
    
    // Skip if already updated or no navbar
    if (strpos($content, 'navbar-nav') === false || strpos($content, 'if (isset($_SESSION[\'user\']))') !== false) {
        continue;
    }
    
    // Replace pattern
    if (strpos($content, 'Tài khoản') !== false && 
        strpos($content, 'thong-tin-ca-nhan.php') !== false) {
        
        $newContent = str_replace($oldFormat, $newFormat, $content);
        if ($newContent !== $content) {
            file_put_contents($file, $newContent);
            echo "✅ Cập nhật: $basename\n";
            $updated++;
        }
    }
}

echo "\n✨ Hoàn thành!\n";
echo "📝 Cập nhật: $updated files\n";
?>
