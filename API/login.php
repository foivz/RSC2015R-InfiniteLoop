<?php
include_once '../konfiguracija.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    @$kor_ime = $request->kor_ime;
    @$lozinka = $request->lozinka;
$izraz=$veza->prepare("select * from korisnik where kor_ime=:kor_ime and lozinka=:lozinka");
$izraz->bindValue(":kor_ime", $kor_ime);  
$izraz->bindValue(":lozinka", md5($lozinka)); 
$izraz->execute();
$operater=$izraz->fetch(PDO::FETCH_OBJ);
if ($operater != null) {
echo json_encode($operater);
}
else {
	echo "false";
}