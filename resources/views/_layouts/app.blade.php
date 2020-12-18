<!DOCTYPE html>
<html lang="en">
<head>
	
	@include('_includes.head')

</head>
<body class="bg-light">
	
	@include('_partials.navbar')

	<div class="container">
		@yield('content')
	</div>

	@include('_includes.foot')

</body>
</html>