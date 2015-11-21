<?php
include "konfiguracija.php";
$vrijeme = date('Y-m-d H:i:s', time());
$izraz=$veza->prepare("select * from game where pocetak < '$vrijeme' and kraj > '$vrijeme'");
$izraz->execute();
$runda=$izraz->fetch(PDO::FETCH_OBJ);
echo json_encode($runda);
