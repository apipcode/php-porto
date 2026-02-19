<?php
/**
 * Certifications Page
 * Follows same design as index.php and projects.php
 */
require __DIR__ . '/data/content.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Certifications - Habiburramdhan Lesmana</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/custom.css">
    
    <style>
        .filter-btn.active {
            background-color: #2547d1;
            color: white;
            border-color: #2547d1;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased dark:bg-slate-950 dark:text-slate-100 transition-colors duration-300">
    <div class="min-h-screen bg-gradient-to-b from-slate-50 via-slate-100 to-slate-200 dark:from-slate-950 dark:via-slate-950 dark:to-slate-900">
        <!-- Header -->
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
                    <a href="projects.php" class="nav-link hidden md:inline-block hover:text-primary-700 dark:hover:text-primary-300 transition-colors">Projects</a>
                    <a href="certifications.php" class="nav-link hidden md:inline-block hover:text-primary-700 dark:hover:text-primary-300 transition-colors text-primary-600 dark:text-primary-400 font-bold">Certifications</a>
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
            <!-- Certifications Section -->
            <section id="certifications" class="container py-16 md:py-24">
                <div class="flex flex-col items-center text-center gap-6 mb-12">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight text-slate-900 dark:text-slate-50">
                        Certifications
                    </h1>
                    <p class="max-w-2xl text-base sm:text-lg text-slate-600 dark:text-slate-300">
                        A collection of my professional certifications and completed courses.
                    </p>
                    
                    <!-- Filters -->
                    <div class="flex flex-wrap justify-center gap-2 mt-4" id="cert-filters">
                        <button class="filter-btn active px-4 py-2 rounded-full border border-slate-300 bg-white text-sm font-medium text-slate-700 hover:border-primary-400 hover:text-primary-700 transition dark:border-slate-600 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-primary-400" data-filter="all">All</button>
                        <button class="filter-btn px-4 py-2 rounded-full border border-slate-300 bg-white text-sm font-medium text-slate-700 hover:border-primary-400 hover:text-primary-700 transition dark:border-slate-600 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-primary-400" data-filter="backend">Backend</button>
                        <button class="filter-btn px-4 py-2 rounded-full border border-slate-300 bg-white text-sm font-medium text-slate-700 hover:border-primary-400 hover:text-primary-700 transition dark:border-slate-600 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-primary-400" data-filter="front-end">Front-End</button>
                        <button class="filter-btn px-4 py-2 rounded-full border border-slate-300 bg-white text-sm font-medium text-slate-700 hover:border-primary-400 hover:text-primary-700 transition dark:border-slate-600 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-primary-400" data-filter="fullstack">Fullstack</button>
                         <button class="filter-btn px-4 py-2 rounded-full border border-slate-300 bg-white text-sm font-medium text-slate-700 hover:border-primary-400 hover:text-primary-700 transition dark:border-slate-600 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-primary-400" data-filter="cybersecurity">Cybersecurity</button>
                    </div>
                </div>

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3" id="certs-grid">
                    <?php foreach ($certifications as $cert): 
                        $cat = isset($cert['category']) ? $cert['category'] : 'other';
                    ?>
                        <article class="cert-card flex flex-col justify-between rounded-2xl border border-slate-200 bg-white p-6 shadow-soft dark:border-slate-800/80 dark:bg-slate-900/80 group hover:border-primary-300 dark:hover:border-primary-700 transition-colors" data-category="<?php echo htmlspecialchars($cat); ?>">
                            <div>
                                <div class="flex items-center justify-between mb-4">
                                     <span class="inline-flex rounded-full bg-primary-50 px-2.5 py-1 text-[10px] font-bold uppercase text-primary-600 dark:bg-primary-900/30 dark:text-primary-300 border border-primary-100 dark:border-primary-800">
                                        <?php echo $cat; ?>
                                     </span>
                                     <span class="text-[11px] text-slate-400 font-mono">
                                         <?php echo $cert['issued']; ?>
                                     </span>
                                </div>
                                <h3 class="text-base md:text-lg font-semibold text-slate-900 dark:text-slate-50 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                                    <?php echo $cert['name']; ?>
                                </h3>
                                <p class="mt-2 text-sm text-slate-600 dark:text-slate-400 font-medium">
                                    <?php echo $cert['issuer']; ?>
                                </p>
                            </div>
                            
                            <div class="mt-8 pt-4 border-t border-slate-100 dark:border-slate-800/60 flex items-center justify-between text-xs">
                                <?php if (!empty($cert['credential_id'])): ?>
                                    <span class="text-slate-400 font-mono" title="Credential ID">
                                        ID: <?php echo substr($cert['credential_id'], 0, 12) . (strlen($cert['credential_id']) > 12 ? '...' : ''); ?>
                                    </span>
                                <?php endif; ?>
                                <?php if (!empty($cert['verify_url'])): ?>
                                    <a href="<?php echo $cert['verify_url']; ?>" target="_blank" rel="noreferrer" class="inline-flex items-center gap-1 font-semibold text-primary-600 hover:text-primary-500 underline-offset-4 hover:underline dark:text-primary-400">
                                        Verify
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-external-link"><path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg>
                                    </a>
                                <?php endif; ?>
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
                </div>
            </div>
        </footer>
    </div>
    
    <script src="assets/js/main.js"></script>
    <script>
        // Certification Filtering Logic
        document.addEventListener('DOMContentLoaded', () => {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const certCards = document.querySelectorAll('.cert-card');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    
                    const filterValue = btn.getAttribute('data-filter');

                    certCards.forEach(card => {
                        const category = card.getAttribute('data-category');
                        if (filterValue === 'all' || category === filterValue) {
                            card.style.display = 'flex';
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
