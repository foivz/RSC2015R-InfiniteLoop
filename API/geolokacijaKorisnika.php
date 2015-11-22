<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include "../konfiguracija.php";
$izraz=$veza->prepare("select a.ime, a.prezime, c.naziv, d.sifra, d.lat, d.lang from korisnik a inner join timKorisnik b on b.korisnik=a.sifra inner join timovi c on b.tim=c.sifra inner join gameTimKorisnik d on d.timKorisnik=b.sifra inner join game e on e.sifra=d.game inner join mec f on e.mec=f.sifra where f.aktivan=1 and d.mrtav=0 and b.tim=1");
$izraz->execute();
$koordinate=$izraz->fetchALL(PDO::FETCH_OBJ);
echo json_encode($koordinate);
