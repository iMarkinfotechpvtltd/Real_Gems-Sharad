
<?php
include('../../../../wp-config.php');
$attach=$_POST['attach'];
?>
<input type="hidden" name="gallery[]" value="[<?php echo $attach; ?>]"/>
<ul>
<?php
$attach=explode(",",$attach);
foreach($attach as $val)
{
	$image_attributes = wp_get_attachment_image_src( $val,'thumbnail' );
?>
<li><img src="<?php echo $image_attributes[0]; ?>"></li>
<?php 
}
?>
</ul>