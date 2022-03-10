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

    function dohvati_sve_korisnike(){
        global $konekcija;
    
        $sqlUpit = 'select * from login';
        $rezultat = mysqli_query($konekcija, $sqlUpit);
    
        if($rezultat == false){
            die('Greska pri dohvatanju svih korisnika' . mysqli_error($konekcija));
        }
    
        return mysqli_fetch_all($rezultat, MYSQLI_ASSOC);
    
    }
    function registruj_korisnika($korisnicko_ime, $sifra,$usertype) {
        global $konekcija;
    
        $sqlUpit = "SELECT *FROM login WHERE username = '$korisnicko_ime'";
        $rezultat = mysqli_query($konekcija, $sqlUpit);
        if ($rezultat == false) {
            die('Doslo je do greske pri registraciji korisnika');
        }
    
        if (mysqli_num_rows($rezultat) != 0) {
            return false;
        }
    
        $sqlUpit = "INSERT INTO login VALUES(NULL,'$korisnicko_ime', '$sifra','$usertype')";
        $rezultat = mysqli_query($konekcija, $sqlUpit);
        if ($rezultat == false) {
            die('Doslo je do greske pri registraciji korisnika');
        }
    
        return true;
    }

?>