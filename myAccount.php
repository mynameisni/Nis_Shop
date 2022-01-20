<?php
	ob_start();
	if(!isset($_SESSION["name"])){
		header("location:login.php")
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> My Acoount </title>
</head>
<body>

</body>
</html>