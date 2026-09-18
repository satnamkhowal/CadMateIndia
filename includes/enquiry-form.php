<?php
$formContext = $formContext ?? 'General Enquiry';
$formCompact = $formCompact ?? false;
?>
<form class="lead-form <?= $formCompact ? 'lead-form-compact' : '' ?>" action="/form-process.php" method="post" novalidate>
    <input type="hidden" name="csrf_token" value="<?= e($_SESSION['csrf_token']) ?>">
    <input type="hidden" name="context" value="<?= e($formContext) ?>">
    <input type="hidden" name="source_url" value="<?= e($_SERVER['REQUEST_URI'] ?? '/') ?>">
    <div class="visually-hidden" aria-hidden="true">
        <label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
    </div>
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label" for="lead-name">Name *</label>
            <input class="form-control" id="lead-name" name="name" maxlength="100" required>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="lead-phone">Phone *</label>
            <input class="form-control" id="lead-phone" name="phone" inputmode="tel" maxlength="20" required>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="lead-email">Email</label>
            <input class="form-control" id="lead-email" type="email" name="email" maxlength="150">
        </div>
        <div class="col-md-6">
            <label class="form-label" for="lead-interest">Course / Requirement</label>
            <input class="form-control" id="lead-interest" name="interest" maxlength="160" value="<?= e($formContext !== 'General Enquiry' ? $formContext : '') ?>">
        </div>
        <?php if (!$formCompact): ?>
        <div class="col-12">
            <label class="form-label" for="lead-message">Message</label>
            <textarea class="form-control" id="lead-message" name="message" rows="4" maxlength="1000"></textarea>
        </div>
        <?php endif; ?>
        <div class="col-12 d-grid d-sm-block">
            <button class="btn btn-brand btn-lg" type="submit">Request Counselling</button>
        </div>
    </div>
</form>
