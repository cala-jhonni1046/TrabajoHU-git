
<!-- ════════════════════════════════════════════
     SECCIÓN: INICIO
     ════════════════════════════════════════════ -->
     <section id="hero" class="hero section" data-section data-section-label="Inicio">
       <!-- Figuras decorativas de fondo con efecto blur -->
       <div class="hero__bg" aria-hidden="true">
         <div class="hero__shape hero__shape--1"></div>
         <div class="hero__shape hero__shape--2"></div>
         <div class="hero__shape hero__shape--3"></div>
       </div>
       <div class="container hero__inner">
         <!-- Columna izquierda: texto y botones -->
         <div class="hero__content">
           <p class="hero__greeting">Hola, soy</p>
           <h1 class="hero__title">
             <span class="hero__name">Jonatan Cala</span>
             <span class="hero__role">Full Stack Developer</span>
           </h1>
           <p class="hero__description">
             Desarrollador full stack apasionado por crear aplicaciones web robustas y escalables.
             Especializado en Java, Spring Boot y tecnologías frontend modernas.
             Transformo ideas en soluciones digitales eficientes.
           </p>
           <!-- Botones de acción principal -->
           <div class="hero__actions">
             <a href="#contacto" class="btn btn--primary">
               <!-- Ícono SVG de sobre para el botón de contacto -->
               <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
               Contáctame
             </a>
             <a href="#proyectos" class="btn btn--outline">
               <!-- Ícono SVG de carpeta para ver proyectos -->
               <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
               Ver Proyectos
             </a>
           </div>
           <!-- Redes sociales -->
           <div class="hero__social">
             <a href="https://github.com/cala-jhonni1046" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="GitHub">
               <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 21.795 24 17.295 24 12 24 5.37 18.63 0 12 0z"/></svg>
             </a>
             <a href="https://www.linkedin.com/in/jhonni-cala-196730308" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="LinkedIn">
               <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
             </a>
             <a href="mailto:jonatan.cala@email.com" class="social-link" aria-label="Correo electrónico">
               <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></polyline></svg>
             </a>
           </div>
         </div>
 
         <!-- Columna derecha: foto de perfil -->
         <div class="hero__image">
           <div class="hero__image-wrapper">
             <!--
               =============================================
               IMPORTANTE: Coloca tu foto de perfil aquí
               =============================================
               1. Guarda tu foto en la carpeta: img/profile.jpg
               2. Asegúrate que sea cuadrada (misma alto y ancho)
               3. Tamaño recomendado: 640x640 píxeles
               4. Cambia profile.svg por profile.jpg en src
 
               Ejemplo:
               <img src="img/profile.jpg" alt="Foto de Jonatan Cala" ...>
             -->
             <img src="/perfil.jpeg" alt="Foto de perfil de Jonatan Cala" class="hero__photo" width="320" height="320" loading="eager">
             <!-- Indicador de disponibilidad -->
             <div class="hero__status">
               <span class="hero__status-dot"></span>
               Disponible para proyectos
             </div>
           </div>
         </div>
</div>
      </section>
<!-- / SECCIÓN: INICIO -->
