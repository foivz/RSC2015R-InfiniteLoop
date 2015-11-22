angular.module('starter.services', [])
.factory('Prepreke', function ($http) {
  return $http.get('http://it.ffos.hr/infiniteloop/API/geolokacijaPrepreka.php', { cache: true });
})
.factory('Igraci', function ($http) {
  return $http.get('http://it.ffos.hr/infiniteloop/API/geolokacijaKorisnika.php', { cache: true });
})
.factory('Korisnici', function ($http) {
  return $http.get('http://it.ffos.hr/infiniteloop/API/getKorisnici.php', { cache: true });
})