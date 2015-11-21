<?php
include "konfiguracija.php";
$vrijeme = date('Y-m-d H:i:s', time());
$izraz=$veza->prepare("select * from game where sifra=:sifra");
$izraz->bindValue(":sifra", $_POST['sifra']); 
$izraz->execute();
$runda=$izraz->fetch(PDO::FETCH_OBJ);
$kraj = $runda->kraj;
$odbrojavanje = $kraj->diff($vrijeme);
echo json_encode($odbrojavanje);