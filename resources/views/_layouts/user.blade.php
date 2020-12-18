<!DOCTYPE html>
<html lang="en">
<head>

	@include('_includes.head')

</head>
<body class="bg-light">
	
	@include('_partials.navbar')

	<div class="container mt-4">
		<div class="row">
			<div class="col-md-8 mt-3">
				@yield('content')
			</div>
			<div class="col-md-4 mt-3 mb-5 order-md-first">
				@include('user._partials.sidebar')
			</div>
		</div>
	</div>

	@include('_includes.foot')

</body>
</html>