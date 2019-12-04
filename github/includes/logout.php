<?php 
	include_once 'user_session.php';

	$userSession = new UserSession();
	$userSession->clossSession();

	header("location: ../index.php"); 

 ?>