<?php
require __DIR__ . '/includes/bootstrap.php';

$slug = trim($_GET['slug'] ?? '');
$course = courseBySlug($courseGroups, $slug);

if (!$course) {
    http_response_code(404);
    $pageTitle = 'Course Not Found | CadMate India';
    $pageDescription = 'Browse available CAD, design, media, programming, data and technology courses at CadMate India in Jaipur.';
    $canonicalUrl = 'https://cadmateindia.com/courses/';
    require __DIR__ . '/includes/header.php';
    echo '<section class="section-space"><div class="container"><div class="content-card"><h1>Course not found</h1><p class="text-secondary">The requested course is not available in the current catalog.</p><a class="btn btn-brand" href="/courses/">Browse Courses</a></div></div></section>';
    require __DIR__ . '/includes/footer.php';
    exit;
}

$pageTitle = $course['name'] . ' Course in Jaipur | CadMate India';
$pageDescription = 'Explore ' . $course['name'] . ' training in Jaipur at CadMate India with a practical learning focus and course counselling.';
$canonicalUrl = 'https://cadmateindia.com/courses/' . rawurlencode($course['slug']) . '/';

$group = $courseGroups[$course['group_key']];
$related = array_values(array_filter($group['courses'], static fn($item) => $item['slug'] !== $course['slug']));
$related = array_slice($related, 0, 3);

$schema = [
    '@context' => 'https://schema.org',
    '@type' => 'Course',
    'name' => $course['name'] . ' Course in Jaipur',
    'description' => $pageDescription,
    'url' => $canonicalUrl,
    'provider' => [
        '@type' => 'EducationalOrganization',
        'name' => 'CadMate India',
        'url' => 'https://cadmateindia.com/',
    ],
];

require __DIR__ . '/includes/header.php';
?>
<script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>

<section class="course-detail-hero">
    <div class="container">
        <div class="courses-breadcrumb">
            <a href="/">Home</a><span>›</span><a href="/courses/">Courses</a><span>›</span><a href="/courses/<?= e($course['group_key']) ?>/"><?= e($course['group_label']) ?></a><span>›</span><span><?= e($course['name']) ?></span>
        </div>

        <div class="row g-5 align-items-center">
            <div class="col-lg-7">
                <div class="hero-kicker"><span class="pulse-dot"></span><?= e($course['discipline']) ?></div>
                <h1><?= e($course['name']) ?> Course in Jaipur</h1>
                <p class="lead">A practical learning path for building familiarity with <?= e(strtolower($course['discipline'])) ?> concepts, tools and project-style workflows.</p>

                <div class="course-detail-actions">
                    <a class="btn btn-brand btn-lg" href="#enquire">Request Course Counselling</a>
                    <a class="btn btn-outline-dark btn-lg" href="/courses/<?= e($course['group_key']) ?>/">Explore Related Courses</a>
                </div>

                <div class="course-quick-facts">
                    <div><span>Track</span><strong><?= e($course['group_label']) ?></strong></div>
                    <div><span>Learning style</span><strong>Practical & guided</strong></div>
                    <div><span>Location</span><strong>Jaipur</strong></div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="course-detail-media course-theme-<?= e($course['group_key']) ?>">
                    <?php if (!empty($course['image'])): ?>
                        <img src="/<?= e($course['image']) ?>" alt="<?= e($course['name']) ?> training in Jaipur at CadMate India">
                    <?php else: ?>
                        <div class="course-detail-placeholder">
                            <span><?= e(mb_strtoupper(mb_substr($course['name'], 0, 2))) ?></span>
                            <small><?= e($course['discipline']) ?></small>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space">
    <div class="container">
        <div class="row g-4 g-xl-5">
            <div class="col-lg-8">
                <div class="course-content-section">
                    <div class="eyebrow mb-2">Learning approach</div>
                    <h2>How the <?= e($course['name']) ?> learning path is structured</h2>
                    <p>CadMate India keeps course pages focused on practical learning and verifies commercial or batch-specific information before publishing it.</p>

                    <div class="learning-grid">
                        <div><span>01</span><strong>Core concepts</strong><p>Build the foundation needed to understand the tool, terminology and workflow.</p></div>
                        <div><span>02</span><strong>Guided practice</strong><p>Work through exercises that reinforce the core workflow step by step.</p></div>
                        <div><span>03</span><strong>Applied tasks</strong><p>Connect the learning to project-style tasks relevant to <?= e(strtolower($course['discipline'])) ?>.</p></div>
                        <div><span>04</span><strong>Next-step guidance</strong><p>Discuss how the skill can fit your education, internship or career learning plan.</p></div>
                    </div>
                </div>

                <div class="course-info-strip">
                    <div>
                        <div class="eyebrow mb-2">Current course details</div>
                        <h2 class="h3">Get the latest batch information directly from CadMate India</h2>
                        <p class="mb-0">Current duration, fee, batch timing, software/version, eligibility, certificate wording and project details are confirmed during counselling so the website does not publish outdated information.</p>
                    </div>
                </div>

                <?php if ($related): ?>
                <div class="related-course-block">
                    <div class="d-flex flex-wrap justify-content-between gap-3 align-items-end mb-4">
                        <div>
                            <div class="eyebrow mb-2">Keep exploring</div>
                            <h2 class="h3 mb-0">Related <?= e($course['group_label']) ?> courses</h2>
                        </div>
                        <a class="group-link" href="/courses/<?= e($course['group_key']) ?>/">View full track →</a>
                    </div>
                    <div class="row g-3">
                        <?php foreach ($related as $item): ?>
                            <div class="col-md-4">
                                <a class="related-course-card" href="/courses/<?= e($item['slug']) ?>/">
                                    <small><?= e($item['discipline']) ?></small>
                                    <strong><?= e($item['name']) ?></strong>
                                    <span>View course →</span>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <div class="col-lg-4" id="enquire">
                <div class="course-enquiry-sticky">
                    <div class="eyebrow text-warning mb-2">Course enquiry</div>
                    <h2 class="h4">Ask about <?= e($course['name']) ?></h2>
                    <p>Get current batch, duration, fee and centre information.</p>
                    <?php $formContext = $course['name'] . ' Course'; $formCompact = true; require __DIR__ . '/includes/enquiry-form.php'; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
