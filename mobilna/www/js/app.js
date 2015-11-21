angular.module('starter', ['ionic', 'starter.controllers', 'starter.services'])

.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
  
    if (window.cordova && window.cordova.plugins && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
      cordova.plugins.Keyboard.disableScroll(true);

    }
    if (window.StatusBar) {
      
      StatusBar.styleDefault();
    }
  });
})

.config(function($stateProvider, $urlRouterProvider) {


  $stateProvider

    .state('tab', {
    url: '/tab',
    abstract: true,
    templateUrl: 'templates/tabs.html',
    controller: 'LogoutCtrl'
  })


 .state('tab.login', {
    url: '/login',
    views: {
      'tab-login': {
        templateUrl: 'templates/tab-login.html',
        controller: 'LoginCtrl'
      }
    }
  })

 .state('tab.registracija', {
    url: '/registracija',
    views: {
      'tab-registracija': {
        templateUrl: 'templates/tab-registracija.html',
        controller: 'RegistracijaCtrl'
      }
    }
  })

  .state('tab.mapa', {
    url: '/mapa',
    views: {
      'tab-mapa': {
        templateUrl: 'templates/tab-mapa.html',
        controller: 'MapaCtrl'
      }
    }
  })

 .state('tab.statistika', {
    url: '/statistika',
    views: {
      'tab-statistika': {
        templateUrl: 'templates/tab-statistika.html',
        controller: 'StatistikaCtrl'
      }
    }
  })

 .state('tab.poruke', {
    url: '/poruke',
    views: {
      'tab-poruke': {
        templateUrl: 'templates/tab-poruke.html',
        controller: 'PorukeCtrl'
      }
    }
  })

 .state('tab.igra', {
    url: '/igra',
    views: {
      'tab-igra': {
        templateUrl: 'templates/tab-igra.html',
        controller: 'IgraCtrl'
      }
    }
  });



  $urlRouterProvider.otherwise('/tab/login');

});
