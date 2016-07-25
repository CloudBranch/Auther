<?php

	require 'session.php';
	
	if(isset($_SESSION['user_id'])) {
		
		header('location:http://localhost/blueprint/Blueprint/PHP/account.php');
		exit();
		
	}
	
	$logout = isset($_GET['logout']) ? $_GET['logout'] : '';
	
	if($logout == "true") {
		
		echo '<h5 style="color:#309C4D;">Successfully logged out!</h5>';
		
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Landing Page</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width"/>
</head>
<body>

	<?php
		require_once 'nav.php';
	?>

	<h1>Landing page here.</h1>
	
</body>
</html>