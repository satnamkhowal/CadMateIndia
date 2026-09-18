<?php
require __DIR__ . '/includes/bootstrap.php';
$pageTitle = 'Internship & Industrial Training in Jaipur | CadMate India';
$pageDescription = 'Explore internship, industrial training, live-project and final-year project enquiry options at CadMate India in Jaipur.';
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero">
    <div class="container">
        <div class="eyebrow mb-2">Practical experience</div>
        <h1 class="display-5 fw-bold">Internship, industrial training & project enquiries</h1>
        <p class="lead text-secondary mb-0">A dedicated service page keeps experience-focused enquiries separate from regular course enquiries.</p>
    </div>
</section>
<section class="section-space">
    <div class="container">
        <div class="row g-4 mb-5">
            <?php
            $items = [
                ['Internship Programs','Structured internship enquiries across relevant CAD, design and technology tracks.'],
                ['Industrial Training','Practical training enquiries for students who need skill-oriented exposure.'],
                ['Live Project Training','Project-based practice requests routed through the same centralized form.'],
                ['Final-Year Projects','Project guidance enquiries for eligible students; exact scope is verified before publishing.'],
            ];
            foreach ($items as [$title,$copy]): ?>
            <div class="col-md-6"><div class="feature-card p-4"><div class="eyebrow mb-2">Experience path</div><h2 class="h4"><?= e($title) ?></h2><p class="text-secondary mb-0"><?= e($copy) ?></p></div></div>
            <?php endforeach; ?>
        </div>
        <div class="lead-wrap">
            <div class="row g-4 align-items-center">
                <div class="col-lg-5"><div class="eyebrow text-warning mb-2">Training enquiry</div><h2>Tell us your current course and practical-training requirement.</h2><p class="text-light-emphasis mb-lg-0">Duration, project scope, certification and internship terms will only be shown after CadMate provides verified details.</p></div>
                <div class="col-lg-7"><?php $formContext = 'Internship & Industrial Training'; $formCompact = false; require __DIR__ . '/includes/enquiry-form.php'; ?></div>
            </div>
        </div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
