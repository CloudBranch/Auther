<?php
	/******************************************************
	------------------Configuration---------------
	******************************************************/

	$session_name = 'auth_session_id';
	$secure = false;
	$httponly = true;
	$lifetime = 14400;
	$time = time() + $lifetime;
	ini_set('session.use_only_cookies', 1); // Forces sessions to only use cookies.
	ini_set('session.entropy_file', '/dev/urandom'); // better session id's
	ini_set('session.entropy_length', '512'); // and going overkill with entropy length for maximum security

	$cookieParams = session_get_cookie_params();
	session_set_cookie_params($time, $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
	session_name($session_name);
	session_start();
	//session_regenerate_id(true);

?>