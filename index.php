<?php
require __DIR__ . '/includes/bootstrap.php';

$pageTitle = 'CadMate India | CAD Training Institute in Jaipur | AutoCAD, Revit, SolidWorks & BIM';
$pageDescription = 'CadMate India offers practical CAD and engineering design training in Jaipur including AutoCAD, Revit, SolidWorks, BIM, Civil 3D, STAAD.Pro and ETABS, plus design and IT courses.';
$canonicalUrl = 'https://cadmateindia.com/';
require __DIR__ . '/includes/header.php';

$whatsapp = preg_replace('/\D+/', '', $site['whatsapp'] ?? '');
if ($whatsapp !== '' && !str_starts_with($whatsapp, '91')) {
    $whatsapp = '91' . $whatsapp;
}

$schema = [
    '@context' => 'https://schema.org',
    '@type' => 'EducationalOrganization',
    'name' => $site['name'],
    'url' => 'https://cadmateindia.com/',
    'email' => $site['email'],
    'telephone' => '+91-' . $site['phone'],
    'description' => $site['business_description'],
    'sameAs' => array_values(array_filter($site['social'])),
    'department' => array_map(static fn($location) => [
        '@type' => 'EducationalOrganization',
        'name' => 'CadMate India - ' . $location['name'],
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => $location['address'],
            'addressLocality' => 'Jaipur',
            'addressRegion' => 'Rajasthan',
            'addressCountry' => 'IN',
        ],
        'hasMap' => $location['map_url'],
    ], $site['locations']),
];
?>
<script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>

<section class="hero hero-home">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div class="hero-kicker"><span class="pulse-dot"></span> CAD & Engineering Design Training in Jaipur</div>
                <h1>Learn CAD. <span class="gradient-text">Design Better.</span><br>Build job-ready skills.</h1>
                <p class="lead mt-4">Start with practical CAD, BIM and engineering design training, then expand into graphic design, video editing, programming, data and technology skills—all under one learning ecosystem.</p>
                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a class="btn btn-brand btn-lg px-4" href="/courses.php?category=cad">Explore CAD Courses</a>
                    <?php if ($whatsapp): ?><a class="btn btn-outline-dark btn-lg px-4" href="https://wa.me/<?= e($whatsapp) ?>" target="_blank" rel="noopener">WhatsApp Counselling</a><?php endif; ?>
                </div>
                <div class="trust-row mt-4">
                    <span>✓ Practical training</span>
                    <span>✓ Project-focused learning</span>
                    <span>✓ Internship guidance</span>
                    <span>✓ 2 Jaipur centres</span>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hero-brand-card">
                    <img src="/assets/brand/cadmate-icon.png" alt="CadMate India" class="hero-brand-icon">
                    <div class="eyebrow mt-3">Upskill yourself for better careers</div>
                    <h2 class="h3 mt-2">Three focused learning tracks</h2>
                    <div class="track-list mt-4">
                        <a href="/courses.php?category=cad"><span>01</span><div><strong>CAD & Engineering Design</strong><small>Primary focus</small></div><b>→</b></a>
                        <a href="/courses.php?category=design"><span>02</span><div><strong>Design, Media & Marketing</strong><small>Creative skills</small></div><b>→</b></a>
                        <a href="/courses.php?category=it"><span>03</span><div><strong>IT, Coding & Data</strong><small>Technology skills</small></div><b>→</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space">
    <div class="container">
        <div class="section-heading">
            <div class="eyebrow mb-2">Primary learning path</div>
            <h2>CAD, BIM & engineering design courses</h2>
            <p>Choose a focused tool or build a broader design stack. CadMate India keeps engineering design at the centre of its training portfolio.</p>
        </div>
        <div class="row g-4">
            <?php foreach (array_slice($courseGroups['cad']['courses'], 0, 6) as $i => $course): ?>
                <div class="col-sm-6 col-lg-4">
                    <a class="cad-card" href="/course.php?slug=<?= e($course['slug']) ?>">
                        <div class="cad-card-top">
                            <span class="cad-number"><?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
                            <span class="cad-chip"><?= e($course['discipline']) ?></span>
                        </div>
                        <div class="cad-monogram"><?= e(strtoupper(substr($course['name'], 0, 2))) ?></div>
                        <h3><?= e($course['name']) ?> Course in Jaipur</h3>
                        <p>Practical learning path for <?= e(strtolower($course['discipline'])) ?>.</p>
                        <span class="learn-more">View course details →</span>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4">
            <a class="btn btn-dark px-4" href="/courses.php?category=cad">View all CAD & BIM courses</a>
        </div>
    </div>
