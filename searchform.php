<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 *
 * @package WordPress
 * @subpackage Vege_Marketplace
 * @since Vege Marketplace 1.0
 */?>

<form role="search" method="get" action="<?php echo esc_url(home_url('/'));?>">
  <div class="form-group d-flex">
        <input type="search" class="form-control" 
        placeholder="<?php esc_attr_x('Búsqueda...', 'placeholder', 'vege'); ?>"
        value="<?php get_search_query(); ?>">
        <button type="submit" class="btn ml-3">Buscar</button>
  </div>
</form>

