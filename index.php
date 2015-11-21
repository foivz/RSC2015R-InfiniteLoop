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

    <title><?php echo $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">
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
        <div class="col-md-3">
          <h2>Team 1</h2>
          <div class="row">
            <div class="col-md-12">
              <img src="http://placehold.it/20x20" alt="Avatar" class="img-circle">
              <img src="http://placehold.it/20x20" alt="Avatar" class="img-circle">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <canvas id="mapa"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <h2>Team 2</h2>
          <div class="row">
            <div class="col-md-12">
              <img src="http://placehold.it/20x20" alt="Avatar" class="img-circle">
              <img src="http://placehold.it/20x20" alt="Avatar" class="img-circle">
            </div>
          </div>
        </div>
      </div>
    </div> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
      function initialize() {
    var latlng = new google.maps.LatLng(52.474, -1.868);

    var myOptions = {
        zoom: 11,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("mapa"), myOptions);
    var image = 'i/hotel-map-pin.png';

    var hotels = [
        ['ibis Birmingham Airport', 52.452656, -1.730548, 4],
        ['ETAP Birmingham Airport', 52.452527, -1.731644, 3],
        ['ibis Birmingham City Centre', 52.475162, -1.897208, 2]
        ];

    for (var i = 0; i < hotels.length; i++) {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(hotels[i][1], hotels[i][2]),
            map: map,
          //  icon: image,
            title: hotels[i][0],
            zIndex: hotels[i][3]
        });
    }
}

window.onload = initialize;


    </script>
  </body>
</html>
