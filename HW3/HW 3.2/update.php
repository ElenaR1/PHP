<?php
include_once('thirdindexUser.php');
	$errors=array();

	if($_POST)
	{
	
		if(empty($_POST['title']))
		{
			$errors['title1']="Полето за името на курса е празно"; 
		}
		if(strlen($_POST['title'])>150)
		{
			$errors['title2']="Името на курса не може да бъде повече от 150 символа"; 
		}
		
		if(empty($_POST['description']))
		{
			$errors['description1']="Полето за описание е празно"; 
		}
		if(strlen($_POST['description'])<10)
		{
			$errors['description2']="Описанието не може да бъде по-малко от 10 символа";
		}
		
		if(empty($_POST['lecturer']))
		{
			$errors['lecturer1']="Полето за името на лектора е празно"; 
		}
		if(strlen($_POST['lecturer'])>200)
		{
			$errors['lecturer2']="Името на лектора трябва да бъде повецче от 200 символа"; 
		}
		
		$title=$_POST['title'];
		$desc=$_POST['description'];
		$lect=$_POST['lecturer'];
		$i=$_POST['id'];
		$object=new User();
		$object->Login($title,$desc,$lect,$i);
		
		if($errors!=null){
			echo 'Моля, върнете се назад, за да попълните полетата правилно според показаните грешки'.'<br>';
		}
		
	}
	

	
?> 



<html>
	<head>
	<meta charset="utf-8">
	<title>Updated data</title>
	</head>
	
	<body>
	
	<form action="update.php" method="POST" target="">
	
	<p>
	<label for="title">Име на курса: </label>
	<input type="text" name="title" id="title" value="<?php if(isset($_POST['title'])) echo $_POST['title']; ?>"/>
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
	<label for="lecturer">Име на преподавател: </label>
	<input type="text" name="lecturer" id="lecturer" value="<?php if(isset($_POST['lecturer']))  echo $_POST['lecturer'];?>" />
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
	
	<p>
	<label for="description">Описание: </label>
	<input type="text" name="description" id="description" value="<?php if(isset($_POST['description'])) echo $_POST['description'];?>" />
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
	<label for="id">ID: </label>
	<input type="number" name="id" id="id" min="1" value="<?php echo $i?>" />
	</p>
	
	<br>	
	
	</form>
	</body>


</html>
	










