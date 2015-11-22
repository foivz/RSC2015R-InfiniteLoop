<?php
$title = "Paintball Tracker";
$server="localhost";
$baza="paintball";
$korisnik="root";
$lozinka="admin";
$putanja="/RSC2015R-InfiniteLoop/";
$veza=new PDO("mysql:host=" . $server . ";dbname=" . $baza,$korisnik,$lozinka);
$veza->exec("set names utf8;");
