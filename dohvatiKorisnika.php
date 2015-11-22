<?php
include "konfiguracija.php";
$izraz=$veza->prepare("select * from korisnik where sifra=:sifra");
$izraz->bindValue(":sifra", $_POST['sifra']);  
$izraz->execute();
$korisnik=$izraz->fetch(PDO::FETCH_OBJ);
echo json_encode($korisnik);
