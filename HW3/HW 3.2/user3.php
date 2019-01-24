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
		public function login($id)
		{			
			if(!empty($id))
			{										
				$sql='Select * from electives2 where id=?';
				$st=$this->db->prepare($sql);
				$st->execute([$id]);
				$user = $st->fetch();
				return $user;			
				
			}			
		}
		
	}