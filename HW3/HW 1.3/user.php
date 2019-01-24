<?php

include_once('connection.php');

	class User
	{
		private $db;

		public function __construct()
		{
			$this->db=new connection();
			$this->db=$this->db->dbConnect();
		}
		public function login($t,$desc,$lect)
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
		
	}