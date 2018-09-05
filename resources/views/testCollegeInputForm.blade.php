<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>College Input</title>
</head>
<body>
	<form action="{{ route('collegeInput') }}" method="post">
		<pre>
			College Name: <input type="text" name="name" id="name">

			<input type="submit">
		</pre>
	</form>
	<hr>
	<form action="{{ route('uploadFile-xlsx-college') }}" method="post" enctype="multipart/form-data">
		<pre>
			Colleges

			File Name: <input type="file" name="import_file" id="import_file">	<input type="submit">
		</pre>
	</form>
	<hr>
	<form action="{{ route('uploadFile-xlsx-events') }}" method="post" enctype="multipart/form-data">
		<pre>
			Events

			File Name: <input type="file" name="import_file_events" id="import_file_events">	<input type="submit">
		</pre>
	</form>
	<hr>
	<form action="{{ route('uploadFile-xlsx-teams') }}" method="post" enctype="multipart/form-data">
		<pre>
			Teams

			File Name: <input type="file" name="import_file_teams" id="import_file_teams">	<input type="submit">
		</pre>
	</form>
	<hr>
	<form action="{{ route('uploadFile-xlsx-eventheads') }}" method="post" enctype="multipart/form-data">
		<pre>
			Eventheads

			File Name: <input type="file" name="import_file_eventheads" id="import_file_eventheads">	<input type="submit">
		</pre>
	</form>
	{!! QrCode::size(100)->generate('Make me into a QrCode!'); !!}
</body>
</html>