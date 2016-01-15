<div id="mod_support" style="border-bottom:none !important;">
<table width="100%" border="0" cellspacing="0" cellpadding="0"><?php
  foreach($database->query("SELECT * FROM dl_menu WHERE group_id=2 ORDER BY sorted ASC;") as $group): ?>
  <tr>
    <td width="135" class="line_sp"><div class="arrow_sp space_sp"><?php echo $group['title']; ?></div></td>
    <td valign="middle" class="line_sp"><div class="space_sp"><?php
    foreach($database->query("SELECT * FROM dl_menu WHERE parent_id=$group[menu_id] ORDER BY sorted ASC;") as $menu): ?>
      <span class="sp_item"><a class="link_text" href="<?php echo $menu['path']; ?>"><?php echo $menu['title']; ?></a></span>
	<?php
    endforeach; ?>
    </div></td>
  </tr>
  <?php
  endforeach; ?>
  <tr>
    <td><div class="arrow_sp space_sp"><?php echo _SUPPORT_LINK_US; ?></div></td>
    <td valign="middle"><div class="space_sp">
      <span class="sp_item"><?php
        foreach($database->query("SELECT * FROM dl_module_support ORDER BY sorted ASC;") as $image):
		  $size = getimagesize($image['image']); ?>
		  <a <?php if($image['url']) echo 'href="'.$image['url'].'"'; ?> target="_blank" title="<?php echo $image['title']; ?>">
          <img class="link_img" src="<?php echo $image['image']; ?>" <?php echo $size[3]; ?> /></a>
		<?php endforeach; ?>
      </span>
    </div></td>
  </tr>
</table>
</div>
