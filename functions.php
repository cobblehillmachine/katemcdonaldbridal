<?php
/**
 * @package WordPress
 * @subpackage themename
 */

////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////// START CUSTOM FUNCTIONS ////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

function get_collection_item_back_image( $id )
{
  if( is_int( $id ) )
  {
    $images = get_field( 'collection_item_extra_images', $id );

    if( $images != false )
    {
	    $html = '';

	    $img = $images[0];

	    $html .= '<img src="'.$img['collection_item_image']['url'].'" />';
    }
  }

  return $html;
}


function get_cart_total($woo)
{
	if(is_object($woo))
	{
		$html = '';

		$woo->cart->cart_contents_count > 0 ? $html .= '<span id="js-cart-total">('.$woo->cart->cart_contents_count.')</span>' : $html .= '';
	}

	return $html;
}


function get_collection_item_extra_images( $id )
{
  if( is_int( $id ) )
  {
    $images = get_field( 'collection_item_extra_images', $id );

    if( $images != false )
    {
	    $html = '';
	    $num_imgs = count($images);

      if( $num_imgs <= 1 )
      {
      	foreach( $images as $img )
	      {

	        $html .= '<div class="table-cell half">
				        			<img src="'.$img['collection_item_image']['url'].'" />
				        		</div>';
	      }

      }
      else
      {
	      array_shift( $images );

				$html .= '<div class="table-cell half"><div class="collection-slider"><ul id="js-collection-slider">';

				foreach( $images as $img )
				{
					$html .= '<li>
					        		<img src="'.$img['collection_item_image']['url'].'" />
					        	</li>';
				}

				$html .= '</ul></div></div>';

      }

      $html .= '';
    }
  }

  return $html;
}



function get_events()
{
	$args = array( 'post_type' => 'event', 'order'   => 'ASC' );

	$the_query = new WP_Query($args);

	if( $the_query->have_posts() )
	{
		$html = $link = $gmaps_address = '';

		while( $the_query->have_posts() ) : $the_query->the_post();

		$name = get_the_title( );
		$city = get_field('city,_state_zip');
		$date = get_field('date');
		$venue = get_field('venue');
		$address = get_field('address');
		$contact = get_field('contact');

		if( $address != false && $city != false )
		{
			$new_address = $address.' '.$city;
			$gmaps_address = str_replace(' ','+', $new_address);
			$link = '<a class="event-address" href="http://maps.google.com/maps?&q='.$gmaps_address.'" target="_blank">'.$address.'<br>'.$city.'</a>';

		}
		else
		{
			$link = '';
		}

		$html .= '<tr>
					<td><div>'.$date.'</div><div class="event-name">'.$name.'</div></td>
					<td><span class="venue">'.$venue.'</span><br />'.$link.'</td>
					<td><span class="venue">'.$contact.'</span></td>
				  </tr>';

		endwhile;
	}

	return $html;
}

function get_home_page_images( $id )
{
  if( is_int( $id ) )
  {
    $images = get_field( 'slider', $id );
    $fallback = get_field('mobile_fallback');

    if( $images != false )
    {
	    //$fallback != false ? $html .= '<div class="home-image"><img src="'.$fallback['url'].'" atl="" /></div>': '' ;

      $html = '<ul id="js-home-slider">';

      foreach( $images as $img )
      {

        $html .= '<li>';
        if ($img['optional_link']) {
	      $html .= '<a target=_blank href='.$img['optional_link'].'>';
        }
        			
        $html .= '<img src="'.$img['slide']['url'].'" />';
        
        if ($img['optional_link']) {
	      $html .= '</a>';
        }
        $html .= '</li>';
      }

      $html .= '</ul>';
    }
  }

  return $html;
}


function get_homepage_background( $id)
{
	if( is_int( $id ) )
	{
		$html = '';
		$fallback = get_field('home_page_background');

		if( $fallback != false )
		{
				$html = '<div class="wrapper table home-image" style="background-image: url('.$fallback['url'].') "></div>';
		}
	}

	return $html;
}


