var app = angular.module('myApp', ['ngRoute', 'ui.bootstrap', 'ngAnimate', 'ngFileUpload']);

app.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
        when('/users', {
                title: 'user',
                templateUrl: 'partials/user.html',
                controller: 'userCtrl'
            })
            .when('/properties', {
                title: 'properties',
                templateUrl: 'partials/properties.html',
                controller: 'propertiesCtrl'
            })
            .when('/', {
                title: 'properties',
                templateUrl: 'partials/properties.html',
                controller: 'propertiesCtrl'
            })
            .otherwise({
                redirectTo: '/'
            });;
    }
]);
app.service('Map', function($q) {

    this.init = function() {
        var options = {
            center: new google.maps.LatLng(40.7127837, -74.00594130000002),
            zoom: 13,
            disableDefaultUI: true
        }
        this.map = new google.maps.Map(
            document.getElementById("map"), options
        );
        this.places = new google.maps.places.PlacesService(this.map);
    }

    this.search = function(str) {
        var d = $q.defer();
        this.places.textSearch({
            query: str
        }, function(results, status) {
            if (status == 'OK') {
                d.resolve(results[0]);
            } else d.reject(status);
        });
        return d.promise;
    }

    this.addMarker = function(res) {
        if (this.marker) this.marker.setMap(null);
        this.marker = new google.maps.Marker({
            map: this.map,
            position: res.geometry.location,
            animation: google.maps.Animation.DROP
        });
        this.map.setCenter(res.geometry.location);
    }

});
app.filter('startFrom', function () {
    return function (input, start) {
        if (input) {
            start = +start;
            return input.slice(start);
        }
        return [];
    };
});
