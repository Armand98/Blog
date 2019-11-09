<?php
	session_start();
	if(!isset($_SESSION['isLogged']))
		$_SESSION['isLogged'] = FALSE;
		
	include("header.php");
	include("info.php");
	include("footer.php")
?>
