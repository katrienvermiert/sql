<?php
$servername = "localhost";
$username = "root";
$password = "19Neirtak83";
$dbname = "weatherapp";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //set error mode as exception
}

catch(PDOExeption $e){
    echo $e->getMessage();
}
?>