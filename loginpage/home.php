

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Dokdo" rel="stylesheet">
    </head>
    <body>
        <div class="wrapper2"> 
            <div class="top">
                <div style='text-align:right'>
                    <button type='submit' class='logout'><a class='link' href='logout.php'>log out</a></button>
                </div>
            </div>

            <div class="bottom">
                <div>
                    <h1 style="text-align:center">
                        <?php
                        session_start();
                        if(isset($_SESSION['username'])){
                            echo "WELCOME ".$_SESSION['username'];
                        }
                        ?>
                    </h1>
                </div>
            </div>    
        </div>
    </body>
</html>