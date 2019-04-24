<?php

require('conn.php');

$city = $_GET['city'];
$sql = 'SELECT * FROM Weather WHERE city= :city';
$query = $conn->prepare($sql);
$query->execute([':city'=>$city]);

foreach ($query as $row) {
$city = $row['city'];
$high = $row['high'];
$low = $row['low'];
}



if(isset($_POST['update'])){
    $city = $_POST['city'];
    $high = $_POST['high'];
    $low = $_POST['low'];


    $sql = "UPDATE Weather SET city=:cityupdate, high=:maxupdate, low=:minupdate WHERE city=:cityupdate";

    $query = $conn->prepare($sql);
    $query->bindParam(':cityupdate', $city);
    $query->bindParam(':maxupdate', $high);
    $query->bindParam(':minupdate', $low);
    $query->execute();

    header('Location: index.php');
   
}
?>

<html>
    <head>
        <title>Edit data</title>
    </head>
    <body>

        <a href="index.php">Home</a>
        <br/><br/>

        <form action="edit.php" name='form1' method='post'>
            <table>
            <tr>
                <td>city</td>
                <td><input type="text" name='city' value='<?php echo $city;?>'></td>
            </tr>    
            <tr>
                <td>max temp</td>
                <td><input type="number" name='high' value='<?php echo $high;?>'></td>
            </tr>
            <tr>
                <td>min temp</td>
                <td><input type="number" name='low' value='<?php echo $low;?>'></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name='update'></td>
            </tr>
            </table>
        </form>
    </body>
</html>