<?php
$json = array("error"=>NULL,"code"=>NULL,"margin"=>"10px");
if(isset($_POST['logs']) and $_POST['logs']=="in") {
	if($username = $database->query("SELECT (CASE WHEN u.level_id<7 THEN 1 ELSE 0 END) AS adult, u.user_id, u.password FROM dl_user AS u WHERE username='admin' LIMIT 1;")) {
		if(md5(trim($_POST['dlpassaccess']))===$username['password']) {
			$_POST['dlpassaccess'] = md5(trim($_POST['dlpassaccess']));
			$time = ((int)$database->profile("login_session")) * 60;
			$session->setCookie("id-access_code", $username['user_id'],$time);
			$session->setCookie("adult_code", $username['adult'],$time);
			$session->setCookie("verify-access_code", md5($_POST['dluseraccess']).md5($database->profile("encrypt")).md5($_POST['dlpassaccess']),$time);
		} else {
			$json['error'] = _LOGIN_PASS_WRONG;
			$json['margin'] = "170px";
		}
	} else {
		$json['error'] = _LOGIN_USER_WRONG;
		$json['margin'] = "10px";
	}
} elseif(isset($_POST['logs']) and $_POST['logs']=="out") {
		$session->delete("id-access_code");
		$session->delete("adult_code");
		$session->delete("verify-access_code");
}
echo json_encode($json);
?>