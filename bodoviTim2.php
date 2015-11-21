<?php
include "konfiguracija.php";
$izraz=$veza->prepare("select SUM(a.score) as score from gameTimKorisnik a inner join timKorisnik b on a.timKorisnik=b.sifra inner join timovi c on c.sifra=b.tim where c.sifra=2");
$izraz->execute();
$bodovi=$izraz->fetch(PDO::FETCH_OBJ);
echo json_encode($bodovi);
