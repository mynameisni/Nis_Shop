<?php
	session_start();
	unset($_SESSION['name']);
	unset($_SESSION["cart"]);
	header("location: index.php");
?>