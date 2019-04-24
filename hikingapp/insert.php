<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add hikes</title>
    <link rel="stylesheet" href="basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>

    <?php
    require('config.php'); 

   
        if(isset($_POST['submit'])){
            $hike = $_POST['hike'];
            $difficulty = $_POST['difficulty'];
            $distance = $_POST['distance'];
            $duration = $_POST['duration'];
            $height_difference = $_POST['height_difference'];

            if(empty($_POST['hike']) || empty($_POST['difficulty']) || empty($_POST['distance']) || empty($_POST['duration']) || empty($_POST['height_difference'])){
                echo "One or more empty fields. Try again.<br>";
                echo "<a class='update' href='insert.html'>Go Back</a>";
                
            }
             else {
                $sql = 'INSERT INTO hikes(hike, difficulty, distance, duration, height_difference)VALUES (:hike, :difficulty, :distance, :duration, :height_difference)';


                $query = $conn->prepare($sql);

                $query->bindparam(':hike', $hike);
                $query->bindparam(':difficulty', $difficulty);
                $query->bindparam(':distance', $distance);
                $query->bindparam(':duration', $duration);
                $query->bindparam(':height_difference', $height_difference);

                $query->execute();

                echo "Data added succesfully";
                echo "<a href='index.php'> View result</a>";

            }
        }
    

    ?>
  </body>
</html>