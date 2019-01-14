 $host   = 'localhost';
    $db     = 'courseinfo';
    $user   = 'root';
    $pass   = '';
    $conn   = null;
	 try {
        $conn   = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    }
    catch(PDOException $Exc) {
        // Most probably db does not exist -> create it
        $mysql = new PDO("mysql:host=$host", $user, $pass);
        $pstatement = $mysql->prepare("CREATE DATABASE IF NOT EXISTS $db");
        $pstatement->execute();
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    }
	    if (!tableExists($conn, "students")) 
	{
        // Create the table
        $createQuery = "CREATE TABLE students
		(fn int(11) PRIMARY KEY,
        name VARCHAR(128) NOT NULL,
        password VARCHAR(128) NOT NULL,
        visibility int NOT NULL) COLLATE utf8_general_ci";
        
        $conn->query($createQuery);
		
		
    }
	$sql = "INSERT INTO students (fn, name, password,visibility)
		VALUES
		('81100', 'Todor Angelov', '1111','1'),
		('81101', 'Maria Ivanova', '2222','0')";
		$conn->query($sql);
		
		$sql="select * from students";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		while($row=$stmt->fetch())
		{
			echo ($row['fn']+5).'<br/>';
			
		}
	
	
	
	 function tableExists($pdo, $table) {
        try {
            $result = $pdo->query("SELECT 1 FROM $table LIMIT 1");
        } catch (Exception $e) {
            return FALSE;
        }

        return $result !== FALSE;
    }
