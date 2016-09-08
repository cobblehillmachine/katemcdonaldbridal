<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>


<header class="page-header collection-header">
  <!-- <img class="ornament" src="<?php echo get_template_directory_uri().'/assets/media/ornament-top.png' ?>" /> -->
  <h2 class="collections-heading"><?php echo $wp_query->queried_object->name; ?></h2>

</header>

<div class="page-content">
 <?php echo get_category_collection( $wp_query->query_vars['taxonomy'], $wp_query->query_vars['term'] ); ?>
</div>

<?php  get_footer(); ?> 
