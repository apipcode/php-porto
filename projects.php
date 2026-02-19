<?php
/**
 * Projects Page
 * Use the same layout as index.php for consistency
 */
require __DIR__ . '/data/content.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Projects - Habiburramdhan Lesmana</title>

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

    <link rel="stylesheet" href="assets/css/custom.css">
    
    <style>
        .filter-btn.active {
            background-color: #2547d1; /* primary-600 */
            color: white;
            border-color: #2547d1;
        }
        /* Dark mode overrides provided by tailwind classes, mainly for JS logic if needed */
    </style>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased dark:bg-slate-950 dark:text-slate-100 transition-colors duration-300">
    <!-- Page wrapper -->
    <div class="min-h-screen bg-gradient-to-b from-slate-50 via-slate-100 to-slate-200 dark:from-slate-950 dark:via-slate-950 dark:to-slate-900">
        <!-- Sticky navigation -->
        <header class="sticky top-0 z-40 border-b border-slate-200 bg-white/90 backdrop-blur dark:border-slate-800/70 dark:bg-slate-950/80">
            <nav class="container flex items-center justify-between py-4">
                <a href="index.php" class="flex items-center gap-2">
                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-primary-50 ring-1 ring-primary-200 dark:bg-primary-500/10 dark:ring-primary-500/40">
                        <span class="text-sm font-semibold text-primary-700 dark:text-primary-300">HL</span>
                    </div>
                    <div class="hidden sm:flex flex-col">
                        <span class="text-sm font-semibold tracking-tight">Habiburramdhan</span>
                        <span class="text-xs text-slate-400">Web Developer</span>
                    </div>
                </a>
                <div class="flex items-center gap-4 md:gap-6 text-sm font-medium text-slate-700 dark:text-slate-200">
                    <a href="index.php#about" class="nav-link hidden md:inline-block hover:text-primary-700 dark:hover:text-primary-300 transition-colors">About</a>
                    <a href="index.php#experience" class="nav-link hidden md:inline-block hover:text-primary-700 dark:hover:text-primary-300 transition-colors">Experience</a>
                    <a href="projects.php" class="nav-link hidden md:inline-block hover:text-primary-700 dark:hover:text-primary-300 transition-colors text-primary-600 dark:text-primary-400 font-bold">Projects</a>
                    <a href="certifications.php" class="nav-link hidden md:inline-block hover:text-primary-700 dark:hover:text-primary-300 transition-colors">Certifications</a>
                    <a href="index.php#contact" class="nav-link hidden md:inline-block hover:text-primary-700 dark:hover:text-primary-300 transition-colors">Contact</a>
                    <button
                        type="button"
                        id="theme-toggle"
                        class="inline-flex items-center rounded-full border border-slate-300 bg-white px-2 py-1 text-xs font-medium text-slate-700 shadow-sm hover:border-primary-400 hover:text-primary-700 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-primary-400"
                        aria-label="Toggle theme"
                    >
                        <span id="theme-toggle-label" class="px-1">Light</span>
                    </button>
                    <a href="index.php" class="hidden sm:inline-flex items-center rounded-full border border-slate-300 bg-white px-4 py-1.5 text-xs sm:text-sm font-medium text-slate-700 shadow-soft hover:bg-slate-50 transition-colors dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:hover:bg-slate-800">
                        Back to Home
                    </a>
                </div>
            </nav>
        </header>

        <main>
            <!-- Projects Section -->
            <section id="projects" class="container py-16 md:py-24">
                <div class="flex flex-col items-center text-center gap-6 mb-12">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight text-slate-900 dark:text-slate-50">
                        All Projects
                    </h1>
                    <p class="max-w-2xl text-base sm:text-lg text-slate-600 dark:text-slate-300">
                        Browse through my collection of web development projects, ranging from front-end experiments to full-stack applications.
                    </p>
                    
                    <!-- Filter Buttons -->
                    <div class="flex flex-wrap justify-center gap-2 mt-4" id="project-filters">
                        <button class="filter-btn active px-4 py-2 rounded-full border border-slate-300 bg-white text-sm font-medium text-slate-700 hover:border-primary-400 hover:text-primary-700 transition dark:border-slate-600 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-primary-400" data-filter="all">All</button>
                        <button class="filter-btn px-4 py-2 rounded-full border border-slate-300 bg-white text-sm font-medium text-slate-700 hover:border-primary-400 hover:text-primary-700 transition dark:border-slate-600 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-primary-400" data-filter="front-end">Front-End</button>
                        <button class="filter-btn px-4 py-2 rounded-full border border-slate-300 bg-white text-sm font-medium text-slate-700 hover:border-primary-400 hover:text-primary-700 transition dark:border-slate-600 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-primary-400" data-filter="backend">Backend</button>
                        <button class="filter-btn px-4 py-2 rounded-full border border-slate-300 bg-white text-sm font-medium text-slate-700 hover:border-primary-400 hover:text-primary-700 transition dark:border-slate-600 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-primary-400" data-filter="fullstack">Fullstack</button>
                        <button class="filter-btn px-4 py-2 rounded-full border border-slate-300 bg-white text-sm font-medium text-slate-700 hover:border-primary-400 hover:text-primary-700 transition dark:border-slate-600 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-primary-400" data-filter="cybersecurity">Cybersecurity</button>
                        <button class="filter-btn px-4 py-2 rounded-full border border-slate-300 bg-white text-sm font-medium text-slate-700 hover:border-primary-400 hover:text-primary-700 transition dark:border-slate-600 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-primary-400" data-filter="gamedeveloper">Game Dev</button>
                    </div>
                </div>

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3" id="projects-grid">
                    <?php foreach ($projects as $project): 
                        // Default category if missing
                        $cat = isset($project['category']) ? $project['category'] : 'other';
                    ?>
                        <article class="project-card group flex flex-col rounded-2xl border border-slate-200 bg-white shadow-soft overflow-hidden dark:border-slate-800/80 dark:bg-slate-900/80" data-category="<?php echo htmlspecialchars($cat); ?>">
                            <div class="relative h-48 bg-gradient-to-br from-primary-100 via-slate-50 to-slate-200 dark:from-primary-500/20 dark:via-slate-900 dark:to-slate-950">
                                <div class="absolute inset-0 opacity-40 group-hover:opacity-60 transition-opacity">
                                    <div class="absolute -top-10 left-8 h-28 w-28 rounded-full bg-primary-300/40 blur-2xl dark:bg-primary-500/40"></div>
                                    <div class="absolute -bottom-10 right-6 h-28 w-28 rounded-full bg-emerald-300/30 blur-2xl dark:bg-emerald-400/30"></div>
                                </div>
                                <div class="relative flex h-full items-end p-4 justify-between w-full">
                                    <span class="inline-flex rounded-full bg-white/90 px-3 py-1 text-[11px] font-medium uppercase tracking-[0.16em] text-slate-700 border border-slate-200 dark:bg-slate-950/80 dark:text-slate-200 dark:border-slate-700/80">
                                        <?php echo $project['type']; ?>
                                    </span>
                                    <span class="inline-flex rounded-full bg-primary-600/90 px-2 py-1 text-[10px] font-bold uppercase text-white shadow-sm">
                                        <?php echo $cat; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="flex flex-1 flex-col p-6">
                                <h3 class="text-lg md:text-xl font-semibold text-slate-900 dark:text-slate-50">
                                    <?php echo $project['title']; ?>
                                </h3>
                                <p class="mt-2 text-sm text-slate-700 leading-relaxed dark:text-slate-300 flex-grow">
                                    <?php echo $project['description']; ?>
                                </p>
                                <?php if (!empty($project['stack'])): ?>
                                    <div class="mt-4 flex flex-wrap gap-1.5 text-[11px]">
                                        <?php foreach ($project['stack'] as $tech): ?>
                                            <span class="inline-flex items-center rounded-full bg-slate-100 px-2.5 py-1 text-slate-700 border border-slate-200 dark:bg-slate-800/80 dark:text-slate-200 dark:border-slate-700/80">
                                                <?php echo $tech; ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="mt-5 flex flex-wrap gap-4 text-xs font-medium text-primary-700 dark:text-primary-200 pt-4 border-t border-slate-100 dark:border-slate-800">
                                    <?php if (!empty($project['github']) && $project['github'] !== '-'): ?>
                                        <a href="<?php echo $project['github']; ?>" target="_blank" rel="noreferrer" class="inline-flex items-center gap-1 hover:text-primary-500 transition-colors uppercase tracking-wide">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-github"><path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0 3 1.5-2.64-.5-5.36.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/><path d="M9 18c-4.51 2-5-2-7-2"/></svg>
                                            GitHub
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($project['live_demo']) && $project['live_demo'] !== '-'): ?>
                                        <a href="<?php echo $project['live_demo']; ?>" target="_blank" rel="noreferrer" class="inline-flex items-center gap-1 hover:text-primary-500 transition-colors uppercase tracking-wide">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-external-link"><path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg>
                                            Live Demo
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="border-t border-slate-200 bg-white/90 dark:border-slate-800/80 dark:bg-slate-950/90 mt-12">
            <div class="container flex flex-col gap-4 py-6 md:flex-row md:items-center md:justify-between">
                <p class="text-xs md:text-sm text-slate-500 dark:text-slate-400">
                    &copy; <?php echo date('Y'); ?> Habiburramdhan Lesmana. All rights reserved.
                </p>
                <div class="flex flex-wrap items-center gap-4 text-xs text-slate-600 dark:text-slate-300">
                    <a href="index.php" class="hover:text-primary-700 underline-offset-4 hover:underline dark:hover:text-primary-200">Home</a>
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
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="assets/js/main.js"></script>
    <script>
        // Project Filtering Logic
        document.addEventListener('DOMContentLoaded', () => {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const projectCards = document.querySelectorAll('.project-card');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    // Remove active class from all buttons
                    filterBtns.forEach(b => b.classList.remove('active'));
                    // Add active class to clicked button
                    btn.classList.add('active');
                    
                    // Dark mode active state for button handled via CSS class 'active'
                    // We need to ensure the 'active' class styling overrides properly
                    
                    const filterValue = btn.getAttribute('data-filter');

                    projectCards.forEach(card => {
                        const category = card.getAttribute('data-category');
                        
                        if (filterValue === 'all' || category === filterValue) {
                            card.style.display = 'flex';
                            // Optional: Add fading animation here
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
