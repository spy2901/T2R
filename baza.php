<?php

    define('SERVER','localhost');
    define('KORISNIK','root');
    define('SIFRA','');
    define('BAZA','t2r');
    $konekcija = NULL;

    function konektuj_se(){
        global $konekcija;

        $konekcija = mysqli_Connect(SERVER, KORISNIK, SIFRA, BAZA);
        if($konekcija == false){
            die('Greska pri konektovanju' . mysqli_error());
        }
    }

 
    function registruj_korisnika($korisnicko_ime, $sifra,$usertype,$brojPobeda) {
        global $konekcija;
    
        $sqlUpit = "SELECT *FROM login WHERE username = '$korisnicko_ime'";
        $rezultat = mysqli_query($konekcija, $sqlUpit);
        if ($rezultat == false) {
            die('Doslo je do greske pri registraciji korisnika');
        }
    
        if (mysqli_num_rows($rezultat) != 0) {
            return false;
        }
        $sqlUpit = "INSERT INTO login VALUES(NULL,'$korisnicko_ime', '$sifra','$usertype','$brojPobeda')";
        $rezultat = mysqli_query($konekcija, $sqlUpit);
        if ($rezultat == false) {
            die('Doslo je do greske pri registraciji korisnika');
        }
    
        return true;
    }


    //////////////////////////////////////////////////////////////
    /*                     DODAJ SVE FUNKUCIJE                  */
    //////////////////////////////////////////////////////////////
    function dodajigru($datum1,$chk,$pobednik,$tipIgre1){
        global $konekcija;
        $sqlUpit = "INSERT INTO igre1 Values(NULL,'$datum1','$chk','$pobednik','$tipIgre1')";
        $rezultat = mysqli_query($konekcija,$sqlUpit);
        if($rezultat == false){
            die('doslo je do greske pri dodavanju vrste igre');
        }else
        $sqlUpit = "UPDATE login SET brPobeda = brPobeda +1 WHERE username = '$pobednik'";
        $rezultat = mysqli_query($konekcija,$sqlUpit);
        if($rezultat == false){
            die('doslo je do greske pri dodavanju pobede pobedniku');
        }
        return true;
    }
    
    function dodajVrstuIgre($imeIgre){
        global $konekcija;
        $sqlUpit = "INSERT INTO igre Values(NULL,'$imeIgre')";
        $rezultat = mysqli_query($konekcija,$sqlUpit);
        if($rezultat == false){
            die('doslo je do greske pri dodavanju vrste igre');
        }

        return true;
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////
    /*                                  DOHVATI SVE FUNKCIJE                                           */
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    function dohvati_sve_korisnike(){
        global $konekcija;
    
        $sqlUpit = 'SELECT * FROM `login` ORDER BY brPobeda DESC';
        $rezultat = mysqli_query($konekcija, $sqlUpit);
    
        if($rezultat == false){
            die('Greska pri dohvatanju svih korisnika' . mysqli_error($konekcija));
        }
    
        return mysqli_fetch_all($rezultat, MYSQLI_ASSOC);
    
    }

    function dohvati_sve_tipoveIgre(){
        global $konekcija;
    
        $sqlUpit = 'select * from igre';
        $rezultat = mysqli_query($konekcija, $sqlUpit);
    
        if($rezultat == false){
            die('Greska pri dohvatanju svih tipova igara' . mysqli_error($konekcija));
        }
    
        return mysqli_fetch_all($rezultat, MYSQLI_ASSOC);
    
    }

    function dohvati_sve_igre(){
        global $konekcija;
        $sqlUpit = 'select * from igre1';

        $rezultat = mysqli_query($konekcija,$sqlUpit);

        if($rezultat == false){
            die('Greska pri dohvatanju svih igara' . mysqli_error($konekcija));
        }
    
        return mysqli_fetch_all($rezultat, MYSQLI_ASSOC);
    
    }
?>