<?php
require __DIR__ . '/includes/bootstrap.php';
$pageTitle = 'College Admission Guidance in Jaipur | CadMate India';
$pageDescription = 'Explore college admission guidance for BCA, MCA, B.Tech, BBA, MBA and related programs through CadMate India.';
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero">
    <div class="container">
        <div class="eyebrow mb-2">College admissions</div>
        <h1 class="display-5 fw-bold">A separate admission-guidance path for students</h1>
        <p class="lead text-secondary mb-0">Course training stays separate from college admissions so visitors always understand whether they are looking for a skill program or a degree-admission discussion.</p>
    </div>
</section>
<section class="section-space">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-7">
                <div class="section-heading"><h2>Programs currently planned for enquiry routing</h2><p>College names, affiliations, fees, eligibility and admission claims will be added only from verified information.</p></div>
                <div class="row g-3">
                    <?php foreach (['BCA','MCA','B.Tech','BBA','MBA','LLB'] as $program): ?>
                    <div class="col-sm-6"><div class="content-card"><strong><?= e($program) ?> Admission Guidance</strong><div class="text-secondary small mt-1">Enquiry routing and counselling placeholder.</div></div></div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="lead-wrap">
                    <div class="eyebrow text-warning mb-2">Admission enquiry</div>
                    <h2 class="h4">Share the degree you are considering</h2>
                    <?php $formContext = 'College Admission Guidance'; $formCompact = false; require __DIR__ . '/includes/enquiry-form.php'; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
