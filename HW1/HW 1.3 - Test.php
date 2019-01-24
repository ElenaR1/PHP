<?php
include_once('Homework 1.3 -Request81296.php');
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
	//print_r($_GET);
	echo "success";
	//echo $_SERVER['SCRIPT_NAME'];
	//echo $_SERVER['REQUEST_METHOD'];
	//echo($_GET["firstName"]);
	echo "<br>";
	$obj=new request($_SERVER);
	$childobj=new GetRequest($_SERVER);
	echo $obj->getMethod()."<br>";
	echo $obj->getPath()."<br>";
	echo $obj->getURL()."<br>";
	//echo $obj->getUserAgent()."<br>";
	print_r($childobj->getData($_SERVER['HTTP_REFERER']));
	
	
	
	
	
	
	
	/*$url=$_SERVER['HTTP_REFERER'];
	echo $url."<br>";
	$parts=parse_url($url);
	echo "parts: ";
	print_r($parts);
	echo"<br>";
	parse_str($parts['query'], $query);
	print_r($query);
	echo "<br>";*/
	
	//print_r( $url['query']);
	//print_r parse_url($s);
	
	
	
	
	?>
	
	</body>


</html>
</html>
