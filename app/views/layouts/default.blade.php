<!doctype html>
<html>
<head>
    <meta charset="UTF-8">

 		@include("includes.head")

    @yield('head')
    
</head>

<body>
	
  <div id="container">

 	@include("includes.header")
  
  @yield('content')
  
  @include("includes.footer")

	</div>

</body>
</html>