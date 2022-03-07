<?php

     session_start();
     if(!isset($_SESSION["username"])){
         header("location:index.php");
     }
     require_once 'baza.php';
     konektuj_se();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add game</title>
    <link rel="stylesheet" href="defaultCSS.css" >
    <link rel="stylesheet" href="Table.css" >
    <link rel="stylesheet" href="nav.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/e3d2d34b95.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="topnav">
            <a href="logout.php">Log out</a>
            <a href="addgame.php" class="active">Dodaj igru</a>
            <a href="adduser.php">Dodaj usera</a>
            <a href="adminhome.php">Home</a>
    </div>
    <h1>DODAJ igru</h1>

    <div id="forma">
        <form action="#" method="POST">
             <input type="date" name="datum">
             <input type=""

        </form>
    </div>
</body>
</html>