@extends('student.layouts.app')

@section('body')

<div class="container-fluid" style="padding-top: 110px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                    <div class="pull-right"><strong>Ticket ID:</strong> &nbsp; {{ Auth::user()->ticket_id }}</div>
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

                    <div class="col-md-3">
                        <h4>My QR Code</h4>
                        <center>
                            {!! QrCode::size(150)->generate(Auth::user()->registHash); !!}
                        </center>
                        <div class="panel panel-info">
                            <div class="panel-heading"><strong>My Team</strong></div>

                            <div class="panel-body">
                                <h3 class="text-primary text-center">
                                    @isset (Auth::user()->team)
                                        <strong>
                                        {{ Auth::user()->team }}
                                        </strong>
                                    @endisset
                                </h3>
                            </div>

                            <div class="panel-footer">
                                <strong>Members:</strong> &nbsp;
                                <span class="text-info">
                                    {{ $totalMembers->count() }} <hr>
                                    @if ($totalMembers->count() != 0)
                                        <ul>
                                            @foreach ($totalMembers as $member)
                                                <li><i class="fa fa-user"></i> &nbsp; {{ $member->name }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <h2 class="text-primary"><strong>My Events</strong></h2>
                        <hr>
                        @foreach ($events as $event)
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="panel panel-info">
                                        <div class="panel-heading" data-toggle="collapse" data-target="#event-{{ $event->id }}">
                                            <img src="{{ asset($event->photo) }}" class="img img-responsive img-thumbnail" style="height: 48px;">
                                            &nbsp; <strong>{{ $event->name }}</strong>

                                            <div class="pull-right btn-lg">
                                                <i class="caret"></i>
                                            </div>
                                        </div>

                                        <div class="panel-body collapse" id="event-{{ $event->id }}">

                                            <h5><strong>{{ $event->commonName }}</strong></h5>
                                            <hr>

                                            <div class="col-md-8">
                                                {!! $event->rules !!}
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="panel panel-warning">
                                                    <div class="panel-heading">Enrollment</div>

                                                    <div class="panel-body">
                                                        <h4>Scan to enroll</h4>
                                                            <center>
                                                                {!! QrCode::size(150)->generate($event->qrCodeHash); !!}
                                                            </center>
                                                        <hr>
                                                        Location: <strong>{{ $event->location }}</strong> <br>
                                                        Time: <strong>{{ $event->time }}</strong> <br>
                                                        Event Type: 
                                                                    @if ($event->if_team)
                                                                        <strong>
                                                                            Team Event
                                                                        </strong> <br>

                                                                        Members: <strong>{{ $event->members }}</strong> <br>

                                                                    @else
                                                                        <strong>Individual</strong> <br>
                                                                    @endif
                                                        <hr>
                                                                    
                                                        <strong>Enrollment Status:</strong> &nbsp;
                                                            Enrolled
                                                        
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <a href="" class="btn btn-block btn-success"><strong>Enroll</strong></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="" style="display: none;" id="enrollment-{{ $event->id }}">
                                
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
