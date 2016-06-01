<?php global $woocommerce;
/**
 * @package WordPress
 * @subpackage themename
 */

?>
<!DOCTYPE html>
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="IE ie8"> <![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="IE ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!--[if IE 8 ]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
<title><?php echo site_global_description(); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="<?php echo get_site_url(); ?>/favicon.ico">
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<?php wp_head(); ?>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-61787547-1', 'auto');
  ga('send', 'pageview');

</script>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>
<body <?php body_class(); ?>>

<div class="wrap body active <?php is_front_page() ? print 'home' : '' ;?> <?php is_single() && $post_type == 'collection-item' ? print 'collection-single' : '' ;?>" id="js-body-wrap">
	
  	<div class="wrapper header " role="menubar" id="js-header" <?php !is_front_page() ? print 'data-padding="true"' : '' ;?>>
  		<header class="container table">
  			<div class="table-cell logo">
  				<a href="/">
  					<img src="<?php echo get_template_directory_uri(); ?>/assets/media/logo.gif" alt="" />
  				</a>
  			</div>
  			<div class="table-cell navigation">
	  			<a href="#" id="js-mobile-nav-trigger">&#9776;</a>
    			<nav class="main" role="navigation" id="js-main-nav">
		            <ul>
		              <?php $args = array(
		                	'theme_location'  => 'primary',
		                	'menu'            => 'primary',
		                	'container'       => false,
		                	'echo'            => true,
		                	'fallback_cb'     => 'wp_page_menu',
		                	'items_wrap'      => '%3$s',
		              );

		              wp_nav_menu( $args );  ?>
		              <li class="cart-list-item"><a href="/cart"><i class="fa fa-shopping-cart fa-flip-horizontal"></i>&nbsp;&nbsp;<?php echo get_cart_total($woocommerce); ?></a></li>
		            </ul>
    			</nav>
  			</div>
  		</header>
  	</div>

  	<main class="wrapper <?php is_front_page() ? print 'home' : '' ;?> <?php is_singular() && $post_type == 'collection-item'  ? print 'collection-item' : '' ;?> " role="main" id="js-main">


