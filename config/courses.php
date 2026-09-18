<?php
/**
 * Course catalog priority:
 * 1) CAD / engineering design
 * 2) Design / media
 * 3) IT / coding
 *
 * Keep course names, slugs and grouping here so navigation, cards and forms stay consistent.
 */
return [
    'cad' => [
        'label' => 'CAD & Engineering Design',
        'priority' => 1,
        'courses' => [
            ['slug' => 'autocad-course-jaipur', 'name' => 'AutoCAD', 'discipline' => '2D & 3D Drafting', 'image' => ''],
            ['slug' => 'revit-architecture-course-jaipur', 'name' => 'Revit Architecture', 'discipline' => 'BIM & Architecture', 'image' => ''],
            ['slug' => 'revit-mep-course-jaipur', 'name' => 'Revit MEP', 'discipline' => 'MEP & BIM', 'image' => ''],
            ['slug' => 'solidworks-course-jaipur', 'name' => 'SolidWorks', 'discipline' => 'Mechanical Design', 'image' => ''],
            ['slug' => 'catia-course-jaipur', 'name' => 'CATIA', 'discipline' => 'Product & Mechanical Design', 'image' => ''],
            ['slug' => 'creo-course-jaipur', 'name' => 'Creo', 'discipline' => '3D CAD & Product Design', 'image' => ''],
            ['slug' => 'sketchup-course-jaipur', 'name' => 'SketchUp', 'discipline' => 'Architecture & Interiors', 'image' => ''],
            ['slug' => '3ds-max-course-jaipur', 'name' => '3ds Max', 'discipline' => '3D Visualization', 'image' => ''],
            ['slug' => 'civil-3d-course-jaipur', 'name' => 'Civil 3D', 'discipline' => 'Civil Infrastructure Design', 'image' => ''],
            ['slug' => 'staad-pro-course-jaipur', 'name' => 'STAAD.Pro', 'discipline' => 'Structural Analysis', 'image' => ''],
            ['slug' => 'etabs-course-jaipur', 'name' => 'ETABS', 'discipline' => 'Building Analysis & Design', 'image' => ''],
            ['slug' => 'bim-course-jaipur', 'name' => 'BIM Professional', 'discipline' => 'Building Information Modeling', 'image' => ''],
        ],
    ],
    'design' => [
        'label' => 'Design, Media & Marketing',
        'priority' => 2,
        'courses' => [
            ['slug' => 'graphic-design-course-jaipur', 'name' => 'Graphic Design', 'discipline' => 'Creative Design', 'image' => 'assets/cadMate india course card/graphic-design-course-jaipur-cadmate-india.webp'],
            ['slug' => 'ui-ux-design-course-jaipur', 'name' => 'UI/UX Design', 'discipline' => 'Product Design', 'image' => 'assets/cadMate india course card/ui-ux-design-course-jaipur-cadmate-india.webp'],
            ['slug' => 'video-editing-course-jaipur', 'name' => 'Video Editing', 'discipline' => 'Video & Post Production', 'image' => ''],
            ['slug' => 'figma-course-jaipur', 'name' => 'Figma', 'discipline' => 'Interface Design', 'image' => 'assets/cadMate india course card/figma-course-jaipur-cadmate-india.webp'],
            ['slug' => 'digital-marketing-course-jaipur', 'name' => 'Digital Marketing', 'discipline' => 'Performance & Digital Marketing', 'image' => 'assets/cadMate india course card/digital-marketing-course-jaipur-cadmate-india.webp'],
        ],
    ],
    'it' => [
        'label' => 'IT, Coding & Data',
        'priority' => 3,
        'courses' => [
            ['slug' => 'python-programming-course-jaipur', 'name' => 'Python Programming', 'discipline' => 'Programming', 'image' => 'assets/cadMate india course card/python-programming-course-jaipur-cadmate-india-light.webp'],
            ['slug' => 'java-programming-course-jaipur', 'name' => 'Java Programming', 'discipline' => 'Programming', 'image' => 'assets/cadMate india course card/java-programming-course-jaipur-cadmate-india.webp'],
            ['slug' => 'full-stack-development-course-jaipur', 'name' => 'Full Stack Development', 'discipline' => 'Web Development', 'image' => 'assets/cadMate india course card/full-stack-development-course-jaipur-cadmate-india.webp'],
            ['slug' => 'data-analytics-course-jaipur', 'name' => 'Data Analytics', 'discipline' => 'Data & BI', 'image' => 'assets/cadMate india course card/data-analytics-course-jaipur-cadmate-india.webp'],
            ['slug' => 'data-science-course-jaipur', 'name' => 'Data Science', 'discipline' => 'Data & AI', 'image' => 'assets/cadMate india course card/data-science-course-jaipur-cadmate-india.webp'],
            ['slug' => 'artificial-intelligence-course-jaipur', 'name' => 'Artificial Intelligence', 'discipline' => 'AI', 'image' => 'assets/cadMate india course card/artificial-intelligence-course-jaipur-cadmate-india.webp'],
            ['slug' => 'cloud-computing-course-jaipur', 'name' => 'Cloud Computing', 'discipline' => 'Cloud', 'image' => 'assets/cadMate india course card/cloud-computing-course-jaipur-cadmate-india.webp'],
            ['slug' => 'cyber-security-course-jaipur', 'name' => 'Cyber Security', 'discipline' => 'Security', 'image' => 'assets/cadMate india course card/cyber-security-course-jaipur-cadmate-india.webp'],
        ],
    ],
];
