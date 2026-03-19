<?php
/**
 * Helper functions for asset paths
 * Generates correct paths regardless of folder structure changes
 */

// Get the base URL from the request
function getBaseUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $scriptDir = dirname($_SERVER['SCRIPT_NAME']);
    
    return $protocol . '://' . $host . rtrim($scriptDir, '/\\') . '/';
}

/**
 * Generate URL to asset files (CSS, JS, Images)
 * Usage: assetUrl('app/views/client/css/bootstrap.css')
 */
function assetUrl($path) {
    return getBaseUrl() . ltrim($path, '/');
}

/**
 * Generate base app URL
 * Usage: appUrl('index.php?controller=Home&action=index')
 */
function appUrl($path = '') {
    return getBaseUrl() . 'index.php' . ($path ? '?' . $path : '');
}

/**
 * Generate URL with controller and action
 * Usage: url('TrangChu', 'index')
 */
function url($controller, $action = 'index', $params = []) {
    $url = appUrl() . '?controller=' . $controller . '&action=' . $action;
    
    foreach ($params as $key => $value) {
        $url .= '&' . urlencode($key) . '=' . urlencode($value);
    }
    
    return $url;
}
?>
