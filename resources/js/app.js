window.addEventListener('load', function () {
    const nav    = document.getElementById('primary-navigation');
    const toggle = document.getElementById('primary-menu-toggle');
    const iconOpen  = toggle ? toggle.querySelector('.icon-open')  : null;
    const iconClose = toggle ? toggle.querySelector('.icon-close') : null;

    // ── Hamburger toggle ────────────────────────────────────────────────
    if (nav && toggle) {
        toggle.addEventListener('click', function (e) {
            e.preventDefault();
            const isOpen = !nav.classList.contains('hidden');
            nav.classList.toggle('hidden', isOpen);
            toggle.setAttribute('aria-expanded', String(!isOpen));
            if (iconOpen)  iconOpen.classList.toggle('hidden', !isOpen);
            if (iconClose) iconClose.classList.toggle('hidden', isOpen);
        });
    }

    // ── Mobile sub-menu accordion ───────────────────────────────────────
    // Only active below the md breakpoint (782 px)
    document.querySelectorAll('.mobile-expand-btn').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            const li      = btn.closest('li.relative');
            const wrapper = li ? li.querySelector('.mega-menu-wrapper') : null;
            if (!wrapper) return;

            const isExpanded = btn.getAttribute('aria-expanded') === 'true';
            btn.setAttribute('aria-expanded', String(!isExpanded));
            wrapper.classList.toggle('mobile-open', !isExpanded);
            btn.classList.toggle('is-open', !isExpanded);
        });
    });
});
