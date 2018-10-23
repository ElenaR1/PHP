<html>
	<head>
	<mera charset="utf-8">
	</head>
	
	<body>
		<p>
    	<?php
		
		function a(){
			echo "a";
		}
		
		function printArr($a)
		{
			foreach($a as $x)
			{
			echo $x;
			echo "<br>";
			}
		}
		
		function printAssociativeArray($a)
		{
			foreach($a as $x=>$x_value)
			{
			echo "key= ".$x." with val: ".$x_value."<br>";
			}
		}
		
		function printAssociativeArray2($a)
		{
			echo "\nLooping using for: \n"; 
			$keys = array_keys($a); 
			echo "The keys are: ";
			print_r($keys);
			echo "<br>";
			$round = count($a);  
			for($i=0; $i < $round; ++$i) 
			{ 
			echo $keys[$i] . ' ' . $a[$keys[$i]] . "<br>"; 
			}
		}
  


		
		function printMultidimensionalArray($arr)
		{
			$keys = array_keys($arr); 
			echo "The keys are: ";
			print_r($keys);
			echo "<br>";
			foreach($arr as $a=>$b)
			{
				echo "Course ". $a ." :";
				foreach($b as $c=>$d)
				{
				echo " ".$c. " = " .$d.".";
				}
				echo "<br>";
			}
		}
		
		function printMultidimensionalArray2($arr)
		{
			foreach($arr as $a=>$b)
			{
				foreach($b as $c=>$d)
				{
				echo $a[$b][$c]." ";
				}
				echo "<br>";
			}
		}
		
		function f($s){
			return "<h1>".$s.'s'."</h1>";
		}
		
		function showPage($data,$pageId){
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
			return "<h1>".$arr[0]."</h1>"."<br>"."<h2>".$arr[2]."</h2>"."<br>"."<p>".$arr[1]."</p>"."<br>";
		}
		
		
		
		
		
		
		
		
		$arrr=[1,2,3,4];
		$age=["Peter"=>35,"Ben"=>37,"Joe"=>43];
		//echo "Peter is ". $age["Peter"]." years old"."<br>";		  
/*$myArray = array( 'PersonalInfo'=>array('Name'=>'AJ','Age'=>14,'Sex'=>'M'),  'StudentInfo'=>array('school'=>'CUFE','city'=>'Bangalore','country'=>'India'));
		
		foreach($myArray as $a=>$b)
		{
			echo "My ". $a ." :";
			foreach($b as $c=>$d)
			{
			echo "My ".$c. " is " .$d.".";
			}
		*/
		echo "<br>";
		echo "<br>";
$data = [ 'webgl' => ['title' => 'Компютърна графика с WebGL', 'description' => '...', 'lecturer' => 'доц. П. Бойчев',],
'go' => ['title' => 'Програмиране с Go','description' => '...','lecturer' => 'Николай Бачийски',]
		];
		
		 
		 $arr=array(0=>array('ID'=>1, 'name'=>"Smith"), 1=>array('ID'=>2, 'name'=>"John"));

		foreach($arr as $arr1)
		{
			if(in_array(2,$arr1))
			{
			   echo "Yes found.. and the correspoding key is ".key($arr1)." and the employee is ".$arr1['name']."<br>";
			}
}
		 
		//echo $data['webgl']['title'].$data['webgl']['description'].$data['webgl']['lecturer']."<br>";
		 echo "------------------------------------------"."<br>";		
		//echo key($age);
		//echo "<br>";
		//echo f("cat");
		//echo "<br>";
		//echo "<br>";
		printMultidimensionalArray($data);
		echo "<br>";
			//	printMultidimensionalArray2($data); //NE RABOTI

		//echo "<br>";
		echo showPage($data,'go');
		//echo "<br>";
		echo "<br>";
		echo "<br>";
		//printAssociativeArray($age);
		//echo "<br>";
		//printAssociativeArray2($age);
		//echo "<br>";
		//printArr($arrr);
		echo "<br>";
		echo "<br>";
		echo "------------------------------------------";		
		//$pr="pr";
		//echo"this is \"$pr."\";
		$str = "Is your name O'Reilly?";
		$str2 = "he says she is \"fly lalal \"";
		$key="go";
		echo "he says she is \"fly\" lalal " . "<br>";
		echo "lalal \" ?page=".$key."\" ";//1vi kavichki za celiq string,2ri-za vutreshnite,koito iskame da se vijdat, 3tite za da zatvorim 1ta chast
		//na string-a t.k shte konkatenirame,4tete sa za da konkateniram 2rata chast na stringa, 5te sa za vutrehnite kav,koito iskame da sa vidimi i 6tete-za zatvarqne na string-a
		echo "<br>";
		echo addslashes($str);// Outputs: Is your name O\'Reilly?
		echo "<br>";
		echo ($str2);

		?>

		</p>
		<nav> 
  <a href="?page=webgl" class="selected"> Компютърна графика с WebGL </a> 
  <a href="?page=go"> Програмиране с Go </a> 
</nav>
	</body>


</html>
