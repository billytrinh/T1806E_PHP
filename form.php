<!DOCTYPE html>
<html>
<head>
	<title>Form login</title>
</head>
<body>
	<h1>Form get</h1>
	<form method="GET" action="get.php">
		<label>Email <input name="email" type="email"/></label>
		<label>Password <input name="password" type="password"/></label>
		<button type="submit">Submit</button>
	</form>
	<h1>Form post</h1>
	<form method="POST" action="post.php">
		<label>Email <input name="email" type="email"/></label>
		<label>Password <input name="password" type="password"/></label>
		<button type="submit">Submit</button>
	</form>
</body>
</html>