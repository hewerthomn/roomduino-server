/*
 * RoomDuino Service
 */

function RoomDuinoService($http)
{
	var api_path = 'api/';

	return {

		Temperature: {

			actual: function(placename)
			{
				return $http.get(api_path + 'temperatures/actual?P=Room');
			}
		},

		Photocell: {

			actual: function(placename)
			{
				return $http.get(api_path + 'sensors/actual?sensor=photocell&placename=Room');
			}
		}
	}
};

angular
	.module('roomduino.services')
	.service('RoomDuino', ['$http', RoomDuinoService]);
