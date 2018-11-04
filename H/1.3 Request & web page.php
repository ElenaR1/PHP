
<html>
	<head>
	<meta charset="utf-8">
	<title>Request</title>
	</head>
	
	<body>
	
	<?php
	class request{
		public $arr;
		public function __construct($arrServer)
		{
			$this->arr=$arrServer;
		}
		public function getMethod()
		{
			return strtolower($this->arr['REQUEST_METHOD']);
		}
		public function getPath()
		{
			return $this->arr['SCRIPT_NAME'];
		}
		public function getURL()
		{
			return $this->arr['HTTP_REFERER'];
		}
		public function getUserAgent()
		{
			return $this->arr['HTTP_USER_AGENT'];
		}
	}
	
	
	class GetRequest extends request{
		
		public function getData($url)
		{			
			$url=$this->arr['HTTP_REFERER'];
			$parts=parse_url($url);
			parse_str($parts['query'], $query);
			return $query;			
		}
	}
	
	?>
	
	</body>


</html>








//file v koito suzdavam web stranica
<?php
	$errors=array();
	if($_POST)
	{
	
	//start validation
		if(empty($_POST['firstName']))
		{
			$errors['firstName1']="first name cannot be empty"; //associative array
		}
		if(strlen($_POST['firstName'])<2)
		{
			$errors['firstName2']="your first name is too short"; //associative array
		}
		
		if(empty($_POST['lastName']))
		{
			$errors['lastName1']="last name cannot be empty"; 
		}
		if(strlen($_POST['lastName'])<2)
		{
			$errors['lastName2']="your last name is too short"; //associative array
		}
		
		if(empty($_POST['email']))
		{
			$errors['email1']="email cannot be empty"; 
		}
		if(strlen($_POST['email'])<4)
		{
			$errors['email2']="your email is too short"; //associative array
		}
		
		if(empty($_POST['password']))
		{
			$errors['password1']="password cannot be empty"; 
		}
		if(strlen($_POST['password'])<4)
		{
			$errors['password2']="your password is too short"; //associative array
		}
		
		if(count($errors)==0)
		{
			header("Location: indexTestpage.php");
			exit();
		}
	}
?> 



<html>
	<head>
	<meta charset="utf-8">
	</head>
	
	<body>
	<!--<form action="indexTestpage.php" method="post">  -->
	<form method="post" target="">
	
	<p>
	<label for="firstName">First Name: </label>
	<input type="text" name="firstName" id="firstName" value="<?php if(isset($_POST['firstName']))  echo $_POST['firstName']?>"/>
	</p>
	<p> <?php
	if (isset($errors['firstName1']))//isset vrushta true ako ne e null t.e ako imame greshka da vurne nujniq otgovor
	{
		echo $errors['firstName1'];
	}
	?>
	</p>
	<p> <?php
	if (isset($errors['firstName2']))//isset vrushta true ako ne e null t.e ako imame greshka da vurne nujniq otgovor
	{
		echo $errors['firstName2'];
	}
	?>
	</p>
	
	
	<p>
	<label for="lastName">Last Name: </label>
	<input type="text" name="lastName" id="lastName" value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']?>" />
	</p>
	<p> <?php
	if (isset($errors['lastName1']))//isset vrushta true ako ne e null t.e ako imame greshka da vurne nujniq otgovor
	{
		echo $errors['lastName1'];
	}
	?>
	</p>
	<p> <?php
	if (isset($errors['lastName2']))//isset vrushta true ako ne e null t.e ako imame greshka da vurne nujniq otgovor
	{
		echo $errors['lastName2'];
	}
	?>
	</p>
	
	<p>
	<label for="email">Email </label>
	<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email']?>" />
	</p>
	<p> <?php
	if (isset($errors['email1']))//isset vrushta true ako ne e null t.e ako imame greshka da vurne nujniq otgovor
	{
		echo $errors['email1'];
	}
	?>
	</p>
	<p> <?php
	if (isset($errors['email2']))//isset vrushta true ako ne e null t.e ako imame greshka da vurne nujniq otgovor
	{
		echo $errors['email2'];
	}
	?>
	</p>
	
	<p>
	<label for="password">Password: </label>
	<input type="password" name="password" id="password" value="<?php if(isset($_POST['password']))  echo $_POST['password']?>" />
	</p>
	<p> <?php
	if (isset($errors['password1']))//isset vrushta true ako ne e null t.e ako imame greshka da vurne nujniq otgovor
	{
		echo $errors['password1'];
	}
	?>
	</p>
	</p>
	<p> <?php
	if (isset($errors['password2']))//isset vrushta true ako ne e null t.e ako imame greshka da vurne nujniq otgovor
	{
		echo $errors['password2'];
	}
	?>
	</p>
	
	 <input type="submit" name="formSubmit" value="Submit"> 
	</form>
	</body>


</html>









//file v koito vikam request i mi se zarejda stranicata
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
