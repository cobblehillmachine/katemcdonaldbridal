<?php
/**
* Template Name: Template - Events
* Description: Generic Sub Page Template
*
* @package WordPress
* @subpackage themename
*/
get_header(); the_post(); ?>


<div class="wrapper table about events" <?php echo get_banner_background( $post->ID ); ?>>

  <div class="container table-cell hero">
	 
	 <div class="event-border">
	  
	    <div class="about-content">
	
	      <!-- <?php echo get_page_header_block( $post->ID ); ?> -->
	      
	      <h1 class="page-heading"><?php echo get_the_title( $id ); ?></h1>
	
	      <div class="page-content events-content">
		      
			<table>
				<thead>
					
					<td><span>Date</span></td>
					<td><span>Location</span></td> 
					<td><span>Contact</span></td>
					
				</thead>
				<tbody>	
						  
					<?php echo get_events(); ?>
					
				</tbody> 
			
			</table>
			
		  </div>
		
		</div>
	
	</div>
	
   </div>
   
</div>

<?php get_footer();?>