@extends('student.layouts.app')

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

            @if (Session::has('messageError'))
              <div class="alert alert-danger">{!! Session::get('messageError') !!}
                <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
              </div>
            @endif
            @if (Session::has('messageSuccess'))
              <div class="alert alert-success">{!! Session::get('messageSuccess') !!}
                <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
              </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                    {{-- <div class="pull-right"><strong>Ticket ID:</strong> &nbsp; {{ Auth::user()->ticket_id }}</div> --}}
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
                        {{-- <h4>My QR Code</h4>
                        <center>
                            {!! QrCode::size(150)->generate(Auth::user()->registHash); !!}
                        </center> --}}
                        <div class="panel panel-info">
                            <div class="panel-heading"><strong>Team Name</strong></div>

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
                                                        {{-- <h4>Scan to enroll</h4>
                                                            <center>
                                                                @if ($event->id == env('GAMING_EVENT_ID'))
                                                                    <h5>Counter Strike 1.6</h5>
                                                                    {!! QrCode::size(150)->generate(env('GAME_QRHASH_CS')); !!}
                                                                    <hr>
                                                                    <h5>Blur</h5>
                                                                    {!! QrCode::size(150)->generate(env('GAME_QRHASH_BLUR')); !!}
                                                                    <hr>
                                                                    <h5>FIFA '18</h5>
                                                                    {!! QrCode::size(150)->generate(env('GAME_QRHASH_FIFA')); !!}
                                                                @else
                                                                    {!! QrCode::size(150)->generate($event->qrCodeHash); !!}
                                                                @endif
                                                            </center>
                                                        <hr> --}}
                                                        @if ($event->id == env('GAMING_EVENT_ID'))
                                                            <input type="radio" name="gaming" id="gaming_cs" onclick="setGame(1)"> &nbsp; Counter Strike 1.6 <br>
                                                            <input type="radio" name="gaming" id="gaming_blur" onclick="setGame(2)"> &nbsp; Blur <br>
                                                            <input type="radio" name="gaming" id="gaming_fifa" onclick="setGame(3)"> &nbsp; FIFA '18 <br>
                                                            <hr>
                                                        @endif
                                                        Location: <strong>{{ $event->location }}</strong> <br>
                                                        Time: <strong>{!! $event->time !!}</strong> <br>
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
                                                        @php
                                                            $notEnrolled = true;
                                                        @endphp
                                                            @foreach ($eventsEnrolled as $eventEnrolled)
                                                                @if($event->id == $eventEnrolled->event_id)
                                                                    <span class="text-success"><i><b>Enrolled</b></i></span>

                                                                    @php
                                                                        $notEnrolled = false;
                                                                    @endphp
                                                                @endif
                                                            @endforeach

                                                        @if ($notEnrolled == true)
                                                            <span class="text-muted"><i>Not Enrolled</i></span>
                                                        @endif
                                                        
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <a href="" class="btn btn-block btn-info {{ $notEnrolled==false? ' disabled' : ' ' }}" onclick="if(confirm('Are you sure you want to enroll in this event?')) { event.preventDefault(); document.getElementById('enrollment-{{ $event->id }}').submit(); } else event.preventDefault();"><strong>Enroll in Event</strong></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @if ($event->id == env('GAMING_EVENT_ID'))
                                <form action="{{ route('students-event-enrollment') }}" method="post" style="display: none;" id="enrollment-{{ $event->id }}">
                                    <input type="hidden" name="student_id" id="student_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="event_id" id="event_id" value="{{ $event->id }}">
                                    <input type="hidden" name="enrollStatus" id="enrollStatus" value="1">
                                    <input type="hidden" name="subEvent" id="subEvent">
                                </form>

                            @else
                                <form action="{{ route('students-event-enrollment') }}" method="post" style="display: none;" id="enrollment-{{ $event->id }}">
                                    <input type="hidden" name="student_id" id="student_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="event_id" id="event_id" value="{{ $event->id }}">
                                    <input type="hidden" name="enrollStatus" id="enrollStatus" value="1">
                                </form>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('pageSpecificScripts')

@if (Session::has('message'))
    <script type="text/javascript">
        jQuery(window).on('load',function(){
            jQuery('#myModal3').modal({backdrop: "static"});
        });
    </script>
@endif

<script>
    function setGame(x) {
        switch (x) {
            case 1:
                jQuery("#subEvent").val('CS');
                break;
            case 2:
                jQuery("#subEvent").val('Blur');
                break;
            case 3:
                jQuery("#subEvent").val('Fifa');
                break;
        }
    }
</script>

@endsection