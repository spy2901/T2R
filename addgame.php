<?php

     session_start();
     if(!isset($_SESSION["username"])){
         header("location:index.php");
     }
     require_once 'baza.php';
     konektuj_se();
     $korisnici=dohvati_sve_korisnike();
     $igre = dohvati_sve_tipoveIgre();
     if(isset($_POST['pobednik'])){
        $checkbox1=$_POST['igraci'];  
        $chk="";  
        foreach($checkbox1 as $chk1)  
            {  
            $chk .= $chk1.", ";  
            }    
        $datum1 = $_POST['datum'];
        $tipIgre1 = $_POST['tipIgre'];
        $pobednik = $_POST['pobednik'];
        dodajigru($datum1,$chk,$pobednik,$tipIgre1);
     }
     
     error_reporting(E_ERROR | E_PARSE);
   
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/e3d2d34b95.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/47e60dfc20.js" crossorigin="anonymous"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.5.js" type="text/javascript"></script>
   <!-- <script type="text/javascript" src="addgame.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    $(function () {
        $("form input[type='checkbox']").change(function() {
            
            if ($(this).is(":checked")){
                $(this).closest('td').find("input[type='radio']").prop('disabled', false);
            }
            else {
                $(this).closest('td').find("input[type='radio']").prop('disabled', true);
                $(this).closest('td').find("input[type='radio']").prop('checked', false);
            }

        });
    });
    </script>
</head>
<body>
    <div class="topnav">
            <a href="logout.php">Log out</a>
            <a href="DodajVrstIgre.php" style="float:right;">Dodaj vrstu igre</a>
            <a href="addgame.php" class="active">Dodaj igru</a>
            <a href="adduser.php">Dodaj usera</a>
            <a href="adminhome.php"><i class="fa-solid fa-user-gear"></i>Home</a>
    </div>
    <h1>DODAJ igru</h1>

    <div id="forma">
        <form method="POST">
            <input type="date" name="datum" required placeholder="Date">
             <br>
             <br>
             <div id="tabela">
             
                    <?php
                        echo '<table>';
                        echo '<tr>';
                        echo'<th>Igrao Igru</th>';
                        echo'<th>igrac</th>';
                        echo'<th>pobednik</th>';
                        echo '</tr>';
                        $id = 1;
                    // Iterating through the product array
                        foreach($korisnici  as $korisnik){
                            $i = $korisnik['username'];
                            echo '<tr>';
                            echo'<td><input type="checkbox" value="'.$i.'" name="igraci[]"/> </td>';
                            echo'<td>'. $i. '</td>';
                            echo'<td><input type="radio" name="pobednik" value="'.$i.'" id="'.$id.'" required/></td>';
                            $id++;
                        }
                        echo "<br>";
                        /*foreach($korisnici as $korisnik){
                            $i = $korisnik['username'];
                            echo''."$i"."<br>";
                      
                        }*/
                        
                    ?>
                    <select name="tipIgre" id="ti" required>
                        <option value="">--select one below--</option>
                        <?php
                            foreach($igre as $igra){
                                echo '<option value="'.$igra['igra'].'">'.$igra['igra'].'</option>';
                            }
                            
                        ?>
                    </select>
                </div>
                <br>
                <br>
            <input type = "submit" name = "submit" value =" Dodaj igru">
            <br>
            <br>
            
        </form>
    </div>
   
</body>
</html>
<?php
     
?>


