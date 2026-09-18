# CadMate India Website

PHP/Bootstrap website foundation for a CAD-first training brand in Jaipur.

## Positioning

1. **Primary:** CAD, BIM and engineering design training
2. **Secondary:** Graphic design, UI/UX, video editing and digital marketing
3. **Third:** IT, coding, data, AI, cloud and cyber-security programs
4. Separate service paths for college admissions, internships, industrial training and projects

## Architecture

- `index.php` — homepage
- `courses.php` — course-category listings
- `course.php` — reusable course detail template
- `contact.php` — central enquiry page
- `admissions.php` — admission guidance
- `training.php` — internship / industrial training
- `blog/` — SEO content area
- `config/site.php` — verified business details only
- `config/courses.php` — central course catalog
- `includes/header.php` / `footer.php` — shared layout
- `includes/enquiry-form.php` — single reusable form component
- `form-process.php` — single lead processing endpoint
- `storage/` — protected runtime lead storage (CSV is ignored by Git)
- `docs/SOURCE_OF_TRUTH.md` — editing/locking rules

## Before production launch

Update only verified business details in `config/site.php`, upload/map the official logo and favicon, add final CAD course-card images, verify course syllabi/duration/fees, set `lead_notification_email` if email alerts are required, and make sure the hosting account grants PHP write permission to `storage/` if CSV lead storage is being used.

The future CRM/lead-management integration should be added to `form-process.php` rather than creating separate processors per page.
