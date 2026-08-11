/* TERK ENERGY: progressive enhancement only.
   Every page is complete and readable with this file absent. */
(function () {
  'use strict';

  var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* --- Masthead: transparent over the hero, solid once you leave it ------ */
  var masthead = document.querySelector('.masthead');
  if (masthead) {
    var stick = function () {
      masthead.classList.toggle('is-stuck', window.scrollY > 40);
    };
    stick();
    window.addEventListener('scroll', stick, { passive: true });
  }

  /* --- Mobile navigation ------------------------------------------------ */
  var burger = document.querySelector('.burger');
  var nav = document.getElementById('nav');
  if (burger && nav) {
    var setNav = function (open) {
      nav.classList.toggle('is-open', open);
      masthead.classList.toggle('is-open', open);
      document.body.classList.toggle('is-locked', open);
      burger.setAttribute('aria-expanded', String(open));
      burger.querySelector('.burger__txt').textContent = open ? 'Close' : 'Menu';
    };
    burger.addEventListener('click', function () {
      setNav(burger.getAttribute('aria-expanded') !== 'true');
    });
    nav.addEventListener('click', function (e) {
      if (e.target.closest('a')) setNav(false);
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && burger.getAttribute('aria-expanded') === 'true') {
        setNav(false);
        burger.focus();
      }
    });
    window.addEventListener('resize', function () {
      if (window.innerWidth >= 896 && burger.getAttribute('aria-expanded') === 'true') setNav(false);
    });
  }

  /* --- The authored moment: the hero opens from the horizon -------------- */
  var hero = document.querySelector('.hero');
  if (hero) {
    var parts = hero.querySelectorAll('.hero__body > *, .index');
    for (var i = 0; i < parts.length; i++) parts[i].style.setProperty('--i', i);
    requestAnimationFrame(function () {
      requestAnimationFrame(function () {
        hero.classList.add('is-open');
      });
    });
  }

  /* --- Enquiry form -----------------------------------------------------
     Submits to the form's own action without leaving the page and reports the
     outcome in place. Three deliberate stand-downs:
       1. An absolute URL or a Netlify attribute means a third party owns the
          POST, so this handler does nothing and the browser submits normally.
       2. If no handler answers (a host without PHP, a 404), it falls back to
          composing the enquiry in the visitor's email client.
       3. With JavaScript off, the form is an ordinary POST to contact.php,
          which redirects to thanks.html.
     ---------------------------------------------------------------------- */
  var form = document.getElementById('enquiry-form');
  if (form) {
    var note = form.querySelector('.formnote');
    var submit = form.querySelector('button[type="submit"]');
    var label = submit ? submit.querySelector('.btn__label') : null;
    var labelText = label ? label.textContent : '';

    var say = function (message, state) {
      if (!note) return;
      note.textContent = message;
      note.className = 'formnote' + (state ? ' formnote--' + state : '');
    };

    var value = function (name) {
      var el = form.elements[name];
      return el && el.value ? el.value.trim() : '';
    };

    var busy = function (on) {
      if (submit) submit.disabled = on;
      if (label) label.textContent = on ? 'Sending' : labelText;
    };

    var composeEmail = function () {
      var subject = 'Enquiry: ' + (value('service') || 'General') + ' (' + value('company') + ')';
      var body = [
        'Name: ' + value('name'),
        'Company: ' + value('company'),
        'Email: ' + value('email'),
        'Telephone: ' + (value('phone') || 'Not given'),
        'Service line: ' + (value('service') || 'Not stated'),
        '',
        'Scope of work:',
        value('message')
      ].join('\n');
      say(
        'Opening your email application with this enquiry ready to send. ' +
        'If nothing opens, write to info@terkenergy.com.',
        'ok'
      );
      window.location.href =
        'mailto:info@terkenergy.com?subject=' + encodeURIComponent(subject) +
        '&body=' + encodeURIComponent(body);
    };

    form.addEventListener('submit', function (e) {
      if (!form.checkValidity()) {
        e.preventDefault();
        form.reportValidity();
        var bad = form.querySelector(':invalid');
        if (bad) bad.focus();
        say('Please complete the fields marked above.', 'err');
        return;
      }

      var action = form.getAttribute('action') || '';
      /* A third party owns this POST. Let the browser do it. */
      if (/^https?:/i.test(action) || form.hasAttribute('netlify') || form.hasAttribute('data-netlify')) {
        return;
      }
      if (!window.fetch || !window.FormData) return; /* old browser: normal POST */

      e.preventDefault();
      busy(true);
      say('Sending your enquiry.', null);

      fetch(action, {
        method: 'POST',
        body: new FormData(form),
        headers: { Accept: 'application/json', 'X-Requested-With': 'fetch' }
      })
        .then(function (res) {
          /* Nothing answering at that address: fall back rather than blame the visitor. */
          if (res.status === 404 || res.status === 405 || res.status === 501) {
            throw new Error('no-endpoint');
          }
          return res.json().then(
            function (data) { return { res: res, data: data }; },
            function () { return { res: res, data: null }; }
          );
        })
        .then(function (out) {
          busy(false);
          if (out.data && out.data.ok) {
            form.reset();
            say(out.data.message || 'Thank you. Your enquiry has been sent.', 'ok');
            return;
          }
          if (out.data && out.data.message) {
            say(out.data.message, 'err');
            return;
          }
          if (out.res.ok) {
            form.reset();
            say('Thank you. Your enquiry has been sent.', 'ok');
            return;
          }
          say('That did not send. Please email info@terkenergy.com directly.', 'err');
        })
        .catch(function () {
          busy(false);
          composeEmail();
        });
    });
  }

  /* --- Everything else settles into place in the same grammar ------------ */
  var targets = document.querySelectorAll('[data-reveal]');
  if (!targets.length) return;

  if (reduced || !('IntersectionObserver' in window)) {
    for (var k = 0; k < targets.length; k++) targets[k].classList.add('is-in');
    return;
  }

  /* Stagger by position within the nearest revealing group, not globally. */
  var groups = document.querySelectorAll('[data-reveal-group]');
  for (var g = 0; g < groups.length; g++) {
    var kids = groups[g].querySelectorAll('[data-reveal]');
    for (var n = 0; n < kids.length; n++) kids[n].style.setProperty('--i', n);
  }

  var io = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('is-in');
        io.unobserve(entry.target);
      });
    },
    { rootMargin: '0px 0px -12% 0px', threshold: 0.08 }
  );
  for (var t = 0; t < targets.length; t++) io.observe(targets[t]);
})();
