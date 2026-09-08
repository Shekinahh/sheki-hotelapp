<?php

/**
 * Vercel Serverless Entrypoint for Laravel
 */

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
        @mkdir($dir, 0755, true);
    }
}

// Forward to standard Laravel entrypoint
require __DIR__ . '/../public/index.php';
