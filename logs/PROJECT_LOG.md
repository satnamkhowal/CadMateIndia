# CadMate India Project Log

## 2026-09-18

### Social Media / Business Profiles
- Facebook: https://www.facebook.com/CadMateIndiaJaipur
- Instagram: https://www.instagram.com/CadMateIndia
- YouTube: https://www.youtube.com/@CadMateIndia

### Contact
- Phone / WhatsApp: +91 8690047091
- Email: info@cadmateindia.com

### Locations
- Mansarovar / Vijay Path: 122/66, Madhyam Marg, near Vijay Path, Sector 122, Agarwal Farm, Sector 12, Mansarovar, Jaipur, Rajasthan 302020
- Google Maps: https://maps.app.goo.gl/QZuuxMeGfUgKi8cA7
- Gujjar Ki Thadi / Shyam Nagar: F1 F block, Metro station, New Sanganer Rd, near Shyam Nagar, Shyam Nagar, Jaipur, Jaipur Nagar Nigam Area, Rajasthan 302019
- Google Maps: https://maps.app.goo.gl/yKPzjbqfE9Ctc4nC6

### Website Source of Truth
Public business details and canonical social URLs are maintained in `config/site.php`.


### Branding Lock — 2026-09-18
- Official website header logo: original user-supplied `cademate india logo in in hoizaontal form for light bacdround.png`.
- Canonical SEO-friendly web asset: `assets/brand/cadmate-india-logo-horizontal-light.png`.
- Official favicon / brand icon: original user-supplied `Cad Mate India icon.png`.
- Canonical SEO-friendly web asset: `assets/brand/cadmate-india-icon.png`.
- Brand artwork must NOT be redrawn, recolored, cropped, retyped, AI-regenerated, or otherwise visually altered.
- Website CSS may only scale the supplied artwork proportionally for responsive display.


### Courses & Navigation Design Refresh — 2026-09-18
- Rebuilt `courses.php` so `/courses.php` is a complete all-courses catalog instead of silently defaulting to CAD.
- Kept category routes: `?category=cad`, `?category=design`, and `?category=it`.
- Added SEO titles/descriptions, canonical URLs and ItemList structured data.
- Replaced the three separate desktop course nav menus with one responsive Courses mega-menu.
- Refreshed course cards, filters, hero, counselling section and mobile layout.
- Refreshed `course.php` design with Course structured data, quick facts, learning approach, related courses and sticky enquiry.
- Original CadMate India supplied logo/icon remain unchanged; only proportional display sizing is used.


### SEO Course URL Cleanup — 2026-09-18
- Added `/courses/` rewrite to the existing Apache routing rules.
- Switched internal course catalog links from query-string URLs to clean SEO routes.
- Category URLs now use `/courses/cad/`, `/courses/design/`, and `/courses/it/`.
- Individual course URLs now use `/courses/{course-slug}/`.
- Updated course canonical URLs and ItemList/Course structured-data URLs to the clean route format.
- Updated homepage, header and footer course links to use the clean route structure.


### Sitemap & Crawl Setup — 2026-09-18
- Added dynamic `sitemap.php` covering core pages, course categories and every configured course.
- Added public `/sitemap.xml` rewrite.
- Added `robots.txt` with sitemap reference and protection for form/storage endpoints.
- Sitemap uses the new clean `/courses/` URL structure.
