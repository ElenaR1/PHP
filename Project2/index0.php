<?php
	include_once('connection.php');
	include_once('database_table.php');


	$errors=array();
	$errors2=array();

	if($_POST)
	{	
		if (isset($_POST['teacher_formSubmit'])) 
		{
			if($_POST['teacher_psw']!='teach12')
			{
				$errors['teacher_psw']="error"; 
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
				echo 'The password is not correct or there is no such student in the database.'.'<br/>';
				//$errors2['student_psw']="The password is not correct or there is no such student in the database."; 
			}
			else if ($row=$st->fetch())
			{
				if($row['fn']!=$fn)
				{
					echo 'the fn is not correct'.'<br/>';
				}
				else
				{
					$object=new DBTable();
		$object->show_info($fn);
					//header("Location: student.php");
				}
			}
			
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
	Ако сте учител попълнете следната форма:
	<form method="POST" target="">	
	<p>	
	<label for="teacher_fn">Напишете факултетния си номер: </label>
	<input type="number" name="teacher_fn" id="teacher_fn" min="0" required />
	</p>
	<p>
	<label for="teacher_psw">Въведете парола: </label>
	<input type="password" name="teacher_psw" id="teacher_psw" required />
	</p>	
	<p> <?php
	if (isset($errors['teacher_psw']))
	{
		echo $errors['teacher_psw'];
	}
	?>	
	</p>
	<input type="submit" name="teacher_formSubmit" value="Submit"> 
	</form>
	
	Ако сте ученик попълнете следната форма:
	<form method="POST" target="">	
	<p>	
	<label for="student_fn">Напишете факултетния си номер: </label>
	<input type="number" name="student_fn" id="student_fn" min="0" required />
	</p>
	<p>
	<label for="student_psw">Въведете парола: </label>
	<input type="password" name="student_psw" id="student_psw" required />
	</p>	
	<p> <?php
	if (isset($errors2['student_psw']))
	{
		echo $errors2['student_psw'];
	}
	?>	
	</p>
	<input type="submit" name="student_formSubmit" value="Submit"> 
	</form>
	
	
	
	</body>


</html>
