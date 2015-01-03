/**
*
*/
function TimeagoFactory($timeout)
{
	return function(date, format)
	{
		if(date == '') return;

		format = format || 'YYYY-MM-DD HH:mm:ss';
		date = moment(date, format);
		var ago = date.fromNow();

		return ago;
	};
}

angular.module('roomduino.factories')
	.factory('timeago', ['$timeout', TimeagoFactory]);
