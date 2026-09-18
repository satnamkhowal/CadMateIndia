<?php
require __DIR__ . '/includes/bootstrap.php';
$pageTitle = 'CadMate India | CAD, BIM, Design & IT Training in Jaipur';
$pageDescription = 'Learn AutoCAD, Revit, SolidWorks, BIM, graphic design, video editing, coding, data and technology skills with practical training in Jaipur.';
require __DIR__ . '/includes/header.php';
?>
<section class="hero">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div class="eyebrow mb-3">CAD-first career training in Jaipur</div>
                <h1>Build practical skills in CAD, BIM, Design & Technology.</h1>
                <p class="lead mt-4">CadMate India is being structured around engineering design first, creative design second and job-oriented IT skills third—so students can find the right learning path without a confusing course list.</p>
                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a class="btn btn-brand btn-lg" href="/courses.php?category=cad">Explore CAD Courses</a>
                    <a class="btn btn-outline-dark btn-lg" href="/contact.php">Get Free Counselling</a>
                </div>
                <div class="d-flex flex-wrap gap-3 mt-4 small text-secondary">
                    <span>✓ Practical learning</span><span>✓ Project-focused training</span><span>✓ Career guidance</span><span>✓ Jaipur-based support</span>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hero-panel">
                    <div class="eyebrow mb-2">Choose your direction</div>
                    <h2 class="h3 mb-4">Three clear learning tracks</h2>
                    <div class="stat-grid">
                        <div class="stat"><strong>01</strong><span>CAD & Engineering Design</span></div>
                        <div class="stat"><strong>02</strong><span>Design, Media & Marketing</span></div>
                        <div class="stat"><strong>03</strong><span>IT, Coding & Data</span></div>
                    </div>
                    <hr class="my-4">
                    <p class="mb-0 text-secondary">College admissions, internships, industrial training and project guidance stay available as separate service paths.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space">
    <div class="container">
        <div class="section-heading">
            <div class="eyebrow mb-2">Course hierarchy</div>
            <h2>CAD stays primary. Everything else supports it.</h2>
            <p>This structure keeps CadMate’s identity focused while still allowing creative and IT programs to grow without diluting the main positioning.</p>
        </div>
        <div class="row g-4">
            <?php foreach ($courseGroups as $key => $group): ?>
                <div class="col-md-4">
                    <a class="priority-card d-block" href="/courses.php?category=<?= e($key) ?>">
                        <span class="priority-badge">Priority <?= e((string)$group['priority']) ?></span>
                        <h3 class="h4 mt-3"><?= e($group['label']) ?></h3>
                        <p class="text-secondary mb-3"><?= count($group['courses']) ?> focused learning paths currently structured.</p>
                        <span class="learn-more">Explore courses →</span>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section-space section-soft">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
            <div class="section-heading mb-0">
                <div class="eyebrow mb-2">Primary programs</div>
                <h2>Popular CAD & BIM training paths</h2>
                <p>Course images can be swapped in as soon as the final CadMate CAD assets are uploaded.</p>
            </div>
            <a class="fw-bold text-warning-emphasis" href="/courses.php?category=cad">View all CAD courses →</a>
        </div>
        <div class="row g-4">
            <?php foreach (array_slice($courseGroups['cad']['courses'], 0, 6) as $course): ?>
                <div class="col-sm-6 col-lg-4">
                    <a class="course-card d-block" href="/course.php?slug=<?= e($course['slug']) ?>">
                        <?php if (!empty($course['image'])): ?><img src="/<?= e($course['image']) ?>" alt="<?= e($course['name']) ?> course in Jaipur"><?php else: ?><div class="course-placeholder"><?= e(substr($course['name'], 0, 2)) ?></div><?php endif; ?>
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

<section class="section-space">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-7">
                <div class="section-heading">
                    <div class="eyebrow mb-2">Beyond CAD</div>
                    <h2>Creative and technology skills under the same guidance system</h2>
                    <p>Graphic design, UI/UX, digital marketing, Python, Java, Full Stack, Data Analytics, AI, Cloud and Cyber Security can sit under secondary menus while CadMate’s primary identity remains engineering design.</p>
                </div>
                <div class="row g-3">
                    <?php foreach (array_merge(array_slice($courseGroups['design']['courses'],0,3), array_slice($courseGroups['it']['courses'],0,3)) as $course): ?>
                    <div class="col-md-6"><a class="content-card d-block" href="/course.php?slug=<?= e($course['slug']) ?>"><strong><?= e($course['name']) ?></strong><div class="course-meta mt-1"><?= e($course['discipline']) ?></div></a></div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="lead-wrap h-100">
                    <div class="eyebrow text-warning mb-2">Centralized enquiry</div>
                    <h2 class="h3">Tell us what you want to learn</h2>
                    <p class="text-light-emphasis">Every course page uses this same form component and the same processing endpoint.</p>
                    <?php $formContext = 'Homepage Counselling'; $formCompact = true; require __DIR__ . '/includes/enquiry-form.php'; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space section-soft">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4"><a class="feature-card d-block p-4" href="/training.php"><div class="eyebrow mb-2">Experience</div><h2 class="h4">Internship & Industrial Training</h2><p class="text-secondary mb-0">Structured practical exposure, live-project learning and final-year project guidance.</p></a></div>
            <div class="col-md-4"><a class="feature-card d-block p-4" href="/admissions.php"><div class="eyebrow mb-2">Admissions</div><h2 class="h4">College Admission Guidance</h2><p class="text-secondary mb-0">A separate path for students exploring BCA, MCA, B.Tech, BBA, MBA and related programs.</p></a></div>
            <div class="col-md-4"><a class="feature-card d-block p-4" href="/contact.php"><div class="eyebrow mb-2">Guidance</div><h2 class="h4">Talk to CadMate</h2><p class="text-secondary mb-0">Share your qualification, goal and preferred course for a suitable learning-path discussion.</p></a></div>
        </div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
