<html>
    <head>
        <title>Add data</title>
    </head>
    <body>

    <?php
    require("conn.php");

    if(isset($_POST['Submit'])){
        $city = $_POST['city'];
        $max = $_POST['max'];
        $min = $_POST['min'];
   

    if(empty($city) || empty($max) || empty($min)){
        if(empty($city)){
            echo "<font color='red'>city field is empty.</font><br/>";
        }
        
        if(empty($max)){
            echo "<font color='red'>max temp field is empty.</font><br/>";
        }

        if(empty($min)){
            echo "<font color='red'>min temp field is empty.</font><br/>";
        }

        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";

    } else {
        $sql = "INSERT INTO Weather(city, high, low) VALUES (:city, :high, :low)";//first() reference column name db. second () reference new name.

        $query = $conn->prepare($sql);

        $query->bindparam(':city', $city);
        $query->bindparam(':high', $max);
        $query->bindparam(':low', $min);
        $query->execute();

        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
    ?>
    </body>
</html>

