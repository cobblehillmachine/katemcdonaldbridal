<?php
/**
 * @package WordPress
 * @subpackage themename
 */


if( have_posts() ){ // START THE LOOP. IF THERE ARE POSTS

	while ( have_posts() ) : the_post();   // THEN LOOP THROUGH THEM 
	
		if( is_search() )
		{
			$title = ucfirst( str_replace( '-', ' ', $post->post_type ) );
			$title = $title.': '.get_the_title( $post->ID ); 
		} 
		else 
		{
			$title = get_the_title( $post->ID );
		} 
		
		$img = get_the_post_thumbnail( $post->ID, 'full');
		
		?>
	
		<article class="post" role="article">
			
			<?php if( $img != false ) { ?>
				<div class="image-container">
				    <div class="post-img">
						<?php echo $img ?>
					</div>
				</div>
			<?php }; ?>
			
			<div class="content">
				
				<p class="date"><?php the_time('d.m.Y'); ?></p>
			
				<hr />
			
				<header class="post-header">
		            <h1 class="post-title" role="heading">
		            	<a href="<?php the_permalink(); ?>"><?php echo $title; ?></a>
		            </h1>            
				</header>
		
				<div class="entry summary">
		            <?php the_excerpt(); ?>
		            
		            <div class="read-more-cont">
		            	<a href="<?php the_permalink();?>" class="read-more">Read More</a>
		            </div>
		            
		        </div>
		
				<footer class="post-social">
					<?php echo get_single_social_media(); ?>
				</footer>
			</div>
	        
		</article>
	
	<?php endwhile; // END LOOP

}  // END LOOP CONDITIONAL 

if (  $wp_query->max_num_pages > 1 ) { ?>
<nav class="post-nav" role="navigation">
  <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older Posts', 'themename' ) ); ?></div>
  <div class="nav-next"><?php previous_posts_link( __( 'Newer Posts <span class="meta-nav">&rarr;</span>', 'themename' ) ); ?></div>
</nav>
<?php }; ?>
