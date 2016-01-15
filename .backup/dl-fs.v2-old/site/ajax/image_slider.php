<?php
$slide_image = array(0=>'',1=>'',2=>'',3=>'',4=>'',5=>'',6=>'');
$profile = $database->Query("SELECT * FROM dl_profiles LIMIT 1;");

foreach($database->Query("SELECT * FROM dl_module_slider LIMIT 7;") as $image) {
	$imgData['src'] = $profile['serv_img'].$image['source'];
	if(!@getimagesize($imgData['src'])) $imgData['src'] = $profile['serv_img'].'slide/noimage.png';
	if($image['adult']==1) $imgData['src'] = $profile['serv_img'].'slide/censor.png';
	$imgData['width'] = $_REQUEST['width'];
	$imgData['height'] = $_REQUEST['height'];
	$imgData['url'] = $image['url'];
	if($image['adult']==1) $imgData['url'] = '';	
	switch($image['image_id']) {
		case 1: $slide_image[3] = $imgData; break;
		case 2: $slide_image[2] = $imgData; break;
		case 3: $slide_image[4] = $imgData; break;
		case 4: $slide_image[1] = $imgData; break;
		case 5: $slide_image[5] = $imgData; break;
		case 6: $slide_image[0] = $imgData; break;
		case 7: $slide_image[6] = $imgData; break;
	}
}

echo json_encode($slide_image);
?>
