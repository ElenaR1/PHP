
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






<?php
$host='Localhost';
$user='root';
$pass='';
$db='testdb';


//mysqli
/*$con=mysqli_connect($host,$user,$pass,$db);//connection
if($con)
	echo 'connected successfully';

//$sql="insert into mytable1 (username,password) values ('anna','abcfd')";
$sql = "SELECT * FROM username";
$query = $con->query($sql) or die("failed!");

//$query=mysqli_query($con,$sql);
if($query)
	echo 'data inserted successfully';

$row = $stmt->fetch();
*/

//DBO-https://www.afterhoursprogramming.com/tutorial/php/pdo/
//https://phpdelusions.net/pdo
try
{
	$handler=new PDO('mysql:host=localhost;dbname=testdb','root','');
	$handler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo $e->getMessage();
	die();
}


class GuestBookEntry{
	public $username,$password,$entry;
	public function __construct()
	{
		$this->entry=$this->username." has the following password:".$this->password;
	}
}


// ---------------------------------------------------

$sql='SELECT * FROM mytable1';//The $sql variable simply holds our SQL that we learned how to create in the SQL tutorials. 
$query=$handler->query($sql);
if($query->rowCount())
{
	echo $query->rowCount();
}
else
{
	echo 'no results';
}


/*while($r=$query->fetch())
{
	//echo print_r($r).'<br>';//Array ( [id] => 0 [0] => 0 [username] => john [1] => john [password] => 12345 [2] => 12345 ) 1
	echo $r['username'].'<br>';
}*/

/*while($r1=$query->fetch(PDO::FETCH_OBJ))
{
	echo $r1->username.'<br>';
}
*/

/*
$query->setFetchMode(PDO::FETCH_CLASS,'GuestBookEntry');//when the query is executed we'll get the field names back
while($r=$query->fetch())
{
	//echo '<pre>'.print_r($r).'</pre>';
	echo $r->entry.'<br>';
}
*/

//echo '<pre>',print_r($query->fetch()),'</pre>';//dava 1viq rezultat ot tablicata Array ( [id] => 0 [0] => 0 [username] => john [1] => john [password] => 12345 [2] => 12345 )
//echo'<br>';
//echo '<pre>',print_r($query->fetchAll()),'</pre>';//vrushta vsichki redove ot tablicata
//echo '<pre>',print_r($query->fetchAll(PDO::FETCH_ASSOC)),'</pre>';//SUSHTOTO KATO GORNOTO DAVA KATO REZULTAT


/*
$name="Maya";
$pass='5454';
$sql="INSERT INTO mytable1(id,username,password) VALUES (2,:name,:pass)";
//$handler->query($sql);
$query=$handler->prepare($sql);//we prepare a statement wit the values that we want to insert and afterwards I bind the values and execute the statement
//$query->execute(array(':name'=>$name,':pass'=>$pass));//we bind :name to $name and :pass to $pass

echo $handler->lastInsertId();
*/





$sql="select * from mytable1 where password=?";
$stmt = $conn->prepare($sql);
$stmt->execute(['fff']);
//$stmt->execute(['abcfd']);
//$rows = $stmt->fetch();
while($r=$stmt->fetch())
{
	//echo print_r($r).'<br>';//Array ( [id] => 0 [0] => 0 [username] => john [1] => john [password] => 12345 [2] => 12345 ) 1
	echo $r['username'].'<br>';
}

$sql2="insert into mytable1(id,username,password) values(3,:name,:pass)";
$stmt = $conn->prepare($sql2);
$id='3';
$name="henry";
$pass="popo";
$stmt->execute(array(':name'=>$name,':pass'=>$pass));





?>
