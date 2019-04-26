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
    session_start();
    require('config.php');

   if(isset($_POST['login'])){
       if(empty($_POST['username']) || empty($_POST['password'])){
           echo "One or more empty fields <br>";
           echo "<a href='login.php>Go back.</a>";
       } else {
           $sql = "SELECT * FROM user WHERE username = :username AND `password` = :`password`";
           $query = $conn->prepare($sql);
           $query->execute(['username' => $_POST['username']], ['password' => $_POST['password']]);

           if(!$query){
               header('location:login.php');
           } else {
               $_SESSION['username'] = $_POST['username'];
               header('location:home.php');
           }
       }
   }

    ?>

    <form action="" name='form1' method='POST' >
        <table>
            <tr>
                <td class='text'>username</td>
                <td><input type="text" name='username'></td>
            </tr>
            <tr>
                <td class='text'>password</td>
                <td><input type="password" name='password'></td>
            </tr>
            <tr>
                <td><button class='start'> <a href="index.html">startpagina</a> </button></td>
                <td><input class='login' type="submit" name='login' value='login'></td>
            </tr>
            <tr>
                
            </tr>
            
        </table>
    </form>
    </body>
</html>