////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////// COLLECTIONS ARCHIVE FUNCTIONS /////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////





/**
 * get_category_collection function.
 *
 * @access public
 * @param mixed $posts
 * @return void
 */
function get_category_collection( $tax, $term )
{
  $html = '';
  $tax_query = array( array( 'taxonomy' => $tax, 'field'=> 'slug', 'terms'=> array( $term ) ) );
  $args = array('post_type' => 'collection-item', 'posts_per_page' => '-1', 'order_by' => 'title', 'order' => 'ASC', 'tax_query' => $tax_query);
  $loop = new WP_Query($args);


  if( $loop->have_posts() )
  {
    $html = '<ul class="grid collections" data-resize-grid="true">';

    while( $loop->have_posts() ) : $loop->the_post();

      $html .= get_collection_data( $loop->post );

    endwhile;

    $html .= '</ul>';
  }

  return $html;
}



/**
 * get_collection_data function.
 *
 * @access public
 * @param mixed $post
 * @return void
 */
function get_collection_data( $post )
{
  if( is_object( $post ) )
  {
    $html = '';

    $html .= '<li class="grid-item">
				<a href="'.get_permalink( $post->ID ).'">
					'.get_the_post_thumbnail( $post->ID, 'large' ).'
					<div class="item-content">
						<div class="item-content-inner">
						  <h3>'.$post->post_title.'</h3>
						</div>
					</div>
				</a>
			</li>';
  }

  return $html;
}


////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////// START CUSTOM FUNCTIONS ////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////


/**
 * get_banner_background function.
 *
 * @access public
 * @param mixed $id
 * @return void
 */
function get_banner_background( $id )
{
	if ( is_int( $id ) )
	{
		$html = '';
		$image = get_field('page_banner_background', $id);

		if($image != false)
		{
			$html .= 'style="background-image: url('.$image['url'].')"';
		}
	}
	echo $html;
}


/**
 * get_banner_background function.
 *
 * @access public
 * @param mixed $id
 * @return void
 */
function get_contact_info( $id )
{
	if( is_int( $id ) )
	{
		$html = '';

		$email = get_field('email_address');
		$phone = get_field('phone_number');
		$address = get_field('contact_address');
		$address_2 = get_field('contact_address_2');
		$city = get_field('contact_city');

		$html .= '<div class="contact-info"><p>'.$address.'<br>'.$address_2.'<br>'.$city.'</p><p>By Appointment Only</p></div>';

		$email != false ? $html .= '<div class="contact-info"><a class="contact-email" href="mailto:'.$email.'">'.$email.'</a>' : '' ;
		$phone != false ? $html .= '<a href="tel:+1:'.$phone.'">'.$phone.'</a></div>' : '' ;
	}
	echo $html;
}



/**
 * get_banner_background function.
 *
 * @access public
 * @param mixed $id
 * @return void
 */
function get_about_info( $id )
{
	if( is_int($id))
	{
		$html = '';
		$description = get_field('about_description');
		$description != false ? $html .= '<p class="about-desc">'.$description.'</p>' : '' ;
	}
	echo $html;
}



/**
 * get_banner_background function.
 *
 * @access public
 * @param mixed $id
 * @return void
 */

function get_page_header_block($id)
{
	if( is_int($id) )
	{
		$html=$content='';

		$img = get_template_directory_uri().'/assets/media/ornament-top.png';
		$title = get_the_title( $id );
		$heading = get_field('about_heading', $id);

		$heading != false ? $content = '<h3 class="page-heading">'.$heading.'</h3>' : '';

		$html = '<header class="page-header">
					'.$content.'
				 </header>';
	}
	return $html;
}

/*
<h2 class="page-title">'.$title.'</h2>
					<hr />
*/

// <img class="ornament" src="'.$img.'" alt="" />


