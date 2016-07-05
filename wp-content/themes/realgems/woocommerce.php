<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
		<?php
			if(is_product_category())
			{
				include(ABSPATH.'wp-content/themes/realgems/woocommerce/prod_cat.php');
			}
			else if(is_product())
			{
		
				include(ABSPATH.'wp-content/themes/realgems/woocommerce/single_product_page.php');
			}
			else
			{
				woocommerce_content();
			}
		?>
<?php get_footer(); ?>
