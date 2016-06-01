<?php

/**
* @package WordPress
* @subpackage themename
*/

get_header(); the_post(); ?>

 <article class="wrapper table collection-item-container" role="article" id="js-collection-item-container">

  <div class="table-cell collection-main-image">
	<div id="zoom-first">
	    <div class="small">
	      <?php
		      $thumb_id = get_post_thumbnail_id();
			  $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
			  $thumb_url = $thumb_url_array[0]; ?>
			<img class="cloudzoom"  data-cloudzoom="zoomImage: '<?php echo $thumb_url ?>', zoomPosition: 5, disableOnScreenWidth : 770, lensWidth: 200, lensHeight: 200"src="<?php echo $thumb_url ?>">
<!-- 			  echo get_the_post_thumbnail( $post->ID, 'full' ); ?> -->
	    </div>
	</div>
    
  </div>


  <div class="table-cell collection-data">

    <div class="collection-item-content-inner"><?php echo get_single_page_header( $post->ID ); ?></div>

  </div>


	<div class="table-cell collection-extra">
		<div id="zoom-second">
		  <div class="small">
		    <?php
			    $extra_images = get_field( 'collection_item_extra_images');
			    $back_thumb = $extra_images[0];
			    if($back_thumb) {
				    $back_thumb_url = $back_thumb['collection_item_image']['url'];?>
				    <img class="cloudzoom"  data-cloudzoom="zoomImage: '<?php echo $back_thumb_url ?>', zoomPosition: 11, disableOnScreenWidth : 770, lensWidth: 200, lensHeight: 200"src="<?php echo $back_thumb_url ?>">
			    <?php } ?>
<!-- 			    echo get_collection_item_back_image( $post->ID ); ?> -->
		  </div>
		</div>
	</div>

 </article>

<?php get_footer(); ?>
