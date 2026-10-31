
(function () {
  'use strict';

  /* ================= SHARED HELPERS===================== */
  var $ = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };

  // One count-up engine (was written twice with the same easing).
  // render(eased, progress) is called every frame; progress reaches 1 on the last frame.
  function animateCount(duration, render) {
    var start = null;
    function step(ts) {
      if (!start) start = ts;
      var p = Math.min((ts - start) / duration, 1);
      var eased = 1 - Math.pow(1 - p, 3);
      render(eased, p);
      if (p < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }

  /* =======================SITE BASICS============================== */
  (function () {
    var header = $('#siteHeader');
    var toTop = $('#toTop');
    function onScroll() {
      var y = window.pageYOffset || document.documentElement.scrollTop;
      if (header) header.classList.toggle('scrolled', y > 10);
      if (toTop) toTop.classList.toggle('show', y > 500);
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
    if (toTop) toTop.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: 'smooth' }); });

    var productDropdown = $('.nav-dropdown');
    var ddToggle = $('[data-nav-toggle]');
    var ddMenu = $('#productsMenu');
    function setDropdown(open) {
      if (!productDropdown || !ddToggle || !ddMenu) return;
      productDropdown.classList.toggle('is-open', open);
      ddMenu.classList.toggle('show', open);
      ddToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      if (!open) {
        $$('.submenu-item.is-open', productDropdown).forEach(function (item) {
          item.classList.remove('is-open');
          var button = $('.submenu-toggle', item);
          if (button) button.setAttribute('aria-expanded', 'false');
        });
      }
    }
    if (productDropdown && ddToggle && ddMenu) {
      ddToggle.addEventListener('click', function (e) {
        e.stopPropagation();
        setDropdown(!productDropdown.classList.contains('is-open'));
      });
      $$('.submenu-toggle', productDropdown).forEach(function (button) {
        button.addEventListener('click', function (e) {
          e.preventDefault();
          e.stopPropagation();
          var item = button.closest('.submenu-item');
          var open = item.classList.toggle('is-open');
          button.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
      });
      productDropdown.addEventListener('mouseenter', function () {
        if (window.innerWidth >= 992) setDropdown(true);
      });
      productDropdown.addEventListener('mouseleave', function () {
        if (window.innerWidth >= 992) setDropdown(false);
      });
      document.addEventListener('click', function (e) {
        if (!productDropdown.contains(e.target)) setDropdown(false);
      });
      document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') setDropdown(false);
      });
    }

    var mainNav = $('#mainNav');
    if (mainNav && window.bootstrap) {
      $$('a.nav-link, a.dropdown-item, .header-cta a', mainNav).forEach(function (a) {
        a.addEventListener('click', function () {
          if (window.innerWidth < 992 && mainNav.classList.contains('show')) {
            window.bootstrap.Collapse.getOrCreateInstance(mainNav).hide();
          }
        });
      });
    }

    /* ---------- Site search ---------- */
    var searchBtn = $('.search-btn');
    var searchPanel = $('#siteSearchPanel');
    var searchInput = $('#siteSearchInput');
    var searchMsg = $('#siteSearchMessage');
    var searchResults = $('#siteSearchResults');
    var SEARCH_INDEX = [
      { t: 'Fire Extinguishers', k: 'Product', u: 'products.php', w: 'extinguisher abc co2 foam dry powder' },
      { t: 'Fire Hose Reels', k: 'Product', u: 'products.php', w: 'hose reel pipe' },
      { t: 'Fire Hydrant Systems', k: 'Product', u: 'products.php', w: 'hydrant valve landing' },
      { t: 'Fire Alarm Systems', k: 'Product', u: 'products.php', w: 'alarm detector smoke panel' },
      { t: 'Sprinkler Systems', k: 'Product', u: 'products.php', w: 'sprinkler suppression' },
      { t: 'Fire Safety Accessories', k: 'Product', u: 'products.php', w: 'accessories safety signs' },
      { t: 'Manufacturing Industries', k: 'Industry', u: 'industries.php', w: 'factory plant' },
      { t: 'Oil & Gas Industries', k: 'Industry', u: 'industries.php', w: 'refinery petroleum' },
      { t: 'Chemical Industries', k: 'Industry', u: 'industries.php', w: 'chemical plant' },
      { t: 'Pharmaceutical Industries', k: 'Industry', u: 'industries.php', w: 'pharma' },
      { t: 'Commercial Buildings', k: 'Industry', u: 'industries.php', w: 'office mall tower' },
      { t: 'Residential Complexes', k: 'Industry', u: 'industries.php', w: 'society apartment' },
      { t: 'Certifications (ISI, CE, ISO, RoHS)', k: 'Quality', u: 'index.php#certifications', w: 'certificate standard' },
      { t: 'Blog & Safety Tips', k: 'Insights', u: 'blogs.php', w: 'news article tips' },
      { t: 'Contact Us', k: 'Company', u: 'contact.php', w: 'phone email address quote enquiry' }
    ];

    function toggleSearch(open) {
      if (!searchPanel || !searchBtn) return;
      searchPanel.hidden = !open;
      searchBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
      if (open && searchInput) searchInput.focus();
    }
    function runSearch(q) {
      searchResults.textContent = '';
      q = q.trim().toLowerCase();
      if (!q) { searchMsg.textContent = 'Type a product, industry or topic.'; return; }
      var hits = SEARCH_INDEX.filter(function (i) { return (i.t + ' ' + i.k + ' ' + i.w).toLowerCase().indexOf(q) !== -1; });
      searchMsg.textContent = hits.length ? hits.length + ' result' + (hits.length > 1 ? 's' : '') + ' found.' : 'No results found. Try another keyword.';
      hits.forEach(function (h) {
        var li = document.createElement('li');
        var a = document.createElement('a');
        var small = document.createElement('small');
        small.textContent = h.k;
        a.href = h.u;
        a.appendChild(small);
        a.appendChild(document.createTextNode(h.t));
        li.appendChild(a);
        searchResults.appendChild(li);
      });
    }
    if (searchBtn && searchPanel) {
      searchBtn.addEventListener('click', function () { toggleSearch(searchPanel.hidden); });
      searchPanel.addEventListener('submit', function (e) {
        e.preventDefault();
        runSearch(searchInput.value);
        toggleSearch(false);
      });
      searchInput.addEventListener('input', function () { runSearch(searchInput.value); });
      document.addEventListener('keydown', function (e) { if (e.key === 'Escape') toggleSearch(false); });
      document.addEventListener('click', function (e) {
        if (!searchPanel.hidden && !searchPanel.contains(e.target) && !searchBtn.contains(e.target)) toggleSearch(false);
      });
    }

    /* ---------- Sliders (Swiper) ---------- */
    if (typeof Swiper !== 'undefined') {

      // HERO - auto-swipes every 10 seconds, also draggable/swipable by hand
      var heroEl = $('#heroSwiper');
      if (heroEl) {
        var bar = $('#heroProgress');
        new Swiper(heroEl, {
          loop: true,
          speed: 1000,
          grabCursor: true,
          autoplay: { delay: 10000, disableOnInteraction: false, pauseOnMouseEnter: false },
          keyboard: { enabled: true },
          navigation: { prevEl: '.hero-prev', nextEl: '.hero-next' },
          pagination: { el: '.hero-pagination', clickable: true },
          on: {
            autoplayTimeLeft: function (s, time, progress) {
              if (bar) bar.style.transform = 'scaleX(' + (1 - progress) + ')';
            }
          }
        });
      }

      // PRODUCTS
      if ($('#productsSwiper')) {
        new Swiper('#productsSwiper', {
          spaceBetween: 20, grabCursor: true,
          slidesPerView: 1.2,
          navigation: { prevEl: '.products-prev', nextEl: '.products-next' },
          breakpoints: { 480: { slidesPerView: 2 }, 768: { slidesPerView: 3 }, 992: { slidesPerView: 4 }, 1200: { slidesPerView: 5 } }
        });
      }

      // BLOGS
      if ($('#blogsSwiper')) {
        new Swiper('#blogsSwiper', {
          spaceBetween: 24, grabCursor: true, slidesPerView: 1.1,
          navigation: { prevEl: '.blogs-prev', nextEl: '.blogs-next' },
          breakpoints: { 576: { slidesPerView: 2 }, 992: { slidesPerView: 3 } }
        });
      }
    }

    /* ---------- Scroll reveal ([data-animate]) ---------- */
    var animEls = $$('[data-animate]');
    if ('IntersectionObserver' in window && animEls.length) {
      var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (en) {
          if (en.isIntersecting) { en.target.classList.add('in-view'); io.unobserve(en.target); }
        });
      }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
      animEls.forEach(function (el) { io.observe(el); });
    } else {
      animEls.forEach(function (el) { el.classList.add('in-view'); });
    }

    /* ---------- Count-up numbers ([data-count]) ---------- */
    var counters = $$('[data-count]');
    function runCounter(el) {
      var target = parseInt(el.getAttribute('data-count'), 10) || 0;
      var suffix = el.getAttribute('data-suffix') || '';
      animateCount(1800, function (eased, p) {
        el.textContent = Math.floor(eased * target) + (p === 1 ? suffix : '');
      });
    }
    if ('IntersectionObserver' in window && counters.length) {
      var co = new IntersectionObserver(function (entries) {
        entries.forEach(function (en) {
          if (en.isIntersecting) { runCounter(en.target); co.unobserve(en.target); }
        });
      }, { threshold: 0.6 });
      counters.forEach(function (c) { co.observe(c); });
    } else {
      counters.forEach(function (c) { c.textContent = c.getAttribute('data-count') + (c.getAttribute('data-suffix') || ''); });
    }

    /* ---------- Detailed enquiry form (WhatsApp / email) ---------- */
    $$('.js-enquiry-form').forEach(function (form) {
      var status = $('.form-status', form);
      var phoneInput = $('input[name="phone"]', form);
      function validatePhone() {
        var digits = phoneInput.value.replace(/\D/g, '');
        var allowedCharacters = /^[0-9+()\s.-]+$/.test(phoneInput.value);
        phoneInput.setCustomValidity(allowedCharacters && digits.length >= 10 && digits.length <= 15 ? '' : 'Enter a valid mobile number.');
      }
      phoneInput.addEventListener('input', validatePhone);

      form.addEventListener('submit', function (e) {
        e.preventDefault();
        validatePhone();
        form.classList.add('was-validated');
        if (!form.checkValidity()) {
          status.className = 'form-status err';
          status.textContent = 'Please check the highlighted fields and try again.';
          form.reportValidity();
          return;
        }

        var values = new FormData(form);
        var company = values.get('company').trim();
        var requirement = [
          'Fire safety enquiry',
          '',
          'Full name: ' + values.get('name').trim(),
          'Company: ' + company,
          'Mobile: ' + values.get('phone').trim(),
          'Email: ' + values.get('email').trim(),
          'Product / service: ' + (values.get('product') || 'Not specified'),
          'Requirement details: ' + (values.get('message').trim() || 'Not specified')
        ].join('\n');

        var submitter = e.submitter;
        var action = submitter ? submitter.value : 'whatsapp';
        status.className = 'form-status';

        if (action === 'email') {
          var recipient = form.getAttribute('data-company-email');
          if (!recipient) {
            status.className = 'form-status err';
            status.textContent = 'The company email address is not configured.';
            return;
          }
          var subject = encodeURIComponent('Fire safety enquiry - ' + company);
          window.location.href = 'mailto:' + recipient + '?subject=' + subject + '&body=' + encodeURIComponent(requirement);
          status.textContent = 'Your email draft is ready to review and send.';
          return;
        }

        var whatsappNumber = form.getAttribute('data-whatsapp-number');
        if (!whatsappNumber) {
          status.className = 'form-status err';
          status.textContent = 'The WhatsApp contact number is not configured.';
          return;
        }
        var whatsappUrl = 'https://wa.me/' + whatsappNumber + '?text=' + encodeURIComponent(requirement);
        var whatsappWindow = window.open(whatsappUrl, '_blank');
        if (whatsappWindow) {
          whatsappWindow.opener = null;
        } else {
          window.location.href = whatsappUrl;
        }
        status.textContent = 'Your enquiry is ready in WhatsApp. Review and send it there.';
      });
    });

    /* ---------- Footer year ---------- */
    var yr = $('#year');
    if (yr) yr.textContent = new Date().getFullYear();
  })();

  /* ======================================================================
     2. BLOG PAGE
     ====================================================================== */
  (function () {
    /* ---------- Blog filter + search + pagination ---------- */
    var grid = document.getElementById('postGrid');
    if (grid) {
      var cards = $$('.post-col', grid);
      var filters = $$('[data-filter]');
      var searchInput = document.getElementById('postSearch');
      var searchForm = document.getElementById('postSearchForm');
      var pager = document.getElementById('postPagination');
      var countEl = document.getElementById('postCount');
      var emptyEl = document.getElementById('postEmpty');
      var PER_PAGE = 6;
      var state = { cat: 'all', q: '', page: 1 };

      // Deep link: blogs.php?cat=safety-tips
      var wanted = new URLSearchParams(window.location.search).get('cat');
      if (wanted && filters.some(function (f) { return f.getAttribute('data-filter') === wanted; })) state.cat = wanted;

      var matches = function () {
        var q = state.q.trim().toLowerCase();
        return cards.filter(function (c) {
          var okCat = state.cat === 'all' || c.getAttribute('data-cat') === state.cat;
          var okQ = !q || c.getAttribute('data-search').indexOf(q) !== -1;
          return okCat && okQ;
        });
      };

      var scrollToList = function () {
        var top = grid.getBoundingClientRect().top + window.pageYOffset - 150;
        window.scrollTo({ top: Math.max(top, 0), behavior: 'smooth' });
      };

      var makeBtn = function (label, page, opts) {
        var b = document.createElement('button');
        b.type = 'button';
        b.className = 'page-btn' + (opts.active ? ' is-active' : '');
        b.disabled = !!opts.disabled;
        if (opts.aria) b.setAttribute('aria-label', opts.aria);
        if (opts.active) b.setAttribute('aria-current', 'page');
        if (opts.icon) {
          var i = document.createElement('i');
          i.className = 'bi ' + opts.icon;
          i.setAttribute('aria-hidden', 'true');
          b.appendChild(i);
        } else {
          b.textContent = label;
        }
        b.addEventListener('click', function () { state.page = page; render(true); });
        return b;
      };

      var render = function (scroll) {
        var list = matches();
        var pages = Math.max(1, Math.ceil(list.length / PER_PAGE));
        if (state.page > pages) state.page = pages;
        var start = (state.page - 1) * PER_PAGE;
        var end = start + PER_PAGE;

        cards.forEach(function (c) { c.hidden = true; c.classList.remove('pop'); });
        void grid.offsetWidth; // restart the pop-in animation
        list.slice(start, end).forEach(function (c, i) {
          c.hidden = false;
          c.style.setProperty('--i', i);
          c.classList.add('pop');
        });

        filters.forEach(function (f) {
          var on = f.getAttribute('data-filter') === state.cat;
          f.classList.toggle('is-active', on);
          f.setAttribute('aria-pressed', on ? 'true' : 'false');
        });

        if (emptyEl) emptyEl.hidden = list.length > 0;
        if (countEl) {
          countEl.textContent = list.length
            ? 'Showing ' + (start + 1) + '\u2013' + Math.min(end, list.length) + ' of ' + list.length + ' article' + (list.length > 1 ? 's' : '')
            : '';
        }

        if (pager) {
          pager.textContent = '';
          if (pages > 1) {
            pager.appendChild(makeBtn('', state.page - 1, { icon: 'bi-chevron-left', aria: 'Previous page', disabled: state.page === 1 }));
            for (var p = 1; p <= pages; p++) {
              pager.appendChild(makeBtn(String(p), p, { active: p === state.page, aria: 'Page ' + p }));
            }
            pager.appendChild(makeBtn('', state.page + 1, { icon: 'bi-chevron-right', aria: 'Next page', disabled: state.page === pages }));
          }
        }
        if (scroll) scrollToList();
      };

      filters.forEach(function (f) {
        f.addEventListener('click', function () {
          state.cat = f.getAttribute('data-filter');
          state.page = 1;
          render(false);
        });
      });
      if (searchInput) {
        searchInput.addEventListener('input', function () { state.q = searchInput.value; state.page = 1; render(false); });
      }
      if (searchForm) {
        searchForm.addEventListener('submit', function (e) { e.preventDefault(); scrollToList(); });
      }
      render(false);
    }

    /* ---------- Newsletter form (front-end only) ---------- */
    $$('.js-newsletter').forEach(function (form) {
      var email = form.querySelector('input[type="email"]');
      var status = form.parentNode.querySelector('.newsletter-status');
      form.addEventListener('submit', function (e) {
        e.preventDefault();
        var valid = email.value.trim() !== '' && email.checkValidity();
        form.classList.toggle('was-invalid', !valid);
        if (!valid) {
          status.className = 'newsletter-status err';
          status.textContent = 'Please enter a valid email address.';
          email.focus();
          return;
        }
        status.className = 'newsletter-status';
        status.textContent = 'Subscribing\u2026';
        setTimeout(function () {
          form.reset();
          status.className = 'newsletter-status ok';
          status.textContent = 'Thank you for subscribing!';
        }, 800);
      });
      email.addEventListener('input', function () { form.classList.remove('was-invalid'); });
    });
  })();

  /* ===========PRODUCT ENQUIRY PREFILLAny element with  data-open-enquiry data-product-name="X"  opens theenquiry modal with product X already selected. Without JS/Bootstrap thelink falls back to its href.=============================== */
  (function () {
    var modalEl = document.getElementById('enquiryModal');
    if (!modalEl) return;
    var addedOption = null;

    function selectProduct(name) {
      var field = modalEl.querySelector('[name="product"]');
      if (!field || !name) return;
      if (field.tagName === 'SELECT') {
        var found = null;
        for (var i = 0; i < field.options.length; i++) {
          var o = field.options[i];
          if ((o.value || o.text).trim().toLowerCase() === name.trim().toLowerCase()) { found = o; break; }
        }
        if (!found) {
          found = new Option(name, name);
          field.add(found);
          addedOption = found;
        }
        field.value = found.value;
      } else {
        field.value = name;
      }
    }

    document.addEventListener('click', function (e) {
      var trigger = e.target.closest ? e.target.closest('[data-open-enquiry]') : null;
      if (!trigger || !window.bootstrap) return;
      e.preventDefault();
      selectProduct(trigger.getAttribute('data-product-name') || '');
      window.bootstrap.Modal.getOrCreateInstance(modalEl).show();
    });

    // Reset so the next generic "Enquiry Now" opens clean
    modalEl.addEventListener('hidden.bs.modal', function () {
      var field = modalEl.querySelector('[name="product"]');
      if (!field) return;
      if (field.tagName === 'SELECT') {
        if (addedOption && addedOption.parentNode) addedOption.parentNode.removeChild(addedOption);
        addedOption = null;
        field.selectedIndex = 0;
      } else {
        field.value = '';
      }
    });
  })();

  /* ================ PAGE EFFECTS (run after the DOM is ready)============================== */
  document.addEventListener('DOMContentLoaded', function () {

    // Show the enquiry prompt once per browser session; explicit triggers always reopen it.
    const enquiryModal = document.getElementById('enquiryModal');
    if (enquiryModal && window.bootstrap) {
      const enquiryInstance = window.bootstrap.Modal.getOrCreateInstance(enquiryModal, {
        backdrop: true,
        keyboard: true,
        focus: true
      });
      enquiryModal.addEventListener('shown.bs.modal', function () {
        const firstField = enquiryModal.querySelector('input[name="name"]');
        if (firstField) firstField.focus();
      });
      try {
        if (!window.sessionStorage.getItem('a1EnquiryShown')) {
          window.sessionStorage.setItem('a1EnquiryShown', '1');
          window.setTimeout(function () { enquiryInstance.show(); }, 650);
        }
      } catch (storageError) {
        window.setTimeout(function () { enquiryInstance.show(); }, 650);
      }
    }

    // ================FINISHING EFFECTS Scroll progress bar  - Number counters (About stats band)=======================
    const reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const forceAnim = /[?&]anim=1/.test(window.location.search);   // add ?anim=1 to the URL to force animations

    // ---- Scroll progress bar ----
    const progressBar = document.createElement('div');
    progressBar.className = 'fx-progress';
    progressBar.setAttribute('aria-hidden', 'true');
    document.body.appendChild(progressBar);

    let progressTicking = false;
    const updateProgress = () => {
      const h = document.documentElement.scrollHeight - window.innerHeight;
      const p = h > 0 ? Math.min(1, Math.max(0, window.scrollY / h)) : 0;
      progressBar.style.transform = 'scaleX(' + p + ')';
      progressTicking = false;
    };
    window.addEventListener('scroll', () => {
      if (!progressTicking) {
        progressTicking = true;
        requestAnimationFrame(updateProgress);
      }
    }, { passive: true });
    window.addEventListener('resize', updateProgress);
    updateProgress();

    // ---- About stats counters (.ab-stats-list strong) ----
    const counterEls = document.querySelectorAll('.ab-stats-list strong');

    if (counterEls.length && !reduceMotion && 'IntersectionObserver' in window) {

      const runStatCounter = (el) => {
        const target = parseInt(el.dataset.target, 10);
        const fmt = (n) => el.dataset.comma ? n.toLocaleString('en-IN') : String(n);
        animateCount(1800, (eased) => {
          el.textContent = el.dataset.prefix + fmt(Math.round(target * eased)) + el.dataset.suffix;
        });
      };

      const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (!entry.isIntersecting) return;
          counterObserver.unobserve(entry.target);
          runStatCounter(entry.target);
        });
      }, { threshold: 0.4 });

      counterEls.forEach(el => {
        const raw = el.textContent.trim();
        const m = raw.match(/^([^\d]*)([\d,]+)(.*)$/);
        if (!m) return;

        const hasComma = m[2].indexOf(',') > -1;
        const num = parseInt(m[2].replace(/,/g, ''), 10);

        // skip plain years like 2017
        if (!hasComma && num >= 1900 && num <= 2100) return;

        el.dataset.prefix = m[1];
        el.dataset.suffix = m[3];
        el.dataset.target = num;
        el.dataset.comma = hasComma ? '1' : '';
        el.textContent = m[1] + '0' + m[3];
        counterObserver.observe(el);
      });
    }

    // ==========================================
    // SCROLL-REVEAL ENGINE  [ALL PAGES]
    //    ONE function, used by About / Solutions / Industries / Contact.   
    // ==========================================
    function initReveal(map) {
      if ((reduceMotion && !forceAnim) || !('IntersectionObserver' in window)) {
        console.log('Scroll animation skipped (reduced motion or no IntersectionObserver). Add ?anim=1 to the URL to force it.');
        return;
      }

      const items = [];
      const seen = new Set();   // an element is never animated twice

      map.forEach(function (row) {
        const selector = row[0], animClass = row[1], stagger = row[2], cols = row[3] || 0;
        document.querySelectorAll(selector).forEach(function (el, i) {
          if (seen.has(el)) return;
          seen.add(el);
          const n = cols ? i % cols : i;
          el.classList.add('sr', animClass);
          el.classList.add('sr-delay-' + Math.round(Math.min(n * stagger, 0.6) * 1000));
          items.push(el);
        });
      });

      if (!items.length) return;   // nothing to animate on this page

      // Turn the animation CSS on only AFTER elements are prepared
      document.documentElement.classList.add('sr-on');

      const io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) return;
          const el = entry.target;
          io.unobserve(el);

          void el.offsetWidth;   // reflow so the hidden state is registered first
          el.classList.add('sr-in');

          // Clean up afterwards so hover effects on cards work normally again
          setTimeout(function () {
            el.classList.remove('sr', 'sr-up', 'sr-left', 'sr-right', 'sr-zoom', 'sr-fade', 'sr-in');
            el.classList.remove('sr-delay-0', 'sr-delay-80', 'sr-delay-100', 'sr-delay-120', 'sr-delay-150', 'sr-delay-160', 'sr-delay-200', 'sr-delay-240', 'sr-delay-300', 'sr-delay-320', 'sr-delay-400', 'sr-delay-450', 'sr-delay-480', 'sr-delay-600');
          }, 1800);
        });
      }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

      items.forEach(function (el) { io.observe(el); });
      console.log('Scroll animation ready. Elements animated:', items.length);
    }

    // Solutions-only rows (guarded so the generic "section.py-5" selector
    // can never match on other pages)
    const solutionsRows = document.querySelector('.sol-grid-card') ? [
      ['section.py-5:not(.bg-white) .sol-sec-title, section.py-5:not(.bg-white) .sol-main-heading, section.py-5:not(.bg-white) .sol-sec-text', 'sr-up', 0.1],
      ['section.py-5:not(.bg-white) .row.align-items-end .d-inline-block', 'sr-right', 0]
    ] : [];

    initReveal([
      // ---------- Shared inner-page hero (Solutions / Industries) ----------
      ['.pg-hero-content > *', 'sr-up', 0.1],

      // ---------- ABOUT ----------
      ['.ab-hero .sol-hero-content', 'sr-up', 0],
      ['.ab-who-text', 'sr-left', 0],
      ['.ab-who-panel', 'sr-right', 0],
      ['.ab-who-visual', 'sr-right', 0],
      ['.ab-story-media', 'sr-left', 0],
      ['.ab-story-text > .ab-eyebrow, .ab-story-text > h2, .ab-story-text > p', 'sr-up', 0.1],
      ['.ab-feat', 'sr-up', 0.15],
      ['.ab-fact-left > .ab-eyebrow, .ab-fact-left > h2, .ab-fact-left > .ab-fact-lead', 'sr-up', 0.1],
      ['.ab-fact-row', 'sr-up', 0.07],
      ['.ab-fact-right', 'sr-right', 0],
      ['.ab-mission-head', 'sr-up', 0],
      ['.ab-slider', 'sr-up', 0],
      ['.ab-stats-list li', 'sr-zoom', 0.12],
      ['.ab-process-head', 'sr-up', 0],
      ['.ab-step', 'sr-up', 0.15],
      ['.ab-why-head', 'sr-up', 0],
      ['.ab-why-card', 'sr-up', 0.12],
      ['.ab-sec-head', 'sr-up', 0],
      ['.ab-prod-card', 'sr-up', 0.08],
      ['.ab-serv-item', 'sr-up', 0.1],
      ['.ab-ind-grid li', 'sr-zoom', 0.07],
      ['.ab-std-card', 'sr-up', 0.12],
      ['.ab-faq-list', 'sr-up', 0],

      // ---------- SOLUTIONS ----------
      ['.sol-grid-card', 'sr-up', 0.15, 3],            // 3 per row
      ['.cs-media', 'sr-fade', 0],
      ['.cs-label, .cs-content h3, .cs-content p', 'sr-up', 0.1],
      ['.cs-list span', 'sr-up', 0.1],
      ['.sol-env-head > *', 'sr-up', 0.1],
      ['.sol-env-toolbar', 'sr-up', 0],
      ['.sol-env-slider', 'sr-up', 0],
      ['.sol-extra-heading > *', 'sr-up', 0.1],
      ['.sol-approach-card', 'sr-up', 0.12, 4],
      ['.sol-planning-copy > *', 'sr-up', 0.1],
      ['.sol-planning-item', 'sr-up', 0.1],
      ['.sol-faq-list details', 'sr-up', 0.08],
      ['.sol-cta-content > *', 'sr-up', 0.1]
    ].concat(solutionsRows, [

      // ---------- INDUSTRIES ----------
      ['.ix-intro-text > *', 'sr-up', 0.1],
      ['.ix-tagline', 'sr-right', 0],
      ['.ix-card', 'sr-up', 0.15, 3],                  // 3 per row
      ['.ix-expertise-text > *', 'sr-up', 0.1],
      ['.ix-exp-item', 'sr-zoom', 0.12],
      ['.ix-priority-card', 'sr-up', 0.12, 4],
      ['.ix-process-step', 'sr-up', 0.12, 4],
      ['.ix-faq-list details', 'sr-up', 0.08],
      ['.ix-cta-box', 'sr-zoom', 0],                   // also used on About

      // ---------- CONTACT ----------
      ['.ct-hero .sol-hero-content', 'sr-up', 0],
      ['.ct-info-card', 'sr-up', 0.12, 4],
      ['.ct-form-card', 'sr-left', 0],
      ['.ct-office', 'sr-right', 0],
      ['.ct-map', 'sr-up', 0],
      ['.ct-extra-heading > *', 'sr-up', 0.1],
      ['.ct-product-item', 'sr-up', 0.12, 4],
      ['.ct-products-bottom', 'sr-up', 0],
      ['.ct-process-item', 'sr-up', 0.12, 4],
      ['.ct-process-cta', 'sr-zoom', 0],
      ['.ct-why-head > *', 'sr-up', 0.1],
      ['.ct-why-item', 'sr-zoom', 0.12, 4],
      ['.ct-faq > .ct-eyebrow, .ct-faq > h2, .ct-faq > .ct-form-lead', 'sr-up', 0.1],
      ['.ct-faq-list details', 'sr-up', 0.1],
      ['.ct-cta', 'sr-right', 0]
    ]));

    // =============TRACK SLIDER ENGINE  [ALL PAGES]=====================
    function initTrackSlider(cfg) {
      const root = document.querySelector(cfg.root);
      if (!root) return;

      const track = root.querySelector(cfg.track);
      if (!track) return;
      const slides = track.querySelectorAll(cfg.slide);
      if (!slides.length) return;

      const dotsWrap = cfg.dots ? root.querySelector(cfg.dots) : null;
      const prevBtn = cfg.prev ? document.querySelector(cfg.prev) : null;
      const nextBtn = cfg.next ? document.querySelector(cfg.next) : null;
      const DELAY = cfg.autoplay || 0;
      let timer = null;

      const step = () => {
        const cs = getComputedStyle(track);
        const gap = parseFloat(cs.columnGap || cs.gap) || 0;
        return slides[0].getBoundingClientRect().width + gap;
      };
      const perView = () => Math.max(1, Math.round((track.clientWidth + 1) / step()));
      const maxIndex = () => Math.max(0, slides.length - perView());
      const current = () => Math.round(track.scrollLeft / step());
      const goTo = (i) => track.scrollTo({ left: i * step(), behavior: 'smooth' });

      // ----- autoplay -----
      const autoNext = () => {
        const c = current();
        goTo(c >= maxIndex() ? 0 : c + 1);
      };
      const stop = () => { if (timer) { clearInterval(timer); timer = null; } };
      const start = () => {
        stop();
        if (DELAY && maxIndex() > 0) timer = setInterval(autoNext, DELAY);
      };
      const restart = () => { stop(); start(); };

      // ----- dots -----
      const markDot = () => {
        if (!dotsWrap) return;
        const c = Math.min(current(), maxIndex());
        Array.from(dotsWrap.children).forEach((dot, i) => dot.classList.toggle('is-active', i === c));
      };
      const buildDots = () => {
        if (!dotsWrap) return;
        dotsWrap.innerHTML = '';
        const n = maxIndex() + 1;
        if (n <= 1) { dotsWrap.style.display = 'none'; return; }
        dotsWrap.style.display = '';
        for (let i = 0; i < n; i++) {
          const b = document.createElement('button');
          b.type = 'button';
          b.setAttribute('aria-label', 'Go to slide ' + (i + 1));
          b.addEventListener('click', () => { goTo(i); restart(); });
          dotsWrap.appendChild(b);
        }
        markDot();
      };

      // ----- arrows -----
      const updateArrows = () => {
        if (!prevBtn || !nextBtn) return;
        const atStart = track.scrollLeft <= 2;
        const atEnd = track.scrollLeft + track.clientWidth >= track.scrollWidth - 2;
        prevBtn.disabled = atStart;
        nextBtn.disabled = atEnd;
        prevBtn.classList.toggle('is-disabled', atStart);
        nextBtn.classList.toggle('is-disabled', atEnd);
      };
      if (prevBtn) prevBtn.addEventListener('click', () => { track.scrollBy({ left: -step(), behavior: 'smooth' }); restart(); });
      if (nextBtn) nextBtn.addEventListener('click', () => { track.scrollBy({ left: step(), behavior: 'smooth' }); restart(); });

      // ----- mouse drag -----
      if (cfg.drag) {
        let down = false, startX = 0, startLeft = 0;
        track.addEventListener('mousedown', (e) => {
          down = true;
          startX = e.pageX;
          startLeft = track.scrollLeft;
          track.classList.add('is-dragging');
        });
        window.addEventListener('mouseup', () => { down = false; track.classList.remove('is-dragging'); });
        window.addEventListener('mousemove', (e) => {
          if (!down) return;
          track.scrollLeft = startLeft - (e.pageX - startX);
        });
      }

      // ----- events -----
      track.addEventListener('scroll', () => { markDot(); updateArrows(); }, { passive: true });
      if (DELAY) {
        root.addEventListener('mouseenter', stop);
        root.addEventListener('mouseleave', start);
        root.addEventListener('touchstart', stop, { passive: true });
        root.addEventListener('touchend', () => setTimeout(start, 2500), { passive: true });
        root.addEventListener('focusin', stop);
        root.addEventListener('focusout', start);
        document.addEventListener('visibilitychange', () => { document.hidden ? stop() : start(); });
      }
      window.addEventListener('resize', () => { buildDots(); updateArrows(); start(); });
      window.addEventListener('load', updateArrows);

      buildDots();
      updateArrows();
      start();
    }

    // About: Mission / Vision (auto-plays + dots + drag)
    initTrackSlider({
      root: '#abMissionSlider',
      track: '.ab-slider-track',
      slide: '.ab-slide',
      dots: '.ab-slider-dots',
      autoplay: 2500,
      drag: true
    });

    // Solutions: Environment slider (arrows + drag + autoplay)
    initTrackSlider({
      root: '#solEnvSlider',
      track: '.sol-env-track',
      slide: '.sol-env-slide',
      prev: '.sol-env-prev',
      next: '.sol-env-next',
      drag: true,
      autoplay: 2500
    });

    // ===================CONTACT PAGE - CAPTCHA================
    (function () {
      const canvas = document.getElementById('ctCaptchaCanvas');
      if (!canvas) return;

      const ctx = canvas.getContext('2d');
      const input = document.getElementById('ctCaptcha');
      const msg = document.getElementById('ctCaptchaMsg');
      const refresh = document.getElementById('ctCaptchaRefresh');
      const form = canvas.closest('form');
      const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789'; // confusing 0/O, 1/I removed
      let code = '';

      const rnd = (n) => Math.floor(Math.random() * n);

      function draw() {
        const w = canvas.width, h = canvas.height;
        code = '';
        for (let i = 0; i < 5; i++) code += chars.charAt(rnd(chars.length));

        const bg = ctx.createLinearGradient(0, 0, w, h);
        bg.addColorStop(0, '#f3f5f8');
        bg.addColorStop(1, '#ffeaea');
        ctx.fillStyle = bg;
        ctx.fillRect(0, 0, w, h);

        // noise lines
        for (let l = 0; l < 6; l++) {
          ctx.strokeStyle = 'rgba(230,0,0,' + (0.15 + Math.random() * 0.25) + ')';
          ctx.lineWidth = 1 + Math.random() * 2;
          ctx.beginPath();
          ctx.moveTo(rnd(w), rnd(h));
          ctx.lineTo(rnd(w), rnd(h));
          ctx.stroke();
        }
        // noise dots
        for (let d = 0; d < 60; d++) {
          ctx.fillStyle = 'rgba(15,30,46,' + (0.1 + Math.random() * 0.3) + ')';
          ctx.beginPath();
          ctx.arc(rnd(w), rnd(h), 1 + Math.random() * 2, 0, Math.PI * 2);
          ctx.fill();
        }
        // letters
        const stepX = w / (code.length + 1);
        for (let c = 0; c < code.length; c++) {
          ctx.save();
          ctx.translate(stepX * (c + 1), h / 2 + (Math.random() * 10 - 5));
          ctx.rotate((Math.random() - 0.5) * 0.6);
          ctx.font = 'bold ' + (46 + rnd(10)) + 'px Arial';
          ctx.textAlign = 'center';
          ctx.textBaseline = 'middle';
          ctx.fillStyle = c % 2 ? '#0F1E2E' : '#e60000';
          ctx.fillText(code.charAt(c), 0, 0);
          ctx.restore();
        }
      }

      function reset(text) {
        msg.textContent = text || '';
        input.value = '';
        input.classList.remove('is-wrong');
        draw();
      }

      refresh.addEventListener('click', function () { reset(''); input.focus(); });

      input.addEventListener('input', function () {
        input.classList.remove('is-wrong');
        msg.textContent = '';
      });

      form.addEventListener('submit', function (e) {
        if (input.value.trim().toUpperCase() !== code) {
          e.preventDefault();
          reset('Captcha galat hai. Naya code dekh kar dobara try karo.');
          input.classList.add('is-wrong');
          input.focus();
          return;
        }
        setTimeout(function () { reset(''); }, 800); 
      });

      draw();
    })();

  });
})();