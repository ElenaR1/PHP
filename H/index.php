<?php
include_once('user.php');
	$errors=array();

	if($_POST)
	{
	
	//start validation
		if(empty($_POST['title']))
		{
			$errors['title1']="Полето за името на курса е празно"; //associative array
		}
		if(strlen($_POST['title'])>128)
		{
			$errors['title2']="Името на курса не може да бъде повече от 128 символа"; //associative array
		}
		
		if(empty($_POST['description']))
		{
			$errors['description1']="Полето за описание е празно"; 
		}
		if(strlen($_POST['description'])>1024)
		{
			$errors['description2']="Описанието не може да бъде повече от 1024 символа"; //associative array
		}
		
		if(empty($_POST['lecturer']))
		{
			$errors['lecturer1']="Полето за името на лектора е празно"; 
		}
		if(strlen($_POST['lecturer'])>128)
		{
			$errors['lecturer2']="Името на лектора трябва да бъде повецче от 128 символа"; //associative array
		}
		
		$title=$_POST['title'];
		$desc=$_POST['description'];
		$lect=$_POST['lecturer'];
		$object=new User();
		$object->Login($title,$desc,$lect);
		//echo date("Y-m-d H:i:s");
		
	}
?> 




<html>
	<head>
	<meta charset="utf-8">
	<title>Form to fill</title>
	</head>
	
	<body>

	<form action="index.php" method="POST" target="">
	
	<p>
	<label for="Title">Име на курса: </label>
	<input type="text" name="title" id="title" value="<?php if(isset($_POST['title']))  echo $_POST['title']?>"/>
	</p>
	<p> <?php
	if (isset($errors['title1']))
	{
		echo $errors['title1'];
	}
	?>
	</p>
	<p> <?php
	if (isset($errors['title2']))
	{
		echo $errors['title2'];
	}
	?>
	</p>
	
	
	<p>
	<label for="description ">Описание: </label>
	<input type="text" name="description" id="description" value="<?php if(isset($_POST['description'])) echo $_POST['description']?>" />
	</p>
	<p> <?php
	if (isset($errors['description1']))
	{
		echo $errors['description1'];
	}
	?>
	</p>
	<p> <?php
	if (isset($errors['description2']))
	{
		echo $errors['description2'];
	}
	?>
	</p>
	
	<p>
	<label for="lecturer">Лектор: </label>
	<input type="text" name="lecturer" id="lecturer " value="<?php if(isset($_POST['lecturer']))  echo $_POST['lecturer']?>" />
	</p>
	<p> <?php
	if (isset($errors['lecturer1']))
	{
		echo $errors['lecturer1'];
	}
	?>
	</p>
	<p> <?php
	if (isset($errors['lecturer2']))
	{
		echo $errors['lecturer2'];
	}
	?>
	</p>
	
	
	 <input type="submit" name="formSubmit" value="Submit"> 
	</form>
	</body>


</html>
