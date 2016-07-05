<?php 
/* Template Name: Cut
*/ 
get_header();?>


<div class="product-pagbanner">
 <img src="<?php echo  get_template_directory_uri(); ?>/images/engagement-page-banner.jpg" alt="..." />
  <div class="container">
    <h2>Diamond Cutting</h2>
    <p>Houston's Largest source of Diamond Engagement Rings at Nikash Diamonds.  They are the ultimate gift for your special someone.<br>
     Come take a look at our exquisite diamond jewelry and diamond engagement rings that exhibit the glamour</p>
  </div>
</div> <!---product-pagbanner Close--->
<div class="catagiores-page">
	<div class="container">
		<div class="breadcrumb">
		  <ul>
			<li><?php woocommerce_breadcrumb(); ?></li>
		  </ul>
		</div> 
		<p>
			This is Dimanad Cutting Page.
        </p>		
		
	</div> <!---container--->
</div> <!---catagiores-page--->

<?php get_footer();?>