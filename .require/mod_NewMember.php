<?php
if($_POST['username'] && $_POST['password'] && $_POST['email'] && $_POST['nickname']) {
	$birthday = mktime(7,0,0,$_POST['month'],$_POST['day'],$_POST['year']);
	$password = md5($_POST['password']);
	$signup = time();
	$ipaddress = $_SERVER['REMOTE_ADDR'];
	$valid = $database->query("INSERT INTO dl_user (level_id, rank_id, username, password, email, nickname, sex, birthday, location, interests, signup, address_ip)
						VALUES (7,0,'$_POST[username]','$password','$_POST[email]','$_POST[nickname]',$_POST[sex],$birthday,'$_POST[location]','$_POST[interests]',$signup,'$ipaddress');");
}
echo json_encode(array("error"=>$valid));
?>