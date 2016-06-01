<?php
/**
 * Template Name: Template - Shop
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); $shop_id = get_option('woocommerce_shop_page_id');
global $product;
$term = get_queried_object();
?>
<!--
<?php if (is_product_category('bridesmaids')) { ?>
	<div class="banner">10% off all bridesmaids dresses through March 31st using code <span>MARCH16</span></div>
<?php } ?>
-->

<div class="wrapper shop">

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @unhooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @unhooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
	
		
		<header class="page-header">
			<br>
			<?php if (is_product_category()) { ?>
				<h3 class="page-heading"><?php echo $term->name; ?></h3>
			<?php } else { ?>
				<h3 class="page-heading">Shop</h3>
			<?php } ?>
			
			
		</header>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @unhooked woocommerce_result_count - 20
				 * @unhooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>
			
			<div class="page-content">
				<ul class="grid shop" data-resize-grid="true">

				<?php //woocommerce_product_loop_start(); ?>
	
					<?php woocommerce_product_subcategories(); ?>
	
					<?php while ( have_posts() ) : the_post(); ?>
	
						<?php wc_get_template_part( 'content', 'product' ); ?>
	
					<?php endwhile; // end of the loop. ?>
	
				<?php //woocommerce_product_loop_end(); ?>
			
				</ul>
			</div>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @unhooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @unhooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>
</div>

<?php get_footer(); ?>