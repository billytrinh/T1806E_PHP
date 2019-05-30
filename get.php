<?php
    session_start();
 $email = $_GET["email"];
 $pass = $_GET["password"];
 $_SESSION["user_email"] =  $email;
 setcookie("user_password",$pass,time()+3600,"/");
?>
<!DOCTYPE html>
<html>
<head>
	<title>GET RESULT</title>
</head>
<body>
	<h1>Dang nhap thanh cong tai khoan: <?php echo $email;?></h1>
</body>
</html>