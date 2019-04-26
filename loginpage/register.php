<html>
    <head>
        <meta charset='utf-8'>
        <title>Register</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Dokdo" rel="stylesheet">
    </head>
    <body class='container'>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    ?>

    <?php

    require('config.php');

    if(isset($_POST['register'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        
        if(empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password)){
            echo "<font color='red'>One or more fields were empty. Try again!</font><br>";
            
        } else {
            $sql = "INSERT INTO user(firstname, lastname, email, username, `password`) VALUES (:firstname, :lastname, :email, :username, :password)";

            $query = $conn->prepare($sql);
            $query->bindParam(":firstname",$firstname);
            $query->bindParam(":lastname",$lastname);
            $query->bindParam(":email",$email);
            $query->bindParam(":username",$username);
            $query->bindParam(":password",$password);
            $query->execute();

          header('Location:index.html');
        }
    }
    ?>

    <form action="" name='form1' method='POST' >
        <table>
            <tr>
                <td class='text'>firstname</td>
                <td><input type="text" name='firstname'></td>
            </tr>
            <tr>
                <td class='text'>lastname</td>
                <td><input type="text" name='lastname'></td>
            </tr>
            <tr>
                <td class='text'>email</td>
                <td><input type="text" name='email'></td>
            </tr>
            <tr>
                <td class='text'>username</td>
                <td><input type="text" name='username'></td>
            </tr>
            <tr>
                <td class='text'>password</td>
                <td><input type="text" name='password'></td>
            </tr>
            <tr>
                <td><button class='start'> <a href="index.html">startpagina</a> </button></td>
                <td><input class='register' type="submit" name='register' value='register'></td>
            </tr>
            <tr>
                
            </tr>
            
        </table>
    </form>
    </body>
</html>