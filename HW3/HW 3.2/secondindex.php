<?php
include_once('user3.php');

	$url=$_SERVER['REQUEST_URI'];
	//echo $url."<br>";
	$parts=parse_url($url);
	parse_str($parts['query'], $query);
	$id=$query['id'];
	//echo $id;
	
	$i=$id;
	$object=new User();
	$u=$object->Login($i);
	//print_r($u);
	if(empty($u))
	{
		echo 'Не съществува дисциплина с такова id. Моля, върнете се и изберето друго.';
	}
	
	
	$courseName=$u['title'];
	$teacherName=$u['lecturer'];
	$description=$u['description'];
	$id=$u['id'];
	
?> 



<html>
	<head>
	<meta charset="utf-8">
	<title>Showing the data with the chosen id</title>
	</head>
	
	<body>
	<form action="thirdindex.php" method="POST" target="">
	
	<p>
	<label for="courseName">Име на курса: </label>
	<input type="text" name="courseName" id="courseName" value="<?php echo $courseName?>"/>
	</p>
	
	
	<p>
	<label for="teacherName">Име на преподавател: </label>
	<input type="text" name="teacherName" id="teacherName" value="<?php echo $teacherName?>" />
	</p>

	
	<p>
	<label for="description">Описание: </label>
	<input type="text" name="description" id="description" value="<?php echo $description?>" />
	</p>

	<p>
	<label for="id">ID: </label>
	<input type="number" name="id" id="id" min="1" value="<?php echo $id?>" />
	</p>
	
	<br>	
	<input type="submit" name="formSubmit" value="Редактирай"> 
	</form>
	</body>


</html>
	
	
	

</html>