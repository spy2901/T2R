<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("location:index.php");
        
    }
    $greska = "";

    if (isset($_POST['k_ime'])) {
        require_once 'baza.php';
        konektuj_se();

        $korisnicko_ime = $_POST['k_ime'];
        $sifra = $_POST['k_sifra'];
        $usertype = $_POST['type'];

        $rezultat = registruj_korisnika($korisnicko_ime, $sifra,$usertype);
        if ($rezultat == true) {
            header('Location: adduser.php');
        } else {
            $greska = "Vec postoji takav korisnik u nasoj bazi";
        }
    }

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="defaultCSS.css" >
    <link rel="stylesheet" href="nav.css" >
    <link rel="stylesheet" href="adduser.css" >
    <script src="https://kit.fontawesome.com/e3d2d34b95.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <Script type="text/JavaScript" src="adduser.js"></Script>
</head>
<body>
    <div class="topnav">
            <a href="logout.php">Log out</a>
            <a href="addgame.php">Dodaj igru</a>
            <a href="adduser"class="active">Dodaj usera</a>
            <a href="adminhome.php" ><i class="fa-solid fa-user-gear"></i>Home</a>
    </div>
        <form method="POST">
            <table>
                <tr>
                    <td>Korisnicko ime</td>
                    <td><input type="text" name="k_ime" required placeholder="Vase korisnicko ime" /></td>
                </tr>
                <tr>
                    <td>Sifra</td>
                    <td><input type="password" name="k_sifra" required placeholder="Vasa sifra" /></td>
                </tr>
                <tr>
                    <td> <INPUT TYPE="Radio" Name="type" Value="user"checked>user</td>
                    <td><INPUT TYPE="Radio" Name="type" Value="admin">admin</td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Registruj se" /></td>
                </tr>
            </table>
        </form>
        <div>
            <?php 
                if ($greska != "") {
                    echo $greska;
                }
            ?>
        </div>
    </body>
</html>