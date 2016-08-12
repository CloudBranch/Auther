<?php
	
	/******************************************************
	------------------------Session------------------------
	******************************************************/
	
	// http://php.net/manual/en/book.session.php
	// http://php.net/manual/en/session.configuration.php
	
	$session_name = 'auther_session_id'; // The session name
	$lifetime = strtotime('+4 hours'); // Time until session expiration 4 hours equals 14,400 seconds
	$secure = false; // If set to true can only be sent over HTTPS
	$httponly = true; // If set to false the session cookie can be accessed by javascript
	//$same_site = SameSite=strict/lax <- use when available prevents CSRF attacks
	
	ini_set('session.use_only_cookies', 1); // Forces sessions to only use cookies.
	ini_set('session.entropy_file', '/dev/urandom'); // Better session id's
	ini_set('session.entropy_length', '512'); // Higher Entropy length for maximum security
	/* session.entropy_length specifies the number of bytes which will be read from the file specified above. Defaults to 32. Removed in PHP 7.1.0. */
	
	$cookieParams = session_get_cookie_params(); // Get current session cookie information
	session_set_cookie_params($lifetime, $cookieParams['path'], $cookieParams['domain'], $secure, $httponly); // Set the session cookie parameters
	session_name($session_name); // Set the session name
	session_start(); // Start the session
	
?>