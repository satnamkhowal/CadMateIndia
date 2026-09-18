<?php
require __DIR__ . '/includes/bootstrap.php';
$pageTitle = 'Contact CadMate India Jaipur | Mansarovar & Shyam Nagar';
$pageDescription = 'Contact CadMate India for CAD, engineering design, creative design and IT training in Jaipur. Visit our Mansarovar or Shyam Nagar centre.';
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
                    <h2 class="h3">CadMate India Jaipur centres</h2>
                    <?php if (!empty($site['phone'])): ?><p><strong>Phone / WhatsApp</strong><br><a href="tel:+91<?= e($site['phone']) ?>">+91 <?= e($site['phone']) ?></a></p><?php endif; ?>
                    <?php if (!empty($site['email'])): ?><p><strong>Email</strong><br><a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a></p><?php endif; ?>

                    <?php foreach (($site['locations'] ?? []) as $location): ?>
                        <div class="border-top pt-3 mt-3">
                            <h3 class="h6 mb-2"><?= e($location['name'] ?? 'Jaipur Centre') ?></h3>
                            <p class="text-secondary mb-2"><?= e($location['address'] ?? '') ?></p>
                            <?php if (!empty($location['map_url'])): ?>
                                <a href="<?= e($location['map_url']) ?>" target="_blank" rel="noopener">View on Google Maps</a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>

                    <div class="border-top pt-3 mt-3">
                        <h3 class="h6">Follow CadMate India</h3>
                        <?php if (!empty($site['social']['facebook'])): ?><a class="me-3" href="<?= e($site['social']['facebook']) ?>" target="_blank" rel="noopener">Facebook</a><?php endif; ?>
                        <?php if (!empty($site['social']['instagram'])): ?><a href="<?= e($site['social']['instagram']) ?>" target="_blank" rel="noopener">Instagram</a><?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-7" id="enquiry">
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