/**
 * get_banner_background function.
 *
 * @access public
 * @param mixed $id
 * @return void
 */
function get_single_page_header($id)
{
	if( is_int($id) )
	{
		$html=$content='';

		$img = get_template_directory_uri().'/assets/media/ornament-top.png';
		$title = get_the_title( $id );
		$heading = get_field('about_heading', $id);

		$heading != false ? $content = '<h3>'.$heading.'</h3>' : '';

		$html = '<header class="page-header">
			'.get_single_taxonomy($id).'
		<hr>
		<h2 class="page-heading">'.$title.'</h2>
		<hr>
		'.get_pricing_legend().
		get_single_social_media().'
		</header>';
	}
	return $html;
}

// <img class="ornament" src="'.$img.'">

/**
 * get_banner_background function.
 *
 * @access public
 * @param mixed $id
 * @return void
 *
 */
function get_single_taxonomy( $id )
{

	$cats = get_the_terms( $id, 'collection-year');

	if ( $cats != false ) :

		$html = '';

		$taxes = array();

		foreach ( $cats as $cat ) {
			$taxes[] = $cat->name;
		}

		$tax = join( ', ', $taxes );

		$html .= '<p class="page-title">'.$tax.'</p>';

	endif;

	return $html;
}

function get_pricing_legend() {
	$price = get_field('price');
	$html = '';
	if ($price) {
		$html .= '<div class="pricing-legend-wrapper">';
		$html .= '<span>'.$price.'</span>';
		$html .= '<div class="pricing-legend">';
		$html .= '$- under $2000<br>$$- $2001-$2999<br>$$$- $3000-$3999<br>$$$$- $4000-$4999<br>$$$$$- $5000 +';
		$html .= '</div>';
		$html .= '</div>';
	}
	return $html;
}

function get_single_social_media()
{

	$img = wp_get_attachment_image_src( get_post_thumbnail_id( ));

	$share = is_single() ? '<p class="single-share">Share</p>' : '';

 	$html = '<div class="social-media">
        			'.$share.'
        			<ul class="social-media-list">
        				<li><a href="https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink().'" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a><?/a></li>
        				<li><a href="http://twitter.com/share?text='.get_the_title().'&url='.get_the_permalink().'&hashtags=katemcdonaldbridal" class="twitter"><i class="fa fa-twitter"></i></a></li>
        				<li><a href="https://pinterest.com/pin/create/button/?url='.get_the_permalink().'&media='.$img[0].'&description='.get_the_title().'" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
        			</ul>
        		</div>';

	return $html;
}




////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////// START WOOCOMMERCE FUNCTIONS ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////



remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end', 10);

remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop','woocommerce_result_count', 20);
remove_action('woocommerce_sidebar','woocommerce_get_sidebar', 10);
//remove_action('woocommerce_pagination','woocommerce_after_shop_loop', 10);
remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering', 30);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);


add_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt', 50);
add_action('woocommerce_single_product_summary','woocommerce_template_single_sharing', 60);
function wc_remove_related_products( $args ) {
	return array();
}
add_filter('woocommerce_related_products_args','wc_remove_related_products', 10);
/* add_action('woocommerce_before_main_content', 'woo_header', 15); */

/*
function woo_my_new_function( $id, $product = null)
{

}
*/


//SHOW DISCOUNT ON SELECT SINGLE PRODUCT PAGES
// add_filter('woocommerce_variable_price_html','show_discount_price', 10, 2);
function show_discount_price( $price, $product ) {

  $product_cat = 76;
  $is_our_product = false;
  $discount_percent = 10;

  $terms = get_the_terms( $product->id, 'product_cat' );
  foreach ($terms as $term) {
    $product_cat_id = $term->term_id;
    if ( $product_cat_id == $product_cat ) {
      $is_our_product = true;
      break;
    }
  }

  if ( !$is_our_product ) {
    return $price;
  }

  preg_match("/<span.*36;(.*)<\//", $price, $matches);
  $num_price = floatval($matches[1]);
  $sale_price = round( $num_price - ( $num_price / $discount_percent ), 2 );
  $sale_price = money_format('%.2n', $sale_price);

  return '<span style="text-decoration: line-through">' . $price . '</span>' . '<br>' . sprintf( __('%s', 'woocommerce' ), '$' . $sale_price );
}



