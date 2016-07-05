<?php
include('../../../../wp-config.php');
echo "<pre>";
print_r($_GET);
echo "</pre>";


global $wpdb;
$headings_sec = $_GET['headings_sec'];
echo $headings_sec;
$arr_headings_sec = explode("^^",$headings_sec);
$column_1 = $_GET['column_1'];
$arr_column_1 = explode("^^", $column_1);
$column_2 = $_GET['column_2'];
$arr_column_2 = explode("^^",$column_2);
// echo "<pre>";
// print_r();
// echo "</pre>";
$post_id = $_GET['post_id'];

$wpdb->query(
		'DELETE  FROM `im_power_range`
		WHERE post_id = "'.$post_id.'"'
	);
		$i=0;
	foreach($arr_headings_sec as $mydata1)
	{
		$wpdb->insert( 'im_product', array(
		'post_id' => $post_id,
		'color' => $mydata1,
		'video' => $arr_column_1[$i],
		'gallery' => $arr_column_2[$i] )
		);
		$i=$i+1;
	}