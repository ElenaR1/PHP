<html>
	<head>
	<meta charset="utf-8">
	</head>
	
	<body>
		<p>
    	<?php
		echo '<table style="width:30%"  border="1" cellpadding="10" bordercolor="black">';
		for($i=1; $i<=9; $i++)
		{
			echo "<tr>";
			for($j=1;$j<=9;$j++)
			{
				if($i==1 || $j==1)
				{
					echo '<th style="background-color:rgb(192,192,192)">'.$i*$j.'</th>';
				}
				else
				{
				echo "<td>".$i*$j."</td>";
				}			
			}
			echo "</tr>";
		}
		echo "</table>";
			
		?>

		</p>
		
	</body>


</html>