<?php 
foreach (glob("cgi-bin/*.php") as $filename) include_once($filename);
$database = new SyncDatabase();
$session = new Session();

$siteWidth = '80%';
$profile = $database->query("SELECT * FROM dl_profiles WHERE profile_id=1 LIMIT 1;");

if(@$profile & @!$_REQUEST['ajax']):
$GLOBALS['stage'] = NULL;
if(!isset($_GET['stage'])) {
	$menu = $database->query("SELECT * FROM dl_menu WHERE frontpage=1 LIMIT 1;");
	$GLOBALS['MENU'] = $menu['menu_id'];
	$_GET['stage'] = $menu['name'];
}
$GLOBALS['MENU'] = 0;
$comParent = $_GET['stage'];
if(isset($_GET['p'])) $comParent = $_GET['p'];
if($stageName = $database->query("SELECT * FROM dl_menu WHERE name='$comParent' LIMIT 1;")) { 
	$GLOBALS['MENU'] = $stageName['menu_id'];
	foreach($database->query("SELECT * FROM dl_menu WHERE parent_id=$stageName[menu_id];") as $dropmenu) {
		if(isset($_GET['p']) && $_GET['p']==$dropmenu['name']) {
			$stageName['title'] .= ' - '.$dropmenu['title'];
			$GLOBALS['MENU'] = $dropmenu['menu_id'];
		}
	}
}

if($profile['language']) include('language/'.$profile['language']);
?>
<title><?php
if(!$GLOBALS['MENU'] && !$database->query("SELECT COUNT(*) FROM dl_component WHERE name='com_$_GET[stage]' LIMIT 1;")) {
	$error = $database->query("SELECT * FROM dl_component WHERE com_id=1 LIMIT 1;");
	echo $error['title'];
} else {
	echo $profile['title'];
	if($profile['nav_title']==1) echo $stageName['title'];
}
?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="Keywords" content="<?php echo $profile['keywords']; ?>" />
<meta name="Description" content="<?php echo $profile['description']; ?>" />
<link rel="shortcut icon" href="images/<?php echo $profile['icon']; ?>">
<?php
if(is_dir("component/com_$_GET[stage]/css/")) { foreach(glob("component/com_$_GET[stage]/css/*.css") as $filename) { echo '<link rel="stylesheet" type="text/css" href="'.$filename.'" />'."\n\r";} }
if(is_dir("component/com_$_GET[stage]/js/")) { foreach(glob("component/com_$_GET[stage]/js/*.js") as $filename) { echo  '<script type="text/javascript" src="'.$filename.'"></script>'."\n\r"; } }
endif;

function ModuleLoad($panel)
{
	$database = new SyncDatabase();
	if($panel = $database->Query("SELECT * FROM dl_panel WHERE panel='$panel' LIMIT 1;")) {
		foreach($database->Query("SELECT * FROM dl_module WHERE panel_id=$panel[panel_id] AND publisher=1 ORDER BY sorted ASC;") as $module) {
			if($database->Query("SELECT COUNT(*) FROM dl_view WHERE menu_id=$GLOBALS[MENU] AND module_id=$module[module_id];") || !$database->Query("SELECT COUNT(*) FROM dl_view WHERE module_id=$module[module_id];")) {
				if(file_exists('module/'.$module['name'].'.php')) {
					$config = array();
					if(file_exists('module/'.$module['name'].'.ini')) {
						$loadConfig = parse_ini_file('module/'.$module['name'].'.ini', true);
						foreach($loadConfig as $isGroupConfig) { foreach($isGroupConfig as $name=>$value) { $config[$name] = $value; } }
					}
					switch($module['type']) {
						case 1:
							echo '<div id="module_'.$module['name'].'"><div class="module_head">'.$module['title'].'</div>';
							echo '<div class="module_body">';
							include_once('module/'.$module['name'].'.php');
							echo '</div></div>';
							break;
						default:
							include_once('module/'.$module['name'].'.php');
							break;
					}
				} else {
					echo 'Not Found.';
				}
			} else {
				
			}
		}
	}
	return false;
}

?>

