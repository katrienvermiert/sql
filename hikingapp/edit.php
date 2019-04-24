<?php

require('config.php');

$id = $_GET['id'];
$sql = "SELECT * FROM hikes WHERE id = :id";
$query = $conn->prepare($sql);
$query->bindparam(':id', $id);
$query->execute();

while($row = $query->fetch(PDO::FETCH_ASSOC)){
    $hike = $row['hike'];
    $difficulty = $row['difficulty'];
    $distance = $row['distance'];
    $duration = $row['duration'];
    $height_difference = $row['height_difference'];
}

if(isset($_POST['update'])){
    $hike = $_POST['hike'];
    $difficulty = $_POST['difficulty'];
    $distance = $_POST['distance'];
    $duration = $_POST['duration'];
    $height_difference = $_POST['height_difference'];

    $sql = "UPDATE hikes SET hike=:hike, difficulty=:difficulty, distance=:distance, duration=:duration, height_difference=:height_difference WHERE id=:id";


    $query = $conn->prepare($sql);

    
    $query->bindparam(':id', $id);
    $query->bindparam(':hike', $hike);
    $query->bindparam(':difficulty', $difficulty);
    $query->bindparam(':distance', $distance);
    $query->bindparam(':duration', $duration);
    $query->bindparam(':height_difference', $height_difference);

    $query->execute();

    header('Location:index.php');
}


?>

<html>
    <head>
        <title>Add hikes</title>
        <link rel="stylesheet" href="basics.css" media="screen" title="no title" charset="utf-8">
    </head>
    <body>
        <form action="" name='form1' method='POST'>
            <table>
                <tr>
                    <td>hike</td>
                    <td><input type="text" name='hike' value='<?php echo $hike; ?>'></td>
                </tr>
                <tr>
                    <td>difficulty</td>
                    <td><input type="text" name='difficulty' value='<?php echo $difficulty; ?>'></td>
                </tr>
                <tr>
                    <td>distance</td>
                    <td><input type="text" name='distance' value='<?php echo $distance; ?>'></td>
                </tr>
                <tr>
                    <td>duration</td>
                    <td><input type="text" name='duration' value='<?php echo $duration; ?>'></td>
                </tr>
                <tr>
                    <td>height_difference</td>
                    <td><input type="text" name='height_difference' value='<?php echo $height_difference; ?>'></td>
                </tr>
                <tr>
                    <td><button><a href="index.php">Home</a></button></td>
                    <td><input class='submit' type="submit" name='update' value='update'></td>
                </tr>
                
            </table>
        </form>

    </body>
</html> 