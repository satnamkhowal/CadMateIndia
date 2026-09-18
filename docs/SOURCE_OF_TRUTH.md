# CadMate India — Source of Truth / Content Lock

This file defines where important information is allowed to live. Future edits should follow these rules so the site does not drift or duplicate business data.

## 1. Business identity and contact details — LOCKED SOURCE

**Canonical file:** `config/site.php`

Only this file should contain the verified public phone, WhatsApp, email, physical address, logo path, favicon path, social profile URLs and lead-notification email.

Do not hard-code these details into individual pages, headers, footers or blog posts.

Before changing address/phone/business identity, verify against the details supplied by CadMate India / its official Google Business Profile.

## 2. Course names, groups and slugs — LOCKED SOURCE

**Canonical file:** `config/courses.php`

Priority order is intentional:

1. CAD & Engineering Design
2. Design, Media & Marketing
3. IT, Coding & Data

Course cards and menu entries should read from this file. Avoid creating duplicate spellings/slugs elsewhere.

Do not invent fees, durations, batch dates, trainer names, certifications, placement statistics or eligibility. Add them only after CadMate provides verified details.

## 3. Forms — LOCKED COMPONENT

**Reusable form:** `includes/enquiry-form.php`

**Single processor:** `form-process.php`

All public enquiry forms should post to the same processor. Course/landing pages should pass only a meaningful `context` value so lead source remains identifiable.

Temporary runtime storage is `storage/leads.csv` and is intentionally ignored by Git. The `storage` directory is protected from direct Apache web access.

When the existing lead-management system is connected later, integrate it inside `form-process.php` instead of duplicating form-processing logic across pages.

## 4. Shared layout

- Header/navigation: `includes/header.php`
- Footer: `includes/footer.php`
- Shared bootstrap/helpers: `includes/bootstrap.php`
- Main styling: `assets/css/site.css`

Avoid page-specific copies of the header, menu, footer or form.

## 5. Existing uploaded assets

Existing files under `assets/cadMate india course card/` are preserved. Do not rename/delete them in the foundation phase. New verified CadMate logo, favicon and CAD course-card assets can be uploaded and then mapped from the central config files.

## 6. Admissions

College admissions are a separate service path from skill courses. Do not mix college names, affiliations, fee claims or guaranteed-admission wording into course pages unless separately verified.
