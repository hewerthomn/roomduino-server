<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>RoomDuino Monitor</title>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Everton Inocencio <hewerthomn>">
	  <meta name="app-mobile-web-app-capable" content="yes">
	  <meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="mobile-web-app-capable" content="yes">

		<link rel="shortcut icon" href="favicon.ico">
		<link rel="apple-touch-icon apple-touch-icon-precomposed" href="/img/apple-touch-icon.png">
  	<link rel="apple-touch-icon apple-touch-icon-precomposed" sizes="144x144" href="/img/apple-touch-icon-144.png">
		@yield('styles')
	</head>

	<body ng-app="roomduino.app">

		@yield('main')

		@yield('scripts')
	</body>
</html>
