<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>



<?php  $abc= $_GET['s'];
$abc;


	global $wpdb;

	$GetUserImageData = $wpdb->get_results("SELECT * FROM  im_terms WHERE name LIKE '%$abc%'"); 
	if(!empty($GetUserImageData ))
	{
		foreach($GetUserImageData as $data)
		{
			$url=z_taxonomy_image_url($data->term_id,'p_product_size');	
			?>	
			<div class="col-xs-12 col-md-3">
			   <?php
				   if($url!="")
				   {   
				   ?>
				   <img src="<?php echo $url; ?>" alt="..." />
				   <?php
				   }
				   else
				   {   
				   ?>
				   <img src="http://placehold.it/179x170&amp;text=No image found" alt="..." /> 
				   <?php
				   }
				   ?>
				   </br>
				<a href="<?php echo get_term_link( $data->slug, 'product_cat' ); ?>"><?php echo $data->name; ?></a>
			</div>
			<?php	
		}
	}
	else
	{
	?>
		<section class="no-results not-found no_result">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'twentysixteen' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'twentysixteen' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentysixteen' ); ?></p>
			<?php //get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentysixteen' ); ?></p>
			<?php //get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
	<?php	
	}
		

?>



	



