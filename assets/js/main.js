// Minimal JavaScript entry point.
// Enhancements:
// - Flip hero card (profile photo <-> tech stack) on click
// - Theme toggle (light/dark) with preference stored in localStorage
// - Reserved for future features (nav states, subtle animations, etc.)

document.addEventListener('DOMContentLoaded', () => {
  // --- Theme toggle setup ---
  const root = document.documentElement;
  const toggleButton = document.getElementById('theme-toggle');
  const toggleLabel = document.getElementById('theme-toggle-label');

  function applyTheme(theme) {
    if (theme === 'dark') {
      root.classList.add('dark');
      if (toggleLabel) toggleLabel.textContent = 'Dark';
    } else {
      root.classList.remove('dark');
      if (toggleLabel) toggleLabel.textContent = 'Light';
    }
  }

  // Determine initial theme: localStorage > system preference
  const storedTheme = window.localStorage.getItem('theme');
  if (storedTheme === 'light' || storedTheme === 'dark') {
    applyTheme(storedTheme);
  } else {
    const prefersDark = window.matchMedia &&
      window.matchMedia('(prefers-color-scheme: dark)').matches;
    applyTheme(prefersDark ? 'dark' : 'light');
  }

  if (toggleButton) {
    toggleButton.addEventListener('click', () => {
      const isDark = root.classList.contains('dark');
      const nextTheme = isDark ? 'light' : 'dark';
      applyTheme(nextTheme);
      window.localStorage.setItem('theme', nextTheme);
    });
  }

  // --- Flip card: profile <-> tech stack ---
  const flipCards = document.querySelectorAll('[data-flip-card]');

  flipCards.forEach((card) => {
    const front = card.querySelector('[data-flip-front]');
    const back = card.querySelector('[data-flip-back]');

    if (!front || !back) return;

    card.addEventListener('click', () => {
      const showingFront = !back.classList.contains('flip-visible');

      if (showingFront) {
        back.classList.add('flip-visible');
        back.style.opacity = '1';
        back.style.transform = 'translateY(0)';
        back.style.pointerEvents = 'auto';

        front.style.opacity = '0';
      } else {
        back.classList.remove('flip-visible');
        back.style.opacity = '0';
        back.style.transform = 'translateY(0.75rem)';
        back.style.pointerEvents = 'none';

        front.style.opacity = '1';
      }
    });
  });
});

