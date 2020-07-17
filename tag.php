<!-- Header -->
<?php get_header(); ?>

<!-- Principal Content -->
<main id="main">

    <!-- Defaul Posts Layout -->
    <section class="default_post_content">
        <div class="post-principal-content"> <!-- Post principal content -->
            
            <div class="article-title"> <!-- Article Title -->
                <h1><?php printf( __('Etiqueta: %s'), single_cat_title('', false) ); ?></h1>
             </div> <!-- Article Title -->
    
            <div class="card-principal-content" data-aos="zoom-in-up" data-aos-duration="3000"> <!-- Card Principal content -->
              <div class="row"> <!-- Row -->

                 <?php if(have_posts()) : while(have_posts()) : the_post(); 
                   get_template_part('template-parts/content/content', 'posts');
                 endwhile; 
                 else: ?> <span>No hay  con el nombre: <?php printf( __('Etiqueta: %s'), single_cat_title('', false) ); ?></span>
                 <?php endif;?>

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