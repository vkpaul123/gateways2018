<!DOCTYPE html>
<html lang="en">
<head>
	@include('layouts.headcontent')

	<style>
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);@charset "UTF-8";
        body {
            font-family: 'Raleway';
        }
    </style>
</head>
<body>
	<header class="top-header shows">
		<div class="container">
			<div class="row" style="padding-top: 10px;">
				<div class="col-md-3 col-xs-7 col-sm-4 header-logo">
					<a href="/"> 
						{{-- <h1 class="logo">Nevada <span class="logo-head">Plus</span></h1> --}}
						<img src="{{ asset('nevada/nevada1/logoss/white_approval_one_copy.png') }}" alt="ss" class="logo img-responsive img" style="padding-bottom: 10px;">
					</a>
				</div>

				<div class="col-md-8 col-md-offset-1 col-xs-5">
					<nav class="navbar navbar-default">
					  	<div class="container-fluid nav-bar">
					    <!-- Brand and toggle get grouped for better mobile display -->
						    <div class="navbar-header">
						      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="margin-top: 15px;">
							        <span class="sr-only">Toggle navigation</span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
						      	</button>
						    </div>

					    	<!-- Collect the nav links, forms, and other content for toggling -->
						    <div class="collapse navbar-collapse navbar-def" id="bs-example-navbar-collapse-1">
						      	
						     	<img src="{{ asset('nevada/nevada1/logoss/50Logo.png') }}" alt="" class="pull-right col-md-2 img img-responsive">
						      	<ul class="nav navbar-nav navbar-right" style="margin-top: 10px;">
									<li>
										<a href="{{ route('home') }}" id="login"> DASHBOARD</a>
									</li>
									
									<li class="dropdown btn-info">

									    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
									        <i class="fa fa-user"></i> &nbsp; <strong>{{ Auth::user()->name }}</strong> <span class="caret"></span>
									    </a>

									    <ul class="dropdown-menu">
									        <li>
									            <a href="{{ route('logout') }}"
									                onclick="event.preventDefault();
									                         document.getElementById('logout-form').submit();" class="text-center">
									                Logout
									            </a>

									            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									                {{ csrf_field() }}
									            </form>
									        </li>
									    </ul>
									</li>
						      	</ul>
						    </div><!-- /navbar-collapse -->
					  	</div><!-- / .container-fluid -->
					</nav>
				</div>
			</div>
		</div>
	</header>
	
	<div id="wrapper">
		@section('body')
			@show
	

		<div class="content-block" style="background-color: #2B3E51; color: white;">
			<div class="container">				
				<div class="row" style="padding-top:50px;"><!--row2-->
					<div class="blog-post">
						<h2 class="footer-block">&nbsp; Contact Details</h2>
						<div class="col-md-4">
							<ul>
							<li class="address-sub"><i class="fa fa-map-marker"></i><strong>University Address</strong></li>
								<p>
									CHRIST (Deemed to be University)<br>
									Hosur Road,
									Bengaluru - 560029,<br>
									Karnataka, India
								</p>
							</ul>
						</div>
						<div class="col-md-4">
							<ul>
							<li class="address-sub"><i class="fa fa-phone"></i><strong>Mobile</strong></li>
								<p>
									Sakina Naaz: 7976866285<br>
									Immanual A: 9535001753<br>
									Chaithra VD: 9620735728<br>
									Kunal Kala: 9314557890 
								</p>
							</ul>
						</div>
						<div class="col-md-4">
							<ul>
							<li class="address-sub"><i class="fa fa-envelope-o"></i><strong>Email Address</strong></li>
								<p>
									sakina.naaz@mca.christuniversity.in<br>
									immanual.a@mca.christuniversity.in<br>
									chaithra.vd@cs.christuniversity.in<br>
									kunal.kala@cs.christuniversity.in
								</p>
							</ul>
						</div>						
					</div>
				</div><!--row2-->
			</div>
		</div>

		@include('layouts.footer')
	</div>

	<script src="{{ asset('nevada/nevada1/assets/js/jquery-2.1.3.min.js') }}"></script>
	<script src="{{ asset('nevada/nevada1/assets/js/bootstrap.js') }}"></script>
	<script src="{{ asset('nevada/nevada1/assets/js/jquery.actual.min.js') }}"></script>
	<script src="{{ asset('nevada/nevada1/assets/js/jquery.scrollTo.min.js') }}"></script>
	<script src="{{ asset('nevada/nevada1/assets/js/contact.js') }}"></script>
	<script src="{{ asset('nevada/nevada1/assets/js/script.js') }}"></script>
	<script src="{{ asset('nevada/nevada1/assets/js/smoothscroll.js') }}"></script>
</body>
</html>