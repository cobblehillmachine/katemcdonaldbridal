<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

  </main>
</div>

<?php if( is_front_page() ) { ?>

  <div class="wrap loader" id="js-loader-gif">
    <div class="table-cell loader-inner">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/media/kate-loader.gif">
    </div>
  </div>

<?php } ?>

<div class="wrap mobile-nav" id="js-mobile-nav-container">
  <a href="#" id="js-close-mobile-nav">&times;</a>
	<nav class="mobile-nav" id="js-nav-container"></nav>
</div>

<?php wp_footer(); ?>
</body>
</html>
