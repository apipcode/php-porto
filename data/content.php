<?php
/**
 * Centralized content configuration for the portfolio.
 *
 * All dynamic data used on the site is stored here to keep the layout
 * files simple, clean, and easy to maintain.
 */

// Social links used in the footer and other areas
$socialLinks = [
    'linkedin' => 'https://www.linkedin.com/in/ramdhan-lesmana',
    'github'   => 'https://github.com/apipcode',
    'email'    => 'abiplesmana@gmail.com',
];

// Professional experience timeline
$experiences = [
    [
        'company'    => 'Badan Riset Dan Inovasi Nasional',
        'role'       => 'Front-End Developer',
        'location'   => 'Indonesia - Jakarta',
        'duration'   => '2023 – Present',
        'stack'      => ['PHP', 'MySQL', 'REST API', 'Tailwind CSS'],
        'highlights' => [
            'Architected and maintained responsive front-end interfaces for two primary web applications built on the Laravel framework, ensuring seamless user experiences.',
            'Engineered highly reusable and accessible UI components using Tailwind CSS, adhering to modern mobile-first design principles.',
            'Streamlined development workflows by utilizing Docker for consistent containerized environments and managing version control via GitLab CI/CD pipelines.',
            'Optimized application performance by collaborating on API integrations and implementing efficient front-end rendering logic to reduce latency.',
            'Collaborated in an Agile environment to translate complex scientific data requirements into intuitive, user-friendly dashboard modules.',
        ],
    ],
    // [
    //     'company'    => 'Digital Solutions Studio',
    //     'role'       => 'Full-Stack Web Developer',
    //     'location'   => 'Indonesia',
    //     'duration'   => '2021 – 2023',
    //     'stack'      => ['PHP', 'Laravel', 'JavaScript', 'Bootstrap'],
    //     'highlights' => [
    //         'Implemented new features and resolved production issues across multiple client-facing web applications.',
    //         'Worked with designers and product owners to translate business requirements into maintainable technical solutions.',
    //         'Participated in code reviews, ensuring consistent coding standards and security practices.',
    //     ],
    // ],
    // [
    //     'company'    => 'Freelance & Personal Projects',
    //     'role'       => 'Web Developer',
    //     'location'   => 'Remote',
    //     'duration'   => '2019 – 2021',
    //     'stack'      => ['PHP', 'MySQL', 'WordPress', 'Tailwind CSS'],
    //     'highlights' => [
    //         'Delivered custom web solutions for small businesses including portfolio sites and simple dashboards.',
    //         'Handled end-to-end lifecycle from requirements gathering and prototyping to deployment and basic support.',
    //     ],
    // ],
];

// Highlighted projects
$projects = [
    [
        'title'       => 'HR-Friendly Portfolio Platform',
        'type'        => 'Personal Project',
        'description' => 'A portfolio template designed specifically for HR review, with clear experience timelines, projects, and certification visibility.',
        'stack'       => ['PHP', 'Tailwind CSS', 'MySQL'],
        'github'      => 'https://github.com/your-github-username/hr-portfolio',
        'live_demo'   => '#',
    ],
    [
        'title'       => 'Internal Task Management Dashboard',
        'type'        => 'Client Project',
        'description' => 'Role-based dashboard for managing internal tasks, deadlines, and status tracking within a small team.',
        'stack'       => ['PHP', 'MySQL', 'Alpine.js', 'Tailwind CSS'],
        'github'      => '',
        'live_demo'   => '#',
    ],
    [
        'title'       => 'Lightweight CMS for Landing Pages',
        'type'        => 'Personal Project',
        'description' => 'Simple content management system enabling non-technical users to update landing page sections without touching code.',
        'stack'       => ['PHP', 'MySQL', 'Tailwind CSS'],
        'github'      => 'https://github.com/your-github-username/lightweight-cms',
        'live_demo'   => '#',
    ],
];

// Certifications and credentials
$certifications = [
    [
        'name'          => 'PHP Developer Certification (Example)',
        'issuer'        => 'Online Learning Platform',
        'issued'        => '2023',
        'credential_id' => 'CERT-1234-EXAMPLE',
        'verify_url'    => 'https://example.com/verify/cert-1234',
    ],
    [
        'name'          => 'Backend Web Development Specialization',
        'issuer'        => 'Example University / Platform',
        'issued'        => '2022',
        'credential_id' => 'BACKEND-5678-EXAMPLE',
        'verify_url'    => 'https://example.com/verify/backend-5678',
    ],
    [
        'name'          => 'Responsive Web Design',
        'issuer'        => 'Online Course Provider',
        'issued'        => '2021',
        'credential_id' => 'RWD-91011-EXAMPLE',
        'verify_url'    => 'https://example.com/verify/rwd-91011',
    ],
];

