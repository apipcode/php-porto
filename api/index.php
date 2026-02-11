<?php
/**
 * Habiburramdhan Lesmana - Web Developer Portfolio
 *
 * Entry point for the portfolio.
 * - Loads all dynamic content from `data/content.php`
 * - Handles contact form submission with basic server-side validation
 */

// Load dynamic content arrays (experience, projects, certifications)
require __DIR__ . '/../data/content.php';

// Simple contact form handling logic
$contactErrors = [];
$contactSuccess = false;

// Helper function to sanitize text input safely
function sanitize_text(string $value): string
{
    return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_form'])) {
    // Sanitize inputs
    $name = sanitize_text($_POST['name'] ?? '');
    $email = sanitize_text($_POST['email'] ?? '');
    $message = sanitize_text($_POST['message'] ?? '');

    // Basic validation
    if ($name === '') {
        $contactErrors['name'] = 'Please enter your full name.';
    }

    if ($email === '') {
        $contactErrors['email'] = 'Please enter your email address.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $contactErrors['email'] = 'Please enter a valid email address.';
    }

    if ($message === '') {
        $contactErrors['message'] = 'Please enter a short message.';
    }

    // If no errors, you can integrate email sending (e.g., mail(), SMTP, etc.)
    if (empty($contactErrors)) {
        // For now, just set a success flag; no email is sent in this template.
        $contactSuccess = true;

        // Optionally, clear fields after success
        $name = $email = $message = '';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Habiburramdhan Lesmana - Web Developer Portfolio</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind config: custom colors, font, container, and dark mode via class -->
    <script>
      tailwind.config = {
        darkMode: 'class',
        theme: {
          extend: {
            colors: {
              primary: {
                50: '#eef5ff',
                100: '#d9e4ff',
                200: '#b2c8ff',
                300: '#88a6ff',
                400: '#5f82ff',
                500: '#325cff',
                600: '#2547d1',
                700: '#1b36a3',
                800: '#122472',
                900: '#0a153f',
              },
            },
            fontFamily: {
              sans: ['Inter', 'system-ui', 'sans-serif'],
            },
            boxShadow: {
              soft: '0 18px 45px rgba(15, 23, 42, 0.15)',
            },
          },
          container: {
            center: true,
            padding: {
              DEFAULT: '1rem',
              sm: '1.5rem',
              lg: '2rem',
              xl: '3rem',
            },
          },
        },
      }
    </script>

    <!-- Inter font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS hook (optional enhancements later) -->
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased dark:bg-slate-950 dark:text-slate-100">
    <!-- Page wrapper -->
    <div class="min-h-screen bg-gradient-to-b from-slate-50 via-slate-100 to-slate-200 dark:from-slate-950 dark:via-slate-950 dark:to-slate-900">
        <!-- Sticky navigation -->
        <header class="sticky top-0 z-40 border-b border-slate-200 bg-white/90 backdrop-blur dark:border-slate-800/70 dark:bg-slate-950/80">
            <nav class="container flex items-center justify-between py-4">
                <a href="#hero" class="flex items-center gap-2">
                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-primary-50 ring-1 ring-primary-200 dark:bg-primary-500/10 dark:ring-primary-500/40">
                        <span class="text-sm font-semibold text-primary-700 dark:text-primary-300">HL</span>
                    </div>
                    <div class="hidden sm:flex flex-col">
                        <span class="text-sm font-semibold tracking-tight">Habiburramdhan</span>
                        <span class="text-xs text-slate-400">Web Developer</span>
                    </div>
                </a>
                <div class="flex items-center gap-4 md:gap-6 text-sm font-medium text-slate-700 dark:text-slate-200">
                    <a href="#about" class="nav-link hidden md:inline-block hover:text-primary-700 dark:hover:text-primary-300 transition-colors">About</a>
                    <a href="#experience" class="nav-link hidden md:inline-block hover:text-primary-700 dark:hover:text-primary-300 transition-colors">Experience</a>
                    <a href="#projects" class="nav-link hidden md:inline-block hover:text-primary-700 dark:hover:text-primary-300 transition-colors">Projects</a>
                    <a href="#certifications" class="nav-link hidden md:inline-block hover:text-primary-700 dark:hover:text-primary-300 transition-colors">Certifications</a>
                    <a href="#contact" class="nav-link hidden md:inline-block hover:text-primary-700 dark:hover:text-primary-300 transition-colors">Contact</a>
                    <button
                        type="button"
                        id="theme-toggle"
                        class="inline-flex items-center rounded-full border border-slate-300 bg-white px-2 py-1 text-xs font-medium text-slate-700 shadow-sm hover:border-primary-400 hover:text-primary-700 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-primary-400"
                        aria-label="Toggle theme"
                    >
                        <span id="theme-toggle-label" class="px-1">Light</span>
                    </button>
                    <a href="#projects" class="hidden sm:inline-flex items-center rounded-full border border-primary-300 bg-primary-600 px-4 py-1.5 text-xs sm:text-sm font-medium text-white shadow-soft hover:bg-primary-500 transition-colors dark:border-primary-400/60 dark:bg-primary-500/10 dark:text-primary-100 dark:hover:bg-primary-500/20">
                        View My Work
                    </a>
                </div>
            </nav>
        </header>

        <main>
            <!-- Hero Section -->
            <section id="hero" class="container py-16 md:py-24 lg:py-28">
                <div class="grid gap-12 md:grid-cols-[minmax(0,1.4fr)_minmax(0,1fr)] items-center">
                    <div class="space-y-6">
                        <p class="inline-flex items-center gap-2 rounded-full border border-emerald-300 bg-emerald-50 px-3 py-1 text-xs font-medium text-emerald-700 dark:border-emerald-400/40 dark:bg-emerald-500/10 dark:text-emerald-100">
                            <span class="inline-block h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                            Open to new web developer opportunities
                        </p>
                        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-semibold tracking-tight text-slate-900 dark:text-slate-50">
                            Building clean, secure
                            <span class="block text-primary-600 dark:text-primary-300">PHP web experiences</span>
                        </h1>
                        <p class="max-w-2xl text-base sm:text-lg text-slate-600 leading-relaxed dark:text-slate-300">
                            I am Habiburramdhan Lesmana, a web developer focused on delivering maintainable PHP backends
                            and modern, HR-ready interfaces. I enjoy turning complex requirements into reliable, well-structured systems.
                        </p>
                        <div class="flex flex-wrap items-center gap-3">
                            <a href="#projects" class="inline-flex items-center justify-center rounded-full bg-primary-600 px-5 py-2.5 text-sm font-semibold text-white shadow-soft hover:bg-primary-500 transition-colors dark:bg-primary-500 dark:hover:bg-primary-400">
                                View My Projects
                            </a>
                            <a href="#contact" class="inline-flex items-center justify-center rounded-full border border-slate-300 px-5 py-2.5 text-sm font-medium text-slate-700 hover:border-primary-400 hover:text-primary-700 transition-colors bg-white dark:border-slate-600 dark:text-slate-100 dark:bg-transparent dark:hover:border-primary-400 dark:hover:text-primary-100">
                                Contact Me
                            </a>
                        </div>
                        <div class="flex flex-wrap items-center gap-4 text-xs text-slate-500 dark:text-slate-400">
                            <div class="flex items-center gap-1.5">
                                <span class="h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                PHP &amp; MySQL
                            </div>
                            <div class="flex items-center gap-1.5">
                                <span class="h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                Clean architecture
                            </div>
                            <div class="flex items-center gap-1.5">
                                <span class="h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                Responsive UI/UX
                            </div>
                        </div>
                    </div>
                    <div class="relative mx-auto h-64 w-full max-w-sm md:h-80">
                        <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-primary-200 via-slate-200 to-slate-300 blur-2xl opacity-60 dark:from-primary-500/40 dark:via-slate-800 dark:to-slate-900"></div>
                        <button
                            type="button"
                            class="relative h-full w-full rounded-3xl border border-slate-200 bg-white shadow-soft backdrop-blur overflow-hidden group dark:border-slate-700/70 dark:bg-slate-900/80"
                            aria-label="Toggle between profile photo and tech stack"
                            data-flip-card
                        >
                            <!-- Front: professional photo -->
                            <div
                                class="h-full w-full transition-all duration-500 ease-out"
                                data-flip-front
                            >
                                <div class="relative h-full w-full">
                                    <img
                                        src="assets/img/profile.jpg"
                                        alt="Professional photo of Habiburramdhan Lesmana"
                                        class="h-full w-full object-cover"
                                    >
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-900/20 to-slate-900/10"></div>
                                    <div class="absolute inset-x-0 bottom-0 p-4 text-left">
                                        <p class="text-xs font-medium text-slate-200">Tap to view tech stack</p>
                                        <p class="text-sm font-semibold text-slate-50">
                                            Habiburramdhan Lesmana
                                        </p>
                                        <p class="text-[11px] text-slate-300">
                                            PHP Web Developer · Indonesia
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Back: tech stack card (no skill meters) -->
                            <div
                                class="absolute inset-0 rounded-3xl bg-slate-900/95 p-6 opacity-0 translate-y-3 pointer-events-none transition-all duration-500 ease-out"
                                data-flip-back
                            >
                                <div class="flex items-center justify-between">
                                    <div class="space-y-1 text-left">
                                        <p class="text-xs font-medium text-slate-400">Primary Stack</p>
                                        <p class="text-sm font-semibold text-slate-50">PHP · MySQL · Tailwind</p>
                                    </div>
                                    <span class="rounded-full bg-emerald-500/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-wide text-emerald-300 border border-emerald-500/40">
                                        Available
                                    </span>
                                </div>
                                <div class="mt-5 space-y-2 text-xs text-slate-300 text-left">
                                    <div class="flex items-center justify-between">
                                        <span>Backend Engineering</span>
                                        <span class="text-emerald-300">Advanced</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span>Frontend &amp; UI</span>
                                        <span class="text-emerald-300">Strong</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span>Clean Architecture</span>
                                        <span class="text-emerald-300">Strong</span>
                                    </div>
                                </div>
                                <div class="mt-6 flex items-center justify-between text-[11px] text-slate-400 border-t border-slate-800 pt-4">
                                    <span>Based in Indonesia</span>
                                    <span>Available for remote roles</span>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </section>

            <!-- About (short) -->
            <section id="about" class="section-divider border-t border-slate-200 bg-white/80 dark:border-slate-800/60 dark:bg-slate-950/60">
                <div class="container py-10 md:py-14">
                    <div class="grid gap-10 md:grid-cols-[minmax(0,1.4fr)_minmax(0,1fr)] items-start">
                        <div class="space-y-4">
                            <h2 class="text-xl md:text-2xl font-semibold tracking-tight text-slate-900 dark:text-slate-50">
                                About Habiburramdhan
                            </h2>
                            <p class="text-sm md:text-base text-slate-600 leading-relaxed dark:text-slate-300">
                                I specialize in <span class="font-semibold text-slate-900 dark:text-slate-100">native PHP</span> development with
                                a strong focus on security, performance, and clean separation of concerns. I enjoy
                                collaborating with cross-functional teams and translating business requirements
                                into reliable, production-ready web applications.
                            </p>
                            <p class="text-sm md:text-base text-slate-600 leading-relaxed dark:text-slate-300">
                                My preferred stack includes PHP, MySQL, and Tailwind CSS, but I am comfortable adapting
                                to existing environments and workflows. HR teams value my ability to write maintainable
                                code, communicate clearly, and stay consistent with project standards.
                            </p>
                        </div>
                        <div class="space-y-3 rounded-2xl border border-slate-200 bg-white p-5 shadow-soft dark:border-slate-800 dark:bg-slate-900/70">
                            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">
                                Quick snapshot
                            </p>
                            <dl class="mt-2 space-y-3 text-sm text-slate-800 dark:text-slate-200">
                                <div class="flex items-start justify-between gap-3">
                                    <dt class="text-slate-500">Primary role</dt>
                                    <dd class="text-right">Web Developer (PHP)</dd>
                                </div>
                                <div class="flex items-start justify-between gap-3">
                                    <dt class="text-slate-500">Experience focus</dt>
                                    <dd class="text-right">Backend &amp; full-stack web</dd>
                                </div>
                                <div class="flex items-start justify-between gap-3">
                                    <dt class="text-slate-500">Soft skills</dt>
                                    <dd class="text-right">Team collaboration, clear communication, ownership</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Experience Section -->
            <section id="experience" class="bg-slate-50 dark:bg-slate-950">
                <div class="container py-14 md:py-18 lg:py-20">
                    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-10">
                        <div>
                            <h2 class="text-2xl md:text-3xl font-semibold tracking-tight text-slate-900 dark:text-slate-50">
                                Professional Experience
                            </h2>
                            <p class="mt-2 max-w-xl text-sm md:text-base text-slate-600 dark:text-slate-300">
                                A selection of roles where I have delivered stable, secure, and maintainable web solutions.
                            </p>
                        </div>
                    </div>

                    <div class="relative border-l border-slate-200 pl-5 md:pl-7 space-y-10 dark:border-slate-800/80">
                        <?php foreach ($experiences as $experience): ?>
                            <article class="relative group">
                                <div class="absolute -left-[11px] md:-left-3 flex h-5 w-5 items-center justify-center rounded-full bg-slate-50 ring-2 ring-slate-200 dark:bg-slate-950 dark:ring-slate-900">
                                    <span class="h-2.5 w-2.5 rounded-full bg-primary-500 group-hover:bg-primary-400 transition-colors"></span>
                                </div>
                                <div class="rounded-2xl border border-slate-200 bg-white p-5 md:p-6 shadow-soft dark:border-slate-800/80 dark:bg-slate-900/80">
                                    <div class="flex flex-wrap items-center justify-between gap-2">
                                        <div>
                                            <h3 class="text-sm md:text-base font-semibold text-slate-900 dark:text-slate-50">
                                                <?php echo $experience['role']; ?>
                                            </h3>
                                            <p class="text-xs md:text-sm text-slate-500 dark:text-slate-400">
                                                <?php echo $experience['company']; ?> · <?php echo $experience['location']; ?>
                                            </p>
                                        </div>
                                        <p class="text-xs font-medium text-slate-500 dark:text-slate-400">
                                            <?php echo $experience['duration']; ?>
                                        </p>
                                    </div>
                                    <?php if (!empty($experience['stack'])): ?>
                                        <div class="mt-3 flex flex-wrap gap-1.5 text-[11px]">
                                            <?php foreach ($experience['stack'] as $tech): ?>
                                                <span class="inline-flex items-center rounded-full bg-slate-100 px-2 py-0.5 text-[11px] text-slate-700 border border-slate-200 dark:bg-slate-800/80 dark:text-slate-200 dark:border-slate-700/80">
                                                    <?php echo $tech; ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($experience['highlights'])): ?>
                                        <ul class="mt-4 space-y-1.5 text-xs md:text-sm text-slate-700 dark:text-slate-300">
                                            <?php foreach ($experience['highlights'] as $highlight): ?>
                                                <li class="flex gap-2">
                                                    <span class="mt-[6px] h-1 w-1 rounded-full bg-slate-400 flex-shrink-0"></span>
                                                    <span><?php echo $highlight; ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- Projects Section -->
            <section id="projects" class="bg-slate-100 dark:bg-slate-950/60">
                <div class="container py-14 md:py-18 lg:py-20">
                    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-10">
                        <div>
                            <h2 class="text-2xl md:text-3xl font-semibold tracking-tight text-slate-900 dark:text-slate-50">
                                Selected Projects
                            </h2>
                            <p class="mt-2 max-w-xl text-sm md:text-base text-slate-600 dark:text-slate-300">
                                Real-world projects that demonstrate my ability to design, build, and maintain end-to-end web solutions.
                            </p>
                        </div>
                    </div>

                    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                        <?php foreach ($projects as $project): ?>
                            <article class="group flex flex-col rounded-2xl border border-slate-200 bg-white shadow-soft overflow-hidden dark:border-slate-800/80 dark:bg-slate-900/80">
                                <div class="relative h-32 bg-gradient-to-br from-primary-100 via-slate-50 to-slate-200 dark:from-primary-500/20 dark:via-slate-900 dark:to-slate-950">
                                    <div class="absolute inset-0 opacity-40 group-hover:opacity-60 transition-opacity">
                                        <div class="absolute -top-10 left-8 h-28 w-28 rounded-full bg-primary-300/40 blur-2xl dark:bg-primary-500/40"></div>
                                        <div class="absolute -bottom-10 right-6 h-28 w-28 rounded-full bg-emerald-300/30 blur-2xl dark:bg-emerald-400/30"></div>
                                    </div>
                                    <div class="relative flex h-full items-end p-4">
                                        <span class="inline-flex rounded-full bg-white/90 px-3 py-1 text-[11px] font-medium uppercase tracking-[0.16em] text-slate-700 border border-slate-200 dark:bg-slate-950/80 dark:text-slate-200 dark:border-slate-700/80">
                                            <?php echo $project['type']; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex flex-1 flex-col p-5">
                                    <h3 class="text-base md:text-lg font-semibold text-slate-900 dark:text-slate-50">
                                        <?php echo $project['title']; ?>
                                    </h3>
                                    <p class="mt-2 text-xs md:text-sm text-slate-700 leading-relaxed dark:text-slate-300">
                                        <?php echo $project['description']; ?>
                                    </p>
                                    <?php if (!empty($project['stack'])): ?>
                                        <div class="mt-3 flex flex-wrap gap-1.5 text-[11px]">
                                            <?php foreach ($project['stack'] as $tech): ?>
                                                <span class="inline-flex items-center rounded-full bg-slate-100 px-2 py-0.5 text-[11px] text-slate-700 border border-slate-200 dark:bg-slate-800/80 dark:text-slate-200 dark:border-slate-700/80">
                                                    <?php echo $tech; ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="mt-4 flex flex-wrap gap-3 text-xs font-medium text-primary-700 dark:text-primary-200">
                                        <?php if (!empty($project['github'])): ?>
                                            <a href="<?php echo $project['github']; ?>" target="_blank" rel="noreferrer" class="inline-flex items-center gap-1 hover:text-primary-100 underline-offset-4 hover:underline">
                                                <span>GitHub</span>
                                                <span aria-hidden="true">↗</span>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty($project['live_demo'])): ?>
                                            <a href="<?php echo $project['live_demo']; ?>" target="_blank" rel="noreferrer" class="inline-flex items-center gap-1 hover:text-primary-100 underline-offset-4 hover:underline">
                                                <span>Live Demo</span>
                                                <span aria-hidden="true">↗</span>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- Certifications Section -->
            <section id="certifications" class="bg-slate-50 dark:bg-slate-950">
                <div class="container py-14 md:py-18 lg:py-20">
                    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-10">
                        <div>
                            <h2 class="text-2xl md:text-3xl font-semibold tracking-tight text-slate-900 dark:text-slate-50">
                                Certifications
                            </h2>
                            <p class="mt-2 max-w-xl text-sm md:text-base text-slate-600 dark:text-slate-300">
                                Verified credentials that validate my skills and continuous learning in web development.
                            </p>
                        </div>
                    </div>

                    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                        <?php foreach ($certifications as $cert): ?>
                            <article class="flex flex-col justify-between rounded-2xl border border-slate-200 bg-white p-5 shadow-soft dark:border-slate-800/80 dark:bg-slate-900/80">
                                <div>
                                    <h3 class="text-sm md:text-base font-semibold text-slate-900 dark:text-slate-50">
                                        <?php echo $cert['name']; ?>
                                    </h3>
                                    <p class="mt-1 text-xs md:text-sm text-slate-700 dark:text-slate-300">
                                        <?php echo $cert['issuer']; ?>
                                    </p>
                                    <p class="mt-1 text-[11px] text-slate-500 dark:text-slate-400">
                                        Issued: <?php echo $cert['issued']; ?>
                                    </p>
                                </div>
                                <div class="mt-4 flex items-center justify-between text-xs">
                                    <?php if (!empty($cert['credential_id'])): ?>
                                        <span class="text-slate-500 dark:text-slate-400">
                                            ID: <?php echo $cert['credential_id']; ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if (!empty($cert['verify_url'])): ?>
                                        <a href="<?php echo $cert['verify_url']; ?>" target="_blank" rel="noreferrer" class="ml-auto inline-flex items-center gap-1 font-medium text-primary-200 hover:text-primary-100 underline-offset-4 hover:underline">
                                            Verify
                                            <span aria-hidden="true">↗</span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- Contact Section -->
            <section id="contact" class="bg-slate-100 border-t border-slate-200 dark:bg-slate-950/70 dark:border-slate-800/60">
                <div class="container py-14 md:py-18 lg:py-20">
                    <div class="grid gap-10 md:grid-cols-[minmax(0,1.1fr)_minmax(0,1.1fr)] items-start">
                        <div class="space-y-4">
                            <h2 class="text-2xl md:text-3xl font-semibold tracking-tight text-slate-900 dark:text-slate-50">
                                Let’s discuss opportunities
                            </h2>
                            <p class="max-w-lg text-sm md:text-base text-slate-600 leading-relaxed dark:text-slate-300">
                                If you are hiring for a web developer position or would like to discuss a project,
                                feel free to reach out using this form. I will respond with relevant examples aligned
                                to your requirements.
                            </p>
                            <div class="mt-4 space-y-2 text-sm text-slate-600 dark:text-slate-300">
                                <p class="flex items-center gap-2">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                                    Prefer contact in English or Bahasa Indonesia.
                                </p>
                                <p class="flex items-center gap-2">
                                    <span class="h-1.5 w-1.5 rounded-full bg-primary-500"></span>
                                    Comfortable with remote interviews and coding assessments.
                                </p>
                            </div>
                        </div>

                        <!-- Contact form -->
                        <div class="rounded-2xl border border-slate-200 bg-white p-6 md:p-7 shadow-soft dark:border-slate-800 dark:bg-slate-900/80">
                            <?php if ($contactSuccess): ?>
                                <div class="mb-4 rounded-lg border border-emerald-300 bg-emerald-50 px-4 py-3 text-sm text-emerald-800 dark:border-emerald-500/50 dark:bg-emerald-500/10 dark:text-emerald-100">
                                    Thank you for your message. Your details were submitted successfully.
                                </div>
                            <?php endif; ?>

                            <form method="post" novalidate class="space-y-4">
                                <input type="hidden" name="contact_form" value="1">

                                <div>
                                    <label for="name" class="block text-xs font-medium uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">
                                        Full name
                                    </label>
                                    <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        value="<?php echo isset($name) ? $name : ''; ?>"
                                        class="mt-1 w-full rounded-lg border bg-white px-3 py-2.5 text-sm text-slate-800 placeholder-slate-400 outline-none transition focus:border-primary-400 focus:ring-1 focus:ring-primary-400 border-slate-300 dark:bg-slate-950/60 dark:text-slate-100 dark:placeholder-slate-500 dark:border-slate-700 dark:focus:border-primary-400/80 dark:focus:ring-primary-400/60"
                                        placeholder="Your full name"
                                        required
                                    >
                                    <?php if (isset($contactErrors['name'])): ?>
                                        <p class="mt-1 text-xs text-rose-500">
                                            <?php echo $contactErrors['name']; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>

                                <div>
                                    <label for="email" class="block text-xs font-medium uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">
                                        Email address
                                    </label>
                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        value="<?php echo isset($email) ? $email : ''; ?>"
                                        class="mt-1 w-full rounded-lg border bg-white px-3 py-2.5 text-sm text-slate-800 placeholder-slate-400 outline-none transition focus:border-primary-400 focus:ring-1 focus:ring-primary-400 border-slate-300 dark:bg-slate-950/60 dark:text-slate-100 dark:placeholder-slate-500 dark:border-slate-700 dark:focus:border-primary-400/80 dark:focus:ring-primary-400/60"
                                        placeholder="you@example.com"
                                        required
                                    >
                                    <?php if (isset($contactErrors['email'])): ?>
                                        <p class="mt-1 text-xs text-rose-500">
                                            <?php echo $contactErrors['email']; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>

                                <div>
                                    <label for="message" class="block text-xs font-medium uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">
                                        Message
                                    </label>
                                    <textarea
                                        id="message"
                                        name="message"
                                        rows="4"
                                        class="mt-1 w-full rounded-lg border bg-white px-3 py-2.5 text-sm text-slate-800 placeholder-slate-400 outline-none transition focus:border-primary-400 focus:ring-1 focus:ring-primary-400 border-slate-300 resize-none dark:bg-slate-950/60 dark:text-slate-100 dark:placeholder-slate-500 dark:border-slate-700 dark:focus:border-primary-400/80 dark:focus:ring-primary-400/60"
                                        placeholder="Share a bit about the position or project..."
                                        required
                                    ><?php echo isset($message) ? $message : ''; ?></textarea>
                                    <?php if (isset($contactErrors['message'])): ?>
                                        <p class="mt-1 text-xs text-rose-500">
                                            <?php echo $contactErrors['message']; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>

                                <div class="pt-1">
                                    <button
                                        type="submit"
                                        class="inline-flex w-full items-center justify-center rounded-lg bg-primary-600 px-4 py-2.5 text-sm font-semibold text-white shadow-soft hover:bg-primary-500 transition-colors dark:bg-primary-500 dark:hover:bg-primary-400"
                                    >
                                        Send Message
                                    </button>
                                </div>
                            </form>

                            <p class="mt-4 text-[11px] text-slate-500">
                                This form performs server-side validation only. Email delivery can be integrated
                                easily using your preferred mail provider.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="border-t border-slate-200 bg-white/90 dark:border-slate-800/80 dark:bg-slate-950/90">
            <div class="container flex flex-col gap-4 py-6 md:flex-row md:items-center md:justify-between">
                <p class="text-xs md:text-sm text-slate-500 dark:text-slate-400">
                    &copy; <?php echo date('Y'); ?> Habiburramdhan Lesmana. All rights reserved.
                </p>
                <div class="flex flex-wrap items-center gap-4 text-xs text-slate-600 dark:text-slate-300">
                    <?php if (!empty($socialLinks['linkedin'])): ?>
                        <a href="<?php echo $socialLinks['linkedin']; ?>" target="_blank" rel="noreferrer" class="hover:text-primary-700 underline-offset-4 hover:underline dark:hover:text-primary-200">
                            LinkedIn
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($socialLinks['github'])): ?>
                        <a href="<?php echo $socialLinks['github']; ?>" target="_blank" rel="noreferrer" class="hover:text-primary-700 underline-offset-4 hover:underline dark:hover:text-primary-200">
                            GitHub
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($socialLinks['email'])): ?>
                        <a href="mailto:<?php echo $socialLinks['email']; ?>" class="hover:text-primary-700 underline-offset-4 hover:underline dark:hover:text-primary-200">
                            Email
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </footer>
    </div>

    <!-- Minimal JS hook (optional enhancements, nav behavior) -->
    <script src="assets/js/main.js"></script>
</body>
</html>

