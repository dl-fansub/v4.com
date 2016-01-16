<?php
$member = $database->cls("class_profile");
$data = array();
$iFound = true;
$validmail = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
$validusername = "/^[a-z\d_-]{2,20}$/i";
$data['code'] = NULL;
$data['acc'] = NULL;
$data['euser'] = 1;
$data['epass'] = 1;
$data['email'] = 1;
if(strlen($_POST['user'])>3) {
	if(preg_match($validusername, trim($_POST['user']))) {
		for($i=0;$i<strlen($_POST['user']);$i++) {
			if(ord(substr($_POST['user'],$i,1))<=122) $iFound = false;
		}
	}
}
if(strlen(trim($_POST['pass']))>3 && trim($_POST['user'])!=trim($_POST['pass'])) {
	$data['epass'] = "";
}
if(preg_match($validmail, trim($_POST['mail']))) {
	$data['email'] = "";
}
if(!$iFound) {
	foreach($database->Query("SELECT * FROM dl_user;") as $user) {
		if(trim($user['username'])==trim($_POST['user'])) {
			 $data['euser'] = 2;
		} else {
			$data['euser'] = "";
		}
	}
}
if(!$data['euser'] && !$data['epass'] && !$data['email']) {
	$grplist = array(7,3,5,4,5,6,2);
	$password = md5($_POST['pass']);
	$signup = time();
	$ipaddress = $_SERVER['REMOTE_ADDR'];
	$preCode = strrev(md5(trim($_POST['user']).'|DL'.$signup.'FS|'.trim($_POST['pass'])));
	$i = 0;
	$c = 0;
	$data['code'] = "";
	while($c<strlen($preCode)) {
		$data['code'] .= substr($preCode, $c,$grplist[$i]);
		if(count($grplist)>$i+1) $data['code'] .= "-";
		$c += $grplist[$i];
		$i++;
	}
	
	$data['code'] = strtoupper($data['code']);
	
	$sql = "INSERT INTO dl_user (level_id, rank_id, username, password, email, nickname, sex, birthday, location, interests, signup, address_ip)
			VALUES (7,0,'$_POST[user]','$password','$_POST[mail]','$_POST[nickname]',$_POST[sex],$_POST[birthday],'$_POST[location]','$_POST[interests]',$signup,'$ipaddress');";
	$data['acc'] = code::encrypt($sql, $_POST['pass']);	
	
}

echo json_encode($data);
?>