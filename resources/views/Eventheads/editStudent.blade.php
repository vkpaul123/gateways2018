@extends('Eventheads.layouts.app')

@section('body')

<div class="container-fluid" style="padding-top: 110px;">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    Eventhead Dashboard
                    <div class="pull-right"><strong>Event:</strong> &nbsp; Registration Desk</i> <strong>&nbsp;<u>EDIT DATA</u></strong></div>
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
                            <div class="pull-left">
                                <a href="{{ route('admin.home') }}" class="btn btn-info">Back</a>
                            </div>
                            <div class="pull-right">
                                <a href="" class="btn btn-danger" onclick="if(confirm('Do you want to Delete this Student?')) { event.preventDefault(); document.getElementById('deleteStudent').submit(); } else event.preventDefault();">Delete Student</a>

                                <form action="{{ route('show.Student.editForm-delete', $student->id) }}" class="hidden" id="deleteStudent" method="post">
                                    {{ method_field('DELETE') }}
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>

                    @if(Session::has('message'))
                    <div class="alert alert-success">

                        {!! Session::get('message') !!}
                        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
                    </div>
                    @endif
                    
                    <div class="col-md-8 col-md-offset-2">
                        <div class="container-fluid">
                        <div class="row">
                            <form action="{{ route('show.Student.editForm-update', $student->id) }}" class="form-horizontal" method="post">
                                {{ method_field('PUT') }}

                                <div class="form-group">
                                    <table>
                                        <tr>
                                            <th>Student ID: &nbsp;</th>
                                            <td>{{ $student->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email ID: &nbsp;</th>
                                            <td>{{ $student->email }}</td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="name" class="form-control" name="name" value="{{ $student->name }}" autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }} Also make sure your account is activated.</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                    <label for="mobile" class="col-md-4 control-label">Mobile</label>

                                    <div class="col-md-6">
                                        <input id="mobile" type="mobile" class="form-control" name="mobile" value="{{ $student->mobile }}" autofocus>

                                        @if ($errors->has('mobile'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('mobile') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" value="" autofocus>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div id="oldCollege" class="form-group{{ $errors->has('college_id') ? ' has-error' : '' }}">
                                    <label for="college_id" class="col-md-4 control-label">College Name</label>
                                    <div class="col-md-6">
                                        <select class="form-control select2" style="width: 100%;" name="college_id" id="college_id">
                                            <option disabled="disabled" selected="selected" value="">(Select College)</option>

                                            @if ($colleges->count())
                                                @foreach ($colleges as $college)
                                                    <option value="{{ $college->id }}">{{ $college->name }}</option>
                                                @endforeach
                                            @endif
                                            
                                        </select>
                                        
                                    </div>
                                </div>

                                <div id="oldCollege" class="form-group{{ $errors->has('teams') ? ' has-error' : '' }}">
                                    <label for="teams" class="col-md-4 control-label">Team Name</label>
                                    <div class="col-md-6">
                                        <select class="form-control select2" style="width: 100%;" name="teams" id="teams">
                                            <option disabled="disabled" selected="selected" value="">(Select College)</option>
                                            
                                            

                                            @if ($teams->count())
                                                @foreach ($teams as $team)
                                                    <option value="{{ $team }}">{{ $team }}</option>
                                                @endforeach
                                            @endif
                                            
                                        </select>
                                        
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-2">
                                        <input type="submit" class="btn btn-block btn-success">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="panel-footer">
                    <h4><strong>Events enrolled in...</strong></h4>
                    <hr>
                    <ul>
                        <li>
                            <table>
                                @forelse ($events as $event)
                                    <tr>
                                        <td>
                                            <strong>{{ $event->event_id->name }}</strong>    
                                        </td>
                                        <td>
                                            &nbsp; ({{ $event->event_id->commonName }}) &nbsp;&nbsp;&nbsp;    
                                        </td>
                                        <td>
                                            @if ($event->event_id->id == env('GAMING_EVENT_ID'))
                                                &nbsp; {{ $event->subEvent }} &nbsp;&nbsp;&nbsp;
                                            @endif
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-danger btn-xs" onclick="
                                                if(confirm('Are you sure you want to un-enroll this student from this event?')) {
                                                    event.preventDefault();
                                                    document.getElementById('un-enroll-{{ $event->id }}').submit();
                                                } else {
                                                    event.preventDefault();
                                                }
                                            ">Un-Enroll</a>

                                            <form action="{{ route('unEnrollStudent-admin', $event->id) }}" method="post" class="hidden" id="un-enroll-{{ $event->id }}">
                                                {{ method_field('DELETE') }}

                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr colspan="3">Not enrolled any Events!</tr>
                                @endforelse
                                
                            </table>
                            
                        </li>
                    </ul>

                    <hr>
                    <h3><strong>Enroll this person in Event...</strong></h3>
                    <form action="{{ route('enrollStudent-admin') }}" class="form-horizontal" method="post">
                        <div class="form-group{{ $errors->has('event_id') ? ' has-error' : '' }}">
                            <label for="event_id" class="col-md-4 control-label">Event Name</label>
                            <div class="col-md-4">
                                <select class="form-control select2" style="width: 100%;" name="event_id" id="event_id">
                                    <option disabled="disabled" selected="selected" value="">(Select Event)</option>
                                    @if ($allEvents->count())
                                        @foreach ($allEvents as $event)
                                            <option value="{{ $event->id }}">{{ $event->name }}</option>
                                        @endforeach
                                    @endif
                                    
                                </select>
                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('subEvent') ? ' has-error' : '' }}">
                            <label for="subEvent" class="col-md-4 control-label">Sub-Event Name (Only for Gaming)</label>
                            <div class="col-md-4">
                                <select class="form-control select2" style="width: 100%;" name="subEvent" id="subEvent">

                                    <option value="n/a">n/a</option>
                                    <option value="CS">CS</option>
                                    <option value="Blur">Blur</option>
                                    <option value="Fifa">Fifa</option>
                                    
                                </select>
                                
                            </div>
                        </div>

                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                        <hr>
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <input type="submit" class="btn btn-block btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('pageSpecificScripts')

<script src="{{ asset('js/select2.full.min.js') }}"></script>

<script>
  jQuery("#teams").val("{{ $student->team }}").trigger('change');
  jQuery("#college_id").val("{{ $student->college_id }}").trigger('change');

  jQuery('.select2').select2({
        placeholder: "Select…"
    })
</script>


@endsection