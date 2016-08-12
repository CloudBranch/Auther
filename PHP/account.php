<?php

	require 'session.php';

	if(isset($_SESSION['user_id'])) {
		
		$title = 'Home';
		$new_user = isset($_GET['created']) ? $_GET['created'] : '';
	
		if($new_user == 'true') {
			
			echo '<h5 style="color:#309C4D;">Account Successfully created!</h5>';
			
		}
		
		include 'header.php';
		include 'nav.php';
		
		echo 'Welcome, ' . $_SESSION['email'];
		
		include 'footer.php';
		
	}
	else {
		
		header('location:http://localhost/Auther/PHP/index.php');
	
	}

?>