</section>

<section class="section-space section-dark">
    <div class="container">
        <div class="row align-items-end g-4 mb-4">
            <div class="col-lg-8">
                <div class="eyebrow text-success mb-2">More career skills</div>
                <h2 class="display-6 fw-bold text-white">Creative + technology courses that complement your core skills.</h2>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a class="text-white fw-bold" href="/courses.php">Explore all courses →</a>
            </div>
        </div>
        <div class="row g-4">
            <?php
            $featured = [
                $courseGroups['design']['courses'][0],
                $courseGroups['design']['courses'][1],
                $courseGroups['it']['courses'][2],
                $courseGroups['it']['courses'][3],
            ];
            foreach ($featured as $course):
            ?>
                <div class="col-sm-6 col-lg-3">
                    <a class="image-course-card" href="/course.php?slug=<?= e($course['slug']) ?>">
                        <?php if (!empty($course['image'])): ?><img src="/<?= e($course['image']) ?>" alt="<?= e($course['name']) ?> course in Jaipur" loading="lazy"><?php endif; ?>
                        <div class="image-course-overlay">
                            <small><?= e($course['discipline']) ?></small>
                            <h3><?= e($course['name']) ?></h3>
                            <span>Explore →</span>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section-space">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="eyebrow mb-2">Why CadMate India</div>
                <h2 class="display-6 fw-bold">A clearer path from learning software to using it practically.</h2>
                <p class="text-secondary mt-3">The website is organised around outcomes instead of an endless course list: engineering design first, creative skills second, and IT/data skills third.</p>
                <div class="feature-grid mt-4">
                    <div><strong>Practical learning</strong><span>Tool-based exercises and project-oriented training.</span></div>
                    <div><strong>Career guidance</strong><span>Course counselling based on your qualification and goal.</span></div>
                    <div><strong>Internship & projects</strong><span>Separate routes for industrial training and project guidance.</span></div>
                    <div><strong>Jaipur support</strong><span>Mansarovar and Shyam Nagar locations.</span></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="lead-wrap">
                    <div class="eyebrow text-warning mb-2">Free course counselling</div>
                    <h2 class="h3">Tell us what you want to learn</h2>
                    <p class="text-light-emphasis">One centralized enquiry form is used across CadMate India.</p>
                    <?php $formContext = 'Homepage Counselling'; $formCompact = true; require __DIR__ . '/includes/enquiry-form.php'; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space section-soft" id="locations">
    <div class="container">
        <div class="section-heading">
            <div class="eyebrow mb-2">Visit CadMate India</div>
            <h2>Two training locations in Jaipur</h2>
            <p>Choose the location that is more convenient for counselling and course enquiries.</p>
        </div>
        <div class="row g-4">
            <?php foreach ($site['locations'] as $location): ?>
                <div class="col-lg-6">
                    <div class="location-card">
                        <span class="location-pin">⌖</span>
                        <div>
                            <h3><?= e($location['name']) ?></h3>
                            <p><?= e($location['address']) ?></p>
                            <div class="d-flex flex-wrap gap-2">
                                <a class="btn btn-sm btn-dark" href="<?= e($location['map_url']) ?>" target="_blank" rel="noopener">Open Google Maps</a>
                                <a class="btn btn-sm btn-outline-dark" href="tel:+91<?= e($site['phone']) ?>">Call <?= e($site['phone']) ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section-space social-band">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <div class="eyebrow mb-2">Stay connected</div>
                <h2 class="h1 fw-bold mb-2">Follow CadMate India</h2>
                <p class="text-secondary mb-0">Course updates, learning content and institute news across our official channels.</p>
            </div>
            <div class="col-lg-5">
                <div class="social-links-grid">
                    <?php if (!empty($site['social']['facebook'])): ?><a href="<?= e($site['social']['facebook']) ?>" target="_blank" rel="noopener">Facebook <span>↗</span></a><?php endif; ?>
                    <?php if (!empty($site['social']['instagram'])): ?><a href="<?= e($site['social']['instagram']) ?>" target="_blank" rel="noopener">Instagram <span>↗</span></a><?php endif; ?>
                    <?php if (!empty($site['social']['youtube'])): ?><a href="<?= e($site['social']['youtube']) ?>" target="_blank" rel="noopener">YouTube <span>↗</span></a><?php endif; ?>
                    <a href="/contact.php">Contact <span>→</span></a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
