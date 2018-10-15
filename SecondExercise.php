<html>
	<head>
	</head>
	
	<body>
		<p>
    	<?php
			echo "aa"
	    ?>
		</p>
	</body>


</html>
////////////////////
<html>
	<head>
	</head>
	
	<body>
		<p>
    	<?= "aa"?>
		</p>
	</body>


</html>
/////////////
<html>
	<head>
	<mera charset="utf-8">
	</head>
	
	<body>
		<p>
    	<?php
		
		$x=5;
		$name="gosho";
		
		$mes= "здрасти ".$name." , koito si na vuzrast ".$x."<br>";
		echo "hi {$name}";
		
		?>
		<div></dive>
		<?=$mes?>
		</p>
	</body>


</html>




///////////////////////////////////////////////////////////////////////
<?php
	//declare(strict_types=1);
	//require_once"web2/sn.php";
	spl_autoload_register(function($className){ // самозарежда всичко,
	include $className . '.php'; // което ни потрябва
});
	
	use web2;
?>
<html>
	<head>
	<mera charset="utf-8">
	</head>
	
	<body>
		<p>
    	<?php
		$user=new User("123a","gosho");
		
		$mes="hi, {$user->getName()} with id {$user->getId()}";
		echo $mes;
		?>
		
		</p>
	</body>


</html>

//second file:
<?php
namespace web2;
	class User
	{
		private $id;
		private $name;
		//konstruktor
		public function __construct(string $id,string $name)
		{
			$this->id=$id;//taka se referira poleto
			$this->name=$name;
		}
		
		public function getId():string
		{
			return $this->id;
		}
		public function getName():string
		{
			return $this->name;
		}
	}

