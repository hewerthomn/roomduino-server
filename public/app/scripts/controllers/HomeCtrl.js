function HomeCtrl($scope, $location, $interval, RoomDuino)
{
	function _init()
	{
		$scope.temperature = {};
		$scope.updating = {
			temperature: false
		};

		$scope.updateFrequency = 5 * 60000; // 60000 = 1 minute

		$scope.updateTemperature();
		$interval($scope.updateTemperature, $scope.updateFrequency);
	};

	function _applyPhase()
	{
		if(!$scope.$$phase) $scope.$apply();
	};

	$scope.updateTemperature = function()
	{
		$scope.updating.temperature = true;
		RoomDuino.Temperature.actual()
			.success(function(data) {
				$scope.updating.temperature = false;
				$scope.temperature = data;
				_applyPhase();
			})
			.error(function(error) {
				$scope.updating.temperature = false;
				console.error(error);
			});
	};

	$scope.goto = function(to)
	{
		$location.path(to);
	};

	$scope.levelDewPoint = function(dew_point)
	{
		return (dew_point < 10) ? 'muted' : (dew_point > 10 && dew_point < 18) ? 'success' : 'danger';
	};

	_init();
};

angular
	.module('roomduino.controllers')
	.controller('HomeCtrl', ['$scope', '$location', '$interval', 'RoomDuino', HomeCtrl]);
