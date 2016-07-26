<?php

	require 'session.php';
	
	if(isset($_SESSION['user_id'])) {
		
		header('location:http://localhost/blueprint/PHP/account.php');
		exit();
		
	}
	
	$title = 'Landing Page';
	$logout = isset($_GET['logout']) ? $_GET['logout'] : '';
	
	if($logout == "true") {
		
		echo '<h5 style="color:#309C4D;">Successfully logged out!</h5>';
		
	}
	include 'header.php';
	include 'nav.php';
	
?>
<h1>Landing page here.</h1>
<?php
	include 'footer.php';
?>