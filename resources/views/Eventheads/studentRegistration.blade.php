@extends('Eventheads.layouts.app')

@section('body')

<div class="container-fluid" style="padding-top: 110px;">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    Eventhead Dashboard
                    <div class="pull-right"><strong>Event:</strong> &nbsp; Registration Desk</i></div>
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

                    @if(Session::has('message'))
                    <div class="alert alert-success">

                        {!! Session::get('message') !!}
                        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
                    </div>
                    @endif

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
                                            <th>College</th>
                                            <th>Accomodation</th>
                                            <th>Account</th>
                                            <th>Payment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset ($students)
                                            @foreach ($students as $student)
                                                <tr>
                                                    <td>{{ $student->id }}</td>
                                                    <td>
                                                        <a href="{{ route('show.Student.editForm', $student->id) }}">
                                                            <strong>{{ $student->name }}</strong>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        @if($student->sex)
                                                            Male
                                                        @else
                                                            Female
                                                        @endif
                                                    </td>
                                                    <td>{{ $student->team }}</td>
                                                    <td>{{ $student->email }}</td>
                                                    <td>{{ $student->mobile }}</td>
                                                    <td>{{ $student->college_id }}</td>
                                                    <td>
                                                        @if ($student->isLocalite)
                                                            <span class="text-info">Requested</span>
                                                        @else
                                                            <span class="text-muted">Not Requested</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($student->status)
                                                            <span class="text-success">Activated</span>
                                                        @else
                                                            <span class="text-danger">Not Activated</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($student->amountPaid)
                                                            <strong class="text-success"><i>Payment Recieved</i></strong>
                                                        @else
                                                            <a href="{{ route('student.take-payment', $student->id) }}" class="btn btn-sm btn-warning" onclick="if(!confirm('Are you sure the Payment is taken?')) event.preventDefault();">Take Payment</a>

                                                            {{-- <form action="" class="hidden" id="payment-form-{{ $student->id }}">
                                                                {{ method_field('PUT') }}

                                                                <input type="hidden" name="student_id" value="{{ $student->id }}">
                                                            </form> --}}
                                                        @endif
                                                    </td>
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
      'ordering' : true,
      'info' : true,
      'autoWidth' : true
    })
  })
</script>


@endsection