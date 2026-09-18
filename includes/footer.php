</main>
<footer class="site-footer mt-0">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="footer-logo-panel">
                    <img src="<?= e($site['logo']) ?>" alt="CadMate India" class="footer-logo" width="220" height="46">
                </div>
                <p class="mb-3">Practical CAD, BIM, engineering design, creative design and technology training in Jaipur.</p>
                <?php if (!empty($site['phone'])): ?><p class="mb-1"><strong>Phone:</strong> <a class="d-inline" href="tel:+91<?= e($site['phone']) ?>">+91 <?= e($site['phone']) ?></a></p><?php endif; ?>
                <?php if (!empty($site['email'])): ?><p class="mb-0"><strong>Email:</strong> <a class="d-inline" href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a></p><?php endif; ?>
            </div>
            <div class="col-6 col-lg-2">
                <h3 class="h6 text-uppercase">Primary</h3>
                <a href="/courses.php?category=cad">CAD & BIM Courses</a>
                <a href="/training.php">Industrial Training</a>
                <a href="/contact.php">Course Enquiry</a>
            </div>
            <div class="col-6 col-lg-2">
                <h3 class="h6 text-uppercase">Explore</h3>
                <a href="/courses.php?category=design">Design & Media</a>
                <a href="/courses.php?category=it">IT & Coding</a>
                <a href="/admissions.php">College Admissions</a>
                <a href="/blog/">Blog</a>
            </div>
            <div class="col-lg-4">
                <h3 class="h6 text-uppercase">Jaipur Centres</h3>
                <?php foreach ($site['locations'] as $location): ?>
                    <a href="<?= e($location['map_url']) ?>" target="_blank" rel="noopener"><strong><?= e($location['name']) ?></strong><small class="d-block"><?= e($location['address']) ?></small></a>
                <?php endforeach; ?>
                <div class="footer-social mt-3">
                    <?php if (!empty($site['social']['facebook'])): ?><a href="<?= e($site['social']['facebook']) ?>" target="_blank" rel="noopener">Facebook</a><?php endif; ?>
                    <?php if (!empty($site['social']['instagram'])): ?><a href="<?= e($site['social']['instagram']) ?>" target="_blank" rel="noopener">Instagram</a><?php endif; ?>
                    <?php if (!empty($site['social']['youtube'])): ?><a href="<?= e($site['social']['youtube']) ?>" target="_blank" rel="noopener">YouTube</a><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom py-3">
        <div class="container small d-flex flex-wrap justify-content-between gap-2">
            <span>© <?= date('Y') ?> CadMate India. All rights reserved.</span>
            <span>CAD • Design • Technology Training in Jaipur</span>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
