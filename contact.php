<?php
require __DIR__ . '/includes/bootstrap.php';
$pageTitle = 'Contact & Course Counselling | CadMate India Jaipur';
$pageDescription = 'Contact CadMate India for CAD, design, IT course counselling, training and admission guidance in Jaipur.';
require __DIR__ . '/includes/header.php';
$error = $_SESSION['form_error'] ?? '';
unset($_SESSION['form_error']);
?>
<section class="page-hero">
    <div class="container">
        <div class="eyebrow mb-2">Contact CadMate India</div>
        <h1 class="display-5 fw-bold">Course counselling from one centralized form</h1>
        <p class="lead text-secondary mb-0">Use this page for CAD courses, design programs, IT training, internships or college-admission enquiries.</p>
    </div>
</section>
<section class="section-space">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-5">
                <div class="content-card h-100">
                    <h2 class="h3">Verified contact details</h2>
                    <p class="text-secondary">Phone, address, email and social links are intentionally pulled only from the central site configuration. They will appear here after the details you provide are verified.</p>
                    <?php if (!empty($site['address'])): ?><p><strong>Address</strong><br><?= e($site['address']) ?></p><?php endif; ?>
                    <?php if (!empty($site['phone'])): ?><p><strong>Phone</strong><br><?= e($site['phone']) ?></p><?php endif; ?>
                    <?php if (!empty($site['email'])): ?><p><strong>Email</strong><br><?= e($site['email']) ?></p><?php endif; ?>
                    <?php if (empty($site['address']) && empty($site['phone']) && empty($site['email'])): ?><div class="alert alert-light border mb-0">Business contact fields are waiting for your verified GBP details.</div><?php endif; ?>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="lead-wrap">
                    <?php if ($error): ?><div class="alert alert-danger"><?= e($error) ?></div><?php endif; ?>
                    <div class="eyebrow text-warning mb-2">Enquiry</div>
                    <h2 class="h3">Tell us your requirement</h2>
                    <?php $formContext = 'General Enquiry'; $formCompact = false; require __DIR__ . '/includes/enquiry-form.php'; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
