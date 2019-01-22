<html>
	<head>
	<meta charset="utf-8">
	<title>Form to fill</title>
	<link href="style_register.css" rel="stylesheet">
	</head>
	
	<body>
	<img class="imagec" src="su_logo.jpg" style="margin-left:400px; margin-right:40px; margin-top:10px;margin-bottom:10px;" >
<?php

include_once('connection.php');

	class DBTable
	{
		private $db;

		public function __construct()
		{
			$this->db=new connection();
			$this->db=$this->db->dbConnect();
		}
		public function add_a_row($t,$desc,$lect)
		{
			
			$sql="SHOW COLUMNS FROM electives like 'created_at'";
			$st=$this->db->prepare($sql);
			$st->execute();
			if($st->rowCount()==0)			
			{
				$sql="ALTER TABLE  `electives` ADD  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP";	
				$stmt = $this->db->prepare($sql);
				$stmt->execute();				
			}
			
			
			
			if(!empty($t)&&!empty($desc)&&!empty($lect))
			{
				$st=$this->db->prepare("insert into electives (title,description,lecturer) values (:t,:desc,:lect)");
				$st->execute([':t'=>$t,':desc'=>$desc, ':lect'=>$lect]);
				
			}
			
		}
		
		
		
		//shows the drop out students
		public function dr_students_course()
		{				
				echo '<h1>'.'Информация за студенти с опасност от отпадане'.'</h1>';
				echo '<br/>';
				echo 'С опасност от отпадане са тези студенти, които имат средно аритметично на домашните по-малко от '.'<strong>'. '50%'.'</strong>'.'
				или резултат на ревюто по-малък от'.'<strong>'. ' 30%'.'</strong>';
				$sql="select * from scores";
				$stmt = $this->db->prepare($sql);
				$stmt->execute();
				$count=0;
				$fn_of_students=array();
				$students_to_be_dropped_out=array();
				while($row=$stmt->fetch())
				{
					if(!in_array($row['fn'], $fn_of_students))
					{
					array_push($fn_of_students,$row['fn']);
					}
				}

				$size=sizeof($fn_of_students);

				// find the average score from the homeworks without taking into account the review
				$sql="select fn, AVG(score) from scores WHERE required_score!=? GROUP BY fn";
				$stmt = $this->db->prepare($sql);
				$stmt->execute(['Review']);
				while($row=$stmt->fetch())
				{

					if($row['AVG(score)']<50.0)
					{
						$students_to_be_dropped_out[$row['fn']]=$row['AVG(score)'];
					}
				}
											
				
				//find drop out students because of the review
				$rev_dr_stud=array();
				$sql="select * from scores where required_score=?";
				$stmt = $this->db->prepare($sql);
				$stmt->execute(['Review']);
				while($row=$stmt->fetch())
				{
					if($row['score']<30.0)
					{
						//echo $row['fn'].'<br/>';
						array_push($rev_dr_stud,$row['fn']);
					}
				}
				$size2=sizeof($rev_dr_stud);

				// find the average score from the homeworks of the students with a review problem($rev_dr_stud) without taking into account the review
				$j=0;
				while($j<$size2)
				{
				$sql="select fn, AVG(score) from scores WHERE required_score!=? AND fn=?";
				$stmt = $this->db->prepare($sql);
				$stmt->execute(['Review',$rev_dr_stud[$j]]);
					while($row=$stmt->fetch())
					{

							$students_to_be_dropped_out[$row['fn']]=$row['AVG(score)'];
					}
					$j++;
				}
				
				// print the students_to_be_dropped_out with their average score
				//print_r($students_to_be_dropped_out);
				echo '<br/>';
				//the keys of the students_to_be_dropped_out are their fn-s
				$keys=array_keys($students_to_be_dropped_out);
				$size=sizeof($students_to_be_dropped_out);
				$i=0;
				while($i<$size)
				{
				$sql2="select * from students where fn=?";
				$stmt2 = $this->db->prepare($sql2);
				$stmt2->execute([$keys[$i]]);
					while($row=$stmt2->fetch())
					{
						echo '<p style="color: white; background-color: rgb(151, 191, 13);font-size: 25px; width: 30%;
						 border-radius: 25px;text-align: center;">'.
							  $row[1]
							  .'</p>';
						echo "Факултетен номер: ". $row[0] . " | "."Име: " . $row[1] ." Средно аритметично от домашните: ".$students_to_be_dropped_out[$keys[$i]]."<br/>";
					}
					
				// print all the information about  the students_to_be_dropped_out with 
				$sql3="select * from scores where fn=?";
				$stmt3 = $this->db->prepare($sql3);
				$stmt3->execute([$keys[$i]]);
					while($row=$stmt3->fetch())
					{
						echo "Тип домашно: ".$row[2].' | Резултат: '.$row[3].' %'.' | Коментар: '.$row[5].'<br/>';
					}
					
					echo '<br/>';
					$i++;
				}
				
				
		}
		public function array_push_assoc($array, $key, $value)
		{
			$array[$key] = $value;
			return $array;
		}
		
		public function show_info($fn)
		{
			echo '<h1>'.'Информация за резултати и оценки'.'</h1>';
			$sql="select * from students where fn=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$fn]);
			while($row=$stmt->fetch())
				{					
					echo '<p style="color: white; background-color: rgb(151, 191, 13);font-size: 25px; width: 30%;
						 border-radius: 25px;text-align: center;">'.
							  $row[1]
							  .'</p>';
					echo 'Факултетен номер: ' .$row['fn'].' | Име: '.$row['name'].'<br/>';
				}
			$sql="select * from scores where fn=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$fn]);
			while($row=$stmt->fetch())
				{					
					echo "Тип домашно: ".$row[2].' Резултат: '.$row[3].' % '.'| Коментар: '.$row[5].'<br/>';
				}
				
			$drop=false;	
			$sql="select AVG(score) from scores where fn=? AND required_score!=? GROUP BY fn ";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$fn,'Review']);
			while($row=$stmt->fetch())
			{
					echo "Средно аритметично от домашните: ".$row['AVG(score)'].'<br/>';
					if($row['AVG(score)']<50.0)
					{
						echo "Студентът е с опасност от отпадане заради домашните.".'<br/>';
						$drop=true;
					}
					/*else
					{
						echo "Студентът не е с опасност от отпадане.".'<br/>';

					}*/
			}
			
			$sql="select * from scores where required_score=? AND fn=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute(['Review',$fn]);
			while($row=$stmt->fetch())
			{
				if($row['score']<30.0)
				{
					echo "Студентът е с опасност от отпадане заради ревюто.".'<br/>';
					$drop=true;
				}
				
			}
			
			if($drop==false)
			{
				echo "Студентът не е с опасност от отпадане.".'<br/>';
			}
	}
		
		
	}
?>
</body>


</html>