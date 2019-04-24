<?php

require('config.php');

$id = $_GET['id'];

$sql = "DELETE FROM hikes WHERE id=:id";
$query = $conn->prepare($sql);
$query->execute([':id'=>$id]);
 
header("Location:index.php");

?>