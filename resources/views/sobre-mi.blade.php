@extends('layouts.app')

@section('title', 'Sobre mí | Jonatan Cala')

@section('content')

<!-- ==========================================
     SOBRE MÍ
     Presentación personal con 3 tarjetas de especialidades
     ========================================== -->
     <section id="about" class="about section">
       <div class="container">
         <!-- Encabezado de sección (reutilizado en todas las secciones) -->
         <div class="section__header">
           <span class="section__tag">Sobre mí</span>
           <h2 class="section__title">Conoce más sobre mi trabajo</h2>
           <p class="section__subtitle">
             Apasionado por la tecnología y el desarrollo de software de calidad.
           </p>
         </div>
 
         <!-- Grid de 3 tarjetas: cada una describe una especialidad -->
         <div class="about__grid">
           <!-- Tarjeta 1: Desarrollo Full Stack -->
           <div class="about__card">
             <div class="about__icon" aria-hidden="true">
               <!-- Ícono de lápiz/editando -->
               <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
             </div>
             <h3 class="about__title">Desarrollo Web Full Stack</h3>
             <p class="about__text">
               Creación de aplicaciones web completas, desde el diseño de la interfaz de usuario
               hasta la implementación de la lógica de negocio y la gestión de bases de datos.
             </p>
           </div>
 
           <!-- Tarjeta 2: Arquitectura Backend -->
           <div class="about__card">
             <div class="about__icon" aria-hidden="true">
               <!-- Ícono de monitor/pantalla -->
               <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
             </div>
             <h3 class="about__title">Arquitectura Backend</h3>
             <p class="about__text">
               Diseño e implementación de APIs RESTful con Spring Boot, asegurando
               escalabilidad, seguridad y rendimiento óptimo en cada proyecto.
             </p>
           </div>
 
           <!-- Tarjeta 3: Bases de Datos -->
           <div class="about__card">
             <div class="about__icon" aria-hidden="true">
               <!-- Ícono de base de datos/cubos -->
               <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
             </div>
             <h3 class="about__title">Bases de Datos</h3>
             <p class="about__text">
               Gestión y optimización de bases de datos relacionales con MySQL,
               incluyendo diseño de esquemas, consultas complejas y procedimientos almacenados.
             </p>
           </div>
         </div>
       </div>
     </section>

<!-- ==========================================
     EDUCACIÓN
     Tarjetas con la formación académica
     ========================================== -->
     <section id="education" class="education section">
       <div class="container">
         <div class="section__header">
           <span class="section__tag">Educación</span>
           <h2 class="section__title">Formación académica</h2>
           <p class="section__subtitle">
             Base sólida en ciencias de la computación y desarrollo de software.
           </p>
         </div>
 
         <!-- Grid de 3 tarjetas educativas -->
         <div class="education__grid">
 
           <!-- Educación 1: Carrera universitaria -->
           <div class="edu-card">
             <div class="edu-card__icon" aria-hidden="true">
               <!-- Ícono de graduación -->
               <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
             </div>
             <h3 class="edu-card__title">Licenciado en Desarrollo Software</h3>
             <span class="edu-card__institution">Universidad Tecnológica Cuyo</span>
             <span class="edu-card__year">2023 - 2026</span>
           </div>
 
           <!-- Educación 2: Especialización -->
           <div class="edu-card">
             <div class="edu-card__icon" aria-hidden="true">
               <!-- Ícono de estrella/logro -->
               <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
             </div>
             <h3 class="edu-card__title">Especialización Backend</h3>
             <span class="edu-card__institution">Udemi / Cursos</span>
             <span class="edu-card__year">2024 - 2026</span>
           </div>
 
           <!-- Educación 3: Curso completo -->
           <div class="edu-card">
             <div class="edu-card__icon" aria-hidden="true">
               <!-- Ícono de monitor/código -->
               <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg>
             </div>
             <h3 class="edu-card__title">Desarrollo Web Full Stack</h3>
             <span class="edu-card__institution">Hospital-Universitario-Cuyo</span>
             <span class="edu-card__year">2024- 2025</span>
           </div>
         </div>
       </div>
     </section>

@endsection
