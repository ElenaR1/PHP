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
				//print_r($fn_of_students);
				//echo '<br/>';
				$size=sizeof($fn_of_students);
				//echo ' size: '. $size.'<br/>';
				
				$sql="select fn, AVG(score) from scores GROUP BY fn";
				$stmt = $this->db->prepare($sql);
				$stmt->execute();
				while($row=$stmt->fetch())
				{
					//echo $row['AVG(score)'].'<br/>';
					//echo print_r($row).'<br>'; Array ( [fn] => 81100 [0] => 81100 [AVG(score)] => 40.0000 [1] => 40.0000 ) 1
					if($row['AVG(score)']<50.0)
					{
						//echo $row['fn'];
						//array_push($students_to_be_dropped_out,$row['fn']);
						$students_to_be_dropped_out[$row['fn']]=$row['AVG(score)'];
					}
				}
				echo "Студенти с опасност от изпадане:".'<br/>';
				print_r($students_to_be_dropped_out);
				echo '<br/>';
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
						//print_r($row);
						echo "Факултетен номер: ". $row[0] . " | "."Име: " . $row[1] ." Средно аритметично от домашните: ".$students_to_be_dropped_out[$keys[$i]]."<br/>";
					}
				$sql3="select * from scores where fn=?";
				$stmt3 = $this->db->prepare($sql3);
				$stmt3->execute([$keys[$i]]);
					while($row=$stmt3->fetch())
					{
						echo "Тип домашно: ".$row[2].' Резултат: '.$row[3].'%'.'<br/>';
					}
					
					
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
			$sql="select * from students where fn=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$fn]);
			while($row=$stmt->fetch())
				{					
					echo 'Факултетен номер: ' .$row['fn'].' | Име: '.$row['name'].'<br/>';
				}
			$sql="select * from scores where fn=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$fn]);
			while($row=$stmt->fetch())
				{					
					echo "Тип домашно: ".$row[2].' Резултат: '.$row[3].'%'.'<br/>';
				}
				
			$sql="select AVG(score) from scores where fn=? GROUP BY fn ";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$fn]);
			while($row=$stmt->fetch())
			{
					echo "Средно аритметично от домашните: ".$row['AVG(score)'].'<br/>';
					if($row['AVG(score)']<50.0)
					{
						echo "Студентът е с опасност от отпадане.".'<br/>';
					}
					else
					{
						echo "Студентът не е с опасност от отпадане.".'<br/>';

					}
			}
		}
		
		
	}