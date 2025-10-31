// File: /public/js/script.js

document.addEventListener('DOMContentLoaded', () => {
  // Dropdowns
  const wrappers = Array.from(document.querySelectorAll('.dropdown-wrapper'));

  // safety: if no wrappers, avoid errors
  if (wrappers.length > 0) {
    wrappers.forEach(w => {
      const btn = w.querySelector('.btn');
      // guard in case markup changes
      if (!btn) return;

      // set initial aria state for accessibility
      btn.setAttribute('aria-haspopup', 'true');
      btn.setAttribute('aria-expanded', 'false');

      btn.addEventListener('click', e => {
        e.stopPropagation();
        // close others
        wrappers.forEach(o => {
          if (o !== w) {
            o.classList.remove('active');
            const obtn = o.querySelector('.btn');
            if (obtn) obtn.setAttribute('aria-expanded', 'false');
          }
        });

        const isActive = w.classList.toggle('active');
        btn.setAttribute('aria-expanded', String(isActive));
      });
    });

    // clicking anywhere closes dropdowns
    document.addEventListener('click', () => {
      wrappers.forEach(w => {
        w.classList.remove('active');
        const b = w.querySelector('.btn');
        if (b) b.setAttribute('aria-expanded', 'false');
      });
    });

    // prevent clicks inside dropdown menu from bubbling to document
    document.querySelectorAll('.dropdown-menu').forEach(menu => {
      menu.addEventListener('click', e => e.stopPropagation());

      // clicking a menu link should close its parent dropdown
      menu.querySelectorAll('a').forEach(a => {
        a.addEventListener('click', (ev) => {
          const w = a.closest('.dropdown-wrapper');
          if (w) {
            w.classList.remove('active');
            const b = w.querySelector('.btn');
            if (b) b.setAttribute('aria-expanded', 'false');
          }
          // allow link default behavior
        });
      });
    });

    // keyboard: Escape closes any open dropdown
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' || e.key === 'Esc') {
        wrappers.forEach(w => {
          w.classList.remove('active');
          const b = w.querySelector('.btn');
          if (b) b.setAttribute('aria-expanded', 'false');
        });
      }
    });
  }

  // Filters (console only, matches screenshot behavior)
  const selects = Array.from(document.querySelectorAll('.filters .filter-group select'));
  // specifically target the text input inside .filters
  const input = document.querySelector('.filters .filter-group input[type="text"]');

  function applyFilters() {
    const filters = {
      division: selects[0]?.value || '',
      department: selects[1]?.value || '',
      subDepartment: selects[2]?.value || '',
      search: input?.value || ''
    };
    console.log('Applied filters:', filters);
  }

  selects.forEach(s => s.addEventListener('change', applyFilters));
  if (input) input.addEventListener('input', applyFilters);

  // Mobile sidebar toggle with overlay
  const menuBtn = document.querySelector('.menu-btn');
  const sidebar = document.querySelector('.sidebar');

  // create overlay element (used on small screens)
  let overlay = document.querySelector('.body-overlay');
  if (!overlay) {
    overlay = document.createElement('div');
    overlay.className = 'body-overlay';
    document.body.appendChild(overlay);
  }

  function openSidebar() {
    sidebar.classList.add('open');
    overlay.classList.add('show');
    // prevent body scrolling when sidebar open on mobile
    document.body.style.overflow = 'hidden';
    if (menuBtn) menuBtn.setAttribute('aria-expanded', 'true');
  }

  function closeSidebar() {
    sidebar.classList.remove('open');
    overlay.classList.remove('show');
    document.body.style.overflow = '';
    if (menuBtn) menuBtn.setAttribute('aria-expanded', 'false');
  }

  if (menuBtn && sidebar) {
    menuBtn.setAttribute('role', 'button');
    menuBtn.setAttribute('aria-label', 'Toggle sidebar');
    menuBtn.setAttribute('aria-expanded', 'false');

    menuBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      if (sidebar.classList.contains('open')) closeSidebar();
      else openSidebar();
    });

    // clicking overlay closes
    overlay.addEventListener('click', closeSidebar);

    // clicking outside sidebar when open should close it (desktop safety)
    document.addEventListener('click', (e) => {
      if (!sidebar.contains(e.target) && sidebar.classList.contains('open')) {
        closeSidebar();
      }
    });

    // Escape also closes sidebar (if open)
    document.addEventListener('keydown', (e) => {
      if ((e.key === 'Escape' || e.key === 'Esc') && sidebar.classList.contains('open')) {
        closeSidebar();
      }
    });
  }

  // Fullscreen button minor UX: toggle fullscreen where supported
  const fsBtn = document.querySelector('.fullscreen-btn');
  if (fsBtn) {
    fsBtn.setAttribute('role', 'button');
    fsBtn.addEventListener('click', () => {
      if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen?.();
      } else {
        document.exitFullscreen?.();
      }
    });
  }

  console.log('✓ Assessment Dashboard initialized');
});
