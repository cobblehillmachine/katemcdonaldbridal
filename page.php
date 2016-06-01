<?php
/**
 * Template Name: Template - Generic
 * Description: Generic Sub Page Template
 *
 * @package WordPress
 * @subpackage themename
 */

get_header(); the_post(); ?>

<div class="primary <?php the_title(); ?>">
  <section class="page" role="article">
    <header class="page-header">
      <h1 class="page-title" role="heading">
        <?php the_title(); ?>
      </h1>
    </header>
    <div class="page-content">
      <?php the_content(); ?>
    </div>
  </section>
</div>
<?php get_footer(); ?>
