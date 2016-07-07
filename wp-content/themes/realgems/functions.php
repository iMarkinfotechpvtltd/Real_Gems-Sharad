<?php
/**
 * Twenty Sixteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/**
 * Twenty Sixteen only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentysixteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own twentysixteen_setup() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentysixteen', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'twentysixteen' ),
		'social'  => __( 'Social Links Menu', 'twentysixteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', twentysixteen_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'twentysixteen_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'twentysixteen_content_width', 840 );
}
add_action( 'after_setup_theme', 'twentysixteen_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentysixteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'twentysixteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'twentysixteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentysixteen_widgets_init' );

if ( ! function_exists( 'twentysixteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Sixteen.
 *
 * Create your own twentysixteen_fonts_url() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentysixteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentysixteen_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentysixteen-fonts', twentysixteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'twentysixteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentysixteen-style' ), '20160412' );
	wp_style_add_data( 'twentysixteen-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'twentysixteen-style' ), '20160412' );
	wp_style_add_data( 'twentysixteen-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentysixteen-style' ), '20160412' );
	wp_style_add_data( 'twentysixteen-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'twentysixteen-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'twentysixteen-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'twentysixteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160412', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentysixteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160412' );
	}

	wp_enqueue_script( 'twentysixteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160412', true );

	wp_localize_script( 'twentysixteen-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'twentysixteen' ),
		'collapse' => __( 'collapse child menu', 'twentysixteen' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'twentysixteen_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function twentysixteen_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'twentysixteen_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function twentysixteen_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentysixteen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentysixteen_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentysixteen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentysixteen_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function twentysixteen_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentysixteen_widget_tag_cloud_args' );

//add custom slider function
function custom_banner_slider() {
   $args = array(
      'label' => 'Banner Slider',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'banner_slider'),
        'query_var' => true,
        'supports' => array( 
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
        );

    register_post_type( 'banner_slider', $args );
}
add_action( 'init', 'custom_banner_slider' );


//Add image size function
add_image_size( 'banner-size', 839, 720, true );
add_image_size( 'welcome_size', 552, 641, true );
add_image_size( 'jewelery_size', 339, 381, true );
add_image_size( 'earrings_size', 583, 641, true );
add_image_size( 'p_product_size', 179, 170, true );
add_image_size( 'diamond_size', 643, 385, true );
add_image_size( 'testm_size', 1920, 552, true );
add_image_size( 'site_logo_size', 251, 67, true );
add_image_size( 'contact_banner_img1_size', 1920, 958, true );
add_image_size( 'contact_banner_img2_size', 123, 86, true );
add_image_size( 'similar_product_size', 97, 97, true );
// add custom populer post 
function custom_populer_products() {
   $args = array(
      'label' => 'Popular',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'populer_products'),
        'query_var' => true, 
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
        );

    register_post_type( 'populer_products', $args );
}
add_action( 'init', 'custom_populer_products' );

//add custom testimonials
function custom_testimonials() {
   $args = array(
      'label' => 'testimonials',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'testimonials'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
        );

    register_post_type( 'testimonials', $args );
}
add_action( 'init', 'custom_testimonials' );


//****************************** START ADD IMAGE SIZE FUNCTION *******************************//
add_image_size('product_image_size',179,170);

//****************************** END OF ADD IMAGE SIZE FUNCTION *******************************//


//*********include meta boxfile for metabox plugin ***********//
//include('meta-boxes.php');

