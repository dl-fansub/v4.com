<?php
$menu = $database->query("SELECT * FROM dl_menu WHERE menu_id=$GLOBALS[MENU] LIMIT 1");
$strNavigator = '<span style="padding:1px 3px 1px 3px;">'.$menu['title'].'</span>';
while($menu['parent_id']!=0) {
	$menu = $database->query("SELECT * FROM dl_menu WHERE menu_id=$menu[parent_id] LIMIT 1");
	$strNavigator = '<a class="link_text" href="'.$menu['path'].'">'.$menu['title'].'</a> > '.$strNavigator;
} ?>
<div id="navigator"><?php echo $strNavigator; ?></div>