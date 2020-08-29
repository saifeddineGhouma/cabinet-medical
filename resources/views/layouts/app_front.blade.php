<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
<!-- Theme Informations -->	
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
<!-- Theme Informations -->

	<title>Real Estate-Responsive Theme Page 3</title>

<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('css/style_index.css')}}">
	<link rel="stylesheet" href="{{asset('css/common-style.css')}}">
<!-- Stylesheets -->
  
<!-- Icons & Fonts -->
    <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
<!-- Icons & Fonts -->

</head>
@include('front.inc.header')
  @yield('content')
 @include('front.inc.footer')
<body id="page-top">

 <!-------javascript--------->
   <!-- jQuery-->
   <script src="{{asset('js/jquery.min.js')}}"></script>
  <!-- Bootstrap Core Javascript--> 
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- Plugins -->
    <script src="{{asset('js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>