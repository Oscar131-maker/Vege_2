<!-- Header -->
<?php get_header(); ?>

<main id="main">

  <!-- Breadcrums -->
  <section class="breadcrums-container">
    <?php 
    if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '</p><p id="breadcrumbs">','</p><p>' );
      }
    ?>
  </section>
  <!-- Breadcrums -->

    <section class="page-default"> <!-- page default -->
        <div class="row"> <!-- Row -->
            <!-- Post Content -->
            <div class="col-12"> <!-- Col-12 -->
               <div class="page-content">
               <?php woocommerce_content(); ?>
               </div>
            </div>  <!-- Col-12 -->
          </div> <!-- Principal Row -->
    </section><!-- page Default -->

</main>

<?php get_footer(); ?>
