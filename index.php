<?php

    
    require_once 'baza.php';
    session_start();
    konektuj_se();
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username=$_POST["username"];
        $password=$_POST["password"];

        $sql="select * from login where username='".$username."' AND password='".$password."' ";

        $result = mysqli_query($konekcija,$sql);

        $row=mysqli_fetch_array($result);

        if($row["usertype"]=="user")
        {
            $_SESSION["username"]=$username;
            header("location:userhome.php");
        }
        elseif($row["usertype"]=="admin"){
            $_SESSION["username"]=$username;
            header("location:adminhome.php");
        }
        else{
            echo "username or password incorrect";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>LOGIN PAGE</title>
   <link rel="stylesheet" href="defaultCSS.css" >
   <style>
    input {
        height: 15px;
        padding: 8px 12px;
        border-radius: 4px;
        border: 1px solid #cae8cb;
    }

    /* primenjujemo naredni stil samo nad input-ima koji su tipa (type) text ili tipa password */
    input[type="text"], input[type="password"] {
        /*width: 100%;*/
        margin-bottom: 10px; /* odvoji 10px ispod ovog elementa (napravi razmak ispod) */
    }

    /* navodimo tip (type) input-a jer ne želimo da se ovaj stil primeni i nad drugim input-ima na stranici */
    input[type="submit"] {
        height: 45px;
        width: 100px;
        background-color: #4CAF50;
        color: white;
        font-weight: bold;
        cursor: pointer; /* menjamo izgled miša kada interaguje sa ovim elementom (ručica koja pokazuje) */
    }

    input[type="submit"]:hover {
        /* prilikom prevlačenja miša iznad submit dugmeta menjamo njegov izgled */
        background-color: #edf7ee;
        color: #4CAF50;
        border: 1px solid #4CAF50;
    }
    label{
        height:15px;
    }
   </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/47e60dfc20.js" crossorigin="anonymous"></script>
</head>
<body>
    <br>
    <center>
        <h1>Login Form</h1>
        <br> <br> <br> <br>
        <div style="background-color: #4CAF50; width: 500px;">
       
            <br><br>

            <form action="#" method="POST">
                <div>
                    <i class="fa fa-user"></i>
                    <label>korisnicko ime</label>
                    <input type="text" name="username" required placeholder="username...">
                </div>
                <br> <br>
                <div>
                <i class="fa-solid fa-key"></i>
                    <label>password</label>
                    <input type="password" name="password" required placeholder="password...">
                </div>
                <br> <br>
                <div>
                    <input type="submit" value="login">
                </div>
            </form>
            <br> <br>
        </div>
    </center>
    
</body>
</html>