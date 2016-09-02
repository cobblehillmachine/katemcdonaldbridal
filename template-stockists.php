<?php
/**
* Template Name: Template - Stockists
* Description: Generic Sub Page Template
*
* @package WordPress
* @subpackage themename
*/
get_header(); the_post(); ?>


<div class="stockists-wrapper" <?php echo get_banner_background( $post->ID ); ?>>
	<div class="cont stockists">
		<!-- <img class="ornament" src="<?php echo get_template_directory_uri(); ?>/assets/media/ornament-top.png"> -->
		<h1 class="page-heading"><?php the_title(); ?></h1>
		<?php if (is_page('stockists')) { ?>
 		<?php wp_dropdown_categories( array('show_option_all' => 'View All', 'include' => array('170', '171'), 'selected' => 170 )); ?> 

		<div class="stockist-list">

			<?php $statesAI = get_categories('child_of=4');
			$statesJM = get_categories('child_of=5');
			$statesNZ = get_categories('child_of=7');?>
<!-- 			<div class="column"> -->
			<?php foreach ($statesAI as $state) { ?>
			<div class="dontsplit">
				<h3><?php echo $state->cat_name ?></h3>
				<?php query_posts(array('post_type' => 'Stockists', 'order' => 'ASC', 'cat' => $state->term_id));
				$counter = 0;
				while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('content', 'stockist'); ?>
				<?php $counter += 1;
				endwhile; wp_reset_query(); ?>
			</div>
			 <?php } ?>
<!--
			 </div>
			 <div class="column">
-->
			 <?php foreach ($statesJM as $state) { ?>
			 <div class="dontsplit">
				<h3><?php echo $state->cat_name ?></h3>
				<?php query_posts(array('post_type' => 'Stockists', 'order' => 'ASC', 'cat' => $state->term_id));
				$counter = 0;
				while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('content', 'stockist'); ?>
				<?php $counter += 1;
				endwhile; wp_reset_query(); ?>
			 </div>
			 <?php } ?>
<!--
			</div>
			<div class="column">
-->
			<?php foreach ($statesNZ as $state) { ?>
			<div class="dontsplit">
				<h3><?php echo $state->cat_name ?></h3>
				<?php query_posts(array('post_type' => 'Stockists', 'order' => 'ASC', 'cat' => $state->term_id));
				$counter = 0;
				while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('content', 'stockist'); ?>
				<?php $counter += 1;
				endwhile; wp_reset_query(); ?>
			</div>
			 <?php } ?>
<!-- 			</div> -->
		</div>
		<?php } ?>
		
</div>


<?php get_footer(); ?>
