<?php
$courseGroups = require __DIR__ . '/config/courses.php';

header('Content-Type: application/xml; charset=UTF-8');

$base = 'https://cadmateindia.com';
$today = date('Y-m-d');

$urls = [
    ['loc' => $base . '/', 'changefreq' => 'weekly', 'priority' => '1.0'],
    ['loc' => $base . '/courses/', 'changefreq' => 'weekly', 'priority' => '0.9'],
    ['loc' => $base . '/training.php', 'changefreq' => 'monthly', 'priority' => '0.7'],
    ['loc' => $base . '/admissions.php', 'changefreq' => 'monthly', 'priority' => '0.7'],
    ['loc' => $base . '/contact.php', 'changefreq' => 'monthly', 'priority' => '0.6'],
    ['loc' => $base . '/blog/', 'changefreq' => 'weekly', 'priority' => '0.7'],
];

foreach ($courseGroups as $groupKey => $group) {
    $urls[] = [
        'loc' => $base . '/courses/' . rawurlencode($groupKey) . '/',
        'changefreq' => 'weekly',
        'priority' => $groupKey === 'cad' ? '0.9' : '0.8',
    ];

    foreach ($group['courses'] as $course) {
        $urls[] = [
            'loc' => $base . '/courses/' . rawurlencode($course['slug']) . '/',
            'changefreq' => 'monthly',
            'priority' => $groupKey === 'cad' ? '0.8' : '0.7',
        ];
    }
}

echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($urls as $url): ?>
    <url>
        <loc><?= htmlspecialchars($url['loc'], ENT_XML1, 'UTF-8') ?></loc>
        <lastmod><?= $today ?></lastmod>
        <changefreq><?= $url['changefreq'] ?></changefreq>
        <priority><?= $url['priority'] ?></priority>
    </url>
<?php endforeach; ?>
</urlset>
