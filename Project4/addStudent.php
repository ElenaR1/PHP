<?php

include_once('connection.php');

	class addStudent
	{
		private $db;

		public function __construct()
		{
			$this->db=new connection();
			$this->db=$this->db->dbConnect();
		}
		public function add($fn,$name,$psw)
		{
			
			$sql="SHOW COLUMNS FROM students like 'created_at'";
			$st=$this->db->prepare($sql);
			$st->execute();
			if($st->rowCount()==0)			
			{
				$sql="ALTER TABLE  `students` ADD  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP";	
				$stmt = $this->db->prepare($sql);
				$stmt->execute();				
			}
			
			
			
			if(!empty($fn)&&!empty($name)&&!empty($psw))
			{
				$st=$this->db->prepare("insert into students (fn,name,password) values (:fn,:name,:psw)");
				$st->execute([':fn'=>$fn,':name'=>$name, ':psw'=>$psw]);
				
			}		
		}
		public function addInfo($fn,$req_sc,$score,$score_date,$notes)
		{

				$st=$this->db->prepare("insert into scores (fn,required_score,score,score_date,notes) values (:fn,:req_sc,:score,:score_date,:notes)");
				$st->execute([':fn'=>$fn,':req_sc'=>$req_sc, ':score'=>$score,':score_date'=>$score_date,':notes'=>$notes]);
	
		}
		
	}