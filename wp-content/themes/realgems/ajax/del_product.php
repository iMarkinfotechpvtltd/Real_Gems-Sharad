<?php
include('../../../../wp-config.php');
$id=$_POST['id'];

$wpdb->query( "DELETE FROM im_product_info WHERE id = '$id'" );
echo "1";
?>