<html>
<head>
 <meta charset="utf-8">
 <title>Electives</title>
</head>
<body>
<?php

	function showPage($data,$pageId){
		$s= "";
			foreach($data as $a=>$b)
			{
				if($a==$pageId)
				{
				foreach($b as $c=>$d)
				{
					$arr[]=$d;
				}
				}
			}
			$s.="<h1>".$arr[0]."</h1><br>"."<h2>".$arr[2]."</h2><br>"."<p>".$arr[1]."</p><br>";
			return $s;
	}
	function showNav($data,$pageId){
		$s= "";
		$snew="";
			foreach($data as $a=>$b){
				if($a==$pageId){
					foreach($b as $c=>$d){
						if($c=="title"){
							$s=$d;
							$snew.= "<a href=\"?page=".$pageId."\" class=\"selected\"> ".$s."</a>"."<br>";
						}
					}
				}
				else{
					foreach($b as $c=>$d){
						if($c=="title"){
							$s=$d;
							$snew.= "<a href=\"?page=".$a."\"> ".$s."</a><br>";							
							}
					}		
				}
			}
			
			return "<nav> <br>".$snew."</nav>";
	}
	
	
	
	$data = [ 'webgl' => ['title' => 'Компютърна графика с WebGL', 'description' => '...', 'lecturer' => 'доц. П. Бойчев',],
			'go' => ['title' => 'Програмиране с Go','description' => '...','lecturer' => 'Николай Бачийски',]
			];
	
	echo showNav($data,'webgl');

	
	
?>
</body>
<html>