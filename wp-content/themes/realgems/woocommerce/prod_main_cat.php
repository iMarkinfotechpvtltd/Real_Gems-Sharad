<div class="product-pagbanner">
 <img src="<?php bloginfo('template_url'); ?>/images/product-baner.jpg" alt="..." />
  <div class="container">
    <h2><?php echo $term_name; ?></h2>
    <p>Houston's Largest source of Diamond Engagement Rings at Nikash Diamonds.  They are the ultimate gift for your special someone.<br> 
          Come take a look at our exquisite diamond jewelry and diamond engagement rings that exhibit the glamour</p>
  </div>
</div> <!---product-pagbanner Close--->

<div class="catagiores-page">
  <div class="container">
    
	<?php
	
	$args = array(

       'hierarchical' => 1,

       'show_option_none' => '',

       'hide_empty' => 0,

       'parent' => $term_id,

     'taxonomy' => 'product_cat'

   );

$subcats = get_categories($args);

	?>

    <div class="breadcrumb">
	  <?php woocommerce_breadcrumb(); ?>
    </div> 
  
    
  <div class="search-box">  
     <h3><?php echo $term_name; ?></h3>
  
<!--************************ START FORM TAG FOR CREATING SEARCH BOX *********************-->
  <div class="side-search"> 
    <!--<form role="search" method="get" id="searchform" class="search-form" action="<?php //echo esc_url( home_url( '/' ) ); ?>">
			
			<input type="text" id="txt_box" class="form-control" placeholder="Type Your Search here" name="s" id="s" value="<?php //echo get_search_query(); ?>">
			<input type="hidden" name="post_type" value="product"/>
			<input type="hidden" class="form-control" placeholder="Type Your Search here" name="product_cat" id="product_cat" value=""/><button type="submit" class="btn btn-danger" id="btn_id"><i class="fa fa-search" aria-hidden="true"></i></button>
			<input type="submit" class="btn btn-default" id="btn_submit" value="Search"><i class="fa fa-search" aria-hidden="true"></i> 
    </form>-->
	
	
	<form role="search" method="get" id="searchform"
			class="searchform navbar-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
          <input type="text" class="form-control" placeholder="Search" name="s" id="s" value="<?php echo get_search_query(); ?>">
          <input class="btn search-btn btn-default" type="submit" id="searchsubmit"
            value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>"><i class="fa fa-search" aria-hidden="true"></i>
			<input type="submit" class="btn btn-default" id="btn_submit" value="Search"><i class="fa fa-search" aria-hidden="true"></i>
    </form>
	

</div> <!---side-search--->  
 

<!--************************ END OF FORM TAG FOR CREATING SEARCH BOX *********************-->
  </div>  
  
  
  
    <div class="product-gallery">
     <div class="row"> 
		<?php
		foreach ($subcats as $sc) 
		{
		$url=z_taxonomy_image_url($sc->term_id);	
		?>	
       <div class="col-xs-6 col-md-4 col-lg-3">
         <div class="product-box"> 
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
		   <img src="http://placehold.it/340x435&amp;text=No image found" alt="..." /> 
		   <?php
		   }
		   ?>
		   <div class="box-caption">
             <h4><a href="<?php echo get_term_link( $sc->slug, 'product_cat' ); ?>"><?php echo $sc->name; ?></a></h4>
           </div> <!--box-caption-->
         </div>  
       </div> <!--col-lg-3-->
		<?php } ?>
      </div> <!--row-->
    </div> <!--product-gallery-->
  </div>
</div> <!---catagiores-page--->

<script>
jQuery(document).ready(function(){
	
	jQuery('#btn_id').click(function(){
		var ab = jQuery('#txt_box').val();
		alert(ab);
		
		jQuery('input[name=product_cat]').val(ab);
	});
	
});
</script>