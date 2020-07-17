<?php
/**
 * The main template file
 *
 *
 * @package WordPress
 * @subpackage Vege_Marketplace
 * @since Vege Marketplace 1.0
 */?>

<!-- Header -->
<?php get_header(); ?>

<main id="main">

    <section class="page-default"> <!-- page default -->
        <div class="row"> <!-- Row -->
           
            <!-- Post Content -->
            <div class="col-12"> 
               <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                   <article class="page-content">
                        <div class="page-title">
                            <h1><?php the_title(); ?></h1>
                            <hr>
                        </div>
            
                        <div class="page-principal-content">
                          <?php the_content(); ?>
                        </div>
                     </article>
               <?php endwhile; endif; ?>
            </div>  <!-- Col-12 -->
    
          </div> <!-- Principal Row -->
    </section><!-- page Default -->

</main>

<!-- Footer -->
<?php get_footer(); ?>


