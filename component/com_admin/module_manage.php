<?php
switch($_POST['manage']) {
	case 'public':
		if($_POST['val']==0) $_POST['val'] = 1; else $_POST['val'] = 0;
		$database->Query("UPDATE dl_module SET publisher=$_POST[val] WHERE module_id=$_POST[id];");					
		break;	
	case 'save':
			
		break;	
	case '':
	
		break;	
	case '':
	
		break;	
	case '':
	
		break;	
}
?>