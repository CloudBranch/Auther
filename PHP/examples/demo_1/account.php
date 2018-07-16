<?php
	
	/**
	* @author Joshua Whalen
	*/
	
	require '../../session.php';
	
	if(isset($_SESSION['id'])) {
		
		$title = 'Home';
		$new_user = isset($_GET['created']) ? $_GET['created'] : '';
		
		if($new_user == 'true') {
			
			echo '<h5 style="color:#309C4D;">Account Successfully created!</h5>';
			
		}
		
		include 'header.php';
		include 'nav.php';
		
		spl_autoload_register(function ($class_name) {
			include '../../' . $class_name . '.php';
		});
		
		$auther  = new auther();
		
		$getAuthenticated = $auther->getAuthenticated();
		
		echo $getAuthenticated['email'];
		
		//print_r($getAuthenticated);
		
		include 'footer.php';
		
	}
	else {
		
		header('location:http://localhost/Auther/PHP/examples/demo_1/index.php');
		
	}
	
?>