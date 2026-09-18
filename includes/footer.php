</main>
<?php
$phoneDigits = preg_replace('/\D+/', '', (string)($site['phone'] ?? ''));
$whatsappDigits = preg_replace('/\D+/', '', (string)($site['whatsapp'] ?? $site['phone'] ?? ''));
$waNumber = $whatsappDigits ? '91' . ltrim($whatsappDigits, '0') : '';
$footerLogoCandidates = [
    '/assets/brand/cademate india logo in in hoizaontal form for black bacdround.png',
    '/assets/brand/cadmate-india-logo-horizontal-dark.png',
];
$footerLogo = $site['logo'] ?? '';
foreach ($footerLogoCandidates as $candidate) {
    $candidatePath = rtrim((string)($_SERVER['DOCUMENT_ROOT'] ?? ''), '/') . $candidate;
    if ($candidatePath && is_file($candidatePath)) {
        $footerLogo = $candidate;
        break;
    }
}
$sameAs = array_values(array_filter($site['social'] ?? []));
$orgSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'EducationalOrganization',
    'name' => $site['name'] ?? 'CadMate India',
    'url' => 'https://cadmateindia.com/',
    'logo' => 'https://cadmateindia.com' . ($site['logo'] ?? ''),
    'description' => $site['business_description'] ?? ($site['seo_description'] ?? ''),
    'telephone' => $phoneDigits ? '+91' . $phoneDigits : null,
    'email' => $site['email'] ?? null,
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => $site['address'] ?? '',
        'addressLocality' => $site['city'] ?? 'Jaipur',
        'addressRegion' => $site['state'] ?? 'Rajasthan',
        'addressCountry' => 'IN'
    ],
    'sameAs' => $sameAs
];
?>
<style>
.site-footer-rich{position:relative;overflow:hidden;background:radial-gradient(circle at 15% 0,rgba(139,70,255,.20),transparent 30%),radial-gradient(circle at 88% 16%,rgba(101,214,0,.10),transparent 25%),#080a0f;color:#aeb6c4}
.site-footer-rich:before{content:"";position:absolute;inset:0;background:linear-gradient(120deg,rgba(255,255,255,.025),transparent 36%);pointer-events:none}
.site-footer-rich .footer-inner{position:relative;z-index:1}
.site-footer-rich h3{color:#fff;font-weight:800;letter-spacing:-.01em}
.site-footer-rich p,.site-footer-rich small{color:#aeb6c4}
.site-footer-rich a{color:#cbd1db;transition:.18s ease}
.site-footer-rich a:hover{color:#fff;transform:translateX(2px)}
.footer-brand-card{height:100%;padding:1.45rem;border:1px solid rgba(255,255,255,.08);border-radius:22px;background:rgba(255,255,255,.035)}
.footer-logo-dark{display:block;width:auto;height:52px;max-width:245px;object-fit:contain;margin-bottom:1rem}
.footer-logo-fallback{display:inline-flex;background:#fff;border-radius:14px;padding:.62rem .78rem;margin-bottom:1rem}
.footer-logo-fallback .footer-logo-dark{margin:0}
.footer-contact-row{display:flex;flex-wrap:wrap;gap:.65rem;margin-top:1rem}
.footer-contact-pill{display:inline-flex!important;align-items:center;gap:.5rem;margin:0!important;padding:.62rem .78rem;border:1px solid rgba(255,255,255,.10);border-radius:999px;background:rgba(255,255,255,.045);font-weight:700;font-size:.86rem}
.footer-col-links a{display:flex;align-items:center;gap:.45rem;margin:.62rem 0;font-size:.92rem}
.footer-col-links a:before{content:"›";color:#8b46ff;font-weight:900}
.footer-centre{display:block!important;padding:.75rem .85rem;margin:.55rem 0!important;border:1px solid rgba(255,255,255,.08);border-radius:14px;background:rgba(255,255,255,.03)}
.footer-centre strong{display:block;color:#fff;margin-bottom:.18rem}
.footer-social-rich{display:flex;flex-wrap:wrap;gap:.55rem;margin-top:1rem}
.footer-social-rich a{display:inline-flex!important;align-items:center;gap:.35rem;margin:0!important;padding:.5rem .7rem;border:1px solid rgba(255,255,255,.09);border-radius:10px;background:rgba(255,255,255,.03);font-size:.82rem;font-weight:700}
.footer-bottom-rich{position:relative;z-index:1;border-top:1px solid rgba(255,255,255,.07);background:#050609;color:#7f8795}
.footer-floating-actions{position:fixed;right:18px;bottom:18px;z-index:1045;display:flex;flex-direction:column;gap:10px}
.footer-float-btn{width:54px;height:54px;display:grid!important;place-items:center;border-radius:50%;color:#fff!important;box-shadow:0 12px 30px rgba(0,0,0,.24);transition:.2s ease}
.footer-float-btn:hover{transform:translateY(-3px)!important}
.footer-float-btn svg{width:25px;height:25px;fill:currentColor}
.footer-float-wa{background:#25D366}
.footer-float-call{background:#6f35dc}
.footer-actions-label{position:absolute;right:64px;white-space:nowrap;padding:.42rem .6rem;border-radius:8px;background:#11151d;color:#fff;font-size:.72rem;font-weight:700;opacity:0;pointer-events:none;transform:translateX(5px);transition:.18s ease}
.footer-float-btn:hover .footer-actions-label{opacity:1;transform:none}
@media(max-width:767.98px){.footer-floating-actions{right:12px;bottom:12px}.footer-float-btn{width:50px;height:50px}.footer-actions-label{display:none}.footer-logo-dark{height:46px;max-width:215px}}
</style>

<footer class="site-footer-rich mt-0">
    <div class="container footer-inner py-5">
        <div class="row g-4 g-lg-5">
            <div class="col-lg-4">
                <div class="footer-brand-card">
                    <div class="<?= $footerLogo === ($site['logo'] ?? '') ? 'footer-logo-fallback' : '' ?>">
                        <img src="<?= e($footerLogo) ?>" alt="CadMate India - CAD, BIM, Design and Technology Training in Jaipur" class="footer-logo-dark" width="245" height="52">
                    </div>
                    <p class="mb-3">Practical CAD, BIM, engineering design, creative design and technology training in Jaipur with centres in Mansarovar and Shyam Nagar.</p>
                    <div class="footer-contact-row">
                        <?php if ($phoneDigits): ?><a class="footer-contact-pill" href="tel:+91<?= e($phoneDigits) ?>" aria-label="Call CadMate India">☎ +91 <?= e($site['phone']) ?></a><?php endif; ?>
                        <?php if ($waNumber): ?><a class="footer-contact-pill" href="https://wa.me/<?= e($waNumber) ?>?text=Hello%20CadMate%20India%2C%20I%20want%20course%20details." target="_blank" rel="noopener" aria-label="WhatsApp CadMate India">WhatsApp</a><?php endif; ?>
                        <?php if (!empty($site['email'])): ?><a class="footer-contact-pill" href="mailto:<?= e($site['email']) ?>">✉ <?= e($site['email']) ?></a><?php endif; ?>
                    </div>
                    <div class="footer-social-rich">
                        <?php if (!empty($site['social']['facebook'])): ?><a href="<?= e($site['social']['facebook']) ?>" target="_blank" rel="noopener">Facebook</a><?php endif; ?>
                        <?php if (!empty($site['social']['instagram'])): ?><a href="<?= e($site['social']['instagram']) ?>" target="_blank" rel="noopener">Instagram</a><?php endif; ?>
                        <?php if (!empty($site['social']['youtube'])): ?><a href="<?= e($site['social']['youtube']) ?>" target="_blank" rel="noopener">YouTube</a><?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-2 footer-col-links">
                <h3 class="h6 text-uppercase mb-3">Top Courses</h3>
                <a href="/courses/cad/">CAD & BIM Courses</a>
                <a href="/courses/design/">Design & Media</a>
                <a href="/courses/it/">IT & Coding</a>
                <a href="/courses/">All Courses</a>
            </div>

            <div class="col-6 col-lg-2 footer-col-links">
                <h3 class="h6 text-uppercase mb-3">Quick Links</h3>
                <a href="/training.php">Internship & Training</a>
                <a href="/admissions.php">Admissions</a>
                <a href="/blog/">Career & Course Blog</a>
                <a href="/contact.php">Contact & Enquiry</a>
                <a href="/sitemap.xml">Sitemap</a>
            </div>

            <div class="col-lg-4">
                <h3 class="h6 text-uppercase mb-3">CadMate India Jaipur Centres</h3>
                <?php foreach ($site['locations'] as $location): ?>
                    <a class="footer-centre" href="<?= e($location['map_url']) ?>" target="_blank" rel="noopener" aria-label="View <?= e($location['name']) ?> on Google Maps">
                        <strong><?= e($location['name']) ?></strong>
                        <small><?= e($location['address']) ?></small>
                    </a>
                <?php endforeach; ?>
                <p class="small mt-3 mb-0">CAD • BIM • Engineering Design • Graphic Design • Video Editing • Coding • Data & Technology Training</p>
            </div>
        </div>
    </div>

    <div class="footer-bottom-rich py-3">
        <div class="container small d-flex flex-wrap justify-content-between gap-2">
            <span>© <?= date('Y') ?> CadMate India. All rights reserved.</span>
            <span>CAD, Design & Technology Training Institute in Jaipur</span>
        </div>
    </div>
</footer>

<div class="footer-floating-actions" aria-label="Quick contact">
    <?php if ($waNumber): ?>
    <a class="footer-float-btn footer-float-wa" href="https://wa.me/<?= e($waNumber) ?>?text=Hello%20CadMate%20India%2C%20I%20want%20course%20details." target="_blank" rel="noopener" aria-label="Chat with CadMate India on WhatsApp">
        <span class="footer-actions-label">WhatsApp</span>
        <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16.01 3C8.83 3 3 8.76 3 15.86c0 2.48.72 4.9 2.08 6.96L3 29l6.4-2.02a13.08 13.08 0 0 0 6.6 1.79h.01C23.18 28.77 29 23 29 15.9 29 8.79 23.18 3 16.01 3Zm0 23.6a10.9 10.9 0 0 1-5.56-1.51l-.4-.24-3.8 1.2 1.24-3.66-.26-.41a10.63 10.63 0 0 1-1.68-5.75c0-5.88 4.85-10.66 10.8-10.66 2.88 0 5.59 1.11 7.62 3.12a10.52 10.52 0 0 1 3.16 7.54c0 5.88-4.84 10.67-10.78 10.67l-.34-.3Zm5.92-7.98c-.33-.16-1.93-.94-2.23-1.05-.3-.11-.52-.16-.74.16-.22.32-.85 1.05-1.04 1.27-.19.22-.38.24-.71.08-.33-.16-1.39-.51-2.65-1.61a9.9 9.9 0 0 1-1.84-2.27c-.19-.32-.02-.49.14-.65.15-.14.33-.38.49-.57.16-.19.22-.32.33-.54.11-.22.05-.41-.03-.57-.08-.16-.74-1.77-1.01-2.43-.27-.64-.54-.55-.74-.56h-.63c-.22 0-.57.08-.87.41-.3.32-1.14 1.11-1.14 2.7 0 1.59 1.17 3.13 1.33 3.35.16.22 2.3 3.47 5.57 4.86.78.33 1.39.53 1.87.68.79.25 1.5.21 2.06.13.63-.09 1.93-.78 2.2-1.53.27-.75.27-1.4.19-1.53-.08-.14-.3-.22-.63-.38Z"/></svg>
    </a>
    <?php endif; ?>
    <?php if ($phoneDigits): ?>
    <a class="footer-float-btn footer-float-call" href="tel:+91<?= e($phoneDigits) ?>" aria-label="Call CadMate India">
        <span class="footer-actions-label">Call Now</span>
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.62 10.79a15.46 15.46 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24c1.12.37 2.33.57 3.57.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.61 21 3 13.39 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.25 1.02l-2.2 2.2Z"/></svg>
    </a>
    <?php endif; ?>
</div>

<script type="application/ld+json"><?= json_encode(array_filter($orgSchema, static fn($v) => $v !== null && $v !== ''), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
