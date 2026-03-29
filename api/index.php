<?php
/**
 * Vercel Entry point router
 * This file lives in /api to satisfy Vercel's serverless function requirements
 * while keeping the project root clean.
 */

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Route /admin requests
if (strpos($path, '/admin') === 0) {
    require __DIR__ . '/../admin/index.php';
    exit;
}

// Route specifically for projects.php
if ($path === '/projects.php') {
    require __DIR__ . '/../projects.php';
    exit;
}

// Route specifically for certifications.php
if ($path === '/certifications.php') {
    require __DIR__ . '/../certifications.php';
    exit;
}

// Default route for everything else (home page)
require __DIR__ . '/../index.php';