//SELECTIVE COUPON APPLICATION AT CART
//Bridesmaids Product Category Coupon ( 6/1/16 - 6/30/16 )
add_action( 'woocommerce_before_cart', 'apply_matched_coupons' );

function apply_matched_coupons() {
	global $woocommerce;

	$coupon_code = 'bridesmaid10percent'; // your coupon code here

  // loop through the cart looking for the free shpping products
  $bridesmaid_dress_present = false;

  foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
    $_product = $values['data'];
    $terms = get_the_terms( $_product->id, 'product_cat' );

    // second level loop search, in case some items have several categories
    foreach ($terms as $term) {
      $_categoryid = $term->term_id;
      if( $_categoryid == 76 ) {
        $bridesmaid_dress_present = true;
        if ( !$woocommerce->cart->has_discount( $coupon_code ) ) {
          $woocommerce->cart->add_discount( $coupon_code );
        }
      }
    }
  }

  if ( $woocommerce->cart->has_discount( $coupon_code ) && !$bridesmaid_dress_present ) {
    $woocommerce->cart->remove_coupon( $coupon_code );
  }
}




function woo_header($id)
{
	$heading = get_field('add_page_title', $id);
	$html = '';

	if(is_int($id))
	{
		if($heading != false)
		{
			$html .= '<header class="page-header">
						'.$heading.'
					  </header>';
		}
	}
	return $html;
}


/**
 *
 * ENQUEUE CSS, LESS, & SCSS STYLESHEETS
 *
 */
function add_style_sheets()
{
	if( !is_admin() )
	{
		wp_enqueue_style( 'reset', get_template_directory_uri().'/style.css', 'screen'  );
		wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', 'screen');
		wp_enqueue_style( 'main', get_template_directory_uri().'/assets/css/style.less', 'screen' );
		wp_enqueue_style( 'bxslidercss', get_template_directory_uri().'/assets/css/bxslider.css' );
	}
}

add_action('wp_enqueue_scripts', 'add_style_sheets');



/**
 *
 * ENQUEUE JAVASCRIPT FILES
 *
 */
function add_javascript()
{
	if( !is_admin() )
	{
		wp_enqueue_script( 'jquery' , '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js' );
		wp_enqueue_script( 'anythingzoomer' , get_template_directory_uri().'/assets/js/jquery.cookie.js' );
		wp_enqueue_script( 'typekit' , '//use.typekit.net/xdd6bjl.js' );
		wp_enqueue_script( 'genericJS' , get_template_directory_uri().'/assets/js/general.js' );
		wp_enqueue_script( 'bxsliderJS' , get_template_directory_uri().'/assets/js/bxslider.js' );
		wp_enqueue_script( 'googleshare' , 'https://apis.google.com/js/platform.js' );
		wp_enqueue_script( 'retina' , get_template_directory_uri().'/assets/js/retina.js' );
		wp_enqueue_script( 'flexslider' , get_template_directory_uri().'/assets/js/jquery.flexslider-min.js' );
		wp_enqueue_script( 'elevateZoom' , get_template_directory_uri().'/assets/js/jquery.elevatezoom.js' );
		wp_enqueue_script( 'columnizer' , get_template_directory_uri().'/assets/js/jquery.columnizer.js' );

	}
}

add_action('wp_enqueue_scripts', 'add_javascript');



/**
 *
 * TAKE GLOBAL DESCRIPTION OUT OF HEADER.PHP AND GENERATE IT FROM A FUNCTION
 *
 */
