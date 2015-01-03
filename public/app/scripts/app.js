angular.module('roomduino.app', [
	'ngRoute',

	'roomduino.controllers',
	'roomduino.directives',
	'roomduino.factories',
	'roomduino.services',
])
.config(['$routeProvider', function($routeProvider) {
	$routeProvider
		.when('/home', {
			controller:  'HomeCtrl',
			templateUrl: 'app/views/home.html'
		})
		.otherwise({
			redirectTo: '/home'
		});
}]);
