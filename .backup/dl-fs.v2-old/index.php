<?php 
if(isset($_REQUEST['ajax'])):
foreach (glob("cgi-bin/*.php") as $filename) include_once($filename);
$database = new SyncDatabase();
$session = new Session();
if(isset($_GET['stage'])) {
	if(file_exists('component/com_'.$_GET['stage'].'/'.$_GET['ajax'].'.php')) {
		$profile = $database->query("SELECT * FROM dl_profiles WHERE profile_id=1 LIMIT 1;");
		if($profile['language']) include('language/'.$profile['language']);
		include_once('component/com_'.$_GET['stage'].'/'.$_GET['ajax'].'.php');
	} else { echo 'Component not Found.'; }
} else {
	if(file_exists('site/ajax/'.$_GET['ajax'].'.php')) include_once('site/ajax/'.$_GET['ajax'].'.php'); else echo 'Ajax not Found.';	
}
  
elseif(isset($_REQUEST['html'])):
	foreach (glob("site/css/*.css") as $filename) echo '<link rel="stylesheet" type="text/css" href="'.$filename.'" />'."\n\r"; 
	foreach (glob("plugins/*.js") as $filename) echo '<script type="text/javascript" src="'.$filename.'"></script>'."\n\r"; 
	if(file_exists('module/iframe/'.$_REQUEST['html'].'.html')) include_once('module/iframe/'.$_REQUEST['html'].'.html'); else include_once('plugins/default.php');
else: 
ob_start(); 
session_start(); 
?>
<!DOCTYPE HTML>
<html>
<head>
<?php
error_reporting(-1);
date_default_timezone_set("Asia/Bangkok");
include_once('config.php');
foreach (glob("site/css/*.css") as $filename) echo '<link rel="stylesheet" type="text/css" href="'.$filename.'" />'."\n\r"; 
foreach (glob("plugins/*.js") as $filename) echo '<script type="text/javascript" src="'.$filename.'"></script>'."\n\r"; 
foreach (glob("site/js/*.js") as $filename) echo '<script type="text/javascript" src="'.$filename.'"></script>'."\n\r"; ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script src="http://connect.facebook.net/th_TH/all.js#xfbml=1"></script>
<script type="text/javascript">
$(function(){ $.ajaxSetup({ type: 'POST', dataType: 'json' }); });
</script>
<body>
<?php if(file_exists('site/main.php')) include_once('site/main.php'); else include_once('plugins/default.php'); ?>
</body>
</html>
<?php 
ob_end_flush(); 
endif;
?>
