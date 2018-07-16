<?php
	
	/**
	* @author Joshua Whalen
	*/
	
	require '../../session.php';
	
	if(isset($_SESSION['id'])) {
		
		header('location:http://localhost/Auther/PHP/examples/demo_1/account.php');
		exit();
		
	}
	
	$title = 'Landing Page';
	$logout = isset($_GET['logout']) ? $_GET['logout'] : '';
	
	if($logout == 'true') {
		
		echo '<h5 style="color:#309C4D;">Successfully logged out!</h5>';
		
	}
	include 'header.php';
	include 'nav.php';
	
	echo '<h1>Landing page here.</h1>';
	
	include 'footer.php';
	
?>