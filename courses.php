<?php
require __DIR__ . '/includes/bootstrap.php';
$category = $_GET['category'] ?? 'cad';
if (!isset($courseGroups[$category])) {
    http_response_code(404);
    $category = 'cad';
}
$group = $courseGroups[$category];
$pageTitle = $group['label'] . ' Courses in Jaipur | CadMate India';
$pageDescription = 'Explore ' . $group['label'] . ' training programs at CadMate India in Jaipur with practical learning and counselling support.';
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero">
    <div class="container">
        <div class="breadcrumb-lite mb-2"><a href="/">Home</a> / Courses / <?= e($group['label']) ?></div>
        <div class="eyebrow mb-2">Priority <?= e((string)$group['priority']) ?></div>
        <h1 class="display-5 fw-bold"><?= e($group['label']) ?> Courses in Jaipur</h1>
        <p class="lead text-secondary mb-0">Choose a focused program and use the common counselling flow to discuss batches, eligibility and learning goals.</p>
    </div>
</section>
<section class="section-space">
    <div class="container">
        <div class="row g-4">
            <?php foreach ($group['courses'] as $course): ?>
            <div class="col-sm-6 col-lg-4">
                <a class="course-card d-block" href="/course.php?slug=<?= e($course['slug']) ?>">
                    <?php if (!empty($course['image'])): ?>
                        <img src="/<?= e($course['image']) ?>" alt="<?= e($course['name']) ?> course in Jaipur" loading="lazy">
                    <?php else: ?>
                        <div class="course-placeholder"><?= e(substr($course['name'], 0, 2)) ?></div>
                    <?php endif; ?>
                    <div class="course-card-body">
                        <div class="course-meta"><?= e($course['discipline']) ?></div>
                        <h3><?= e($course['name']) ?> Course in Jaipur</h3>
                        <span class="learn-more">View course details →</span>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section class="section-space section-soft">
    <div class="container">
        <div class="lead-wrap">
            <div class="row g-4 align-items-center">
                <div class="col-lg-5"><div class="eyebrow text-warning mb-2">Need help choosing?</div><h2>Talk through your goal before selecting a course.</h2><p class="text-light-emphasis mb-lg-0">Share your qualification and interest. Course-specific pricing, schedules and claims will only be added after they are verified.</p></div>
                <div class="col-lg-7"><?php $formContext = $group['label'] . ' Counselling'; $formCompact = true; require __DIR__ . '/includes/enquiry-form.php'; ?></div>
            </div>
        </div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
