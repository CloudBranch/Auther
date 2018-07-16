<?php
	
	/**
	* @author Joshua Whalen
	*/
	
	spl_autoload_register(function ($class_name) {
		include '../../' . $class_name . '.php';
	});
	
	$auther  = new auther();
	
	$unauthenticate = $auther->unauthenticate();
	
?>