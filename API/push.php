<?php
include_once '../konfiguracija.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    @$poruka = $request->poruka;
    @$sifra = $request->sifra;
$izraz=$veza->prepare("select ime, prezime from korisnik where sifra=:sifra and status=2");
$izraz->bindValue(":sifra", $sifra); 
$izraz->execute();
$korisnik=$izraz->fetch(PDO::FETCH_OBJ);
$izraz=$veza->prepare("select device from korisnik where status=2");
$izraz->execute();
$devices=$izraz->fetchALL(PDO::FETCH_OBJ);
foreach ($devices as $device) {
$device_token=$device->device;
$poruka = $poruka;
$url = 'http://push.ionic.io/api/v1/push';
$data = array(
                  'tokens' => array($device_token), 
                  'notification' => array('alert' => $poruka),    
                  );
      
$content = json_encode($data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
curl_setopt($ch, CURLOPT_USERPWD, "f01093e8efff69a706583c92701cbcd0a007ecbb84598b5b" . ":" );  
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
'X-Ionic-Application-Id: 9ee26f42' 
));
$result = curl_exec($ch);
curl_close($ch);
}