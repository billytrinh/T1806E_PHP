<?php session_start();
    session_destroy();
    ?>

<!DOCTYPE html>
<html>
<head>
	<title>Form login</title>
    <script type="text/javascript" src="jquery.js"></script>
</head>
<body>

	<form method="GET" action="get.php">
		<label>Email <input name="email" type="email"/></label>
		<label>Password <input name="password" type="password"/></label>
		<button type="submit">Submit</button>
	</form>
	<h1>Form Login</h1>
	<form id="postLogin" method="POST" action="post.php">
		<label>Username <input name="username" type="text"/></label>
		<label>Password <input name="password" type="password"/></label>
		<button type="button" onclick="postAjax()">Submit</button>
	</form>
    <script>
        function postAjax() {
            jQuery.ajax({
                url: "post.php",
                method: "POST",
                data:{
                    username: jQuery("#postLogin input[name='username']").val(),
                    password: jQuery("#postLogin input[name='password']").val(),
                },
                success: function (result) {
                    if(result == 1){
                        alert("Login success...");
                        window.location.href = "list.php";
                    }else {
                        alert("login fail");
                    }
                }
            });
        }
    </script>
</body>
</html>