<?php
$queried_object = get_queried_object();
$term_id = $queried_object->term_id;
$term_slug = $queried_object->slug;
$term_name = $queried_object->name;
$parent = $queried_object->parent;
$count = $queried_object->count;
$link = get_term_link( $term_id, 'product_cat' );


//**************** CREATE FUNCTION TO GET SUBCATEGORIES *********************//

 $cat_counter	=	woocommerce_subcats_from_parentcat_by_ID($term_id);

//**************** END OF FUNCTION TO GET SUBCATEGORIES *********************// 
 
if($parent==0 && $cat_counter==0)
{
	include(ABSPATH.'wp-content/themes/realgems/woocommerce/parent_prod.php');
	
}	
else
{
	if($parent==0)
	{
		include(ABSPATH.'wp-content/themes/realgems/woocommerce/prod_main_cat.php'); 
	}
	else
	{
		include(ABSPATH.'wp-content/themes/realgems/woocommerce/prod_sub_cat.php');
	}
}	 

?>	