<?php
require __DIR__ . '/includes/bootstrap.php';

$category = trim($_GET['category'] ?? '');
$isAllCourses = $category === '';

if (!$isAllCourses && !isset($courseGroups[$category])) {
    http_response_code(404);
    $pageTitle = 'Courses Not Found | CadMate India';
    $pageDescription = 'Browse CAD, design, media, programming, data and technology courses at CadMate India in Jaipur.';
    $canonicalUrl = 'https://cadmateindia.com/courses/';
    require __DIR__ . '/includes/header.php';
    echo '<section class="section-space"><div class="container"><div class="content-card"><h1>Course category not found</h1><p class="text-secondary">The requested category is not available.</p><a class="btn btn-brand" href="/courses/">Browse all courses</a></div></div></section>';
    require __DIR__ . '/includes/footer.php';
    exit;
}

$displayGroups = $isAllCourses ? $courseGroups : [$category => $courseGroups[$category]];
$activeGroup = $isAllCourses ? null : $courseGroups[$category];

$totalCourses = 0;
foreach ($displayGroups as $group) {
    $totalCourses += count($group['courses']);
}

if ($isAllCourses) {
    $pageTitle = 'Courses in Jaipur | CAD, Design, Coding & Data | CadMate India';
    $pageDescription = 'Explore CAD, BIM, engineering design, graphic design, digital marketing, programming, data and technology courses at CadMate India in Jaipur.';
    $canonicalUrl = 'https://cadmateindia.com/courses.php';
} else {
    $pageTitle = $activeGroup['label'] . ' Courses in Jaipur | CadMate India';
    $pageDescription = 'Explore ' . $activeGroup['label'] . ' courses at CadMate India in Jaipur with practical learning and course counselling.';
    $canonicalUrl = 'https://cadmateindia.com/courses/' . rawurlencode($category) . '/';
}

$initials = static function (string $name): string {
    $parts = preg_split('/\s+/', trim($name)) ?: [];
    $letters = '';
    foreach ($parts as $part) {
        if ($part === '') continue;
        $letters .= mb_substr($part, 0, 1);
        if (mb_strlen($letters) >= 2) break;
    }
    return mb_strtoupper($letters ?: mb_substr($name, 0, 2));
};

$itemList = [];
$position = 1;
foreach ($displayGroups as $group) {
    foreach ($group['courses'] as $course) {
        $itemList[] = [
            '@type' => 'ListItem',
            'position' => $position++,
            'name' => $course['name'] . ' Course in Jaipur',
            'url' => 'https://cadmateindia.com/courses/' . rawurlencode($course['slug']) . '/',
        ];
    }
}

$schema = [
    '@context' => 'https://schema.org',
    '@type' => 'ItemList',
    'name' => $isAllCourses ? 'CadMate India Courses in Jaipur' : $activeGroup['label'] . ' Courses in Jaipur',
    'numberOfItems' => count($itemList),
    'itemListElement' => $itemList,
];

require __DIR__ . '/includes/header.php';
?>
<script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>

