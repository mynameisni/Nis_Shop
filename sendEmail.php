<?php
  	use PHPMailer\PHPMailer\PHPMailer;

	if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message'])) {
		$name = $_POST['name'];
	   	$subject = $_POST['subject'];
	   	$email = $_POST['email'];
	   	$phone = $_POST['phone'];
	   	$message = $_POST['message'];

	   	require_once "PHPMailer/PHPMailer.php";
	   	require_once "PHPMailer/SMTP.php";
	   	require_once "PHPMailer/Exception.php";

	   	$mail = new PHPMailer();

	   	//SMTP setting
	   	$mail -> isSMTP();
	   	$mail -> Host = "smtp.gmail.com";
	   	$mail -> SMTPAuth = true;
	   	$mail -> Username = 'phamthily.hd98@gmail.com';
	   	$mail -> Password = 'kangchoco1998';
		$mail -> Port = 465;
	   	$mail -> SMTPSecure = "ssl";

	   	//Email setting
	   	$mail -> isHTML(true);
	   	$mail -> setFrom($email, $name);
	   	$mail -> addAddress("phamthily.hd98@gmail.com");
	   	$mail -> Subject = $subject;
	   	$mail -> Body = "$phone $message";
		
	   	if($mail -> send()){
	   		$status = "Success";
	   		$response = "Email is sent!";
	   	} else {
	   		$status = "Failed";
	   		$response = "Something is wrong: <br>".$mail -> ErrorInfo;
	   	}
	   	exit(json_encode(array("status" => $status, "response" => $response)));
   }
?> 