function site_global_description()
{
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
	{
		echo " | $site_description";
	}
}


/**
 * REMOVE UNWANTED CAPITAL <P> TAGS
 */
remove_filter( 'the_content', 'capital_P_dangit' );
remove_filter( 'the_title', 'capital_P_dangit' );
remove_filter( 'comment_text', 'capital_P_dangit' );


/**
 * REGISTER NAV MENUS FOR HEADER FOOTER AND UTILITY
 */
register_nav_menus(
  array(
  	'primary' => __( 'Primary Menu', 'themename' ),
  	'footer' => __( 'Footer Menu', 'themename' ),
  	'utility' => __( 'Utility Menu', 'themename' ),
  	'sidebar' => __( 'Sidebar Menu', 'themename' )
  )
);


/**
 * DEFAULT COMMENTS & RSS LINKS IN HEAD
 */
add_theme_support( 'automatic-feed-links' );


/**
 * THEME SUPPORTS THUMBNAILS
 */
add_theme_support( 'post-thumbnails' );


/**
 *	THEME SUPPORTS EDITOR STYLES
 */
add_editor_style("/css/layout-style.css");


/**
 *	ADD TINY IMAGE SIZE FOR ACF FIELDS, BETTER USABILITY
 */
add_image_size( 'mini-thumbnail', 50, 50 );
add_image_size( 'half-screen', 1250, 1800 );

/**
 *	REPLACE THE HOWDY
 */
function admin_bar_replace_howdy($wp_admin_bar)
{
    $account = $wp_admin_bar->get_node('my-account');
    $replace = str_replace('Howdy,', 'Welcome,', $account->title);
    $wp_admin_bar->add_node(array('id' => 'my-account', 'title' => $replace));
}
add_filter('admin_bar_menu', 'admin_bar_replace_howdy', 25);


/**
 * REGISTER SIDEBARS
 */
