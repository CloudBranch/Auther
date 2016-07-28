<?php
	
	/******************************************************
	------------------------Session------------------------
	******************************************************/
	
	// http://php.net/manual/en/book.session.php
	// http://php.net/manual/en/session.configuration.php
	
	$session_name = 'auth_session_id'; // The session name
	$secure = false; // If set to true can only be sent over HTTPS
	$httponly = true; // If set to false the session cookie can be accessed by javascript
	$lifetime = 14400; // Time until expiration 14,400 seconds equals 4 hours
	$time = time() + $lifetime; // Lifetime of session cookie
	$past_time = time() - $lifetime; // Lifetime of session cookie
	
	ini_set('session.use_only_cookies', 1); // Forces sessions to only use cookies.
	ini_set('session.entropy_file', '/dev/urandom'); // Better session id's
	ini_set('session.entropy_length', '512'); // Higher Entropy length for maximum security
	/* session.entropy_length specifies the number of bytes which will be read from the file specified above. Defaults to 32. Removed in PHP 7.1.0. */
	
	$cookieParams = session_get_cookie_params(); // Get current session cookie information
	session_set_cookie_params($time, $cookieParams['path'], $cookieParams['domain'], $secure, $httponly); // Set the session cookie parameters
	session_name($session_name); // Set the session name
	session_start(); // Start the session
	
?>