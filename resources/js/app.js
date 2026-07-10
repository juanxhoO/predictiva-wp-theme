window.addEventListener('load', function () {
    const nav = document.getElementById('primary-navigation');
    const toggle = document.getElementById('primary-menu-toggle');
    const iconOpen = toggle ? toggle.querySelector('.icon-open') : null;
    const iconClose = toggle ? toggle.querySelector('.icon-close') : null;
    const shadowLayout = document.querySelector('.shadow-layout');

    // ── Hamburger toggle ────────────────────────────────────────────────
    if (nav && toggle) {
        toggle.addEventListener('click', function (e) {
            e.preventDefault();
            const isOpen = !nav.classList.contains('hidden');
            nav.classList.toggle('hidden', isOpen);
            toggle.setAttribute('aria-expanded', String(!isOpen));
            if (iconOpen) iconOpen.classList.toggle('hidden', !isOpen);
            if (iconClose) iconClose.classList.toggle('hidden', isOpen);
            shadowLayout.classList.add('block');
        });

        shadowLayout.addEventListener('click', function (e) {
            nav.classList.add('hidden');
            toggle.setAttribute('aria-expanded', 'false');
            iconOpen.classList.remove('hidden');
            iconClose.classList.add('hidden');
            shadowLayout.classList.remove('block');
        });
    }

    const closeBtn = document.getElementById('primary-menu-close-btn');
    if (closeBtn && nav && toggle) {
        closeBtn.addEventListener('click', function (e) {
            e.preventDefault();
            nav.classList.add('hidden');
            toggle.setAttribute('aria-expanded', 'false');
            iconOpen.classList.remove('hidden');
            iconClose.classList.add('hidden');
            shadowLayout.classList.remove('block');
        });
    }


    // ── Mobile sub-menu accordion ───────────────────────────────────────
    // Only active below the md breakpoint (782 px)
    document.querySelectorAll('.mobile-expand-btn').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            const li = btn.closest('li.relative');
            const wrapper = li ? li.querySelector('.mega-menu-wrapper') : null;
            if (!wrapper) return;

            const isExpanded = btn.getAttribute('aria-expanded') === 'true';
            btn.setAttribute('aria-expanded', String(!isExpanded));
            wrapper.classList.toggle('mobile-open', !isExpanded);
            btn.classList.toggle('is-open', !isExpanded);
        });
    });
});



window.addEventListener('scroll', function () {
    const header = document.querySelector('.main-menu-container');
    const contactNbar = this.document.querySelector('.contact-bar')
    if (header) {
        if (window.scrollY > contactNbar.offsetHeight) {
            header.classList.add('fixed');
        } else {
            header.classList.remove('fixed');
        }
    }
});
