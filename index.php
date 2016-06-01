<?php
/**
 * @package WordPress
 * @subpackage themename
 */
get_header(); $blog_id = get_option('page_for_posts'); ?>

<div class="primary blog-wrapper" role="structure">
  <section class="blog-container">
    <div class="blog-header-img">
      <?php echo get_the_post_thumbnail( $blog_id, 'full' );?>
    </div>
    <div class="page-content">
      <?php get_template_part( 'loop' ); ?>
    </div>
  </section>
</div>

<?php get_footer(); ?>
