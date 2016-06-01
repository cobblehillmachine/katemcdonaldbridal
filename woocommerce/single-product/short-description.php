<?php
/**
 * Single product short description
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;


?>
<?php if (has_term( 'bridesmaids', 'product_cat' )) { ?>
<?php } else if (has_term( 'little-white-dresses', 'product_cat' )) { ?>
	<p class="shipping-memo">shipping leadtime delivery is approximately 3 weeks from the date the order is placed as all items are made to order</p>
<?php } ?>




<?php $content = get_the_content() ?>
<?php if ($content) { ?>
<?php if (has_term( 'samples', 'product_cat' )) { ?>
<?php } else { ?>
	<hr>
<?php } ?>

<div class="single-product-description" itemprop="description">
	<?php the_content(); ?>
	
	<?php 
		$note = get_field('product_notes', $post->ID); 
		if($note != false)
		{ 	
		
			 echo '<div><h4 class="notes-title">Notes...</h4></div><p class="note">'.$note.'</p>';
			
			
		} ?>

</div>

<?php } ?>
