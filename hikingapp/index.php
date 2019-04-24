<?php
require('config.php');

$result = $conn->query('SELECT * FROM hikes');

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hikes</title>
    <link rel="stylesheet" href="basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>List of hikes</h1>
    <table width='100%' class='index' >
        <tr bgcolor='#B0E0E6' class='index' >
			<td class='index' >id</td>
			<td class='index' >hike</td>
            <td class='index' >difficulty</td>
            <td class='index' >distance</td>
            <td class='index' >duration</td>
            <td class='index' >height_difference</td>
			<td class='index' >update</td>
		</tr>

		<?php while($row = $result->fetch(PDO::FETCH_ASSOC))  {?>
		<tr class='index' >
				
			<td class='index' ><?php echo $row['id']?></td>
			<td class='index' ><?php echo $row['hike']?></td>
            <td class='index' ><?php echo $row['difficulty']?></td>
            <td class='index' ><?php echo $row['distance']?></td>
            <td class='index' ><?php echo $row['duration']?></td>
            <td class='index' ><?php echo $row['height_difference']?></td>
			<td class='index' >
				<a class='update' href="edit.php?id=<?php echo $row['id']?>">Edit |</a>
				<a class='update' href="delete.php?id=<?php echo $row['id']?>"> Delete</a>
			</td>
		</tr>
		<?php } ?>
    </table><br>

    <button><a href="insert.html">Add</a></button>
  </body>
</html>