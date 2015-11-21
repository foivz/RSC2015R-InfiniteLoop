<?php
include "konfiguracija.php";
$izraz=$veza->prepare("select * from prepreke");
$izraz->execute();
$koordinate=$izraz->fetchALL(PDO::FETCH_OBJ);
echo json_encode($koordinate);
