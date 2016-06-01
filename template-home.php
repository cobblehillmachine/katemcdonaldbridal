<?php
/**
* Template Name: Template - Home
* Description: Generic Sub Page Template
*
* @package WordPress
* @subpackage themename
*/

get_header(); the_post(); ?>

 <div class="slider-container">

	 	<?php echo get_home_page_images( $id ); ?>

 </div>
 <h1 class="homepage">Wedding Gowns & Bridesmaid Dresses</h1>

<div id="home-overlay" class="desktop">

	<div id="splash-signup">
		<div class="close">X</div>
			<h1>We Love New Friends</h1>
			<p>To stay connected with the latest Kate McDonald happenings, kindly provide your email address below.</p>
			<div id="mc_embed_signup">
				<form action="//lulakate.us6.list-manage.com/subscribe/post?u=0a0252c5038c7d0604169e822&amp;id=bc52c4849a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				    <div id="mc_embed_signup_scroll">
					
						<div class="mc-field-group">
							<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
						</div>
						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div> 
						<div style="position: absolute; left: -5000px;"><input type="text" name="b_0a0252c5038c7d0604169e822_bc52c4849a" tabindex="-1" value=""></div>
						<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
				    </div>
				</form>
			</div>
			<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
			<!--End mc_embed_signup-->
		</div>
</div>


<?php get_footer(); ?>


