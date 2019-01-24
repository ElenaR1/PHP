<?php
$id=$_POST['id'];

?>


<html>
	<head>
	<meta charset="utf-8">
	<title>Update of the data with the chosen id</title>
	</head>
	
	<body>

	<form action="update.php" method="POST" target="">
	
	<p>
	<label for="Title">Име на курса: </label>
	<input type="text" name="title" id="title" >
	</p>

	
	
	<p>
	<label for="description ">Описание: </label>
	<input type="text" name="description" id="description">
	</p>
	
	
	<p>
	<label for="lecturer">Лектор: </label>
	<input type="text" name="lecturer" id="lecturer " >
	</p>

	
	<p>
	<label for="id">ID: </label>
	<input type="number" name="id" id="id" min="1" value="<?php echo $id?>" />
	</p>
	
	
	 <input type="submit" name="formSubmit" value="Запази промените"> 
	</form>
	</body>


</html>
