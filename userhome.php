<?php
    require_once 'baza.php';
    konektuj_se();
    session_start();
    if(!isset($_SESSION["username"])){
        header("location:index.php");
    }
    $korisnici=dohvati_sve_korisnike();
    $igre = dohvati_sve_igre();
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
    <?php
    $sql = "select * from login";
    $result = mysqli_query($konekcija,$sql);
    $count = mysqli_num_rows($result);
    
                echo'<p style="color:white; float:left; margin-left: 10px;">ukupan broj korisnika je&nbsp' .$count.' &nbsp</p>';
    $sql = "select * from igre1";
    $result = mysqli_query($konekcija,$sql);
    $count = mysqli_num_rows($result);
            
                echo'<p style="color:white; float:left; margin-left: 5px;">ukupan broj odigranih igara je&nbsp' .$count.'</p>';
            ?>
        <a href="logout.php">Log out</a>        
        <a href="useromehome.php" class="active"><i class="fa fa-fw fa-user" color="black"></i></i>Home</a>

    </div>
    <center>
    <h1>OVO JE USER POCETNA<br>TRENUTNI ULOGOVANI USER JE:<?php echo $_SESSION["username"]?>.</h1>
        
        <div id="tabela" style="float:left; margin-left:40px;">
            
            <?php
                echo '<table>';
                echo '<tr>';
                echo'<th>redni broj <br>korisnika</th>';
                echo'<th>korisnicko ime</th>';
                echo'<th>broj<br>Pobeda</th>';
                echo'<th>pozicija <br>na tabeli</th>';
                echo '</tr>';
    
                $rank =1;
                foreach ($korisnici as $korisnik){
                    echo '<tr>';
                    echo'<td>'. $korisnik['id']. '.</td>';
                    echo'<td>'. $korisnik['username']. '</td>';
                    echo'<td>'.$korisnik['brPobeda'].'</td>';
                    echo'<td>'.$rank.'</td>';
                    $rank++;
                    echo'</tr>';
                }
            
                echo '</table>';
            ?>
    </div>
    <div id="tabela" style="float:right; margin-right:40px;">
    <?php
                echo '<table>';
                echo '<tr>';
                echo'<th>redni broj <br>igre</th>';
                echo'<th>datum igre</th>';
                echo'<th>igraci</th>';
                echo'<th>pobednik</th>';
                echo'<th>tip igre</th>';
                echo '</tr>';
    
                foreach ($igre as $igra){
                    echo '<tr>';
                    echo'<td>'. $igra['id']. '.</td>';
                    echo'<td>'. $igra['datum']. '</td>';
                    echo'<td>'.$igra['igraci'].'</td>';
                    echo'<td>'.$igra['pobednik'].'</td>';
                    echo'<td>'.$igra['vrsta_igre'].'</td>';                 
                }
            
                echo '</table>';
            ?>
    </div>
    </center>
    
    
</body>
</html>