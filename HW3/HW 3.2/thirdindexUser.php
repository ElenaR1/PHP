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
		public function login($t,$desc,$lect,$id)
		{			
			if(!empty($t)&&!empty($desc)&&!empty($lect)&&!empty($id))
			{				
				
				$sql="UPDATE electives2 set title =?, description=?, lecturer=? where id=?";				
							
				$st=$this->db->prepare($sql);
				$st->execute([$t,$desc,$lect,$id]);
								
			}			
		}
		
	}