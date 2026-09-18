<?php
require __DIR__ . '/includes/bootstrap.php';
$slug = trim($_GET['slug'] ?? '');
$course = courseBySlug($courseGroups, $slug);
if (!$course) {
    http_response_code(404);
    $pageTitle = 'Course Not Found | CadMate India';
    require __DIR__ . '/includes/header.php';
    echo '<section class="section-space"><div class="container"><h1>Course not found</h1><p>The requested course is not available in the current catalog.</p><a class="btn btn-brand" href="/courses.php?category=cad">Browse Courses</a></div></section>';
    require __DIR__ . '/includes/footer.php';
    exit;
}
$pageTitle = $course['name'] . ' Course in Jaipur | CadMate India';
$pageDescription = 'Explore ' . $course['name'] . ' training in Jaipur at CadMate India. Learn about the practical focus, course direction and enquiry options.';
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero">
    <div class="container">
        <div class="breadcrumb-lite mb-2"><a href="/">Home</a> / <a href="/courses.php?category=<?= e($course['group_key']) ?>"><?= e($course['group_label']) ?></a> / <?= e($course['name']) ?></div>
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <div class="eyebrow mb-2"><?= e($course['discipline']) ?></div>
                <h1 class="display-5 fw-bold"><?= e($course['name']) ?> Course in Jaipur</h1>
                <p class="lead text-secondary">A focused learning path for students and professionals who want practical exposure in <?= e($course['discipline']) ?>. Final syllabus, duration, fees and batch details will be published only after verification.</p>
                <a class="btn btn-brand btn-lg" href="#enquire">Ask About This Course</a>
            </div>
            <div class="col-lg-5">
                <?php if (!empty($course['image'])): ?>
                    <img class="img-fluid rounded-4 border" src="/<?= e($course['image']) ?>" alt="<?= e($course['name']) ?> training in Jaipur">
                <?php else: ?>
                    <div class="course-placeholder rounded-4"><?= e(substr($course['name'], 0, 2)) ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="section-space">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="content-card mb-4">
                    <div class="eyebrow mb-2">Course direction</div>
                    <h2 class="h3">What this learning path is designed around</h2>
                    <p>The page structure is intentionally separated from unverified commercial details. Course-specific curriculum, software versions, prerequisites, duration, certification wording and fees can be added after CadMate confirms them.</p>
                    <div class="row g-3 mt-1">
                        <div class="col-md-6"><div class="p-3 rounded-3 bg-light"><strong>Foundation</strong><div class="text-secondary small mt-1">Start from the core concepts and workflow relevant to <?= e($course['name']) ?>.</div></div></div>
                        <div class="col-md-6"><div class="p-3 rounded-3 bg-light"><strong>Hands-on practice</strong><div class="text-secondary small mt-1">Build familiarity through guided exercises and practical assignments.</div></div></div>
                        <div class="col-md-6"><div class="p-3 rounded-3 bg-light"><strong>Applied workflow</strong><div class="text-secondary small mt-1">Connect tools and techniques to real project-style tasks.</div></div></div>
                        <div class="col-md-6"><div class="p-3 rounded-3 bg-light"><strong>Career guidance</strong><div class="text-secondary small mt-1">Use counselling to understand how this skill fits your education or career direction.</div></div></div>
                    </div>
                </div>
                <div class="content-card">
                    <div class="eyebrow mb-2">Content status</div>
                    <h2 class="h3">Details waiting for CadMate verification</h2>
                    <p class="mb-2">Before public launch, the following should come from CadMate’s verified business/course information rather than assumptions:</p>
                    <p class="mb-0 text-secondary">Exact syllabus • software/version • course duration • fee • batch schedule • trainer details • certificate wording • placement/internship claims • eligibility • project list.</p>
                </div>
            </div>
            <div class="col-lg-4" id="enquire">
                <div class="lead-wrap">
                    <div class="eyebrow text-warning mb-2">Course enquiry</div>
                    <h2 class="h4">Ask about <?= e($course['name']) ?></h2>
                    <?php $formContext = $course['name'] . ' Course'; $formCompact = true; require __DIR__ . '/includes/enquiry-form.php'; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
