<?php
require __DIR__ . '/includes/bootstrap.php';
$pageTitle = 'Thank You | CadMate India';
$pageDescription = 'Your enquiry has been received by CadMate India.';
$last = $_SESSION['last_enquiry'] ?? [];
unset($_SESSION['last_enquiry']);
require __DIR__ . '/includes/header.php';
?>
<section class="section-space">
    <div class="container" style="max-width:760px">
        <div class="content-card text-center p-5">
            <div class="eyebrow mb-2">Enquiry received</div>
            <h1 class="display-6 fw-bold">Thank you<?= !empty($last['name']) ? ', ' . e($last['name']) : '' ?>.</h1>
            <p class="lead text-secondary">Your <?= !empty($last['context']) ? e($last['context']) : 'CadMate' ?> enquiry has been submitted through the centralized website form.</p>
            <div class="d-flex justify-content-center flex-wrap gap-2 mt-4">
                <a class="btn btn-brand" href="/courses.php?category=cad">Explore CAD Courses</a>
                <a class="btn btn-outline-dark" href="/">Back to Home</a>
            </div>
        </div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
