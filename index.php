<?php include "konfiguracija.php"; 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Infinite Loop">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 rezultatiHeader">
          <header class="prikazRezultata">
            <div class="col-md-4 prikazTim">
              <img src="slike/group-users.png" alt="Icon">
              <p class="timJedan">Team 1</p>
              <a href="#team">
                <img src="slike/arrow.png" alt="Icon" class="dropdownTeam">
                <ul class="listTeam">
                  <li>
                    <img src="http://placehold.it/40x40" alt="Avatar" class="img-circle listImage">
                    <img src="slike/paint82.png" alt="K.O." class="deathSmudge">
                  </li>
                  <li><img src="http://placehold.it/40x40" alt="Avatar" class="img-circle"></li>
                </ul>
              </a>
              <p class="lead rezultatJedan" id="bodoviTim1"></p>
              </div>
              <div class="col-md-4 prikazVrijeme">
              <p class="text-center" id="runda"></p>
              <p class="text-center vrijeme" id="vrijeme"></p>
            </div>
            <div class="col-md-4 prikazTim">
              <p class="text-right lead rezultatDva" id="bodoviTim2"></p>
              <img src="slike/group-users.png" alt="Icon" class="ikonaTima">
              <p class="text-right timDva">Team 2</p>
              <a href="#team" class="dropdownTeamList">
                <img src="slike/arrow.png" alt="Icon" class="dropdownTeam">
                <ul class="listTeamDva">
                  <li>
                    <img src="http://placehold.it/40x40" alt="Avatar" class="img-circle listImage">
                    <img src="slike/paint82.png" alt="K.O." class="deathSmudge">
                  </li>
                  <li><img src="http://placehold.it/40x40" alt="Avatar" class="img-circle"></li>
                </ul>
              </a>
          </div>
          </header>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mapa">
          <div id="mapa"></div>
        </div>
      </div>
    </div>
    </div> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
     $(document).ready(function() {
      kreirajMapu();
      bodoviTim1();
      bodoviTim2();
      runda();
    });

    function bodoviTim1 () {
       $.ajax({
        type: "GET",
        url: "bodoviTim1.php",
        success: function(bodovi){
          podatci=$.parseJSON(bodovi);
          $("#bodoviTim1").html(podatci.score);
          intervalBodoviTim1();
        }
      });
    }
  function intervalBodoviTim1 () {
    var interval = setInterval(function(){
      clear();
      bodoviTim1();
      }, 2000);
    function clear () {
      clearInterval(interval);
    }
    }

  function bodoviTim2 () {
       $.ajax({
        type: "GET",
        url: "bodoviTim2.php",
        success: function(bodovi){
          podatci=$.parseJSON(bodovi);
          $("#bodoviTim2").html(podatci.score);
          intervalBodoviTim2();
        }
      });
    }
  function intervalBodoviTim2 () {
    var interval = setInterval(function(){
      clear();
      bodoviTim2();
      }, 2000);
    function clear () {
      clearInterval(interval);
    }
    }

   function runda () {
       $.ajax({
        type: "GET",
        url: "runda.php",
        success: function(runda){
          podatci=$.parseJSON(runda);
          $("#runda").html("Runda " + podatci.broj);
          $("#vrijeme").html(podatci.kraj);
          rundaInterval();
        }
      });
    }
  function rundaInterval () {
    var interval = setInterval(function(){
      clear();
      runda();
      }, 1000);
    function clear () {
      clearInterval(interval);
    }
    }

function kreirajMapu() {

    var latlng = new google.maps.LatLng(46.305746, 16.336607);
    var myOptions = {
        zoom: 16,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("mapa"), myOptions);
    //var image = 'i/hotel-map-pin.png';


    $.ajax({
        type: "GET",
        url: "geolokacijaPrepreka.php",
        success: function(koordinate){
          podatci=$.parseJSON(koordinate);
    for (var i = 0; i < podatci.length; i++) {
      if (podatci[i].naziv == "Zastavica 1") {
        var markeri = new google.maps.Marker({
            position: new google.maps.LatLng(podatci[i].lang, podatci[i].lat),
            map: map,
            title: podatci[i].naziv,
          //  icon: image,
            zIndex: 1,
            icon: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
        });
      }
      else if (podatci[i].naziv == "Zastavica 2") {
        var markeri = new google.maps.Marker({
            position: new google.maps.LatLng(podatci[i].lang, podatci[i].lat),
            map: map,
            title: podatci[i].naziv,
          //  icon: image,
            zIndex: 1,
            icon: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
        });
      }
      else if (podatci[i].naziv == "Motel") {
        var markeri = new google.maps.Marker({
            position: new google.maps.LatLng(podatci[i].lang, podatci[i].lat),
            map: map,
            title: podatci[i].naziv,
          //  icon: image,
            zIndex: 1,
            icon: "http://findicons.com/files/icons/951/google_maps/32/hotel1star.png"
        });
      }
    }
  }
      });
    getLocation(map);

    
}

function getLocation(map) {
      $.ajax({
        type: "GET",
        url: "geolokacijaKorisnika.php",
        success: function(koordinate){
        var markeri = [];
          podatci=$.parseJSON(koordinate);
    for (var i = 0; i < podatci.length; i++) {
      if (podatci[i].naziv == "Tim 1") {

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(podatci[i].lang, podatci[i].lat),
            map: map,
            title: podatci[i].naziv + " - " +podatci[i].ime,
          //  icon: image,
            zIndex: 1,
            id: podatci[i].sifra,
            icon: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
            draggable: true
        });
        markeri.push(marker);
      }
     if (podatci[i].naziv == "Tim 2") {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(podatci[i].lang, podatci[i].lat),
            map: map,
            title: podatci[i].naziv + " - " +podatci[i].ime,
          //  icon: image,
            zIndex: 1,
            id: podatci[i].sifra,
            icon: "http://maps.google.com/mapfiles/ms/icons/yellow-dot.png"
        });
        markeri.push(marker);
      }
    }
 
    interval(map, markeri);
    }
      });
    }
    function interval (map, markeri) {
    var interval = setInterval(function(){
      for (var i = 0; i < markeri.length; i++ ) {
      markeri[i].setMap(null);
      }
    markeri.length = 0;
      clear();
      getLocation(map);
      }, 2000);
    function clear () {
      clearInterval(interval);
    }
    }

    </script>
  </body>
</html>
