<?php
            session_start();

            if(isset($_SESSION['korisnik'])){
                echo 'Dobrodosli nazad <b>' . $_SESSION['korisnik'] . '</b>';
            }else if(isset($_POST['ime']))
            {
                //ne postoji korisnik u nasoj sesiji
                $ime =$_SESSION['username'];
                
                $_SESSION['korisnik'] = $ime;
                echo 'uspesno ste pristupili prvi put';
            }
?>