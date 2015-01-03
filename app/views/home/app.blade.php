@extends('layout.app')

@section('styles')
{{ HTML::style('packages/bootstrap/dist/css/bootstrap.css') }}
{{ HTML::style('packages/font-awesome/css/font-awesome.css') }}
{{ HTML::style('css/app.css') }}
@stop

@section('main')
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#"><img src="img/arduino-small.png"> RoomDuino</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#">Link</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div ng-view class="container-fluid">
	</div>
@stop

@section('scripts')
{{ HTML::script('packages/jquery/dist/jquery.js') }}
{{ HTML::script('packages/bootstrap/dist/js/bootstrap.js') }}
{{ HTML::script('packages/angular/angular.js') }}
{{ HTML::script('packages/angular-route/angular-route.js') }}
{{ HTML::script('packages/moment/moment.js') }}
{{ HTML::script('packages/moment/locale/pt-br.js') }}

{{ HTML::script('app/scripts/controllers/main.js') }}
{{ HTML::script('app/scripts/controllers/HomeCtrl.js') }}
{{ HTML::script('app/scripts/directives/main.js') }}
{{ HTML::script('app/scripts/directives/TimeagoDirective.js') }}
{{ HTML::script('app/scripts/factories/main.js') }}
{{ HTML::script('app/scripts/factories/TimeagoFactory.js') }}
{{ HTML::script('app/scripts/services/main.js') }}
{{ HTML::script('app/scripts/services/RoomDuinoService.js') }}
{{ HTML::script('app/scripts/app.js') }}
@stop
