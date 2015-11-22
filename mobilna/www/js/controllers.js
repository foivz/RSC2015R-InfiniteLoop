angular.module('starter.controllers', [])
.controller('LogoutCtrl', function($scope, $rootScope, $state) {
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
$rootScope.loginData = {};
}
})

.controller('LoginCtrl', function($scope, $rootScope, $ionicLoading, $http, $state) {
$scope.error = false;
$scope.alert = false;
$rootScope.userData = {};
$rootScope.loginData = {};

$scope.submit = function () {
      $ionicLoading.show({
          template: '<ion-spinner></ion-spinner><br />Please wait...'
        });   
        $http({
          url: $rootScope.server + "/API/login.php",
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
          else if(data !== false) {
            $rootScope.userData = data;
            if ($rootScope.userData.salon == null){
            $rootScope.sudac = true;
            $rootScope.igrac = false;
            $state.go("tab.statistika"); 
        }
            }
            if ($rootScope.userData.naziv != null){
            $rootScope.sudac = false;
            $rootScope.igrac = true;
            $state.go("tab.igra");
            }
            
          

        }).error(function(err) {
          $ionicLoading.hide();
          $scope.upozorenje = true;
        });
    }
})

.controller('RegistracijaCtrl', function($scope) {})

.controller('MapaCtrl', function($scope) {
$scope.$on("$ionicView.afterEnter", function () {
     kreirajMapu();
}); 

function kreirajMapu() {
    var latlng = new google.maps.LatLng(46.305746, 16.336607);
    var myOptions = {
        zoom: 16,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("mapa"), myOptions);
   	$http.get('http://pilot.webege.com/izlistavanjeKategorija.php', { cache: true });
    
}

})

.controller('StatistikaCtrl', function($scope) {})

.controller('PorukeCtrl', function($scope) {})

.controller('IgraCtrl', function($scope) {})


;
