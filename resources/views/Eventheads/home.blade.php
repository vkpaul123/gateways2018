@extends('Eventheads.layouts.app')

@section('body')

<div class="container-fluid" style="padding-top: 110px;">
    <div class="row">
        <div class="col-md-12">
            
            {{-- @if(Session::has('message'))
            <div class="alert alert-success">
                Account Activated Successfully!

                {!! Session::get('message') !!}
                <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
            </div>
            @endif --}}

            <div class="panel panel-default">
                <div class="panel-heading">
                    Eventhead Dashboard
                    <div class="pull-right"><strong>Event:</strong> &nbsp; {{ $event->name }} &nbsp; <i>({{ $event->commonName }})</i></div>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <h3>Welcome, <strong class="text-primary">{{ Auth::user()->name }}</strong></h3>
                        </div>
                        
                    </div>
                    <hr>

                    

                    <div class="container-fluid">
                        <div class="row">
                            <div class="table-responsive padding-none">
                                <table class="table" id="allStudentsInMyEvent">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Team</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Sub-Event</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset ($students)
                                            @foreach ($students as $student)
                                                <tr>
                                                    <td>{{ $student->student_id->id }}</td>
                                                    <td>{{ $student->student_id->name }}</td>
                                                    <td>
                                                        @if($student->student_id->sex)
                                                            Female
                                                        @else
                                                            Male
                                                        @endif
                                                    </td>
                                                    <td>{{ $student->student_id->team }}</td>
                                                    <td>{{ $student->student_id->email }}</td>
                                                    <td>{{ $student->student_id->mobile }}</td>
                                                    <td>{{ $student->subEvent }}</td>
                                                </tr>
                                            @endforeach
                                        
                                        @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('pageSpecificScripts')

<script>
  jQuery(function () {
    jQuery('#allStudentsInMyEvent').DataTable({
      'paging' : true,
      'lengthChange' : true,
      'searching' : true,
      'ordering' : false,
      'info' : true,
      'autoWidth' : true
    })
  })
</script>


@endsection