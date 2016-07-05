<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div  class="container">
		

			<div class="page-error-404">
				
					<h1>404</h1>
			 

				<div class="content-404">
					<p><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentysixteen' ); ?><a class="back-link" href="<?php echo site_url();?>">GO TO HOME</a></p>
				</div><!-- .page-content -->
			</div><!-- .error-404 -->


		<?php get_sidebar( 'content-bottom' ); ?>

	</div><!-- .content-area -->


<?php get_footer(); ?>
