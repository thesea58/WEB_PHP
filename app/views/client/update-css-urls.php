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
    $content = file_get_contents($file);
    $original = $content;
    
    // Replace CSS url() references
    // This regex finds url("app/views/client/img/..." and url("app/views/client/img/...' and replaces with absolute path
    $content = preg_replace_callback(
        '/url\([\'"]?(img\/)/',
        function($matches) {
            return 'url("app/views/client/' . $matches[1];
        },
        $content
    );
    
    // Also handle single quotes
    $content = str_replace("url("app/views/client/img/", "url('app/views/client/img/", $content);
    $content = str_replace('url("app/views/client/img/', 'url("app/views/client/img/', $content);
    
    // Only write if content changed
    if ($content !== $original) {
        file_put_contents($file, $content);
        echo "✓ Updated: " . basename($file) . "\n";
        $updatedCount++;
    }
}

echo "\nCompleted! Updated " . $updatedCount . " files.\n";
?>
