<html>
	<head>
	<meta charset="utf-8">
	<link href="style_register.css" rel="stylesheet">
	<title>Output</title>
	</head>
	
	<body>
	<!--<img class="imagec" src="su_logo.jpg" style="margin-left:400px; margin-right:40px; margin-top:10px;margin-bottom:10px;" >
	<h1>Информация за студенти с опасност от отпадане</h1>-->
	<?php
	include_once('database_table.php');
   
	if(empty($_POST['fn']))
		{
			$object=new DBTable();
			$object->dr_students_course();
		}
	if(!empty($_POST['fn']))
	{
		$fn=$_POST['fn'];
		$object=new DBTable();
		$object->show_info($fn);
	}
		
	?>
	
	</body>


</html>
