<?php if(preg_match("(/?!)", $_SERVER['REQUEST_URI']) || $_SERVER['REQUEST_URI']=='/'): ob_start(); ?><!DOCTYPE HTML><html><head><?php
error_reporting(0);
date_default_timezone_set("Asia/Bangkok");
include_once(".require/SyncConfig.php"); 
$dlfsv4 = new fsDigitalLover();

//            $GLOBALS Site.             \\
// ------------------------------------- \\
$GLOBALS['component_name'] = 'error';
$GLOBALS['error_type'] = 0;  
// component_name (Not Found Component in database),
// component_folder (Not Found Component include),
$GLOBALS['menu_id'] = 0;
$GLOBALS['title_site'] = 'NULL';
$GLOBALS['ACCESS'] = NULL;
// ------------------------------------- \\

$dlfsv4->Initialize();
$dlfsv4->Header();
$dlfsv4->IncludeScripts();
?></head><body><?php $dlfsv4->HTML(); ?></body></html><?php ob_end_flush(); endif; ?>