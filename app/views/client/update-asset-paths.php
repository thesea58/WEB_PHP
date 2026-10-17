<?php
/**
 * Script to update all asset paths in client views to use absolute paths
 * Converts relative paths to absolute paths from XAMPP root
 */

$viewDir = __DIR__ . '/';

// Define asset path replacements
// Convert relative paths to absolute paths
$assetReplacements = [
    // CSS files
    'href="app/views/client/css/' => 'href="app/views/client/css/',
    'href=\'css/' => 'href="app/views/client/css/',
    
    // JS files
    'src="app/views/client/js/' => 'src="app/views/client/js/',
    'src=\'js/' => 'src="app/views/client/js/',
    
    // Image files (that don't already have the full path)
    'src="app/views/client/img/' => 'src="app/views/client/img/',
    'src=\'img/' => 'src="app/views/client/img/',
    'href="app/views/client/img/' => 'href="app/views/client/img/',
    'href=\'img/' => 'href="app/views/client/img/',
];

// Get all PHP files in current directory (client folder)
$files = glob($viewDir . '*.php');

echo "Found " . count($files) . " PHP files in client views\n";
echo "Processing files...\n\n";

$updatedCount = 0;

foreach ($files as $file) {
    $content = file_get_contents($file);
    $original = $content;
    
    // Apply all replacements
    foreach ($assetReplacements as $old => $new) {
        $content = str_replace($old, $new, $content);
    }
    
    // Only write if content changed
    if ($content !== $original) {
        file_put_contents($file, $content);
        echo "✓ Updated: " . basename($file) . "\n";
        $updatedCount++;
    }
}

echo "\nCompleted! Updated " . $updatedCount . " files.\n";
?>
