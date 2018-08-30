<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gateways '18 - Login</title>

    <!-- meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no"/>

    <!-- google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:500,300' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Serif:regular,bold"/>

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('nevada/nevada1/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('nevada/nevada1/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('nevada/nevada1/assets/css/style.css') }}" media="screen"/>
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <link href="{{ asset('css/Bauhaus_Modern/gatewaysfont.css') }}" rel="stylesheet">
    <style>
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);@charset "UTF-8";
        body {
            font-family: 'Raleway';
        }
    </style>
</head>
<body>
    <header class="top-header">
        <div class="container-fluid" style="background-color: #2B3E51;">
            <div class="row" style="padding-top: 10px;">
                <div class="col-md-3 col-xs-7 col-sm-4 header-logo" style="padding-bottom: 10px;">
                    <a href="/welcome"> 
                        {{-- <h1 class="logo">Nevada <span class="logo-head">Plus</span></h1> --}}
                        <img src="{{ asset('nevada/nevada1/logoss/christ_logo_white_original.png') }}" alt="ss" class="logo img-responsive img" style="padding-bottom: 10px;">
                    </a>
                </div>
                <div class="col-md-8 col-md-offset-1 col-xs-5">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid nav-bar">
                        <!-- Brand and toggle get grouped for better mobile display -->
                           {{--  <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div> --}}

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse navbar-def" id="bs-example-navbar-collapse-1">
                                
                                <img src="{{ asset('nevada/nevada1/logoss/50Logo.png') }}" alt="" class="pull-right col-md-2 img img-responsive">
                                
                            </div><!-- /navbar-collapse -->
                        </div><!-- / .container-fluid -->
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div id="wrapper">
        <div class="container-fluid" style="padding-top: 124px; padding-bottom: 54px;">
            <img src="{{ asset('nevada/nevada1/logoss/gateways-font.png') }}" alt="" class="img img-responsive col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">Login</div>

                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>
                                    </div>
                                </div>

                                <hr>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <div class="pull-right">
                                            <a href="/welcome#registration" onclick="alert('Use your Ticket ID to Register Again.');">Register &nbsp; | &nbsp; Forgot Password</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-block footer-bottom" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">Gateways 2018</div>
                <div class="col-xs-6 text-right">Department of Computer Science <strong><a href="{{ url('https://christuniversity.in/sciences/computer-science') }}" target="_blank"> &nbsp; CHRIST (Deemed to be University)</a></strong></div>
            </div>
        </div>
    </div><!-- #footer -->

    <script src="{{ asset('nevada/nevada1/assets/js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ asset('nevada/nevada1/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('nevada/nevada1/assets/js/jquery.actual.min.js') }}"></script>
    <script src="{{ asset('nevada/nevada1/assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('nevada/nevada1/assets/js/contact.js') }}"></script>
    <script src="{{ asset('nevada/nevada1/assets/js/script.js') }}"></script>
    <script src="{{ asset('nevada/nevada1/assets/js/smoothscroll.js') }}"></script>

    <script type="text/javascript">
    

    jQuery('.scroll').on('click', function(e){      
            e.preventDefault()
        
      jQuery('html, body').animate({
          scrollTop : jQuery(this.hash).offset().top
        }, 1500);
    });


    </script>
    
</body>
</html>