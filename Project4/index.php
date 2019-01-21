<?php
	include_once('connection.php');
	include_once('addStudent.php');


	$errors=array();
	$errors2=array();

	if($_POST)
	{	
		if (isset($_POST['add_formSubmit'])) 
		{
		$fn=$_POST['fn'];
		$name=$_POST['name'];
		$psw=$_POST['psw'];
		
		$object=new addStudent();
		$object->add($fn,$name,$psw);
		}
		else if (isset($_POST['addInfo_formSubmit'])) 
		{
		$fn=$_POST['fn'];
		$req_sc=$_POST['req_sc'];
		$score=$_POST['score'];
		$score_date=$_POST['score_date'];
		$notes=$_POST['notes'];
		
		$object=new addStudent();
		$object->addInfo($fn,$req_sc,$score,$score_date,$notes);
		}
	}
?> 
<html>
	<head>
	<meta charset="utf-8">
	<title>Form to fill for teacher</title>
	<link href="style_register.css" rel="stylesheet">
	</head>
	
	<body>
	<img class="imagec" src="su_logo.jpg" style="margin-left:400px; margin-right:40px; margin-top:10px;margin-bottom:10px;" >
	<h1>Добре дошли</h1>
	<p class="para1"> Напишете факултетния номер ва студента, за когото искате да видите информация и натиснете бутона или само натиснете бутона
					ако искате да видите студентите с опасност от изпадане. </p>
					
	<div class="container">	
	<h1>Търсене на информация</h1>
	<form action="show_dr_students.php" method="POST" target="" style="margin-left:40px; margin-right:40px;">

	<p>
	<label for="fn" class="label1"></label>
	<input type="number" name="fn" id="fn" min="1" placeholder='Факултетен номер:' />
	</p>
		
	<input type="submit" name="formSubmit" value="Потърси"> 
	</form>
	</div>
	
	<p class="para1"> За да добавите нов студент попълнете следната форма. </p>
	<div class="container">	
	<h1>Добавяне на студент</h1>
	<form  method="POST" target="" style="margin-left:40px; margin-right:40px;">

	<p>
	<label for="fn" class="label1"></label>
	<input type="number" name="fn" id="fn" min="1" required  placeholder='Факултетен номер на студента:' />
	</p>
	<p>
	<label for="name"> </label>
	<input type="text" name="name" id="name" required   placeholder='Име на студента:'/>
	</p>
	<p>
	<label for="psw"> </label>
	<input type="text" name="psw" id="psw" required  placeholder='Парола, която ще използва студента:'/>
	</p>
	<input type="submit" name="add_formSubmit" value="Добави студента"> 
	</form>
	</div>
	
	<p class="para1"> За да добавите допълнителна информация като резултати за даден студент попълнете следната форма. </p>
	<div class="container">	
	<h1>Добавяне на резултати на студент</h1>
	<form  method="POST" target="" style="margin-left:40px; margin-right:40px;">
	<p>
	<label for="fn"> </label>
	<input type="number" name="fn" id="fn" min="1" required placeholder='Факултетния номер на студента:'/>
	</p>
	<p>
	<label for="req_sc"> </label>
	<input type="text" name="req_sc" id="req_sc" required placeholder='Върху какво ще получи оценка студента:'/>
	</p>
	<p>
	<label for="score"> </label>
	<input type="number" name="score" id="score" min="0" required placeholder='Оценка на студента в проценти:'/>
	</p>
	<p>
	<label for="score_date">Напишете датата на оценяване: </label>
	<input type="date" name="score_date" id="score_date" required />
	</p>
	<p>
	<label for="notes"></label>
	<input type="text" name="notes" id="notes" required placeholder='Коментар: '/>
	</p>
	<input type="submit" name="addInfo_formSubmit" value="Добави резултатите на студента"> 
	</form>
	</div>
	
	
	</body>


</html>
