<?php
	require_once 'nav.php';
?>

<p>Log In</p>
			
<form method="post" action="authenticate.php">
	<input type="email" placeholder="Email" name="email" />
	<input type="password" placeholder="Password" name="password" />
	<input type="submit" value="Log In" name="submit" />
</form>