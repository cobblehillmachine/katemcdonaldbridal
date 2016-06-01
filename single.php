<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header();  the_post(); ?>

<section class="blog-container">

  <article class="post" role="article">

		<div class="image-container">
		    <div class="post-img">
				<?php echo get_the_post_thumbnail(); ?>
			</div>
		</div>

		<div class="content post-content">

			<p class="date"><?php the_time('d.m.Y'); ?></p>

			<hr />

			<header class="post-header">
        <h1 class="post-title" role="heading">
        	<?php the_title(); ?>
        </h1>
			</header>

			<div class="entry-content ">
          <?php the_content(); ?>
      </div>

			<footer class="post-social">
				<?php echo get_single_social_media(); ?>
			</footer>
		</div>

	</article>
  <!--

    <nav id="nav-below" role="navigation">
      <div class="nav-prev"><?php previous_post_link( '%link',  _x( '&larr;', 'Previous post link', 'themename' ) . ' Previous ' ); ?></div>
      <div class="nav-next"><?php next_post_link( '%link',  ' Next ' . _x( '&rarr;', 'Next post link', 'themename' ) ); ?></div>
    </nav>

  -->

</section>

<?php get_footer(); ?>
