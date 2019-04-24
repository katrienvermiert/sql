<?php

require('conn.php');

$city = $_GET['city'];

$sql = "DELETE FROM Weather WHERE city=:city";
$query = $conn->prepare($sql);
$query->execute([':city'=>$city]);
 
header("Location:index.php");

?>