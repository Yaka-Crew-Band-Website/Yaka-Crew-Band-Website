<?php
// Simple CSS audit: looks for global selectors that commonly conflict with layout
$dir = __DIR__ . '/../css';
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
$patterns = [
    '/^\s*body\b/i',
    '/^\s*html\b/i',
    '/\.main-content\b/i',
    '/\.site-footer\b/i',
    '/position\s*:\s*fixed/i',
    '/padding-top\s*:/i',
    '/height\s*:/i'
];
$results = [];
foreach ($iterator as $file) {
    if ($file->isDir()) continue;
    if (strtolower($file->getExtension()) !== 'css') continue;
    $lines = file($file->getPathname());
    foreach ($lines as $num => $line) {
        foreach ($patterns as $p) {
            if (preg_match($p, $line)) {
                $results[] = [
                    'file' => str_replace(getcwd(), '', $file->getPathname()),
                    'line' => $num + 1,
                    'text' => trim($line)
                ];
                break;
            }
        }
    }
}
if (empty($results)) {
    echo "No global-rule matches found.\n";
    exit(0);
}
echo "CSS Audit Report - global/suspect rules\n";
echo str_repeat('=', 60) . "\n";
$currentFile = '';
foreach ($results as $r) {
    if ($r['file'] !== $currentFile) {
        $currentFile = $r['file'];
        echo "\nFile: {$currentFile}\n";
    }
    echo "  Line {$r['line']}: {$r['text']}\n";
}

?>
