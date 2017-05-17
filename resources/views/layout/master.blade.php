<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
	   <link rel="stylesheet" href="{{asset('src/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('src/css/font-awesome.min.css')}}">
	   <link rel="stylesheet" href="{{asset('src/css/main.css')}}">
    </head>
    <body>
         @include('includes.header')
	    <div class="container">
	      	@yield('content')
	    </div>
	    <script type="text/javascript" src="{{asset('src/js/jquery-3.1.0.min.js')}}"></script>
         <script type="text/javascript" src="{{asset('src/js/bootstrap.min.js')}}"></script>
	    <script type="text/javascript" src="{{asset('src/js/app.js')}}"></script>
    </body>
</html>
