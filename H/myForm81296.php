<?php
	$errors=array();

	if($_POST)
	{
	
	//start validation
		if(empty($_POST['courseName']))
		{
			$errors['courseName1']="Полето за името на курса е празно"; //associative array
		}
		if(strlen($_POST['courseName'])>150)
		{
			$errors['courseName2']="Името на курса не може да бъде повече от 150 символа"; //associative array
		}
		
		if(empty($_POST['teacherName']))
		{
			$errors['teacherName1']="Полето за името на преподавателя е празно"; 
		}
		if(strlen($_POST['teacherName'])>200)
		{
			$errors['teacherName2']="Името на преподавателя не може да бъде повече от 200 символа"; //associative array
		}
		
		if(empty($_POST['description']))
		{
			$errors['description1']="Полето за описание е празно"; 
		}
		if(strlen($_POST['description'])<10)
		{
			$errors['description2']="Описанието трябва да бъде повецче от 10 символа"; //associative array
		}
		
		if(empty($_POST['credits']))
		{
			$errors['credits1']="Полето за кредити е празно"; 
		}
		/*if(($_POST['credits'])<0)
		{
			$errors['credits2']="Кредитите трябва да бъдат цяло положително число"; //associative array
		}*/
		
		if(empty($_POST['typeOfCourse']))
		{
			$errors['typeOfCourse1']="Изберете група"; 
		}
		
		
		if(count($errors)==0)
		{
			header("Location: myTestpage81296.php");
			exit();
		}
	}
?> 




<html>
	<head>
	<meta charset="utf-8">
	<title>Form to fill</title>
	</head>
	
	<body>
	<!--<form action="myTestpage81296.php" method="post">  -->
	<!--  action="?" -->
	<form  method="POST" target="">
	
	<p>
	<label for="courseName">Име на курса: </label>
	<input type="text" name="courseName" id="courseName" value="<?php if(isset($_POST['courseName']))  echo $_POST['courseName']?>"/>
	</p>
	<p> <?php
	if (isset($errors['courseName1']))//isset vrushta true ako ne e null t.e ako imame greshka da vurne nujniq otgovor
	{
		echo $errors['courseName1'];
	}
	?>
	</p>
	<p> <?php
	if (isset($errors['courseName2']))//isset vrushta true ako ne e null t.e ako imame greshka da vurne nujniq otgovor
	{
		echo $errors['courseName2'];
	}
	?>
	</p>
	
	
	<p>
	<label for="teacherName">Име на преподавател: </label>
	<input type="text" name="teacherName" id="teacherName" value="<?php if(isset($_POST['teacherName'])) echo $_POST['teacherName']?>" />
	</p>
	<p> <?php
	if (isset($errors['teacherName1']))//isset vrushta true ako ne e null t.e ako imame greshka da vurne nujniq otgovor
	{
		echo $errors['teacherName1'];
	}
	?>
	</p>
	<p> <?php
	if (isset($errors['teacherName2']))//isset vrushta true ako ne e null t.e ako imame greshka da vurne nujniq otgovor
	{
		echo $errors['teacherName2'];
	}
	?>
	</p>
	
	<p>
	<label for="description">Описание: </label>
	<input type="text" name="description" id="description" value="<?php if(isset($_POST['description']))  echo $_POST['description']?>" />
	</p>
	<p> <?php
	if (isset($errors['description1']))//isset vrushta true ako ne e null t.e ako imame greshka da vurne nujniq otgovor
	{
		echo $errors['description1'];
	}
	?>
	</p>
	<p> <?php
	if (isset($errors['description2']))//isset vrushta true ako ne e null t.e ako imame greshka da vurne nujniq otgovor
	{
		echo $errors['description2'];
	}
	?>
	</p>
	
	<p>
	<label for="credits">Кредити: </label>
	<input type="number" name="credits" id="credits" min="1" value="<?php if(isset($_POST['credits']))  echo $_POST['credits']?>" />
	</p>
	<p> <?php
	if (isset($errors['credits1']))//isset vrushta true ako ne e null t.e ako imame greshka da vurne nujniq otgovor
	{
		echo $errors['credits1'];
	}
	?>
	</p>
	</p>
	<p> <?php
	if (isset($errors['credits2']))//isset vrushta true ako ne e null t.e ako imame greshka da vurne nujniq otgovor
	{
		echo $errors['credits2'];
	}
	?>
	</p>
	
	
	
	<p>
	<input type="radio" name="typeOfCourse"
	<?php if (isset($typeOfCourse) && $typeOfCourse=="М") echo "checked";?>
	value="М">М
	<input type="radio" name="typeOfCourse"
	<?php if (isset($typeOfCourse) && $typeOfCourse=="ПМ") echo "checked";?>
	value="ПМ">ПМ
	<input type="radio" name="typeOfCourse"
	<?php if (isset($typeOfCourse) && $typeOfCourse=="ОКН") echo "checked";?>
	value="ОКН">ОКН
	<input type="radio" name="typeOfCourse"
	<?php if (isset($typeOfCourse) && $typeOfCourse=="ЯКН") echo "checked";?>
	value="ЯКН">ЯКН	
	</p>
	<p> <?php
	if (isset($errors['typeOfCourse1']))//isset vrushta true ako ne e null t.e ako imame greshka da vurne nujniq otgovor
	{
		echo $errors['typeOfCourse1'];
	}
	?>
	</p>
	
	
	
	
	
	 <input type="submit" name="formSubmit" value="Submit"> 
	</form>
	</body>


</html>
