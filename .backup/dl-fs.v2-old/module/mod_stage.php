<div><?php
$fileStage = 'component/com_'.$_GET['stage'].'/'.$_GET['stage'].'.php';
if(file_exists($fileStage)) include_once($fileStage);
else echo 'Component not Found.';
?></div>