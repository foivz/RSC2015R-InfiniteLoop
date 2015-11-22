<?php
include_once '../konfiguracija.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    @$ime = $request->ime;
    @$prezime = $request->prezime;
    @$username = $request->username;
    @$password = $request->password;
    @$sudac = $request->sudac;
    @$igrac = $request->igrac;
    @$device = $request->device;
if ($igrac == true) {
$izraz=$veza->prepare("insert into korisnik (ime, prezime, status, kor_ime, lozinka, device) values (:ime, :prezime, 2, :kor_ime, :lozinka, :device)");
$izraz->bindValue(":ime", $ime); 
$izraz->bindValue(":prezime", $prezime); 
$izraz->bindValue(":kor_ime", $username); 
$izraz->bindValue(":device", $device); 
$izraz->bindValue(":lozinka", md5($password)); 
$izraz->execute();
}
if ($sudac == true) {
$izraz=$veza->prepare("insert into korisnik (ime, prezime, status, kor_ime, lozinka) values (:ime, :prezime, 1, :kor_ime, :lozinka)");
$izraz->bindValue(":ime", $ime); 
$izraz->bindValue(":prezime", $prezime); 
$izraz->bindValue(":kor_ime", $username); 
$izraz->bindValue(":lozinka", md5($password)); 
$izraz->execute();
}