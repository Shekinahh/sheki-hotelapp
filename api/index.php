<?php

/**
 * Vercel Serverless Entrypoint for Laravel
 */

$_ENV['VERCEL'] = '1';
$_SERVER['VERCEL'] = '1';

// Initialize required storage directories in /tmp for Vercel's ephemeral filesystem
$storageDirectories = [
    '/tmp/storage',
    '/tmp/storage/app',
    '/tmp/storage/app/public',
    '/tmp/storage/framework',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/bootstrap',
    '/tmp/bootstrap/cache'
];

foreach ($storageDirectories as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0777, true);
    }
}

// Forward to standard Laravel entrypoint
require __DIR__ . '/../public/index.php';

