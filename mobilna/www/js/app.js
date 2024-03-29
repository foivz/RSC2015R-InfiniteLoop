// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
// 'starter.services' is found in services.js
// 'starter.controllers' is found in controllers.js
angular.module('starter', ['ionic', 'starter.controllers', 'starter.services', 'ionic.service.core', 'ionic.service.push'])
.config(['$ionicAppProvider', function($ionicAppProvider) {
  // Identify app
  $ionicAppProvider.identify({
    // Your App ID
    app_id: '9ee26f42',
    // The public API key services will use for this app
    api_key: '034d4447e156a5fc57b2174858b618d03f0704d70a53b4ae',
    // Your GCM sender ID/project number (Uncomment if supporting Android)
    gcm_id: '272779918008'
  });

}])
.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
    // for form inputs)
    if (window.cordova && window.cordova.plugins && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
      cordova.plugins.Keyboard.disableScroll(true);

    }
    if (window.StatusBar) {
      // org.apache.cordova.statusbar required
      StatusBar.styleDefault();
    }
  });

})

.config(function($stateProvider, $urlRouterProvider) {

  // Ionic uses AngularUI Router which uses the concept of states
  // Learn more here: https://github.com/angular-ui/ui-router
  // Set up the various states which the app can be in.
  // Each state's controller can be found in controllers.js
  $stateProvider

  // setup an abstract state for the tabs directive
    .state('tab', {
    url: '/tab',
    abstract: true,
    templateUrl: 'templates/tabs.html',
    controller: 'LogoutCtrl'
  })

  // Each tab has its own nav history stack:

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


  // if none of the above states are matched, use this as the fallback
  $urlRouterProvider.otherwise('/tab/login');

});
