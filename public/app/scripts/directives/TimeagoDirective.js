/**
* Timeago Directive
*/
function TimeagoDirective($interval, timeago)
{
	return {
		restrict: 'A',

		link: function(scope, elem, attrs)
		{
			var updateValue = function()
			{
				scope.$watch(function() {
					return attrs.rdTimeago;
				}, function(newValue) {
					$(elem).html(timeago(attrs.rdTimeago));
				});
			};

			updateValue();
			$interval(updateValue, 10000);
		}
	};
};

angular.module('roomduino.directives')
	.directive('rdTimeago', ['$interval', 'timeago', TimeagoDirective]);
