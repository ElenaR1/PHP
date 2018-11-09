<?php
function __autoload($className) {
	$fileName = "{$className}.php";
	if (file_exists($fileName)) {
		require_once $className. '.php';
	} else {
		echo "err";
		// nema
	}
}


?>
<html>
	<head>
	<meta charset="utf-8">
	</head>
	
	<body>
	
	<?php
	//print_r($_POST);
	echo $_POST["courseName"];
	echo "success";

	echo "<br>";
	/*$obj=new request($_SERVER);
	$childobj=new GetRequest($_SERVER);
	echo $obj->getMethod()."<br>";
	echo $obj->getPath()."<br>";
	echo $obj->getURL()."<br>";
	print_r($childobj->getData($_SERVER['HTTP_REFERER']));*/
	
	

	
	
	?>
	
	</body>


</html>