function handcraftedwp_widgets_init()
{
	register_sidebar( array (
		'name' => __( 'Sidebar', 'themename' ),
		'id' => 'sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s" role="complementary">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
}
add_action( 'init', 'handcraftedwp_widgets_init' );


function create_post_type() {

	$args1 = array(
		'labels' => array(
			'name' => __( 'Stockists' ),
			'singular_name' => __( 'Stockist' )
		),
		'public' => true,
		// 'has_archive' => false,
		'taxonomies' => array('category'),

		'menu_icon' => 'dashicons-cart',
		'rewrite' => array('with_front' => false, 'slug' => 'stockists'),
		'supports' => array( 'title', 'category')
	);

  register_post_type( 'Stockists', $args1 );

  flush_rewrite_rules();
}

add_action( 'init', 'create_post_type' );

// removes admin bar on wordpress home
add_filter( 'show_admin_bar', '__return_false' );

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );





add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +
function woo_custom_cart_button_text() {
	return __( 'Make it Mine', 'woocommerce' );
}

add_filter("woocommerce_checkout_fields", "order_fields");

function order_fields($fields) {
	$fields['billing']['billing_first_name']['class'][3] = 'third first';
	$fields['billing']['billing_last_name']['class'][3] = 'third';
	$fields['billing']['billing_address_1']['class'][3] = 'half first';
	$fields['billing']['billing_address_2']['class'][3] = 'half last';
	$fields['billing']['billing_city']['class'][3] = 'third first';
	$fields['billing']['billing_state']['class'][3] = 'third ';
	$fields['billing']['billing_postcode']['class'][3] = 'third last';
	$fields['billing']['billing_country']['class'][3] = 'third first';
	$fields['billing']['billing_phone']['class'][3] = 'third';
	$fields['billing']['billing_email']['class'][3] = 'third first email';

	$fields['shipping']['shipping_first_name']['class'][3] = 'third first';
	$fields['shipping']['shipping_last_name']['class'][3] = 'third';
	$fields['shipping']['shipping_address_1']['class'][3] = 'half first';
	$fields['shipping']['shipping_address_2']['class'][3] = 'half last';
	$fields['shipping']['shipping_city']['class'][3] = 'third first';
	$fields['shipping']['shipping_state']['class'][3] = 'third ';
	$fields['shipping']['shipping_postcode']['class'][3] = 'third last';
	$fields['shipping']['shipping_country']['class'][3] = 'third first';
	$fields['order']['order_comments']['class'][3] = 'two-thirds';

	$fields['billing']['billing_state']['options'] = array(
		'option_1' => 'Option 1 text',
		'option_2' => 'Option 2 text'
	);

	$fields['billing']['billing_city']['label'] = $fields['shipping']['shipping_city']['label'] = 'City';
	$fields['billing']['billing_state']['label'] = $fields['shipping']['shippng_state']['label'] = 'State';
	$fields['billing']['billing_city']['placeholder'] = $fields['shipping']['shipping_city']['placeholder'] = '';

	$fields['billing']['billing_address_1']['label'] = $fields['shipping']['shipping_address_1']['label'] = 'Street Address';
	$fields['billing']['billing_address_1']['placeholder'] = $fields['shipping']['shipping_address_1']['placeholder'] = '';

	$fields['billing']['billing_address_2']['label'] = $fields['shipping']['shipping_address_2']['label'] = 'Street Address 2';
	$fields['billing']['billing_address_2']['placeholder'] = $fields['shipping']['shipping_address_2']['placeholder'] = '';
	$fields['billing']['billing_address_2']['required'] = $fields['shipping']['shipping_address_2']['required'] = false;

	$fields['billing']['billing_postcode']['label'] = $fields['shipping']['shipping_postcode']['label'] = 'Postal Code';
	$fields['billing']['billing_postcode']['placeholder'] = $fields['shipping']['shipping_postcode']['placeholder'] = '';
	$fields['billing']['billing_postcode']['clear'] = $fields['shipping']['shipping_postcode']['clear'] = false;

	$fields['billing']['billing_phone']['clear'] = false;
	$fields['billing']['last_name']['clear'] = false;




	$billing = array(
		"billing_first_name",
		"billing_last_name",
		"billing_address_1",
		"billing_address_2",
		"billing_city",
		"billing_state",
		"billing_postcode",
		"billing_country",
		"billing_phone",
		"billing_email"

	);

	$shipping = array(
		"shipping_first_name",
		"shipping_last_name",
		"shipping_address_1",
		"shipping_address_2",
		"shipping_city",
		"shipping_state",
		"shipping_postcode",
		"shipping_country"
	);

	foreach( $billing as $field )
	{
		$billing_fields[$field] = $fields["billing"][$field];
	}

	foreach( $shipping as $field )
	{
		$shipping_fields[$field] = $fields["shipping"][$field];
	}

	$fields["billing"] = $billing_fields;
	$fields["shipping"] = $shipping_fields;

	return $fields;

}


add_filter( 'default_checkout_country', 'change_default_checkout_country' );

function change_default_checkout_country() {
  return 'US'; // country code
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}


//show image with grouped product (samples)
add_action( 'woocommerce_grouped_product_list_before_price', 'woocommerce_grouped_product_thumbnail' );

function woocommerce_grouped_product_thumbnail( $product ) {
    $image_size = array( 20, 20 );  // array( width, height ) image size in pixel
    $attachment_id = get_post_meta( $product->id, '_thumbnail_id', true );
    ?>
    <td class="label">
        <?php echo wp_get_attachment_image( $attachment_id, $image_size ); ?>
    </td>
    <?php
}

//remove "choose option" from variation dropdowns
add_filter( 'woocommerce_dropdown_variation_attribute_options_args', 'mmx_remove_select_text');
function mmx_remove_select_text( $args ){
    $args['show_option_none'] = '';
    return $args;
}
