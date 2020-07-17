<?php
/**
 * The template for displaying search results pages
 *
 *
 * @package WordPress
 * @subpackage Vege_Marketplace
 * @since Vege Marketplace 1.0
 */?>

<!-- Header -->
<?php get_header(); ?>

<!-- Principal Content -->
<main id="main">

    <!-- Defaul Posts Layout -->
    <section class="default_post_content">
        <div class="post-principal-content"> <!-- Post principal content -->

            <div class="latest-posts"> <!-- Lates posts -->
             <h3 class="text-center">Busqueda: <?php printf(esc_html('%s'), get_search_query()); ?></h3>
             <hr>
            </div><!-- Lates posts -->

            <div class="search-form-results"><!-- SearchForm -->
               <?php get_search_form(); ?>
             </div><!-- SearchForm -->
    
            <div class="card-principal-content" data-aos="zoom-in-up" data-aos-duration="3000"> <!-- Card Principal content -->
              <div class="row"> <!-- Row -->
    
               <?php if (have_posts()) : while(have_posts()) : the_post(); 
                get_template_part('template-parts/content/content', 'posts');
               endwhile; 
               else: ?> <h3>No hay resultados para: <?php printf(esc_html('%s'), get_search_query()); ?></h3>
               <?php endif; ?>
    
              </div> <!-- Row -->
            </div> <!-- Card Principal content -->
    
           <!-- Pagination -->
           <div class="pagination-content">
             <?php get_template_part('template-parts/content/content', 'pagination'); ?>
           </div>
          
          </div> <!-- Post principal content -->
    </section>
</main>

<!-- Footer -->
<?php get_footer(); ?>

