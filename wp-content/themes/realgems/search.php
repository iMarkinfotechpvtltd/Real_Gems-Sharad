<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div class="container">
    <div class="search-res">
        <div class="row">
          <?php if ( have_posts() ) : ?>      
    
        <?php
			// Start the loop.
			    $abc= $_GET['s'];
				$abc;
				global $wpdb;
				$GetUserImageData = $wpdb->get_results("SELECT * FROM  im_terms WHERE name LIKE '%$abc%'"); 

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

			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			// the_posts_pagination( array(
				// 'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				// 'next_text'          => __( 'Next page', 'twentysixteen' ),
				// 'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			// ) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

      
    </div>

</div>
</div>

<?php get_footer(); ?>
