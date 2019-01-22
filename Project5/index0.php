<?php
	include_once('connection.php');
	include_once('database_table.php');


	$errors=array();
	$errors2=array();

	if($_POST)
	{	
		if (isset($_POST['teacher_formSubmit'])) 
		{
			if($_POST['teacher_psw']!='teach12' || $_POST['teacher_fn']!=0)
			{
				$errors['teacher_psw']="Грешна парола или факултетен номер"; 
			}
			
			
			if(count($errors)==0)
			{
				header("Location: index.php");
				exit();
			}
		}
		else
		{
			$stdent_psw=$_POST['student_psw'];
			$fn=$_POST['student_fn'];
			$db=new connection();
			$db=$db->dbConnect();
			$sql="SELECT * from students where password =?";
			$st=$db->prepare($sql);
			$st->execute([$stdent_psw]);
			if($st->rowCount()==0)	
			{	
				echo '<br/>';
				echo '<span style="color:#FF0000;text-align:center;">Паролата е неправилна или такъв студент не съществува в базата данни. Моля върнете се и попълнете формата отново</span>'.'<br/>';
				//$errors2['student_psw']="The password is not correct or there is no such student in the database."; 
			}
			else if ($row=$st->fetch())
			{
				if($row['fn']!=$fn)
				{
					echo '<br/>';
					echo '<span style="color:#FF0000;text-align:center;">Факултетния номер не съответства на зададената парола. Моля върнете се и попълнете формата отново</span> '.'<br/>';
				}
				else
				{
					$object=new DBTable();
					$object->show_info($fn);
					//header("Location: show_dr_Students.php");
				//exit();
				}
			}
			
			exit();
		}
	}
	
?> 
<html>
	<head>
	<meta charset="utf-8">
	<link href="style_register.css" rel="stylesheet">
	<title>Form to fill</title>
	</head>
	
	<body>
	
	<h1>Вход в студентска информационна система</h1>
	<p class="para1"> Ако сте учител попълнете следната форма: </p>
	
	<div class="container">	
	<h1>LogIn форма за учител</h1>
	
	<form method="POST" target="" style="margin-left:40px; margin-right:40px;">	
	<p>	
	<label for="teacher_fn"> </label>
	<input type="number" name="teacher_fn" id="teacher_fn" min="0" placeholder='Напишете факултетния си номер' required />
	</p>
	<p>
	<label for="teacher_psw"></label>
	<input type="password" name="teacher_psw" id="teacher_psw" placeholder='Въведете парола ' required />
	</p>	
	<p> <?php
	if (isset($errors['teacher_psw']))
	{
		echo $errors['teacher_psw'];
	}
	?>	
	</p>
	<input type="submit" name="teacher_formSubmit" value="Потвърди"> 
	</form>
	</div>
	
	<p class="para1">Ако сте ученик попълнете следната форма: </p>
	<div class="container">	
	<h1>LogIn форма за ученик</h1>
	<form method="POST" target="" style="margin-left:40px; margin-right:40px;">	
	<p>	
	<label for="student_fn"></label>
	<input type="number" name="student_fn" id="student_fn" min="0" placeholder='Напишете факултетния си номер' required />
	</p>
	<p>
	<label for="student_psw"></label>
	<input type="password" name="student_psw" id="student_psw" placeholder='Въведете парола ' required />
	</p>	
	<p> <?php
	if (isset($errors2['student_psw']))
	{
		echo $errors2['student_psw'];
	}
	?>	
	</p>
	<input type="submit" name="student_formSubmit" value="Потвърди"> 
	</form>
	</div>
	
	
	</body>


</html>
