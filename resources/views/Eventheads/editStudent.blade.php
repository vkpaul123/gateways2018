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
                                    <input type="submit" class="btn btn-block btn-success">
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
                        @forelse ($events as $event)
                            <li>
                                <strong>{{ $event->event_id->name }}</strong> &nbsp; ({{ $event->event_id->commonName }})
                            </li>
                        @empty
                            <li>Not enrolled any Events!</li>
                        @endforelse
                    </ul>
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