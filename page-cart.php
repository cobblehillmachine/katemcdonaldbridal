<?php
/**
 * Template Name: Template - Generic
 * Description: Generic Sub Page Template
 *
 * @package WordPress
 * @subpackage themename
 */

get_header(); the_post(); ?>

<div class="primary cart">
  <section class="page" role="article">
    <header class="page-header">
      <h3 class="page-heading">
        <?php echo get_field('shop_heading', $post->ID); ?>
      </h3>
    </header>
    <div class="page-content">
      <?php the_content(); ?>
      <?php echo do_shortcode('[woocommerce_cart]');?>
    </div>
  </section>
</div>
<?php get_footer(); ?>
