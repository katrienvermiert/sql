<?php
require("conn.php");

$result = $conn->query("SELECT city, high, low FROM Weather");
?>

<html>
	<head>
		<title>Weather</title>
	</head>
	<body>
		<button style="background-color: powderblue; border-radius:10px; width:120px; height:30px;"><a href="insert.html" style="text-decoration:none; color:black;">add new data</a></button><br><br>

		<table width='90%'>
			<tr bgcolor='#CCCCCC'>
				<td>City</td>
				<td>Max temp</td>
				<td>Min temp</td>
				<td>Update</td>
			</tr>

		<?php while($row = $result->fetch(PDO::FETCH_ASSOC))  {?>
				<tr>
				
				<td><?php echo $row['city']?></td>
				<td><?php echo $row['high']?></td>
				<td><?php echo $row['low']?></td>
				<td>
					<a href="edit.php?city=<?php echo $row['city']?>">Edit</a>
					<a href="delete.php?city=<?php echo $row['city']?>">Delete</a>
				</td>
				</tr>
		<?php } ?>
		</table>
	</body>
</html>




