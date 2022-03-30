<?php

     session_start();
     if(!isset($_SESSION["username"])){
         header("location:index.php");
     }
     require_once 'baza.php';
     konektuj_se();
     $imeIgre = "";
     if(isset($_POST['imeigre'])){
        $imeIgre=($_POST['imeigre']);
        dodajVrstuIgre($imeIgre);
     }
    
    error_reporting(E_ERROR | E_PARSE | E_NOTICE);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add game</title>
    <link rel="stylesheet" href="defaultCSS.css" >
    <link rel="stylesheet" href="Table.css" >
    <link rel="stylesheet" href="nav.css" >
    <link rel="stylesheet" href="DodajVrstIgre.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/e3d2d34b95.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/47e60dfc20.js" crossorigin="anonymous"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.5.js" type="text/javascript"></script>
</head>
<body>
    <div class="topnav">
            <a href="logout.php">Log out</a>
            <a href="DodajVrstIgre.php" class="active">Dodaj vrstu igre</a>
            <a href="addgame.php">Dodaj igru</a>
            <a href="adduser.php">Dodaj usera</a>
            <a href="adminhome.php"><i class="fa-solid fa-user-gear"></i>Home</a>
    </div>

    <div class="DodajVrstIgre">
        <form action="" method="Post">
            <label class="labele">ime igre</label>
            <br>
            <input type="text" name="imeigre" id="imeigre"/>
            <br>
            <br>
            <input type="submit" value="Dodaj igru">
        </form>
    </div>
</body>
</htmL>