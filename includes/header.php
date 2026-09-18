<?php
$pageTitle = $pageTitle ?? ($site['name'] . ' | CAD, Design & IT Training in Jaipur');
$pageDescription = $pageDescription ?? 'CadMate India offers practical CAD, engineering design, creative design and technology training in Jaipur.';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($pageDescription) ?>">
    <?php if (!empty($site['favicon'])): ?><link rel="icon" href="<?= e($site['favicon']) ?>"><?php endif; ?>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/site.css">
</head>
<body>
<header class="site-header sticky-top">
    <div class="top-strip">
        <div class="container d-flex flex-wrap gap-3 justify-content-between align-items-center py-2">
            <span>CAD • BIM • Design • Coding • Data</span>
            <div class="d-flex gap-3">
                <?php if (!empty($site['phone'])): ?><a href="tel:<?= e(preg_replace('/\D+/', '', $site['phone'])) ?>"><?= e($site['phone']) ?></a><?php endif; ?>
                <?php if (!empty($site['email'])): ?><a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a><?php endif; ?>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-xl bg-white border-bottom py-3">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="/">
                <?php if (!empty($site['logo'])): ?>
                    <img src="<?= e($site['logo']) ?>" alt="CadMate India" class="brand-logo">
                <?php else: ?>
                    <span class="brand-mark">CM</span><span>CadMate India</span>
                <?php endif; ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-xl-center gap-xl-1">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <?php foreach ($courseGroups as $key => $group): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/courses.php?category=<?= e($key) ?>" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><?= e($group['label']) ?></a>
                        <div class="dropdown-menu course-menu shadow-sm border-0 p-3">
                            <div class="menu-grid">
                                <?php foreach ($group['courses'] as $course): ?>
                                    <a class="dropdown-item rounded" href="/course.php?slug=<?= e($course['slug']) ?>">
                                        <strong><?= e($course['name']) ?></strong><small><?= e($course['discipline']) ?></small>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                            <a class="view-all-link" href="/courses.php?category=<?= e($key) ?>">View all <?= e($group['label']) ?> →</a>
                        </div>
                    </li>
                    <?php endforeach; ?>
                    <li class="nav-item"><a class="nav-link" href="/admissions.php">College Admissions</a></li>
                    <li class="nav-item"><a class="nav-link" href="/training.php">Internship & Training</a></li>
                    <li class="nav-item"><a class="nav-link" href="/blog/">Blog</a></li>
                    <li class="nav-item ms-xl-2"><a class="btn btn-brand" href="/contact.php">Enquire Now</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
