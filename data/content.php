<?php
/**
 * Centralized content configuration for the portfolio.
 *
 * All dynamic data used on the site is stored in 'data.json'
 * This file reads that JSON and exposes the variables expected by the templates.
 */

$jsonFile = __DIR__ . '/content.json';

if (file_exists($jsonFile)) {
    $jsonData = file_get_contents($jsonFile);
    $data = json_decode($jsonData, true);

    if ($data === null) {
        // Fallback to empty arrays if JSON is invalid
        $socialLinks = [];
        $experiences = [];
        $projects = [];
        $certifications = [];
    } else {
        $socialLinks = $data['socialLinks'] ?? [];
        $experiences = $data['experiences'] ?? [];
        $projects = $data['projects'] ?? [];
        $certifications = $data['certifications'] ?? [];
    }
} else {
    // Fallback if file doesn't exist (should not happen in prod)
    $socialLinks = [];
    $experiences = [];
    $projects = [];
    $certifications = [];
}
