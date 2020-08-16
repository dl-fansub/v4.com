<div id="mod_support">
<table width="100%" border="0" cellspacing="0" cellpadding="0"><?php
  foreach($this->query("SELECT * FROM dl_menu WHERE group_id=2 ORDER BY sorted ASC;") as $group): ?>
  <tr>
    <td width="135" class="line_sp"><div class="arrow_sp space_sp"><?php echo $group['title']; ?></div></td>
    <td valign="middle" class="line_sp"><div class="space_sp"><?php
    foreach($this->query("SELECT * FROM dl_menu WHERE parent_id=$group[menu_id] ORDER BY sorted ASC;") as $menu): ?>
      <span class="sp_item"><a class="link_text" href="<?php echo $menu['path']; ?>"><?php echo $menu['title']; ?></a></span>
	<?php
    endforeach; ?>
    </div></td>
  </tr>
  <?php
  endforeach; ?>
  <tr>
    <td valign="middle" width="150"><div class="arrow_sp space_sp"><?php echo _SUPPORT_LINK_US; ?></div></td>
    <td valign="middle"><div class="space_sp">
      <span class="sp_item"><?php
        foreach($this->query("SELECT (CASE COUNT(*) WHEN 0 THEN 'Digital Lover 4.0' ELSE ds.title END) AS title, ds.url,
		(CASE COUNT(*) WHEN 0 THEN '/support/dl-fs.jpg' ELSE ds.image END) AS image FROM dl_module_support AS ds ORDER BY sorted ASC;") as $image):?>
		  <a <?php if($image['url']) echo 'href="'.$image['url'].'"'; ?> target="_blank" title="<?php echo $image['title']; ?>">
          <img class="link_img" src="<?php echo $this->profile('image_server').$image['image']; ?>" /></a>
		<?php endforeach; ?>
      </span>
    </div></td>
  </tr>
</table>
</div>
<div id="page_notice"></div>