function get_numerics ($str) 
{
	preg_match_all('/\d+/', $str, $matches);
	return $matches[0];
}

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function myplugin_add_meta_box() {

	$screens = array( 'product');

	foreach ( $screens as $screen ) {

		add_meta_box(
			'myplugin_sectionid',
			__( 'Select asd', 'myplugin_textdomain' ),
			'myplugin_meta_box_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'myplugin_add_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function myplugin_meta_box_callback( $post ) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'myplugin_meta_box', 'myplugin_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
?>
<script>
function save(status,id)
{
	var post_id=jQuery('#post_id').val();
	var color=jQuery('#color_'+id).val();
	var video=jQuery('#video_'+id).val();
	var gallery=jQuery('#gallery_'+id).val();
	
	  jQuery.ajax({
			type: "POST", 
			url:"<?php bloginfo('template_url'); ?>/ajax/save_product.php",
			data:{post_id:post_id,color:color,video:video,gallery:gallery,status:status,format:'raw'},
			success:function(resp){
				if( resp !="")
				{
					jQuery('.custom_box').empty().append(resp);
				}
				
			}
	   });
}

function add_box(id)
{
	var len=jQuery('.meta_box').length;
	jQuery.ajax({
		type: "POST", 
		url:"<?php bloginfo('template_url'); ?>/ajax/add_product.php",
		data:{len:len,format:'raw'},
		success:function(resp)
		{
			if( resp !="")
			{
				jQuery(resp).insertAfter('.meta_box_'+id); 
			}
			
		}
	});
}

function del_box(id)
{
	jQuery.ajax({
		type: "POST", 
		url:"<?php bloginfo('template_url'); ?>/ajax/del_product.php",
		data:{id:id,format:'raw'},
		success:function(resp)
		{
			if( resp !="")
			{
				if(resp==1)
				{
					jQuery('.meta_box_'+id).remove();
				}	
			}
			
		}
	});
}

function del_box1(id)
{
	jQuery('.meta_box_'+id).remove();
}
var custom_uploader="";

function add_gallery(id)
{
	
	var row_id=id;
	jQuery('#curr_id').val(id);
	
	if (custom_uploader) {
        custom_uploader.open();
        return;
    }
    //Extend the wp.media object
    custom_uploader = wp.media.frames.file_frame = wp.media({
        title: 'Choose Image',
        button: {
            text: 'Choose Image'
        },
        multiple: true
    });
    custom_uploader.on('select', function() {
         var selection = custom_uploader.state().get('selection');
			var attach="";
			selection.map( function( attachment ) 
			{
			attachment = attachment.toJSON();
			//alert(attachment.id); 
			attach += (attach?',':'') + attachment.id;
			});
			
			jQuery.ajax({
				type: "POST",
				url:"<?php bloginfo('template_url'); ?>/ajax/show_gallery.php",
				data:{attach:attach,format:'raw'},
				success:function(resp){
					if( resp !="") 
					{	
						var row_id=jQuery('#curr_id').val(); 
						var asd=jQuery('#asdd_'+row_id).html();
						
						jQuery('#asdd_'+row_id).empty().append(resp); 
					} 
					
				}
		    });
			
			
			
    });
    custom_uploader.open();
}

function add_box_1(id)
{
	var len=jQuery('.meta_box').length;
	var len=parseInt(len)+1;
	var msg='<div class="meta_box meta_box_'+len+'"><p><label>Color</label><input type="text" name="color[]"></p><p><label>Video</label><input type="text" name="video[]"></p><p><label>Gallery</label><a href="javascript:void(0);" class="button" onclick="add_gallery('+len+');">Add Gallery</a><div id="asdd_'+len+'"></div></p><p><a href="javascript:void(0);" class="button" onclick="add_box_1('+len+');">Add</a><a href="javascript:void(0);" class="button" onclick="del_box1('+len+');">Delete</a></p></div>';
	jQuery(msg).insertAfter('.meta_box_'+id);      
} 


</script>

<input type="hidden" id="post_id" value="<?php echo $post->ID; ?>">
<input type="hidden" id="curr_id">
<div class="custom_box">
	<?php
	global $wpdb;
	foreach( $wpdb->get_results("SELECT count(id) 'total'  FROM im_product_info where post_id='".$post->ID."'") as $key => $row)
	{
	$count = $row->total;
	}
	if($count==0)
	{	
	?>


	<div class="meta_box meta_box_1">
		<p>
			<label>Color</label>
			<input type="text" name="color[]">
		</p>
		<p>
			<label>Video</label>
			
			<input type="text" name="video[]">  
		</p>
		<p>
			<label>Gallery</label>
			<a href="javascript:void(0);" class="button" onclick="add_gallery('1');">Add Gallery</a>
			<div id="asdd_1"></div>
		</p>
		<p>
		
		<a href="javascript:void(0);" class="button" onclick="add_box_1('1');">Add</a>  
		</p> 
	</div>
	<?php
	}
	else
	{	

		foreach( $wpdb->get_results("SELECT *  FROM im_product_info where post_id='".$post->ID."'") as $key => $row)
		{
		$id = $row->id;
		$color = $row->color;
		$video = $row->video;
		$gallery = $row->gallery;

	?>
	
	<div class="meta_box meta_box_<?php echo $id; ?>">
		<p>
			<label>Color</label> 
			<input type="text" name="color[]" value="<?php echo $color; ?>">
		</p>
		<p>
			<label>Video</label>
			
			<input type="text" name="video[]" value="<?php echo $video; ?>">  
		</p>
		<p>
			<label>Gallery</label>
			<a href="javascript:void(0);" class="button" onclick="add_gallery('<?php echo $id; ?>');">Add Gallery</a>
			<div id="asdd_<?php echo $id; ?>">
			<input type="hidden" name="gallery[]" value="<?php echo $gallery; ?>"/>
			<?php
			$arr=get_numerics($gallery);
			foreach($arr as $val)
			{
				$image_attributes = wp_get_attachment_image_src( $val,'thumbnail' );
			?>
			<li><img src="<?php echo $image_attributes[0]; ?>"></li> 
			<?php 
			}
			?>
			</div>
		</p>
		<p>
		
		<a href="javascript:void(0);" class="button" onclick="add_box_1('<?php echo $id; ?>');">Add</a>  
		<a href="javascript:void(0);" class="button" onclick="del_box('<?php echo $id; ?>');">Delete</a>  
		</p>   
	</div>
	
	<?php
		}
	}
	?>
	
</div>
<?php	
}

function myplugin_save_meta_box_data( $post_id ) {

	global $wpdb;

	
	
	$wpdb->query( "DELETE FROM im_product_info WHERE post_id = '$post_id'" );
	
	if ( ! isset( $_POST['myplugin_meta_box_nonce'] ) ) {
		return;
	}

	
	if ( ! wp_verify_nonce( $_POST['myplugin_meta_box_nonce'], 'myplugin_meta_box' ) ) {
		return;
	}

	
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	
	
	$color=$_POST['color'];
	$video=$_POST['video'];
	$gallery=$_POST['gallery'];
	
		
	$i=0;
	foreach($color as $val)
	{
		
		if($color[$i]=="")
		{
			$color_1="Null";
		}
		else
		{
			$color_1=$color[$i];
		}	

		if($video[$i]=="")
		{
			$video_1="Null";
		}
		else
		{
			$video_1=$video[$i];
		}	
		
		if($gallery[$i]=="")
		{
			$gallery_1="Null";
		}
		else
		{
			$gallery_1=$gallery[$i];
		}		
		
		
		$wpdb->insert( 'im_product_info', array(
		'post_id' => $post_id, 
		'color' => $color_1,
		'video' => $video_1,
		'gallery' => $gallery_1)
		);
		
	$i++;
	} 
	
	
	
	
}
add_action( 'save_post', 'myplugin_save_meta_box_data' );


/*************  START CODE FOR GETTING SUB CATEGORY ***************/
function woocommerce_subcats_from_parentcat_by_ID($parent_cat_ID) {
	$counter=0;
    $args = array(
       'hierarchical' => 1,
       'show_option_none' => '',
       'hide_empty' => 0,
       'parent' => $parent_cat_ID,
       'taxonomy' => 'product_cat'
    );
  $subcats = get_categories($args);
   
      foreach ($subcats as $sc) {
		$counter++;
	}
	return $counter;
    
}
/*************  END OF CODE FOR GETTING SUB CATEGORY ***************/


/*************  START CODE FOR ACTIVE MENU ITEM ***************/
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
   if (in_array('current-menu-item', $classes) ){
       $classes[] = 'active ';
   }
   return $classes;
}
/*************  END OF CODE FOR ACTIVE MENU ITEM ***************/


//**************************Start Wordpress Logo Function*******************************************/

function my_loginlogo()
{
echo '<style type="text/css">
  h1 a {
    background-image: url(' . get_template_directory_uri() . '/images/real_logo.png) !important;
       background-size: cover !important;
   height: 87px !important;
  
  }
</style>';
}
add_action('login_head', 'my_loginlogo');

function put_my_url()
{
  return site_url();
}
add_filter('login_headerurl', 'put_my_url');

/**************************End of Wordpress Logo Function***************************************************/