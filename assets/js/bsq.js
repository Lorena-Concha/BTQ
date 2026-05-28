/* ═══════════════════════════════════════════════════════════
   BTQ — Bubble Tech Quality | Scripts principales
   ═══════════════════════════════════════════════════════════ */

document.addEventListener('DOMContentLoaded', function () {

  /* ─── Header sticky shadow ─────────────────────────────── */
  const header = document.getElementById('header');
  if (header) {
    window.addEventListener('scroll', function () {
      header.classList.toggle('scrolled', window.scrollY > 40);
    });
  }

  /* ─── Menú mobile ──────────────────────────────────────── */
  const menuToggle = document.getElementById('menuToggle');
  const mobileMenu = document.getElementById('mobileMenu');

  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener('click', function () {
      menuToggle.classList.toggle('open');
      mobileMenu.classList.toggle('open');
    });

    // Cerrar al hacer click en un enlace
    mobileMenu.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        menuToggle.classList.remove('open');
        mobileMenu.classList.remove('open');
      });
    });
  }

  /* ─── Scroll suave para anchors ─────────────────────────── */
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        const offset = header ? header.offsetHeight : 0;
        const top = target.getBoundingClientRect().top + window.scrollY - offset - 12;
        window.scrollTo({ top: top, behavior: 'smooth' });
      }
    });
  });

  /* ─── Scroll reveal (Intersection Observer) ─────────────── */
  const revealEls = document.querySelectorAll('.reveal');

  if (revealEls.length > 0) {
    const observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.12,
      rootMargin: '0px 0px -40px 0px'
    });

    revealEls.forEach(function (el) {
      observer.observe(el);
    });
  }

  /* ─── Formulario de contacto ─────────────────────────────── */
  const form = document.getElementById('contactForm');
  const feedback = document.getElementById('formFeedback');

  if (form && feedback) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();

      // Validación básica
      const nombre  = form.querySelector('#nombre');
      const email   = form.querySelector('#email');
      const mensaje = form.querySelector('#mensaje');

      feedback.className = 'form-feedback';
      feedback.textContent = '';

      if (!nombre.value.trim()) {
        showFeedback('error', 'Por favor ingresa tu nombre.');
        nombre.focus();
        return;
      }
      if (!email.value.trim() || !isValidEmail(email.value)) {
        showFeedback('error', 'Por favor ingresa un email válido.');
        email.focus();
        return;
      }
      if (!mensaje.value.trim()) {
        showFeedback('error', 'Por favor escribe un mensaje.');
        mensaje.focus();
        return;
      }

      // Simulación de envío (reemplazar con fetch real cuando haya backend)
      const btn = form.querySelector('button[type="submit"]');
      btn.disabled = true;
      btn.textContent = 'Enviando...';

      setTimeout(function () {
        showFeedback('success', '¡Mensaje enviado! Te responderemos en menos de 24 horas.');
        form.reset();
        btn.disabled = false;
        btn.textContent = 'Enviar mensaje';
      }, 1200);
    });

    function showFeedback(type, message) {
      feedback.className = 'form-feedback ' + type;
      feedback.textContent = message;
      feedback.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function isValidEmail(email) {
      return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }
  }

});
