function HomeCtrl($scope, $location, $interval, RoomDuino)
{
	function _init()
	{
		$scope.temperature = {};
		$scope.updating = {
			temperature: false
		};

		$scope.updateFrequency = 5 * 6000; // 6000 = 1 minute

		$scope.updateTemperature();
		$scope.updatePhotocell();

		$interval(function() {
			$scope.updateTemperature();
			$scope.updatePhotocell();
		}, $scope.updateFrequency);
	};

	function _statusPhotocell(value)
	{
		if(value < 10) return 'Trevas';
		else if(value < 200) return 'Escuro';
		else if(value < 500) return 'Iluminado';
		else if(value < 800) return 'Claro';
		else return 'Muito Claro';
	}

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

	$scope.updatePhotocell = function()
	{
		RoomDuino.Photocell.actual()
			.success(function(data) {
				$scope.photocell = data;
				$scope.photocell.status = _statusPhotocell(data.value);
				_applyPhase();
			})
			.error(function(error) {
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
