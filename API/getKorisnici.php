<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include "../konfiguracija.php";
$izraz=$veza->prepare("select * from korisnik where status=2");
$izraz->execute();
$korisnici=$izraz->fetchALL(PDO::FETCH_OBJ);
echo json_encode($korisnici);
