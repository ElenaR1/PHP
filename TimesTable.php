<html>
	<head>
	<mera charset="utf-8">
	</head>
	
	<body>
	<table style="width:100%">
  <tr>
    <th align="left">Firstname</th>
    <th align="left">Lastname</th> 
    <th align="left">Age</th>
  </tr>
  <tr>
    <td>Jill</td>
    <td>Smith</td>
    <td>50</td>
  </tr>
  <tr>
    <td>Eve</td>
    <td>Jackson</td>
    <td>94</td>
  </tr>
  <tr>
    <td>John</td>
    <td>Doe</td>
    <td>80</td>
  </tr>
</table>

		<p>
    	<?php
		
		
		
		
		echo '<table style="width:100%">';
		echo "<tr>";
		echo '<th align="left">Firstname</th>';
		echo  '<th align="left">Lastname</th>';
		echo '<th align="left">Age</th>';
		
		
		echo "<tr>";
		echo "<td>Jill</td>";
		echo "<td>Smith</td>";
		echo "<td>50</td>";
		echo "</tr>";
		
		echo "</table>";
		
		echo "<table>";
		
		
		echo "<br>";
		echo "<br>";
		echo "<table>";
		echo "<tr>";
		for($i=1; $i<=9; $i++)
		{
			
			echo "<th>".$i."</th>";
			
			//echo "<td>".$i."</td>";
		}	
		echo "</tr>";
		echo "</table>";
		
		
		echo "<br>";
		echo "<br>";
		//Each table row is defined with the <tr> tag. A table header is defined with the <th> tag. By default, table headings are bold and centered.
       //A table data/cell is defined with the <td> tag.
		//purvo i=1 i 1vite elementi na 1viq red sa i*j t.e 1*1, 1*2, 1*3.. i t.n. Posle i=2 i imame 2*1,2*@, 2*3..i t.n
		echo '<table style="width:30%"  border="1" cellpadding="10" bordercolor="black">';
			
		
		for($i=1; $i<=9; $i++){
			echo "<tr>";
			for($j=1;$j<=9;$j++){
				if($i==1 || $j==1)
				{
					//echo '<td><th align="left">'.$i*$j.'</th></td>';
					echo '<th style="background-color:rgb(192,192,192)">'.$i*$j.'</th>';
				}
				//if()
				else
				{
				echo '<td >'.$i*$j."</td>";
				}
			}
			echo "</tr>";
		}
		echo "</table>";
		
	
		
		?>

		</p>
		
	</body>


</html>
