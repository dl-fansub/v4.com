<script type="text/javascript">
// DropDownBox 
var idDrop = 0;
var nameDrop;
function dropDownDL(id, name) {
	if(idDrop!=id) $('.dropdown').fadeOut(50);
	$('#dropdown_'+id).fadeIn(50);
	idDrop = id;
	nameDrop = name;
}
</script>

<table width="500" border="0" cellpadding="0" cellspacing="0">
  <tr><?php
  	if(!isset($_GET['p'])) $_GET['p'] = NULL;
    foreach($database->query("SELECT * FROM dl_menu WHERE group_id=1 ORDER BY sorted ASC;") as $mainmenu): ?>
    <td valign="top"><a href="<?php echo $mainmenu['path']; ?>">
      <div id="menu_<?php echo $mainmenu['name']; ?>" <?php if($mainmenu['name']==$_GET['stage']) echo 'class="selected_'.$mainmenu['name'].'"'; ?>
       onmouseover="dropDownDL(<?php echo $mainmenu['menu_id']; ?>,'<?php echo $mainmenu['name']; ?>')"></div></a><?php
      if($database->query("SELECT COUNT(*) FROM dl_menu WHERE parent_id=$mainmenu[menu_id];")): ?>
      <div id="dropdown_<?php echo $mainmenu['menu_id']; ?>" class="dropdown"><?php
      foreach($database->query("SELECT * FROM dl_menu WHERE parent_id=$mainmenu[menu_id] ORDER BY sorted ASC;") as $dropmenu):
		  if((!isset($_GET['USER']) && $dropmenu['adult']!=1) || isset($_GET['USER'])): 
		  	 if($dropmenu['adult']!=1): ?><a href="<?php echo $dropmenu['path']; ?>"><?php endif; ?>
             <div id="menu_<?php echo $dropmenu['name']; ?>"<?php
				if($_GET['p']==$dropmenu['name']) {
				   echo 'class="selected_'.$dropmenu['name'].'"'; 
				} else {
				   if($dropmenu['adult']==1) echo 'class="disabled_'.$dropmenu['name'].'"';
				}?>></div><?php
                if($dropmenu['adult']!=1): ?></a><?php endif;
		  endif;
	  endforeach; ?></div><?php
	  endif; ?></td><?php	
    endforeach; ?>
  </tr>
</table>
