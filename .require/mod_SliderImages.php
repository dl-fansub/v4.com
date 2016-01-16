<?php
$list = 0;
foreach($database->Query("SELECT * FROM dl_module_slideshow LIMIT 7;") as $image):
	if(file_exists("../"+$image['source'])) $image['source'] = "images/slide/noimage.png";
	if($image['adult']==1) {
		$image['source'] = "images/slide/censor.png";
		$image['url'] = "";
	}
?>
<slide class="slide-block" id="block-<?php echo $list; ?>" list="<?php echo $list; ?>" onmouseover="$('block#hover-<?php echo $list; ?>').SlideMouseHover(<?php echo $list; ?>,'<?php echo $image['url']; ?>');">
	<block class="slide-hover" id="hover-<?php echo $list; ?>" onmouseout="$(this).SlideMouseOut()" onclick="$(this).SlideMouseClick(<?php echo $list; ?>,'<?php echo $image['url']; ?>')"></block>
    <img class="slide-image" id="image-<?php echo $list; ?>" src="<?php echo $image['source']; ?>" border="0" />
</slide>
<?php $list++; endforeach; ?>