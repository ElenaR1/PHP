
for ($i = 1; $i <= 10; $i++)
{
	echo $i.'<br>';
}
?>

	
//ARRAYS
<?php

$food=array("Pasta","salad","pizza");
print_r($food);
echo"<br>";
echo $food[1];
echo"<br>";

$food2=array("Pasta"=>300,"salad"=>150,"pizza"=>600);
print_r($food2);
echo "<br>";
echo $food2["Pasta"];


echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

// One way to create an indexed array 
$name_one = array("Zack", "Anthony", "Ram", "Salim", "Raghav"); 
  
// Accessing the elements directly 
echo "Accessing the 1st array elements directly:\n"; 
echo $name_one[2], "\n"; 
echo $name_one[0], "\n"; 
echo $name_one[4], "\n"; 
  
// Second way to create an indexed array 
$name_two[0] = "ZACK"; 
$name_two[1] = "ANTHONY"; 
$name_two[2] = "RAM"; 
$name_two[3] = "SALIM"; 
$name_two[4] = "RAGHAV"; 
  
  
  // \n doesn't work ??? 
// Accessing the elements directly 
echo "Accessing the 2nd array elements directly:\n"; 
echo $name_two[2], "\n"; 
echo $name_two[0], "\n"; 
echo $name_two[4], "\n"; 

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
// One way of Looping through an array usign foreach 
echo "Looping using foreach: \n"; 
foreach ($name_one as $val){ 
    echo $val. "\n"; 
} 
  
// count() function is used to count  
// the number of elements in an array 
$round = count($name_two);  
echo "\nThe number of elements are $round \n"; 
  
// Another way to loop through the array using for 
echo "Looping using for: \n"; 
for($n = 0; $n < $round; $n++){ 
    echo $name_two[$n], "\n"; 
} 

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

// One way to create an associative array 
$name2 = array("Zack"=>"Zara", "Anthony"=>"Any",  
                  "Ram"=>"Rani", "Salim"=>"Sara",  
                  "Raghav"=>"Ravina"); 

				  // Looping through an array using foreach 
echo "Looping using foreach: \n"; 
foreach ($name2 as $val => $val_value){ 
    echo "Husband is ".$val." and Wife is ".$val_value."<br>"; 
} 
  
// Looping through an array using for 
echo "\nLooping using for: \n"; 
$keys = array_keys($name2); 
echo "The kys are: ";
print_r($keys);
echo "<br>";
$round = count($name2);  
  
for($i=0; $i < $round; ++$i) { 
    echo $keys[$i] . ' ' . $name2[$keys[$i]] . "<br>"; 
	
	//only the women
	echo "The women". "<br>";
	for($i=0;$i<$round;$i++)
	{
		echo $name2[$keys[$i]]."<br>";
	}
} 
	
echo "<br>";
echo "<br>";
echo "<br>";
$cars = array("Volvo", "BMW", "Toyota");
echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . "."."<br>";	
echo "Num of cars: ". count($cars). "<br>";		
echo "<br>";
echo "<br>";
echo "<br>";
$age=array("Peter"=>35,"Ben"=>37,"Joe"=>43);
echo "Peter is ". $age["Peter"]." years old"."<br>";		  
foreach($age as $x=>$x_value)
{
	echo "key= ".$x." with val: ".$x_value."<br>";
}
$c=count($age);
echo $c."<br>";
echo "<br>";
$keys = array_keys($age); 
for($i=0; $i < $c; ++$i)
{
	echo "key: ".$keys[$i]." val: ".$age[$keys[$i]]."<br>";
}

echo "<br>";
echo "<br>";
echo "<br>";




?>
