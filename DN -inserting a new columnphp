<?php
$host='Localhost';
$user='root';
$pass='';
$db='testdb';


try
{
	$conn=new PDO('mysql:host=localhost;dbname=testdb','root','');
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo $e->getMessage();
	die();
}


//correct
/*
$sql="ALTER TABLE  `mytable1` ADD  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP";
$conn->query($sql);

$created = date("Y-m-d H:i:s");
$sql1="INSERT INTO mytable1(id,username,password) VALUES (3,?,?)";
$stmt = $conn->prepare($sql1);
$stmt->execute(['sara','222']);
*/


//-------------------------------------------
//correct too
/*
$sql="ALTER TABLE  `users` ADD  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP";
$stmt = $conn->prepare($sql);
$stmt->execute();
*/



$sql1="INSERT INTO users(name,pass) VALUES (?,?)";
$stmt = $conn->prepare($sql1);
$stmt->execute(['sara','222']);


$sql="SHOW COLUMNS FROM users like 'Created'";
$stmt = $conn->prepare($sql);
$stmt->execute();

print_r($stmt->fetchAll());
echo '<br>';
echo 'size: '. sizeof($stmt->fetchAll()).'<br>';
echo 'rowCount: '. $stmt->rowCount().'<br>';

if($stmt->rowCount())
{
	echo $stmt->rowCount().'<br>';//vrushta 1
}
else
{
	echo 'no results';
}


//GRESHNO t.k razmerut e 0 vinagi
if(sizeof($stmt->fetchAll())!=0)
{
	echo 'si'.'<br>';
}
else 
	echo 'no'.'<br>';

//ili:
$query=$conn->query($sql);
if($query->rowCount())
{
	echo $query->rowCount().'<br>';
}
else
{
	echo 'no results';
}

/*Note that an INSERT ... ON DUPLICATE KEY UPDATE statement is not an INSERT statement, rowCount won't return the number or rows inserted or 
updated for such a statement.  For MySQL, it will return 1 if the row is inserted, and 2 if it is updated, but that may not apply to other databases.*/

//-----------------------------------


/*$result = mysql_query("SHOW COLUMNS FROM `mytable1` LIKE 'Created'");
$exists = (mysql_num_rows($result))?TRUE:FALSE;
if($exists) {
   echo 'exists';
}
else
	echo 'does not exist';*/

$sql="SHOW COLUMNS FROM mytable1 like 'Created'";
$stmt = $conn->prepare($sql);
$stmt->execute();
//print_r($stmt->fetchAll());
echo '<br>';
echo '<br>';
echo '<br>';
while($r=$stmt->fetch())
{
	echo '<pre>' ,print_r($r),'</pre>';
	//echo $r['username'].'<br>';
}














?>
