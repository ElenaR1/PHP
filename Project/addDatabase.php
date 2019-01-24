 <?php
 $host   = 'localhost';
    $db     = 'web';
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
		created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP) COLLATE utf8_general_ci";
        
        $conn->query($createQuery);
		
		
    }
	$sql = "INSERT INTO students (fn, name, password,created_at)
		VALUES
		('0', 'Teacher', 'teach12', '2019-01-20 12:58:37'),
('81100', 'Todor Angelov\r\n', '1111', '2019-01-20 12:58:37'),
('81101', 'Maria Ivanova\r\n', '2222', '2019-01-20 12:58:37'),
('81102', 'Zara Ivanova', '3333', '2019-01-20 12:58:37'),
('81103', 'Rumen Todorov', '4444', '2019-01-20 12:58:37'),
('81104', 'Petar Malinov', '5555', '2019-01-20 12:58:37'),
('81105', 'Silvia Pavlova', '6666', '2019-01-20 12:58:37'),
('81106', 'Alex Marchev', '7777', '2019-01-20 12:59:52'),
('81107', 'Ivan Karev', '8888', '2019-01-20 15:00:43'),
('81108', 'Mila Leeva', '9999', '2019-01-21 13:59:17'),
('81109', 'Petar Petrov', '1010', '2019-01-21 15:19:45')";


		$conn->query($sql);
		
	
		/*
		$sql="select * from students";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		while($row=$stmt->fetch())
		{
			echo ($row['fn']+5).'<br/>';
			
		}
	*/
	
	
	// Create the 'scores' table
        $createQuery2 = "CREATE TABLE scores
		(id int(11) PRIMARY KEY,
	  fn int(11) NOT NULL,
	  required_score VARCHAR(128) NOT NULL,
	  score int(11) NOT NULL,
	  score_date date NOT NULL,
	  notes VARCHAR(200) NOT NULL
		) COLLATE utf8_general_ci";
        
        $conn->query($createQuery2);
	
	$sql2="INSERT INTO `scores` (`id`, `fn`, `required_score`, `score`, `score_date`, `notes`) VALUES
		(1, 81100, 'Homework1', 30, '2018-11-09', '....'),
		(2, 81101, 'Homework1', 20, '2018-11-09', '...'),
		(3, 81100, 'Homework2', 30, '2018-11-14', '...'),
		(4, 81101, 'Homework2', 60, '2018-11-14', '..'),
		(5, 81100, 'Homework3', 60, '2018-11-22', '...'),
		(6, 81101, 'Homework3', 70, '2018-11-22', '...'),
		(7, 81102, 'Homework1', 30, '2018-11-09', '...'),
		(8, 81102, 'Homework2', 20, '2018-11-14', '...'),
		(9, 81102, 'Homework3', 80, '2018-11-15', '...'),
		(10, 81103, 'Homework1', 60, '2018-11-09', '...'),
		(11, 81103, 'Homework2', 60, '2018-11-14', '...'),
		(12, 81103, 'Homework3', 60, '2018-11-22', '...'),
		(13, 81100, 'Review', 70, '2018-12-12', 'good structure'),
		(14, 81101, 'Review', 60, '2018-12-12', 'the menu is not structured well'),
		(15, 81103, 'Review', 60, '2018-12-12', 'The structure of user.php is not good'),
		(17, 81104, 'Homework1', 80, '2018-11-08', '...'),
		(18, 81104, 'Homework2', 60, '2018-11-21', 'change the name of the user.php file'),
		(19, 81104, 'Homework3', 60, '2018-11-28', 'different name for the user class'),
		(20, 81104, 'Review', 20, '2019-01-16', 'not enough information'),
		(21, 81102, 'Review', 80, '2018-12-12', 'well done'),
		(22, 81105, 'Homework1', 60, '2018-11-08', '...'),
		(23, 81105, 'Homework2', 30, '2018-11-15', '...'),
		(24, 81105, 'Homework3', 30, '2018-11-22', '...'),
		(25, 81105, 'Review', 20, '2019-01-06', '...'),
		(26, 81106, 'Homework1', 70, '2018-07-07', '...'),
		(29, 81106, 'Homework2', 70, '2018-03-03', 'good structure'),
		(30, 81106, 'Homework3', 80, '2018-05-04', 'different name for the class'),
		(31, 81106, 'Review', 60, '2018-10-10', 'not enough information in section 2'),
		(32, 81107, 'Homework1', 60, '2018-04-10', '...'),
		(33, 81107, 'Homework2', 40, '2018-12-10', 'different name for the class'),
		(34, 81107, 'Homework3', 20, '2018-02-01', 'does not wotk properly'),
		(35, 81107, 'Review', 40, '2019-10-02', 'not enough information in section 3'),
		(36, 81100, 'Homework4', 30, '2018-02-11', 'the user class is not used  properly'),
		(39, 81108, 'Homework3', 60, '2018-10-20', 'different name for the class'),
		(40, 81108, 'Homework1', 90, '2018-10-06', 'good job'),
		(41, 81108, 'Homework2', 70, '2018-10-17', '...'),
		(42, 81108, 'Review', 60, '2018-12-12', 'not enough information in section 2'),
		(44, 81109, 'Homework1', 70, '2018-10-06', 'you do noy use <img> correctly')";
	
			$conn->query($sql2);

	
	 function tableExists($pdo, $table) {
        try {
            $result = $pdo->query("SELECT 1 FROM $table LIMIT 1");
        } catch (Exception $e) {
            return FALSE;
        }

        return $result !== FALSE;
    }
?>
