<?php
	session_start();
	unset($_SESSION['name']);
	unset($_SESSION['name_admin']);
	unset($_SESSION["cart"]);
	header("location: index.php");
?>