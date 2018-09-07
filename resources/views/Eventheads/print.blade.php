<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Print</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap.min.css" integrity="sha256-PbaYLBab86/uCEz3diunGMEYvjah3uDFIiID+jAtIfw=" crossorigin="anonymous" />
</head>
<body>
	<b>Gateways 2018</b> - &nbsp;&nbsp;&nbsp; {{ $event->name }} &nbsp; ({{ $event->commonName }})
	<h4><b>List of Participants</b></h4>
	<table class="table" id="allStudentsInMyEvent">
		<thead>
			<tr>
				<th>Name</th>
				<th>Team</th>
				<th>College</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($students as $student)
				<tr>
					<td>{{ $student->student_id->name }}</td>
					<td>{{ $student->student_id->team }}</td>
					<td>{{ $student->student_id->college_id }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.min.js" integrity="sha256-qcV1wr+bn4NoBtxYqghmy1WIBvxeoe8vQlCowLG+cng=" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/dataTables.bootstrap.min.js" integrity="sha256-X/58s5WblGMAw9SpDtqnV8dLRNCawsyGwNqnZD0Je/s=" crossorigin="anonymous"></script>

	<script>
	  jQuery(function () {
	    jQuery('#allStudentsInMyEvent').DataTable({
	      'paging' : false,
	      'lengthChange' : false,
	      'searching' : false,
	      'ordering' : false,
	      'info' : true,
	      'order' : '2, asc',
	      'autoWidth' : false
	    })
	  })
	</script>
</body>
</html>