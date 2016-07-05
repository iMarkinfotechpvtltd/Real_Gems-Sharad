<?php 
$queried_object = get_queried_object();
$term_id = $queried_object->term_id;
$term_slug = $queried_object->slug;
$term_name = $queried_object->name;
$parent = $queried_object->parent;
$count = $queried_object->count;
$link =get_term_link( $term_id, 'product_cat' );
?>
<div class="product-pagbanner">
 <img src="<?php echo  get_template_directory_uri(); ?>/images/engagement-page-banner.jpg" alt="..." />
  <div class="container">
    <h2><?php echo $term_name; ?></h2>
    <p>Houston's Largest source of Diamond Engagement Rings at Nikash Diamonds.  They are the ultimate gift for your special someone.<br>
     Come take a look at our exquisite diamond jewelry and diamond engagement rings that exhibit the glamour</p>
  </div>
</div> <!---product-pagbanner Close--->

<div class="catagiores-page">
  <div class="container">
    <div class="breadcrumb">
      <ul>
		<li><?php woocommerce_breadcrumb(); ?></li>
         <!--<li><a href="#">Home</a></li>
         <li class="active"><a href="#">Engagement Rings</a></li>-->
      
	  </ul>
    </div> 
 
  <div class="search-box">  
     
     <h3><?php echo $term_name; ?></h3>
    
     <!--************************ START FORM TAG FOR CREATING SEARCH BOX *********************-->
<div class="side-search"> 
<form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

			<input type="text" class="form-control" placeholder="Type Your Search here" name="s" id="s" value="<?php echo get_search_query(); ?>"><i class="fa fa-search" aria-hidden="true"></i>
</form>
</div> <!---side-search--->   

<!--************************ END OF FORM TAG FOR CREATING SEARCH BOX *********************-->
   
   </div> <!--search-box--> 
   
   
<div class="ring-box-container">
 <div class="row">
 
 
<!--********************************* START GETTING SUB CATEGORIES ****************************************-->
  <div class="col-xs-12 col-md-3">
	<div class="left-bar">
	  <div class="headding">
		<h4>Categories</h4> 
	  </div> <!--headding-->
 <?php
	
	$args = array(

       'hierarchical' => 1,

       'show_option_none' => '',

       'hide_empty' => 0,

       'parent' => $parent,

     'taxonomy' => 'product_cat'

   );

$subcats = get_categories($args);
// echo '<pre>';
// print_r($subcats);
// echo '</pre>';

?>

 <!--**************** START GETTING DATA IN SIDE BAR ************************-->
		 <?php $currentUrl = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>

		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			  <?php
				$i=0;
				foreach ($subcats as $sc) 
				{	
			  ?>	
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="heading0">
				  <h4 class="panel-title">
					<a <?php if ( $currentUrl == get_term_link( $sc->slug, 'product_cat' ) ) { echo ' class="active"'; } else {} ?> class="collapsed" href="<?php echo get_term_link( $sc->slug, 'product_cat' ); ?>" >
					  <?php echo $sc->name; ?>
					</a>
				  </h4>
				</div>
			</div>
				<?php 
				}//end of foreach loop 
				?>		  
		</div>
	</div> <!--left-bar-->
</div> <!---col-xs-12 col-md-3--->
<!--END OF GETTING DATA IN SIDE BAR-->

<!--********************************* END OF GETTING SUB CATEGORIES ****************************************-->
          
 <!--******************************** START GETTING PRODUCTS OF EACH CATEGORIES *****************************-->    
      
	  <div class="col-xs-12 col-md-9">
        <div class="row">

					<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$loopb = new WP_Query( array( 'post_type' => 'product', 'posts_per_page' => -1, 'paged' => $paged,'product_cat'=>$term_slug ) ); 
					
				 while ( $loopb->have_posts() ) : $loopb->the_post(); ?>  
					
					  <div class="col-xs-6 col-md-4">
						 <div class="ring-block">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('product_image_size'); ?></a>
						   <h4><?php the_title(); ?></h4>
							  <span class="old-price">$<?php echo get_post_meta( get_the_ID(), '_regular_price', true);?></span>
							  <span class="new-price">$<?php echo $sale = get_post_meta( get_the_ID(), '_sale_price', true);?></span> 
						  <br>
						  
						   <a class="btn btn-danger btn-cart" href="<?php the_permalink();?>">View Detail</a>
						  
						 </div> <!--rign-block-->
					  </div> <!---col-xs-6--->
			  <?php endwhile; ?>
        </div> <!--row-->
        
		
<!--******************************* END OF GETTING PRODUCTS OF EACH CATEGORIES ****************************-->		
		
		<!--******************************* START PAGINATION CODE ************************-->		
<?php
	if($loopb->max_num_pages>1)
	{
		?>
		<ul class="pagination">
   <?php
			if ($paged > 1) 
			{ 
				?>
					<li><a href="<?php echo $link.'?paged=' . ($paged -1); //prev link ?>"><</a><li>
                <?php 
			}
			for($i=1;$i<=$loopb->max_num_pages;$i++)
			{
				?>
				<li><a href="<?php echo $link.'?paged=' . $i; ?>" <?php echo ($paged==$i)? 'class="selected"':'';?>><?php echo $i;?></a></li>
				<?php
			}
			if($paged < $loopb->max_num_pages)
			{
				?>
				<li><a href="<?php echo $link.'?paged=' . ($paged + 1); //next link ?>">></a></li>
				<?php 
			}
				?>
	<?php 
	}
	?>
<!--****************************** END OF PAGINATION CODE ****************************-->	
		
		
      </div> <!---col-xs-12 col-md-9--->
     </div> <!--row close-->
    
   </div> <!---ring-box-container--->
   
     
     
  </div> <!---container--->
</div> <!---catagiores-page--->