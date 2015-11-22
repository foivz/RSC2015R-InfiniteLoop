<?php
include_once '../konfiguracija.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    @$lang = $request->lang;
    @$lat = $request->lat;
    @$sifra = $request->sifra;
$izraz=$veza->prepare("select sifra from timKorisnik where korisnik=:sifra");
$izraz->bindValue(":sifra", $sifra); 
$izraz->execute();
$timkorisnik=$izraz->fetch(PDO::FETCH_OBJ);
$izraz=$veza->prepare("update gameTimKorisnik set lat=:lat, lang=:lang where timKorisnik=:sifra");
$izraz->bindValue(":sifra", $timkorisnik->sifra); 
$izraz->bindValue(":lang", $lang); 
$izraz->bindValue(":lat", $lat); 
$izraz->execute();