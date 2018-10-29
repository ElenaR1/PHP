http://localhost:8080/phpmyadmin/
otlqvo sa default-ni ; da ne gi triq

// na prepared statement mu podavash zaqvka (kato f-q ? )




<html>
	<head>
	<mera charset="utf-8">
	</head>
	
	<body>
		<p>
    	<?php
		$conn = new PDO('mysql:host=localhost;dbname=web', 'root', '');
		$sql = "SELECT * FROM users";
		//$sql = "SELECT * FROM MAJORS WHERE START_YEAR = $year"
		// Now lets say $year = "''; DROP DATABASE MAJORS;"
		$query = $conn->query($sql) ;
		
		while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
		echo $row['username'];
		echo "<br>";
		}
		?>
		
		</p>
	</body>


</html>












