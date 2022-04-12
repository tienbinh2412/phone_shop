<?php
function getPwdSecurity($pwd) {
	return md5(md5($pwd).MD5_PRIVATE_KEY);
}

function validateToken() {
	$token = '';

	if (isset($_COOKIE['token'])) {
		$token = $_COOKIE['token'];
		$sql   = "select * from users where token = '$token'";
		$data  = executeResult($sql);
		if ($data != null && count($data) > 0) {
			return $data[0];
		}
	}

	return null;
}
