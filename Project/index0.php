
<html>
	<head>
	<meta charset="utf-8">
	<title>Form to fill</title>
	</head>
	
	<body>
	Ако сте учител попълнете следната форма:
	<form action="distribnute.php" method="POST" target="">	
	<p>	
	<label for="fn">Напишете факултетния си номер: </label>
	<input type="number" name="fn" id="fn" min="0" required />
	</p>
	<p>
	<label for="psw">Въведете парола: </label>
	<input type="password" name="psw" id="psw" required />
	</p>		
	<input type="submit" name="formSubmit" value="Submit"> 
	</form>
	
	
	
	</body>


</html>
