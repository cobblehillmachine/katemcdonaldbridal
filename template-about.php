 <?php
/**
 * Template Name: Template - About
 * Description: Generic Sub Page Template
 *
 * @package WordPress
 * @subpackage themename
 */
get_header(); the_post(); ?>

<div class="wrapper table about" <?php echo get_banner_background( $post->ID ); ?>>

  <div class="container table-cell hero">

    <div class="border white">

      <div class="about-content">

        <?php echo get_page_header_block( $post->ID ); ?>
        
        <?php if(is_page('contact')){ ?>
	        
	       <h3 class="page-heading"><?php echo get_field('contact_header',$post->ID); ?></h3>
	        
        <?php }; ?>

        <div class="page-content about-spec">

          <?php the_content(); ?>

          <?php if( is_page('contact') ){ ?>

            <?php get_contact_info( $post->ID ) ?>

            <ul class="contact-social">
              <li><a href="https://www.facebook.com/bridekatemcdonald" class="facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://twitter.com/katembride" class="twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.pinterest.com/KateMbridal/" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
              <li><a href="http://instagram.com/katemcdonaldbridal" class="instagram"><i class="fa fa-instagram"></i></a></li>
              
            </ul>

          <?php } ?>

          <?php if(is_page('about')) { 
	          
	     	 get_about_info( $post->ID ); ?>
          
	          <ul class="contact-social">
		          <li><a href="https://www.facebook.com/LulaKate" class="facebook"><i class="fa fa-facebook"></i></a></li>
		          <li><a href="https://twitter.com/katembride" class="twitter"><i class="fa fa-twitter"></i></a></li>
		          <li><a href="https://www.pinterest.com/KateMbridal/" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
		          <li><a href="http://instagram.com/katemcdonaldbridal" class="instagram"><i class="fa fa-instagram"></i></a></li>
		     </ul>
	     
	    <?php }; ?>

        </div>

      </div>
      <?php if (is_page('bridesmaids')) { ?>
      <div class="bridesmaids">
     		<h1 class="page-heading">Bridesmaids</h1>
			<p>Our New Bridesmaid Collection is coming soon!</p>
			<p>If you are a retailer and interested in more information, please email <a href="mailto:hello@katemcdonaldbridal.com" target=_blank class="contact-email">hello@katemcdonaldbridal.com</a>.</p>
      </div>
		<?php } ?>

    </div>

  </div>

</div>

<?php get_footer(); ?>
