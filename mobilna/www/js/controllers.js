angular.module('starter.controllers', [])
.controller('LogoutCtrl', function($scope, $rootScope, $state) {
$rootScope.server = "http://it.ffos.hr/infiniteloop/";
 $rootScope.$on('$ionicView.beforeEnter', function () {
var stateName = $state.current.name;
if (stateName === 'tab.login') {
$rootScope.hideTabs = true;
} else {
$rootScope.hideTabs = false;
}
});
$scope.odjava = function(){
$state.go("tab.login");
$rootScope.sakrij = true; 
$rootScope.logiran = false; 
$rootScope.status = true;
$rootScope.game = true;
$rootScope.loginData = {};
}
 
$rootScope.sakrij = true; 
$rootScope.logiran = false; 
$rootScope.status = true;
$rootScope.game = true;
})

.controller('LoginCtrl', function($scope, $rootScope, $ionicLoading, $http, $state) {


$scope.error = false;
$scope.alert = false;
$rootScope.loginData = {};

$scope.submit = function () {
      $ionicLoading.show({
          template: '<ion-spinner></ion-spinner><br />Please wait...'
        });   
        $http({
          url: $rootScope.server + "API/login.php",
          data: $rootScope.loginData,
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          }
        }).success(function(data) {
          $ionicLoading.hide();
          if (data === false) {
            $scope.alert = true;
          }
          if (data.status == 1) {
            $rootScope.userData = data;
            $state.go("tab.igra");
            $rootScope.sakrij = false; 
            $rootScope.logiran = true;
            $rootScope.game = false;
            $rootScope.status = true;

          }
          else if (data.status == 2) {
            $rootScope.userData = data;
            $rootScope.sakrij = false; 
            $rootScope.logiran = true;
            $rootScope.status = false;
            $rootScope.game = true;
            $state.go("tab.statistika");
          }

        }).error(function(err) {
          $ionicLoading.hide();
          $scope.upozorenje = true;
        });
    }
})

.controller('RegistracijaCtrl', function($scope, $http, $state, $ionicPush, $ionicUser, $rootScope) {
$scope.registracija = {};
$scope.registriraj = function () {
  $scope.identifyUser();
}
$rootScope.$on('$cordovaPush:tokenReceived', function(event, data) {
  $scope.registracija.device = data.token;
  $scope.postRegistracija();
  });
  //Basic registration
  $scope.pushRegister = function() {
    $ionicPush.register({
      canShowAlert: false,
      onNotification: function(notification) {
        // Called for each notification for custom handling
        $scope.lastNotification = JSON.stringify(notification);
      }
    }).then(function(deviceToken) {
      $scope.token = deviceToken;
    });
  }
  $scope.identifyUser = function() {

    var user = $ionicUser.get();
    if(!user.user_id) {
      // Set your user_id here, or generate a random one
      user.user_id = $ionicUser.generateGUID()
    };

    angular.extend(user, {
      name: 'Test User',
      message: 'I come from planet Ion'
    });

    $ionicUser.identify(user);
    $scope.pushRegister();
  }

  $scope.postRegistracija = function () {
      $http({
          url: $rootScope.server + "API/registracija.php",
          data: $scope.registracija,
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          }
        }).success(function(data) {
            $state.go("tab.login");
          });
  }
})

.controller('MapaCtrl', function($scope, Prepreke, Igraci, $rootScope, $http) {
$scope.$on("$ionicView.afterEnter", function () {
     kreirajMapu();
}); 

function kreirajMapu() {
    var latlng = new google.maps.LatLng(46.305746, 16.336607);
    var myOptions = {
        zoom: 15,
        center: latlng,
        draggable: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("mapa"), myOptions);
     Prepreke.success(function(data) {
            $rootScope.prepreke = data;
             for (var i = 0; i < $rootScope.prepreke.length; i++) {
     		 if ($rootScope.prepreke[i].naziv == "Zastavica 1") {
       		var markeri = new google.maps.Marker({
            position: new google.maps.LatLng($rootScope.prepreke[i].lang, $rootScope.prepreke[i].lat),
            map: map,
            title: $rootScope.prepreke[i].naziv,
          //  icon: image,
            zIndex: 1,
            icon: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
        });
      }
      else if ($rootScope.prepreke[i].naziv == "Zastavica 2") {
        var markeri = new google.maps.Marker({
            position: new google.maps.LatLng($rootScope.prepreke[i].lang, $rootScope.prepreke[i].lat),
            map: map,
            title: $rootScope.prepreke[i].naziv,
          //  icon: image,
            zIndex: 1,
            icon: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
        });
      }
      else if ($rootScope.prepreke[i].naziv == "Motel") {
        var markeri = new google.maps.Marker({
            position: new google.maps.LatLng($rootScope.prepreke[i].lang, $rootScope.prepreke[i].lat),
            map: map,
            title: $rootScope.prepreke[i].naziv,
          //  icon: image,
            zIndex: 1,
            icon: "http://findicons.com/files/icons/951/google_maps/32/hotel1star.png"
        });
      }
    }
            })
            .error(function(data) {
            });
  var onSuccess = function(position) {
  	$scope.lokacija = {
  		lang: position.coords.longitude,
  		lat: position.coords.latitude,
  		sifra: 1
  	};
  				$http({
					url: $rootScope.server + "API/updateLokacija.php",
					data: $scope.lokacija,
					method: 'POST',
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded'
					}
				});
};
navigator.geolocation.getCurrentPosition(onSuccess);
    getLocation(map);
}

function getLocation(map) {
    $scope.markeri = [];
	Igraci.success(function(data) {
		$rootScope.igraci = data;
    for (var i = 0; i < $rootScope.igraci.length; i++) {
      if ($rootScope.igraci[i].naziv == "Tim 1") {

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng($rootScope.igraci[i].lang, $rootScope.igraci[i].lat),
            map: map,
            zIndex: 1,
            icon: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
            draggable: true
        });
        $scope.markeri.push(marker);
      }
    }
});
    interval(map, $scope.markeri);
    }

function interval (map, markeri) {
    var interval = setInterval(function(){
      for (var i = 0; i < $scope.markeri.length; i++ ) {
      $scope.markeri[i].setMap(null);
      }
    $scope.markeri.length = 0;
      clear();
      getLocation(map);
      }, 2000);
    function clear () {
      clearInterval(interval);
    }
    }   

$scope.lijevo = function () {
  $scope.poruka = {
    poruka: "You are in danger!"
  };
  $scope.push();
}
$scope.right = function () {
  $scope.poruka = {
    poruka: "I'm in danger!"
  };
  $scope.push();
}
$scope.hold = function () {
  $scope.poruka = {
    poruka: "Out of game!",
    sifra: $rootScope.userData = data
  };
  $http({
          url: $rootScope.server + "API/pushSucu.php",
          data: $scope.poruka,
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          }
        });
}
$scope.push = function () {
    $http({
          url: $rootScope.server + "API/push.php",
          data: $scope.poruka,
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          }
        });
}
})

.controller('StatistikaCtrl', function($scope) {
 
})

.controller('PorukeCtrl', function($scope) {})

.controller('IgraCtrl', function($scope, Korisnici, $rootScope) {
$scope.getKorisnici = function () {
 Korisnici.success(function(data) {
    $rootScope.korisnici = data;
});
}

$scope.getKorisnik = function () {
 Korisnici.success(function(data) {
    $rootScope.korisnici = data;
});
}


});
