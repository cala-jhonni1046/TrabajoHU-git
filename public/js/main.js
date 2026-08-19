/* =============================================
   Portafolio - Interacciones JavaScript
   Scroll suave, animaciones al aparecer, scroll spy,
   menú móvil, botón volver arriba y spotlight de tarjetas.
   ============================================= */
(function () {
  'use strict';

  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Marca que JS está disponible para activar las animaciones (guard .js)
  document.documentElement.classList.add('js');

  /* =============================================
     MENÚ MÓVIL (hamburguesa)
     ============================================= */
  const navToggle = document.querySelector('.nav-toggle');
  const navList = document.querySelector('.nav__list');

  function closeMobileMenu() {
    if (!navList || !navToggle) return;
    navList.classList.remove('active');
    navToggle.classList.remove('active');
    navToggle.setAttribute('aria-expanded', 'false');
    navToggle.setAttribute('aria-label', 'Abrir menú de navegación');
  }

  if (navToggle && navList) {
    navToggle.addEventListener('click', (e) => {
      e.stopPropagation();
      const isOpen = navList.classList.toggle('active');
      navToggle.classList.toggle('active', isOpen);
      navToggle.setAttribute('aria-expanded', String(isOpen));
      navToggle.setAttribute('aria-label', isOpen ? 'Cerrar menú de navegación' : 'Abrir menú de navegación');
    });

    // Cerrar al pulsar un enlace del menú
    navList.querySelectorAll('a').forEach((link) => {
      link.addEventListener('click', closeMobileMenu);
    });

    // Cerrar al hacer clic fuera del menú
    document.addEventListener('click', (e) => {
      if (!navToggle.contains(e.target) && !navList.contains(e.target)) {
        closeMobileMenu();
      }
    });

    // Cerrar con la tecla Escape
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closeMobileMenu();
    });

    // Restablecer al pasar a escritorio
    window.addEventListener('resize', () => {
      if (window.innerWidth > 768) closeMobileMenu();
    });
  }

  /* =============================================
     SCROLL SUAVE ENTRE SECCIONES
     Respeta la altura del header fijo y la
     preferencia de movimiento reducido.
     ============================================= */
  const header = document.querySelector('.header');
  const headerHeight = header ? header.offsetHeight : 72;

  const anchorLinks = document.querySelectorAll('a.js-anchor[href^="#"]');
  anchorLinks.forEach((link) => {
    link.addEventListener('click', (e) => {
      const id = link.getAttribute('href');
      if (!id || id.length < 2) return;

      const target = document.querySelector(id);
      if (!target) return;

      e.preventDefault();
      const top = Math.max(target.getBoundingClientRect().top + window.pageYOffset - headerHeight, 0);
      window.scrollTo({
        top,
        behavior: prefersReducedMotion ? 'auto' : 'smooth',
      });
    });
  });

  /* =============================================
     ANIMACIONES AL APARECER (reveal on scroll)
     Los elementos con .reveal entran con fade+slide
     cuando llegan al viewport. Las tarjetas de un
     mismo grupo se escalonan con un pequeño retraso.
     ============================================= */
  function staggerReveals() {
    document.querySelectorAll('[data-group]').forEach((group) => {
      const items = group.querySelectorAll('.reveal');
      items.forEach((item, i) => {
        item.style.animationDelay = `${Math.min(i * 90, 480)}ms`;
      });
    });
  }

  // Las barras de habilidades parten de 0 y se llenan al ver la tarjeta
  const skillFills = document.querySelectorAll('.skill-card__fill');
  skillFills.forEach((fill) => {
    fill.style.width = '0';
  });

  function animateSkillBar(el) {
    const fill = el.querySelector('.skill-card__fill');
    if (!fill) return;
    const target = parseInt(fill.getAttribute('aria-valuenow'), 10);
    if (!Number.isNaN(target)) {
      requestAnimationFrame(() => {
        fill.style.width = `${target}%`;
      });
    }
  }

  const revealObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;

      const el = entry.target;
      el.classList.add('is-visible');

      // Barras de habilidades
      if (el.classList.contains('skill-card')) {
        animateSkillBar(el);
      }

      // Al terminar la animación se libera para que los hovers funcionen
      const onAnimationEnd = () => {
        el.classList.remove('is-visible');
        el.classList.add('is-done');
        el.style.animationDelay = '';
        el.removeEventListener('animationend', onAnimationEnd);
      };
      el.addEventListener('animationend', onAnimationEnd, { once: true });

      observer.unobserve(el);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -50px 0px' });

  document.querySelectorAll('.reveal').forEach((el) => revealObserver.observe(el));
  staggerReveals();

  /* =============================================
     NAVEGACIÓN ACTIVA (scroll spy)
     Resalta el enlace de la sección visible.
     ============================================= */
  const sectionTargets = document.querySelectorAll('[data-section]');
  const sectionLinks = Array.prototype.filter.call(
    document.querySelectorAll('.nav__link'),
    (link) => (link.getAttribute('href') || '').startsWith('#')
  );

  function setActiveLink(id) {
    sectionLinks.forEach((link) => {
      link.classList.toggle('is-active', link.getAttribute('href') === `#${id}`);
    });
  }

  const spyObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        setActiveLink(entry.target.id);
      }
    });
  }, { rootMargin: '-40% 0px -55% 0px', threshold: 0 });

  sectionTargets.forEach((section) => spyObserver.observe(section));

  /* =============================================
     BOTÓN VOLVER ARRIBA
     ============================================= */
  const backToTop = document.getElementById('back-to-top');

  if (backToTop) {
    const toggleButton = () => {
      backToTop.classList.toggle('is-visible', window.pageYOffset > 450);
    };

    window.addEventListener('scroll', toggleButton, { passive: true });
    toggleButton();

    backToTop.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
    });
  }

  /* =============================================
     SPOTLIGHT EN TARJETAS
     Un resplandor sutil sigue al cursor dentro de
     las tarjetas (solo en dispositivos con cursor).
     ============================================= */
  const spotlightCards = document.querySelectorAll('.card-spotlight');

  const pointerFine = window.matchMedia && window.matchMedia('(hover: hover) and (pointer: fine)').matches;
  if (pointerFine) {
    spotlightCards.forEach((card) => {
      card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        card.style.setProperty('--mx', `${e.clientX - rect.left}px`);
        card.style.setProperty('--my', `${e.clientY - rect.top}px`);
      });
    });
  }
})();