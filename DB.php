
//MYSQLI
<?php
$host='Localhost';
$user='root';
$pass='';
$db='testdb';

$con=mysqli_connect($host,$user,$pass,$db);//connection
if($con)
	echo 'connected successfully';

//$sql="insert into mytable1 (username,password) values ('anna','abcfd')";
$sql = "SELECT * FROM username";
$query = $con->query($sql) or die("failed!");

//$query=mysqli_query($con,$sql);
if($query)
	echo 'data inserted successfully';

$row = $stmt->fetch();

?>
