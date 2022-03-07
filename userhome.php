<?php
    require_once 'baza.php';
    konektuj_se();
    session_start();
    if(!isset($_SESSION["username"])){
        header("location:index.php");
    }
    $korisnici=dohvati_sve_korisnike();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user home page</title>
    <link rel="stylesheet" href="defaultCSS.css" >
    <link rel="stylesheet" href="Table.css" >
    <link rel="stylesheet" href="nav.css" >
    <script src="https://kit.fontawesome.com/e3d2d34b95.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>


    <div class="topnav">
        <a href="logout.php">Log out</a>        
        <a href="useromehome.php" class="active"><i class="fa fa-fw fa-user" color="black"></i></i>Home</a>

    </div>
    <center>
        <h1>THIS IS USER HOME PAGE</h1><!--<?php //echo $_SESSION["username"]?>--->
        <div id="tabela">
            
            <?php
                echo '<table>';
                echo '<tr>';
                echo'<th>redni broj <br>korisnika</th>';
                echo'<th>korisnicko ime</th>';
                echo '</tr>';
    
                foreach ($korisnici as $korisnik){
                    echo '<tr>';
                    echo'<td>'. $korisnik['id']. '.</td>';
                    echo'<td>'. $korisnik['username']. '</td>';
                   
                }
            
                echo '</table>';
            ?>
    </div>
    </center>
    
    
</body>
</html>