<!-- Footer Widgets -->

<?php if(is_active_sidebar('first_footer') || is_active_sidebar('second_footer') || is_active_sidebar('third_footer')) : ?> 
  
  <section class="footer-widget-content p-5"><!-- Footer Widget -->
  <div class="row"> <!-- Row -->
       <?php if(is_active_sidebar('first_footer')) : ?>
        <div class="col-lg-4 col-md-6 col-sm-12"> <!-- First Widget Col --> 
          <?php dynamic_sidebar('first_footer'); ?>
        </div><!-- First Widget Col-->
       <?php endif; ?>

       <?php if(is_active_sidebar('second_footer')) : ?>
        <div class="col-lg-4 col-md-6 col-sm-12"> <!-- First Widget Col --> 
          <?php dynamic_sidebar('second_footer'); ?>
        </div><!-- First Widget Col-->
       <?php endif; ?>

       <?php if(is_active_sidebar('third_footer')) : ?>
        <div class="col-lg-4 col-md-12 col-sm-12"> <!-- First Widget Col --> 
          <?php dynamic_sidebar('third_footer'); ?>
        </div><!-- First Widget Col-->
       <?php endif; ?>

  </div> <!-- Row -->
</section><!-- Footer Widget -->

<?php endif; ?>


