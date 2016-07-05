<?php
include('../../../../wp-config.php');
include('../../../../wp-load.php');
global $wpdb;
$post_id=$_POST['post_id'];
$color=$_POST['color'];
$video=$_POST['video'];
$gallery=$_POST['gallery'];
$status=$_POST['status'];

if($status==0)
{
	$wpdb->insert( 'im_product_info', array(
	'post_id' => $post_id,
	'color' => $color,
	'video' => $video,
	'gallery' => stripslashes($gallery) )
	); 
}
else
{
	$wpdb->query( "UPDATE im_product_info SET color = '$color',video='".$video."',gallery='".$gallery."' WHERE id = $status" );
}	

foreach( $wpdb->get_results("SELECT * FROM im_product_info where post_id='".$post_id."'") as $key => $row)
{
$id = $row->id;
$color = $row->color;
$video = $row->video;
$gallery = stripslashes($row->gallery);
?>
<div class="meta_box meta_box_<?php echo $id; ?>" style="border:1px solid red;">
<script>
var image_custom_uploader;
var $thisItem = '';

jQuery(document).on('click','#add_video_<?php echo $id; ?>', function(e) {
	e.preventDefault();
	
	$thisItem = jQuery(this);

	//If the uploader object has already been created, reopen the dialog
	if (image_custom_uploader) {
		image_custom_uploader.open();
		return;
	}

	//Extend the wp.media object
	image_custom_uploader = wp.media.frames.file_frame = wp.media({
		title: 'Choose Image',
		button: {
			text: 'Choose Image'
		},
		multiple: false
	});

	//When a file is selected, grab the URL and set it as the text field's value
	image_custom_uploader.on('select', function() {
		attachment = image_custom_uploader.state().get('selection').first().toJSON();
		var url = '';
		url = attachment['url'];
		jQuery('#video_<?php echo $id; ?>').val(url);
	});

	//Open the uploader dialog
	image_custom_uploader.open();
});

</script>
<p>
	<label>Color</label>
	<input type="text" id="color_<?php echo $id; ?>" value="<?php echo $color; ?>">
</p>
<p>
	<label>Video</label>
	<a href="javascript:void(0);" id="add_video_<?php echo $id; ?>" class="button">Add Video</a>
	<input type="text" id="video_<?php echo $id; ?>" value="<?php echo $video; ?>">
</p>
<p>
	<label>Gallery</label>
	<?php the_editor($gallery, 'gallery_'.$id); ?>
</p>
<p>
<a href="javascript:void(0);" class="button" onclick="save('<?php echo $id; ?>','<?php echo $id; ?>');">Save</a>
<a href="javascript:void(0);" class="button" onclick="add_box('<?php echo $id; ?>');">Add</a> 
<a href="javascript:void(0);" class="button" onclick="del_box('<?php echo $id; ?>');">Delete</a> 
</p>
</div>
<?php
}
	
?>
