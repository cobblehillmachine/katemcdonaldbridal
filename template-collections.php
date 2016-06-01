<?php
/**
* Template Name: Template - Collections
* Description: Generic Sub Page Template
*
* @package WordPress
* @subpackage themename
*/
get_header(); the_post(); ?>

<div class="wrapper">

  <?php echo get_page_header_block( $post->ID ); ?>

  <ul class="collection-items">
    <?php echo get_collection_items($loop->post->ID); ?>
  </ul>

</div>

<?php get_footer(); ?>
