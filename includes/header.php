<?php
$pageTitle = $pageTitle ?? ($site['name'] . ' | CAD, Design & IT Training in Jaipur');
$pageDescription = $pageDescription ?? ($site['seo_description'] ?? 'CadMate India offers practical CAD, engineering design, creative design and technology training in Jaipur.');
$canonicalUrl = $canonicalUrl ?? null;
$currentPath = currentUrlPath();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($pageDescription) ?>">
    <?php if ($canonicalUrl): ?><link rel="canonical" href="<?= e($canonicalUrl) ?>"><?php endif; ?>
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= e($pageTitle) ?>">
    <meta property="og:description" content="<?= e($pageDescription) ?>">
    <?php if ($canonicalUrl): ?><meta property="og:url" content="<?= e($canonicalUrl) ?>"><?php endif; ?>
    <meta property="og:site_name" content="CadMate India">
    <?php if (!empty($site['logo'])): ?><meta property="og:image" content="https://cadmateindia.com<?= e($site['logo']) ?>"><?php endif; ?>
    <meta name="twitter:card" content="summary">
    <?php if (!empty($site['favicon'])): ?><link rel="icon" type="image/png" href="<?= e($site['favicon']) ?>"><?php endif; ?>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/site.css">
</head>
<body>
<header class="site-header sticky-top">
    <div class="top-strip">
        <div class="container d-flex flex-wrap gap-2 gap-md-3 justify-content-between align-items-center py-2">
            <span class="top-strip-focus">CAD • BIM • Design • Coding • Data</span>
            <div class="d-flex flex-wrap gap-3 justify-content-center">
                <?php if (!empty($site['phone'])): ?><a href="tel:+91<?= e(preg_replace('/\D+/', '', $site['phone'])) ?>">Call +91 <?= e($site['phone']) ?></a><?php endif; ?>
                <?php if (!empty($site['email'])): ?><a class="top-email" href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a><?php endif; ?>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-xl bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand py-2" href="/" aria-label="CadMate India home">
                <img src="<?= e($site['logo']) ?>" alt="CadMate India - CAD and Design Training Institute in Jaipur" class="brand-logo" width="220" height="46">
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-xl-center">
                    <li class="nav-item"><a class="nav-link<?= $currentPath === '/' ? ' active' : '' ?>" href="/">Home</a></li>

                    <li class="nav-item dropdown position-static">
                        <a class="nav-link dropdown-toggle<?= $currentPath === '/courses.php' || $currentPath === '/course.php' ? ' active' : '' ?>" href="/courses.php" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Courses</a>
                        <div class="dropdown-menu mega-courses border-0 shadow-lg">
                            <div class="mega-courses-head">
                                <div>
                                    <span class="mega-eyebrow">CadMate India Courses</span>
                                    <strong>Choose your learning track</strong>
                                </div>
                                <a href="/courses.php">View all courses →</a>
                            </div>
                            <div class="mega-courses-grid">
                                <?php foreach ($courseGroups as $key => $group): ?>
                                    <div class="mega-course-column">
                                        <a class="mega-group-title" href="/courses.php?category=<?= e($key) ?>">
                                            <span><?= e((string)$group['priority']) ?></span>
                                            <div><strong><?= e($group['label']) ?></strong><small><?= count($group['courses']) ?> courses</small></div>
                                        </a>
                                        <?php foreach (array_slice($group['courses'], 0, 5) as $course): ?>
                                            <a class="mega-course-link" href="/course.php?slug=<?= e($course['slug']) ?>">
                                                <strong><?= e($course['name']) ?></strong>
                                                <small><?= e($course['discipline']) ?></small>
                                            </a>
                                        <?php endforeach; ?>
                                        <a class="mega-view-all" href="/courses.php?category=<?= e($key) ?>">All <?= e($group['label']) ?> →</a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item"><a class="nav-link<?= $currentPath === '/training.php' ? ' active' : '' ?>" href="/training.php">Internship & Training</a></li>
                    <li class="nav-item"><a class="nav-link<?= $currentPath === '/admissions.php' ? ' active' : '' ?>" href="/admissions.php">Admissions</a></li>
                    <li class="nav-item"><a class="nav-link<?= str_starts_with($currentPath, '/blog') ? ' active' : '' ?>" href="/blog/">Blog</a></li>
                    <li class="nav-item ms-xl-2 mt-2 mt-xl-0"><a class="btn btn-brand nav-cta" href="/contact.php">Enquire Now</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
