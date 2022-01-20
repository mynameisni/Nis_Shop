<?php
	error_reporting(0);
    session_start();
    $conn = new mysqli ('localhost','root','','nis_shop') or die("Connection failed!");
    mysqli_query($conn, 'set names utf8');
	if(isset($_POST['email']) && isset($_POST['password'])) {
        $email=$_POST['email'];
        $pass=$_POST['password'];
        $pass = md5($pass) ;

        if(isset($_POST['login'])) {
            if($email=="" || $pass==""){
                $error1 = "Please enter a email and password.";
            } else {     
                $sql = "SELECT * FROM `user` WHERE email = '$email'"; 
                mysqli_query($conn,$sql) or die("Error"); 
                if (mysqli_num_rows($result) > 0) {
                    while ($r = mysqli_fetch_assoc($result)) {
                        print_r($r);
                        if($r["email"] == $email && $r["password"] == $pass){
                            if ($r["email"]=="admin@gmail.com") {
                                $_SESSION['name'] = $r["name"];
                                header('location: Admin/pages/home.php');
                                break;
                            } else {
                                $_SESSION['name'] = $r["name"];
                                header('location: index.php'); 
                                break;
                            }
                        } else if ($r["email"]==$email && $r["password"]!=$pass) {
                            $error2 = "Wrong the password.";
                            break; 
                        } else { 
                            $error3 = "Sorry! The account is incorrect.";
                        }
                    }
                }      
            }
        }
    }
    if(isset($_POST['r_email']) && isset($_POST['r_password']) && isset($_POST['r_name'])) {
        $r_email=$_POST['r_email'];
        $r_pass=$_POST['r_password'];
        $r_name=$_POST['r_name'];
    
        if (isset($_POST['register'])) {
            $sq1 = "SELECT email, name, password FROM `user` WHERE email = '$r_email'";
            $d1 = $conn->query($sq1);
            $r_pass = md5($r_pass);
            if ($r_email == "" || $r_name ==  "" || $r_pass ==  "" || strlen($r_pass) < 8) {
                $error4 = "Xin bạn hãy nhập đầy đủ thông tin";
            } else {
                foreach ($dl as $value) {
                    if ($value[0] == $r_email) {
                        $error5 = "This email is registered.";
                        $check = 0;
                        break;
                    }
                }
                if ($check == 1) {
                    $sql1 = "INSERT INTO `user` (`email`, `name`, `password`) VALUES ('$r_email','$r_name', '$r_pass')";
                    $dl1 = $conn->query($sql1);
                    $error6 = "Successful registration.";
                }
            }
        }
    }
?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="login.css">
</head>
<body>
		<div class="hero">
			<div class="form-box">
				<div class="button-box"> 
					<div id="btn"></div>
					<button type="button" class="toggle-btn" onclick="login()"> Log In </button>
					<button type="button" class="toggle-btn" onclick="register()"> Register </button>
				</div>
				<form id="login" class="input-group" action="" method="post">
                    <input class="input-field" name="error" value="<?php echo $erro1;?>">
					<input type="email" class="input-field" name="email" placeholder="Email">
					<input type="password" class="input-field" name="password" placeholder="Password">
					<!-- <input class="check-box" name="re_pass"><span> Remember Password</span> -->
                    <div class="check-box"></div>
					<button type="submit" class="submit-btn" name="login"> Log In </button>
				</form>
				<form id="register" class="input-group" action="" method="post">
					<input type="text" class="input-field" placeholder="Username" name="r_name">
					<input type="email" class="input-field" placeholder="Email" name="r_email">
					<input type="password" class="input-field" placeholder="Password" name="r_password">
                    <div class="check-box"></div>
					<!-- <input type="checkbox" class="check-box" name="comfirm"><span> I agree to the terms & conditions </span> -->
					<button type="submit" class="submit-btn" name="register"> Register </button>
				</form>
			</div>
		</div>
	<script type="text/javascript">
		var	x = document.getElementById("login");
		var y = document.getElementById("register");
		var z = document.getElementById("btn");
		function register(){
			x.style.left = "-400px";
			y.style.left = "50px";
			z.style.left = "110px";

		}
		function login(){
			x.style.left = "50px";
			y.style.left = "450px";
			z.style.left = "0";
			
		}
	</script>
</body>
</html>
		