<section class="courses-hero">
    <div class="container">
        <div class="courses-breadcrumb"><a href="/">Home</a><span>›</span><?php if (!$isAllCourses): ?><a href="/courses/">Courses</a><span>›</span><span><?= e($activeGroup['label']) ?></span><?php else: ?><span>Courses</span><?php endif; ?></div>

        <div class="row g-4 align-items-end">
            <div class="col-lg-8">
                <div class="hero-kicker"><span class="pulse-dot"></span><?= $isAllCourses ? 'Career-focused learning tracks' : e($activeGroup['label']) ?></div>
                <h1><?= $isAllCourses ? 'Courses in Jaipur for CAD, Design, Coding & Data' : e($activeGroup['label']) . ' Courses in Jaipur' ?></h1>
                <p><?= $isAllCourses ? 'Start with CadMate India’s core CAD and engineering design track, or explore creative design, programming, data and technology skills through one organised course catalog.' : 'Explore focused programs in ' . e(strtolower($activeGroup['label'])) . ' and use course counselling to choose the right learning path for your goal.' ?></p>
            </div>
            <div class="col-lg-4">
                <div class="courses-hero-stats">
                    <div><strong><?= e((string)$totalCourses) ?></strong><span><?= $isAllCourses ? 'courses shown' : 'courses in this track' ?></span></div>
                    <div><strong><?= e((string)count($courseGroups)) ?></strong><span>learning tracks</span></div>
                    <div><strong>Jaipur</strong><span>training centres</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="course-filter-bar">
    <div class="container">
        <div class="course-filter-scroll">
            <a class="course-filter-pill<?= $isAllCourses ? ' active' : '' ?>" href="/courses/">
                <span>All Courses</span><small><?= array_sum(array_map(static fn($g) => count($g['courses']), $courseGroups)) ?></small>
            </a>
            <?php foreach ($courseGroups as $key => $group): ?>
                <a class="course-filter-pill<?= $category === $key ? ' active' : '' ?>" href="/courses/<?= e($key) ?>/">
                    <span><?= e($group['label']) ?></span><small><?= count($group['courses']) ?></small>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php foreach ($displayGroups as $groupKey => $group): ?>
<section class="course-group-section <?= $groupKey === 'cad' ? 'course-group-primary' : '' ?>">
    <div class="container">
        <div class="course-group-heading">
            <div>
                <div class="eyebrow">Learning Track <?= e((string)$group['priority']) ?></div>
                <h2><?= e($group['label']) ?></h2>
                <p><?php
                    if ($groupKey === 'cad') {
                        echo 'CadMate India’s primary learning track for drafting, BIM, architecture, mechanical design and structural workflows.';
                    } elseif ($groupKey === 'design') {
                        echo 'Creative and digital skills for visual communication, interface design, media production and online marketing.';
                    } else {
                        echo 'Programming, web development, data, AI, cloud and cyber-security learning paths for technology-focused learners.';
                    }
                ?></p>
            </div>
            <?php if ($isAllCourses): ?><a class="group-link" href="/courses/<?= e($groupKey) ?>/">View this track →</a><?php endif; ?>
        </div>

        <div class="row g-4">
            <?php foreach ($group['courses'] as $course): ?>
                <div class="col-sm-6 col-xl-4">
                    <a class="course-card-v2 course-theme-<?= e($groupKey) ?>" href="/courses/<?= e($course['slug']) ?>/">
                        <div class="course-card-media">
                            <?php if (!empty($course['image'])): ?>
                                <img src="/<?= e($course['image']) ?>" alt="<?= e($course['name']) ?> course in Jaipur at CadMate India" loading="lazy">
                            <?php else: ?>
                                <div class="course-card-visual">
                                    <span><?= e($initials($course['name'])) ?></span>
                                    <small><?= e($course['discipline']) ?></small>
                                </div>
                            <?php endif; ?>
                            <div class="course-card-track"><?= e($group['label']) ?></div>
                        </div>
                        <div class="course-card-content">
                            <div class="course-discipline"><?= e($course['discipline']) ?></div>
                            <h3><?= e($course['name']) ?> Course in Jaipur</h3>
                            <p>Build practical familiarity with the concepts and workflow used in <?= e(strtolower($course['discipline'])) ?>.</p>
                            <div class="course-card-footer">
                                <span>View course</span>
                                <b>→</b>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endforeach; ?>

<section class="section-space course-counselling-band">
    <div class="container">
        <div class="course-counselling-shell">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <div class="eyebrow text-warning mb-2">Course counselling</div>
                    <h2>Not sure which course fits your goal?</h2>
                    <p>Share your qualification and area of interest. CadMate India can guide you toward a relevant course track and confirm current batch, duration, fee and centre details.</p>
                    <div class="counselling-points">
                        <span>✓ CAD & engineering design</span>
                        <span>✓ Creative design & media</span>
                        <span>✓ Programming, data & technology</span>
                    </div>
                </div>
                <div class="col-lg-7">
                    <?php $formContext = $isAllCourses ? 'All Courses Counselling' : $activeGroup['label'] . ' Counselling'; $formCompact = true; require __DIR__ . '/includes/enquiry-form.php'; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
