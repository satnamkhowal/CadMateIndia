</main>
<footer class="site-footer mt-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-4">
                <h2 class="h4 mb-3">CadMate India</h2>
                <p class="mb-3">Practical CAD, BIM, engineering design, creative design and technology training in Jaipur.</p>
                <?php if (!empty($site['address'])): ?><p class="mb-1"><strong>Address:</strong> <?= e($site['address']) ?></p><?php endif; ?>
                <?php if (!empty($site['phone'])): ?><p class="mb-1"><strong>Phone:</strong> <?= e($site['phone']) ?></p><?php endif; ?>
                <?php if (!empty($site['email'])): ?><p class="mb-0"><strong>Email:</strong> <?= e($site['email']) ?></p><?php endif; ?>
            </div>
            <div class="col-6 col-lg-2">
                <h3 class="h6 text-uppercase">Primary</h3>
                <a href="/courses.php?category=cad">CAD Courses</a>
                <a href="/training.php">Industrial Training</a>
                <a href="/contact.php">Enquiry</a>
            </div>
            <div class="col-6 col-lg-2">
                <h3 class="h6 text-uppercase">Explore</h3>
                <a href="/courses.php?category=design">Design & Media</a>
                <a href="/courses.php?category=it">IT & Coding</a>
                <a href="/admissions.php">College Admissions</a>
            </div>
            <div class="col-lg-4">
                <h3 class="h6 text-uppercase">Need course guidance?</h3>
                <p>Tell us what you want to learn and your current qualification. The same centralized enquiry flow is used across the website.</p>
                <a class="btn btn-light" href="/contact.php">Get Course Guidance</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom py-3">
        <div class="container small">© <?= date('Y') ?> CadMate India. All rights reserved.</div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
