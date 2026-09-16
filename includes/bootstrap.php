<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$site = require __DIR__ . '/../config/site.php';
$courseGroups = require __DIR__ . '/../config/courses.php';

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function courseBySlug(array $groups, string $slug): ?array
{
    foreach ($groups as $groupKey => $group) {
        foreach ($group['courses'] as $course) {
            if ($course['slug'] === $slug) {
                $course['group_key'] = $groupKey;
                $course['group_label'] = $group['label'];
                return $course;
            }
        }
    }
    return null;
}

function currentUrlPath(): string
{
    return parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(24));
}
