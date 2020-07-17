<?php
/**
 * The template for displaying all single posts
 *
 *
 * @package WordPress
 * @subpackage Vege_Marketplace
 * @since Vege Marketplace 1.0
 */?>

<?php get_header(); ?>

<main id="main">

    <article class="article-section"> <!-- Article -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

     <div class="row"> <!-- Row -->

      <div class="article-title"> <!-- Article Title -->
         <h1><?php the_title(); ?></h1>
      </div> <!-- Article Title -->
  
      <div class="info-article">
        <span><?php the_date('j F, Y'); ?></span>
        <span>Por <i><?php the_author(); ?></i></span>
        <span>En <?php $parentscategory ="";
                foreach((get_the_category()) as $category) {
                if ($category->category_parent == 0) {
                $parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';
                }
                }
                echo substr($parentscategory,0,-2); ?>
        </span>
      </div>

        <div class="article-content"> <!-- Article Content -->

          <div class="article-thumbnail">
            <?php if (has_post_thumbnail()) {?>
                <a href="<?php the_permalink();?>" alt="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail('post-thumbnails', array(
                    'class' => 'img-fluid'
                )); ?>
                </a>
            <?php }?>
          </div>

          <div class="article">
             <?php the_content(); ?>
          </div>

        <?php endwhile; endif; ?>

        </div><!-- Article Content -->
     
      <div class="sidebar-principal-content"><!-- Sidebar -->
        <aside>
           <?php dynamic_sidebar('primary'); ?>
        </aside>
      </div><!-- Sidebar -->

     </div> <!-- Row -->
    </article> <!-- Article -->

</main>

<!-- Footer -->
<?php get_Footer(); ?>
