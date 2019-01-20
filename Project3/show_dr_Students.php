<html>
	<head>
	<meta charset="utf-8">
	</head>
	
	<body>
	
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
</html>