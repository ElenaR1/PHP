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
				/*$sql="UPDATE electives SET " .
                                "title = '" . $_POST["title"] . "', " . 
                                "description = '" . $_POST["description"] . "', " . 
                                "lecturer = '" . $_POST["lecturer"] . "' " . 
                                "WHERE id = " . $_POST["id"] . ";";*/
				$sql="UPDATE electives2 set title =?, description=?, lecturer=? where id=?";				
				if($_SERVER['REQUEST_METHOD']=='POST')
				{			
				//$st=$this->db->prepare("insert into electives (title,description,lecturer) values (:t,:desc,:lect)");
				//$st->execute([':t'=>$t,':desc'=>$desc, ':lect'=>$lect]);
				$st=$this->db->prepare($sql);
				$st->execute([$t,$desc,$lect,$id]);
				}
				else if($_SERVER['REQUEST_METHOD']=='GET')
				{
					echo $sql.'<br>';
				}
			}
			else
			{
				"enter".'<br>';
			}
		}
		
	}