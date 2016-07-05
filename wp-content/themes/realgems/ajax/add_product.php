<?php
include('../../../../wp-config.php');
include('../../../../wp-load.php');
$id=$_POST['len']+1;
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
<div class="meta_box meta_box_<?php echo $id; ?>" style="border:1px solid red;">
<script>
var image_custom_uploader;
var $thisItem = '';

jQuery(document).on('click','#add_video_<?php echo $id; ?>', function(e) {
	e.preventDefault();
	alert(<?php echo $id; ?>);
	$thisItem = jQuery('#add_video_<?php echo $id; ?>');

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
		alert(url); 
		alert(jQuery('.video_<?php echo $id; ?>').val());
		jQuery('.video_<?php echo $id; ?>').val(url);
	});

	//Open the uploader dialog
	image_custom_uploader.open();
});

</script>
<p>
	<label>Color</label>
	<input type="text" id="color_<?php echo $id; ?>">
</p>
<p>
	<label>Video</label>
	<a href="javascript:void(0);" id="add_video_<?php echo $id; ?>" class="button">Add Video</a>
	<input type="text" class="video_<?php echo $id; ?>">
</p> 
<p>
	<label>Gallery</label>
	<?php the_editor($content, 'gallery_'.$id); ?>
</p>
<p>
<a href="javascript:void(0);" class="button" onclick="save('1','<?php echo $id; ?>');">Save</a>
<a href="javascript:void(0);" class="button" onclick="add_box('<?php echo $id; ?>');">Add</a> 
<a href="javascript:void(0);" class="button" onclick="del_box1('<?php echo $id; ?>');">Delete</a> 
</p>
</div>