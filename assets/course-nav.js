/* ── Course navigation on every Reveal view (preview, review, learner) ──
 * Footer: module label, current section, "Slajd X / Y", button that opens the panel.
 * Panel (key T, or Ctrl+F / "/" for search): table of contents with page numbers,
 * previous/next section, jump to the "Spis treści" slide, full-text search over slides.
 * The "Spis treści" slide gets clickable entries with page numbers, section separators
 * get "Prework · część 2 z 4 · slajdy 12–30".
 * Learner view: learner.js sets CourseNav.seenUpTo, the panel then marks seen slides.
 */

(function () {
    const PRINT = /print-pdf/.test(location.search);
    const MODULE_LABEL = document.body.dataset.moduleLabel || '';
    const MODULE_TITLE = document.body.dataset.moduleTitle || '';
    const els = {
        drawer: document.getElementById('dm-drawer'),
        toggle: document.getElementById('dm-nav-toggle'),
        close: document.getElementById('dm-drawer-close'),
        search: document.getElementById('dm-search'),
        results: document.getElementById('dm-results'),
        toc: document.getElementById('dm-toc'),
        page: document.getElementById('dm-page'),
        section: document.getElementById('dm-section-name'),
        prevSection: document.getElementById('dm-prev-section'),
        nextSection: document.getElementById('dm-next-section'),
        tocSlide: document.getElementById('dm-goto-toc'),
    };

    let slides = [];     // [{ h, title, section (index into sections or -1), text, norm }]
    let sections = [];   // [{ number, title, start, end }]
    let tocSlideIndex = -1;

    // marks: comment counts per "<section number>/<slide key>" (set by review.js in the reviewer view)
    const CourseNav = window.CourseNav = { seenUpTo: -1, marks: null, refresh: () => { if (!PRINT && isOpen()) render(); } };

    function marksHtml(s) {
        const m = CourseNav.marks && s.mark && CourseNav.marks[s.mark];
        if (!m) return '';
        return (m.open ? '<span class="dm-cmark dm-cmark-open' + (m.mine ? ' dm-cmark-mine' : '') + '" title="Otwarte uwagi' +
                (m.mine ? ', w tym przypisane do Ciebie: ' + m.mine : '') + '">💬 ' + m.open + '</span>' : '') +
            (m.done ? '<span class="dm-cmark dm-cmark-done" title="Rozwiązane uwagi">✓ ' + m.done + '</span>' : '');
    }

    // Lowercase without Polish diacritics, so "zrodlo" finds "źródło".
    function norm(s) {
        return s.toLowerCase().replace(/ł/g, 'l').normalize('NFD').replace(/[̀-ͯ]/g, '');
    }

    function esc(s) {
        const d = document.createElement('div');
        d.textContent = s == null ? '' : String(s);
        return d.innerHTML;
    }

    function headingText(el, sel) {
        const h = el.querySelector(sel);
        return h ? h.textContent.trim() : '';
    }

    function buildIndex() {
        const all = Reveal.getSlides();
        slides = [];
        sections = [];
        all.forEach((el, h) => {
            const h1 = h > 0 && el.querySelector(':scope > h1');
            if (h1) {
                if (sections.length) sections[sections.length - 1].end = h - 1;
                sections.push({ number: sections.length + 1, title: h1.textContent.trim(), start: h, end: all.length - 1 });
            }
            const title = headingText(el, 'h2') || headingText(el, 'h1') || `Slajd ${h + 1}`;
            if (tocSlideIndex === -1 && /^(spis treści|agenda)$/i.test(headingText(el, ':scope > h2'))) tocSlideIndex = h;
            const text = el.textContent.replace(/\s+/g, ' ').trim();
            slides.push({ h, title, section: sections.length - 1, text, norm: norm(text),
                mark: el.dataset.slideKey ? el.dataset.sectionNumber + '/' + el.dataset.slideKey : null });
        });
        // "(cd.)" parts: the panel lists them under the first part
        slides.forEach(s => { s.continued = / \(cd\.\)$/.test(s.title); });
    }

    function sectionAt(h) {
        for (let i = sections.length - 1; i >= 0; i--) if (h >= sections[i].start) return i;
        return -1;
    }

    function go(h) {
        Reveal.slide(h, 0);
        closeDrawer();
    }

    /* ── Slides themselves: clickable "Spis treści", labels on section separators ── */

    function decorateSlides() {
        const all = Reveal.getSlides();
        if (tocSlideIndex !== -1) {
            const items = all[tocSlideIndex].querySelectorAll('li');
            items.forEach((li, i) => {
                const sec = sections[i];
                if (!sec) return;
                const label = li.textContent.trim();
                li.innerHTML = '';
                const a = document.createElement('a');
                a.href = '#';
                a.className = 'dm-toc-link';
                a.innerHTML = '<span>' + esc(label) + '</span><span class="dm-toc-page">' + (sec.start + 1) + '</span>';
                a.addEventListener('click', ev => { ev.preventDefault(); go(sec.start); });
                li.appendChild(a);
            });
        }
        sections.forEach(sec => {
            const el = all[sec.start];
            if (el.querySelector('.dm-sec-meta')) return;
            const meta = document.createElement('p');
            meta.className = 'dm-sec-meta';
            meta.textContent = [MODULE_LABEL, `część ${sec.number} z ${sections.length}`,
                `slajdy ${sec.start + 1}–${sec.end + 1}`].filter(Boolean).join(' · ');
            el.appendChild(meta);
        });
    }

    /* ── Footer ── */

    function updateFooter() {
        const h = Reveal.getIndices().h;
        const total = Reveal.getTotalSlides();
        els.page.textContent = `Slajd ${h + 1} / ${total}`;
        const s = sectionAt(h);
        els.section.textContent = s === -1 ? MODULE_TITLE : sections[s].title;
        els.prevSection.disabled = s <= 0;
        els.nextSection.disabled = s >= sections.length - 1;
        if (isOpen()) render();
    }

    /* ── Panel ── */

    function isOpen() { return els.drawer.classList.contains('dm-open'); }

    function openDrawer(focusSearch) {
        els.drawer.classList.add('dm-open');
        els.drawer.setAttribute('aria-hidden', 'false');
        render();
        if (focusSearch) {
            els.search.focus();
            els.search.select();
        } else {
            const cur = els.toc.querySelector('.dm-current');
            if (cur) cur.scrollIntoView({ block: 'center' });
        }
    }

    function closeDrawer() {
        els.drawer.classList.remove('dm-open');
        els.drawer.setAttribute('aria-hidden', 'true');
        if (document.activeElement && els.drawer.contains(document.activeElement)) document.activeElement.blur();
    }

    function render() {
        if (els.search.value.trim().length >= 2) renderResults();
        else renderToc();
    }

    function renderToc() {
        els.results.style.display = 'none';
        els.toc.style.display = '';
        const h = Reveal.getIndices().h;
        const seen = CourseNav.seenUpTo;
        const current = sectionAt(h);
        let html = '';
        const intro = slides.filter(s => s.section === -1);
        html += '<ul class="dm-toc-list">' + intro.map(s => item(s, h, seen)).join('') + '</ul>';
        sections.forEach((sec, i) => {
            const own = slides.filter(s => s.section === i && s.h !== sec.start);
            const done = seen >= sec.end;
            html += '<details class="dm-toc-sec"' + (i === current ? ' open' : '') + '>' +
                '<summary><span class="dm-sec-title">' + esc(sec.title) + '</span>' +
                '<span class="dm-sec-pages">' + (done ? '✓ ' : '') + (sec.start + 1) + '–' + (sec.end + 1) + '</span></summary>' +
                '<ul class="dm-toc-list">' + item(slides[sec.start], h, seen, 'Początek części') +
                own.filter(s => !s.continued).map(s => item(s, h, seen)).join('') + '</ul></details>';
        });
        els.toc.innerHTML = html;
        els.toc.querySelectorAll('[data-h]').forEach(a => a.addEventListener('click', ev => {
            ev.preventDefault();
            go(Number(a.dataset.h));
        }));
    }

    function item(s, h, seen, label) {
        // A slide split into "(cd.)" parts counts as current while any part is shown
        let last = s.h;
        while (slides[last + 1] && slides[last + 1].continued) last++;
        const cls = ['dm-item'];
        if (h >= s.h && h <= last) cls.push('dm-current');
        if (seen >= last) cls.push('dm-seen');
        return '<li><a href="#" class="' + cls.join(' ') + '" data-h="' + s.h + '">' +
            '<span class="dm-num">' + (s.h + 1) + '</span><span class="dm-label">' + esc(label || s.title) + '</span>' +
            (label ? '' : marksHtml(s)) + '</a></li>';
    }

    function renderResults() {
        els.toc.style.display = 'none';
        els.results.style.display = '';
        const q = norm(els.search.value.trim());
        const found = slides.filter(s => s.norm.includes(q));
        if (!found.length) {
            els.results.innerHTML = '<p class="dm-muted">Brak wyników dla „' + esc(els.search.value.trim()) + '”.</p>';
            return;
        }
        els.results.innerHTML = '<p class="dm-muted">Znaleziono na ' + found.length + ' ' +
            (found.length === 1 ? 'slajdzie' : 'slajdach') + '.</p>' +
            found.slice(0, 100).map(s => {
                const sec = s.section === -1 ? '' : sections[s.section].title;
                return '<a href="#" class="dm-result" data-h="' + s.h + '">' +
                    '<span class="dm-result-head"><span class="dm-num">' + (s.h + 1) + '</span>' + esc(s.title) + '</span>' +
                    (sec ? '<span class="dm-result-sec">' + esc(sec) + '</span>' : '') +
                    '<span class="dm-snippet">' + snippet(s, q) + '</span></a>';
            }).join('');
        els.results.querySelectorAll('[data-h]').forEach(a => a.addEventListener('click', ev => {
            ev.preventDefault();
            go(Number(a.dataset.h));
        }));
    }

    // Text around the first hit; norm() keeps string length, so offsets map back to the original.
    function snippet(s, q) {
        const at = s.norm.indexOf(q);
        const from = Math.max(0, at - 50);
        const to = Math.min(s.text.length, at + q.length + 70);
        return (from > 0 ? '…' : '') + esc(s.text.slice(from, at)) + '<mark>' + esc(s.text.slice(at, at + q.length)) + '</mark>' +
            esc(s.text.slice(at + q.length, to)) + (to < s.text.length ? '…' : '');
    }

    function jumpSection(delta) {
        const s = sectionAt(Reveal.getIndices().h) + delta;
        if (s >= 0 && s < sections.length) go(sections[s].start);
    }

    /* ── Wiring ── */

    function init() {
        buildIndex();
        if (PRINT) return;
        decorateSlides();
        updateFooter();
        Reveal.on('slidechanged', updateFooter);
        Reveal.layout();
    }

    if (!PRINT) {
        els.toggle.addEventListener('click', () => (isOpen() ? closeDrawer() : openDrawer(false)));
        els.close.addEventListener('click', closeDrawer);
        els.prevSection.addEventListener('click', () => jumpSection(-1));
        els.nextSection.addEventListener('click', () => jumpSection(1));
        els.tocSlide.addEventListener('click', () => go(tocSlideIndex === -1 ? 0 : tocSlideIndex));
        els.search.addEventListener('input', render);
        els.search.addEventListener('keydown', ev => {
            if (ev.key === 'Enter') {
                const first = els.results.querySelector('[data-h]');
                if (first) go(Number(first.dataset.h));
            }
        });

        // Capture phase: runs before Reveal's own key handling
        document.addEventListener('keydown', ev => {
            const typing = /^(INPUT|TEXTAREA|SELECT)$/.test(ev.target.tagName) || ev.target.isContentEditable;
            if ((ev.ctrlKey || ev.metaKey) && ev.key.toLowerCase() === 'f') {
                ev.preventDefault(); ev.stopPropagation();
                openDrawer(true);
            } else if (ev.key === 'Escape' && isOpen()) {
                ev.preventDefault(); ev.stopPropagation();
                closeDrawer();
            } else if (!typing && !ev.ctrlKey && !ev.metaKey && !ev.altKey) {
                if (ev.key === 't' || ev.key === 'T') {
                    ev.preventDefault(); ev.stopPropagation();
                    isOpen() ? closeDrawer() : openDrawer(false);
                } else if (ev.key === '/') {
                    ev.preventDefault(); ev.stopPropagation();
                    openDrawer(true);
                }
            }
        }, true);
    }

    if (Reveal.isReady()) init();
    else Reveal.on('ready', init);
})();
