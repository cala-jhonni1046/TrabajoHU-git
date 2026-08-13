@extends('layouts.app')

@section('title', 'Proyectos | Jonatan Cala')

@section('content')

<!-- ==========================================
     PROYECTOS DESTACADOS
     Tarjetas con imagen, descripción y tecnologías usadas
     ========================================== -->
     <section id="projects" class="projects section">
       <div class="container">
         <div class="section__header">
           <span class="section__tag">Proyectos</span>
           <h2 class="section__title">Trabajos destacados</h2>
           <p class="section__subtitle">
             Proyectos que reflejan mi pasión por la tecnología y la calidad.
           </p>
         </div>
 
         <!-- Grid de 3 tarjetas de proyectos -->
         <div class="projects__grid">
 
           <!-- Proyecto 1: Sistema para una Veterinaria -->
           <article class="project-card">
             <div class="project-card__image">
               <img src="https://images.unsplash.com/photo-1601758228041-f3b2795255f1?auto=format&fit=crop&w=800&q=80" alt="Clínica veterinaria atendiendo a una mascota" loading="lazy" width="600" height="400">
               <!-- Overlay que aparece al hacer hover con botón de acción -->
               <div class="project-card__overlay">
                 <a href="#" class="btn btn--small btn--primary" aria-label="Ver proyecto Sistema para una Veterinaria">Ver proyecto</a>
               </div>
             </div>
             <div class="project-card__body">
               <h3 class="project-card__title">Sistema para una Veterinaria</h3>
               <p class="project-card__description">
                 Sistema de gestión para clínicas veterinarias, desarrollado con Java,
                 Spring Boot y base de datos SQL para administrar pacientes, citas e historial clínico.
               </p>
               <!-- Tags de tecnologías utilizadas -->
               <div class="project-card__tags">
                 <span class="tag tag--java">Java</span>
                 <span class="tag tag--spring">Spring Boot</span>
                 <span class="tag tag--mysql">SQL</span>
               </div>
             </div>
           </article>
 
           <!-- Proyecto 2: Agenda Pre-cirugía -->
           <article class="project-card">
             <div class="project-card__image">
               <img src="https://images.unsplash.com/photo-1551601651-2a8555f1a136?auto=format&fit=crop&w=800&q=80" alt="Quirófano y entorno médico para la agenda pre-cirugía" loading="lazy" width="600" height="400">
               <div class="project-card__overlay">
                 <a href="#" class="btn btn--small btn--primary" aria-label="Ver proyecto Agenda Pre-cirugía">Ver proyecto</a>
               </div>
             </div>
             <div class="project-card__body">
               <h3 class="project-card__title">Agenda Pre-cirugía</h3>
               <p class="project-card__description">
                 Desarrollo web full stack para la gestión de cirugías, creado con PHP,
                 framework Laravel y base de datos con ORM para organizar pacientes y quirófanos.
               </p>
               <!-- Tags de tecnologías utilizadas -->
               <div class="project-card__tags">
                 <span class="tag tag--html">PHP</span>
                 <span class="tag tag--mysql">Laravel</span>
                 <span class="tag tag--css">ORM</span>
               </div>
             </div>
           </article>
 
           <!-- Proyecto 3: Sistema de trazabilidad de frutas y verduras -->
           <article class="project-card">
             <div class="project-card__image">
               <img src="https://cienciasinlimites.org/wp-content/uploads/la-importancia-de-la-trazabilidad-de-los-alimentos_sjklzsm6.webp" alt="Frutas y verduras frescas para el sistema de trazabilidad" loading="lazy" width="600" height="400">
               <div class="project-card__overlay">
                 <a href="#" class="btn btn--small btn--primary" aria-label="Ver proyecto Sistema de trazabilidad de frutas y verduras">Ver proyecto</a>
               </div>
             </div>
             <div class="project-card__body">
               <h3 class="project-card__title">Sistema de Trazabilidad de Frutas y Verduras</h3>
               <p class="project-card__description">
                 Sistema para el seguimiento de frutas y verduras desde el origen hasta la distribución,
                 desarrollado con Python y base de datos SQL para garantizar trazabilidad y calidad.
               </p>
               <!-- Tags de tecnologías utilizadas -->
               <div class="project-card__tags">
                 <span class="tag tag--css">Python</span>
                 <span class="tag tag--mysql">SQL</span>
               </div>
             </div>
           </article>
         </div>
       </div>
     </section>

@endsection
