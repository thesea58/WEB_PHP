<?php
/**
 * Script to update CSS URLs (url()) in style tags and attributes
 */

$viewDir = __DIR__ . '/';

// Get all PHP files
$files = glob($viewDir . '*.php');

echo "Processing CSS URLs in style tags...\n\n";

$updatedCount = 0;

foreach ($files as $file) {
    $basename = basename($file);
    if (in_array($basename, ['update-css-urls.php', 'update-asset-paths.php', 'update-login-ui.php', 'update-login-ui-v2.php'])) {
        continue;
    }

    $content = file_get_contents($file);
    $original = $content;
    
    // Replace CSS url() references
    // This regex matches url('img/...'), url("img/..."), and url(img/...) while preserving quotes
    $content = preg_replace_callback(
        '/url\(([\'"]?)(?!app\/)(img\/)/',
        function($matches) {
            $quote = $matches[1];
            return 'url(' . $quote . 'app/views/client/' . $matches[2];
        },
        $content
    );
    
    // Also handle explicit replacements if needed
    $content = str_replace("url('img/", "url('app/views/client/img/", $content);
    $content = str_replace('url("img/', 'url("app/views/client/img/', $content);
    
    // Only write if content changed
    if ($content !== $original) {
        file_put_contents($file, $content);
        echo "✓ Updated: " . basename($file) . "\n";
        $updatedCount++;
    }
}

echo "\nCompleted! Updated " . $updatedCount . " files.\n";
?>
