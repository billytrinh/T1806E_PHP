<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<h1>Demo PHP - HTML</h1>
	<h1>http://10.22.185.142:8888/t1806e/demo.html</h1>
	<?php 
		//phpinfo();
		$x = 10;
	//	echo $x*$x;	
		$number = 10;
		$pi = 3.14;

		//echo $pi;

		$str = "hello world";

		$pi = "hello";

		//echo $pi;

		$arr = []; 
		$arr2 = array();

		$arr[] = 22;
		$arr[] = "number one";

		$arr[5]= [1,2,3,4];

		$arr["name"] =  "Le van nam";

		$obj = new stdClass();

		$obj->name = "hahaha";

		//echo $obj->name;

		//var_dump($arr);

		$user = [
			"name" => "Nguyen van anh",
			"age"  => 18,
			"tel"	=> "098282828",
			"birth" => "22/3/1999"
		];
		$rs = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=Hanoi,vn&appid=09a71427c59d38d6a34f89b47d75975c&units=metric");
		$rs = json_decode($rs);
			
	?>
	<h1><?php echo $user["name"]; ?></h1>
	<h2><?php echo $user["age"];?></h2>
	<h2><?php echo $user["tel"];?></h2>
	<h2><?php echo $user["birth"];?></h2>

	<h1>Weather</h1>
	<h2>City: <?php echo $rs->name;?></h2>
	<h2>Temp: <?php echo $rs->main->temp ?></h2>

</body>
</html>