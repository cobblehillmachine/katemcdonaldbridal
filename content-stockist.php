<?php $subtitle = get_field('subtitle'); ?>
<div class="stockist">
	<?php if ($counter > 1 ) { ?>
		<hr>
	<?php } ?>
	<h4 class="kepler-italic"><?php the_title(); ?></h4>
	<?php if ($subtitle) { ?>
		<p><?php echo $subtitle ?></p>
	<?php } ?>
	<p><?php the_field('street_address'); ?></p>
	<p><?php the_field('city_state_zip'); ?></p>
	<p><?php the_field('phone_number'); ?></p>
	<p><a class="contact-email" href="mailto:"<?php the_field('email_address'); ?>""><?php the_field('email_address'); ?></a></p>
	<?php if ( get_post_meta($post->ID, 'appointment_required?', yes) ) { ?>
		<p class="kepler-italic">by appointment only</p>
	<?php } ?>
</div>