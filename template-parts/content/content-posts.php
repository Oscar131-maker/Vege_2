<div class="col-lg-4 col-md-6 col-sm-12"> <!-- Card -->
   <div class="card">
       <div class="img-card">
          
         <?php if (has_post_thumbnail()) {?>
            <a href="<?php the_permalink();?>" alt="<?php the_title_attribute(); ?>">
              <?php the_post_thumbnail('post-thumbnails', array(
                  'class' => 'img-fluid'
              )); ?>
            </a>
        <?php }?>

        </div>
        <div class="card-body">
            <div class="card-category">
              <?php $parentscategory ="";
                foreach((get_the_category()) as $category) {
                if ($category->category_parent == 0) {
                $parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';
                }
                }
                echo substr($parentscategory,0,-2); ?>
            </div>
            <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
            <div class="info-card">
               <span class="author-name">by: <?php the_author(); ?></span>
               <span class="date-card"><?php the_date('j F, Y'); ?></span>
            </div>
        </div>
   </div>
</div> <!-- Card -->