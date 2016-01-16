<script type="text/javascript">
var _DropID = 0; function MainDropDown(id) { var _iDropdown = $('#dropdown_'+id); if(_DropID!=id) $('.dropdown').fadeOut(50); _iDropdown.fadeIn(50); _DropID = id; }
$(function(){ $('#mainmenu_frame').mouseleave(function(){ $('.dropdown').fadeOut(50); }); });
</script>
<div id="mainmenu_frame">
<table border="0" width="990" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td width="50%" valign="top" align="right"><img src="images/menuHead_Left.png" width="15" height="63" border="0" /></td><?php
  	if(!isset($_GET['p'])) $_GET['p'] = NULL;
    foreach($this->query("SELECT * FROM dl_menu WHERE group_id=1 AND adult=0 ORDER BY sorted ASC;") as $mainmenu): ?>
    <td valign="top"><a href="<?php echo $mainmenu['path']; ?>">
      <div id="menu_<?php echo $mainmenu['name']; ?>" <?php if($mainmenu['name']==$GLOBALS['component_name']) echo 'class="selected_'.$mainmenu['name'].'"'; ?>
       onmouseover="MainDropDown(<?php echo $mainmenu['menu_id']; ?>)"></div></a><?php
      if($this->query("SELECT COUNT(*) FROM dl_menu WHERE parent_id=$mainmenu[menu_id];")): ?>
      <div id="dropdown_<?php echo $mainmenu['menu_id']; ?>" class="dropdown"><?php
      foreach($this->query("SELECT * FROM dl_menu WHERE parent_id=$mainmenu[menu_id] ORDER BY sorted ASC;") as $dropmenu):
		  if($dropmenu['adult']==0 || ($dropmenu['adult']==1 && $GLOBALS['ACCESS'])): 
		  	 if($dropmenu['adult']!=1 || $this->cookie('adult_code')==1): ?><a href="<?php echo $dropmenu['path']; ?>"><?php endif; ?>
             <div id="menu_<?php echo $dropmenu['name']; ?>"<?php
				if($this->path(1)==$dropmenu['name']) {
				   echo 'class="selected_'.$dropmenu['name'].'"'; 
				} else {
				   if($dropmenu['adult']==1 && $this->cookie('adult_code')==0) echo 'class="disabled_'.$dropmenu['name'].'"';
				}?>></div><?php
                if($dropmenu['adult']!=1 || $this->cookie('adult_code')==1): ?></a><?php endif;
		  endif;
	  endforeach; ?></div><?php
	  endif; ?></td><?php	
    endforeach; ?>
    <td width="50%" valign="top" align="left"><img src="images/menuHead_Right.png" width="15" height="63" border="0" /></td>
  </tr>
</table>
</div>