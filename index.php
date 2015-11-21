<?php include "konfiguracija.php"; ?>
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

    <!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>

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
              
              <p class="lead rezultatJedan">3</p>
            </div>
            <div class="col-md-4 prikazVrijeme">
              <p class="text-center">Round 2</p>
              <p class="text-center vrijeme">04:36</p>
            </div>
            <div class="col-md-4 prikazTim">
              <p class="text-right lead rezultatDva">4</p>
              <img src="slike/group-users.png" alt="Icon" class="ikonaTima">
              <p class="text-right timDva">Team 2</p>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('mapa'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }

      window.onload = initMap();


    </script>
  </body>
</html>
