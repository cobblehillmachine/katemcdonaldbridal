<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $product;
?>

<?php do_action( 'woocommerce_share' ); // Sharing plugins can hook into here ?>


<?php if (has_term( 'samples', 'product_cat' )) { ?>
<?php } else { ?>
	<hr>
<?php } ?>

<div class="share-single-product">
	<div class="sizing-chart bridal">
		<?php  if (has_term( 'little-white-dresses', 'product_cat' )) { ?>
			<a href="http://katemcdonaldbridal.com/wp-content/uploads/2015/03/Size-Chart-Bridal-2015-1.pdf" target=_blank>Size Chart</a>
		<?php } ?>
		
		
	
	</div>
	
	<div class="social-media">
		<ul class="social-media-list">
			<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
			<li><a target=_blank href="http://twitter.com/share?text=<?php the_title() ?>&url=<?php the_permalink() ?>&hashtags=katemcdonaldbridal" class="twitter"><i class="fa fa-twitter"></i></a></li>
			<li><a target=_blank href="https://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>&media=<?php wp_get_attachment_image_src(get_post_thumbnail_id()) ?>&description=<?php the_title() ?>" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
		</ul>
	</div>

</div>
