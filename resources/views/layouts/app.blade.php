<!DOCTYPE html>
<html lang="en">
<head>
	@include('layouts.headcontent')
</head>
<body>
	@include('layouts.header')
	
	<div id="wrapper">
		@section('body')
			@show

		@include('layouts.footer')
	</div>

	@include('layouts.scripts')
</body>
</html>