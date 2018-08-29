@extends('layouts.app')

@section('pageSpecificHeads')

<link href="{{ asset('css/Bauhaus_Modern/gatewaysfont.css') }}" rel="stylesheet">

<style>
	table, th, td {
		border: 1px solid black;
	}
	
	#video {
		position: relative;
		padding-bottom: 56.25%;
		height: 0;
	}
	
	#video iframe {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}

	#video .iframe .gateways .gateways2 {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}

	#video_background {
		height: 250%;
		width: 100%;
	}

	.WebContainer{
	    width:100%;
	    min-width:1000px;
	    height:auto;
	} 
	
</style>

@endsection

@section('body')

<div class="wrapper">
	<div class="h_iframe" id="video">
		<div id="videoForDeskTop">
			<iframe id="myVideo" width="100%" height="100%" src="https://www.youtube.com/embed/B14gTKd377w?version=3&loop=1&autoplay=1&rel=0&showinfo=0&controls=0&autohide=1&playlist=3Ny-8x9_9dk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		</div>

		{{-- <video id="video_background" preload="auto" autoplay="true" loop="loop" muted="muted" volume="0">
			<source type="video/mp4" src="{{ asset('nevada/nevada1/assets/videos/Sequence_02_1.mp4') }}"> Video not supported 
		</video> --}}

		<div id="video_background">
			
		</div>
		
		<div id="gatewaysbanners">
			<div id="header" class="content-block gateways" style="background-color: #00d5e6; opacity: 1; top: 0px;">
				<section class="center">
					<div class="secondary-slogan">
						{{-- Department of Computer Science PG --}}
					</div>
					<div class="slogan">
						{{-- GATEWAYS 2018 --}}
					</div>
					<div class="slogan" style="margin-top: 0px">
						<img src="{{ asset('nevada/nevada1/logoss/poster-final2-Recovered.png') }}" alt="" class="img-resposive">
					</div>
				</section>
			</div>
			<div class="content-block gateways2" id="header">
				<section class="center pull-left">
					<div class="secondary-slogan departmentOfCompSci departmentOfCompSci2" style="opacity: 1; z-index: 501;">
						Department of Computer Science PG
					</div>
					<div class="slogan gateways2018Title" style="opacity: 1; z-index: 501;">
						&nbsp;GATEWAYS 2018
					</div>
					<div class="secondary-slogan departmentOfCompSci" style="opacity: 1; z-index: 501;">
						<strong>6 &amp; 7 September 2018 &nbsp;</strong>
					</div>
					<div class="secondary-slogan departmentOfCompSci" style="opacity: 1; z-index: 501;">
						CHRIST (Deemed to be University), &nbsp;<br>Main Campus 
					</div>
				</section>

				<section class="center pull-right">
					{{-- <div class="secondary-slogan departmentOfCompSci" style="opacity: 1; z-index: 501;">
						9:00AM &nbsp;
					</div> --}}
					<div class="secondary-slogan departmentOfCompSci departmentOfCompSci2" style="opacity: 1; z-index: 501;">
						We will start in &nbsp;
					</div>
					<div class="slogan departmentOfCompSci timeRemaining" style="opacity: 1; z-index: 501;">

					</div>
					<div class="secondary-slogan departmentOfCompSci" style="opacity: 1; z-index: 501;">
						<i>Register Now!</i> &nbsp;
					</div>
				</section>
			</div>
		</div>
		
	</div>
</div>
{{-- <input type="hidden" id="mobileLink" value="{{ asset('nevada/nevada1/assets/videos/Sequence_02_1.mp4') }}"> --}}
<input type="hidden" id="mobileLink" value="{{ asset('nevada/nevada1/assets/videos/video2gif.gif') }}">
<script>
	function myFunction() {
		if (screen.width < 992) {
			// var vid = document.getElementById("myVideo");
			
			document.getElementById('videoForDeskTop').style.display = "none";
			
			document.getElementById('gatewaysbanners').style.display = "none";
			
			var link = document.getElementById('mobileLink').value;

			document.getElementById('video_background').innerHTML = '<img style="width:100%" src="'+ link +'" alt="gif">';
			// document.getElementById('video_background').innerHTML = '<source src="'+ link +'">';

			// var vid = document.getElementById('video_background');
			// vid.addEventListener('click', function () {
			// 	vid.play();
			// });

		} else {
			document.getElementById('video_background').style.display = "none";
		}
	}
	myFunction();
</script>


<div class="content-block parallax" id="parallax" style="margin-top: auto;">
	<div class="container-fluid">
		<div class="col-md-10 col-md-offset-1">
			<div id="login1"></div>
			<div id="infoOnMobile">
				<div class="row">
					<h4 class="call-action pull-left" style="color: #fff;">Department of Computer Science PG</h4>
				</div>
				<div class="row">
					<h1 class="call-action pull-left"><strong>GATEWAYS 2018</strong></h1>
				</div>
				<div class="row">
					<h4 class="call-action pull-left" style="color: #fff;">6 &amp; 7 September 2018</h4>
				</div>
				<div class="row">
					<h4 class="call-action pull-left" style="color: #fff;">CHRIST (Deemed to be University), <br>Main Campus</h4>
				</div>
				<hr>
				<div class="row">
					<h4 class="call-action pull-left" style="color: #fff;"><i>We will start in</i></h4>
				</div>
				<div class="row">
					<h2 class="call-action pull-left timeRemaining" style="color: #fff;"></h2><br>
				</div>
				<div class="row">
					<h4 class="call-action pull-left" style="color: #fff;"><i>Register Now!</i></h4>
				</div>
				<hr>
			</div>
			@if (Auth::guest())
				<div class="row">
					<h3 class="call-action pull-left">&nbsp; Register Yourself.</h3>
					<div class="col-md-3 col-xs-6 pull-right">
						<a href="#"  id="registration2" class="btn-block btn btn-o-white btn-lg">Register</a>
					</div>
				</div>
				<hr>
				<div class="row">
					<h3 class="call-action pull-left">&nbsp; Already a User?</h3>
					<div class="col-md-3 col-xs-6 pull-right">
						<a href="/login" class="btn-block btn btn-o-white btn-lg">Log in</a>
					</div>
				</div>
			@else
				<div class="row">
					<h3 class="call-action pull-left">&nbsp; View your Dashboard.</h3>
					<div class="col-md-3 col-xs-6 pull-right">
						<a href="/login" class="btn-block btn btn-o-white btn-lg">Home</a>
					</div>
				</div>		
			@endif
			
		</div>
	</div>
</div>

<!-- About us -->
<div id="about" class="about-us">
    <div class="container about-sec">
        <header class="block-heading cleafix" style="color: #6a6a6a;">
			<div class="title-page">
				<p class="main-header">About us</p>
			    <!--<p class="sub-header">Make sure you know about us</p>-->
			</div>
			<p style="text-align: justify;">
				<br>
				CHRIST (Deemed to be university) was born out of the educational vision of Carmelites of Mary Immaculate (CMI) congregation founded by St Kuriakose Elias Chavara. He was a great educationist, visionary and a social reformer of the 19th century who founded the Congregation in 1831 in South India. CHRIST (Deemed to be University) was established in July 1969 as Christ College. It was the first institution in Karnataka to be accredited by the National Assessment and Accreditation Council (NAAC). University Grants Commission (UGC) conferred Autonomy to the institution in 2004. It became the first College in South India to be accredited with A+ by NAAC in 2005. UGC identified it as an Institution with Potential for Excellence in 2006. Under Section 3 of the UGC Act, 1956, Ministry of Human Resources Development of the Union Government of India, vide Notification No. F. 9-34/2007-U.3 (A), declared Christ College as a Deemed to be University, in July 2008. The University was accredited with ‘A’ Grade by NAAC in 2016. <br>This year CHRIST (Deemed to be University) is celebrating it’s 50th anniversary.
			</p>
		</header>
		<hr>
        <div class="divide50"></div>
        	<div class="row">
            	<div class="col-md-3 text-center no-padding">
                	<div id="disp_x1" class="aboutus-item" style="overflow: hidden; height: 400px;">
	                    <i class="aboutus-icon" class="">
		                    <img src="{{ asset('nevada/nevada1/logoss/50Logo.png') }}" alt="" class="img-responsive">
	                    </i>
	                    <h4 class="aboutus-title"><b>50 years of CHRIST</b></h4>
	                    <p class="aboutus-desc">All through its fifty years, CHRIST (Deemed to be University) has continued to strive to satisfy its vision, Excellence and Service". At the onset of the Golden Jubilee of the University, an institution that has always been and continues to be the nurturing ground for individual's holistic development through its guiding principles Excellence and Service. Intellectual, moral and social growth teamed up with discipline and erudition has till-date made Christites stand out. Well-formulated courses when clustered with a team of enthusiastic and learned faculty, frame the chemistry of this successful educational saga.
	                    </p>
                	</div>
                	<h6 class="text-info" onclick="read1()"><strong>Read More</strong></h6>
            	</div>
	            <div class="col-md-3 text-center">
	                <div id="disp_x2" class="aboutus-item" style="overflow: hidden; height: 400px;">
	                    <i class="aboutus-icon" class="">
		                    <img src="{{ asset('nevada/nevada1/logoss/logo.png') }}" alt="" class="img-responsive">
	                    </i>
	                    <h4 class="aboutus-title"><b>Gateways 2018</b></h4>
	                    <p class="aboutus-desc">Gateways is a national level inter-collegiate post graduate IT fest organized by the Department of Computer Science, CHRIST (Deemed to be University). It provides the much needed exposure which is a prerequisite to survive in the IT industry. Participants compete in numerous technical and non-technical events that are both entertaining and intellectually challenging. We are delighted to invite you for the 22nd version of gateways. This is a time for fouble celebrationas we are golden jubilee of CHRIST and silver jubilee of MCA department.</p>
	                </div>
	                <h6 class="text-info" onclick="read2()"><strong>Read More</strong></h6>
	            </div>
	            <div class="col-md-3 text-center">
	                <div id="disp_x3" class="aboutus-item" style="overflow: hidden; height: 400px;">
	                    <i class="aboutus-icon" class="">
	                    	<img src="{{ asset('nevada/nevada1/logoss/logo_gamification.png') }}" alt="" class="img-responsive">
	                    </i>
	                    <h4 class="aboutus-title"><b>Gamelligence</b></h4>
	                    <p class="aboutus-desc">Gamification is the application of game concepts in non-game contexts. And in Gateways, we intend to implement the same. Gamification is set to leverage human behaviour by stating the basic homo sapien instincts like socializing, learning, mastery, competition achievement status, self expression, alturism etc. It is a technology that helps to build one's responses into strategies for tracking growth. With the fun and learn concept being implemented, gamification gains its major share of popularity at work places and market places. The motivation to learn is generated within the individual, as earning points and scoring levels starts to add up to the overall learning process.</p>
	                </div>
	                <h6 class="text-info" onclick="read3()"><strong>Read More</strong></h6>
	            </div>
	            <div class="col-md-3 text-center">
	                <div id="disp_x4" class="aboutus-item" style="overflow: hidden; height: 400px;">
	                    <i class="aboutus-icon" class="">
	                    	<img src="{{ asset('nevada/nevada1/logoss/logo 25.png') }}" alt="" class="img-responsive">
	                    </i>
	                    <h4 class="aboutus-title"><b>25 years of MCA</b></h4>
	                    <p class="aboutus-desc">Department of Computer Science, CHRIST (Deemed to be University), proudly celebrates 25 years of its Master of Computer Application (MCA) programme which started in the year 1994. The long journey of 25 years has about 1500+ students who have graduated from the course.The Department is proud to see its alumni, imparting their knowledge in IT industry at their best..</p>
	                </div>
	                <h6 class="text-info" onclick="read4()"><strong>Read More</strong></h6>
	            </div>
	        </div>
        </div>
    </div>
</div>

<!-- /About us -->

<script>
			
	function read1() {
		if (document.getElementById("disp_x1").style.height == "auto") {
			document.getElementById("disp_x1").style.height = "400px";
		} else {
			document.getElementById("disp_x1").style.height = "auto";
		}
	}
	function read2() {
		if (document.getElementById("disp_x2").style.height == "auto") {
			document.getElementById("disp_x2").style.height = "400px";
		} else {
			document.getElementById("disp_x2").style.height = "auto";
		}
	}
	function read3() {
		if (document.getElementById("disp_x3").style.height == "auto") {
			document.getElementById("disp_x3").style.height = "400px";
		} else {
			document.getElementById("disp_x3").style.height = "auto";
		}
	}
	function read4() {
		if (document.getElementById("disp_x4").style.height == "auto") {
			document.getElementById("disp_x4").style.height = "400px";
		} else {
			document.getElementById("disp_x4").style.height = "auto";
		} 
	}

</script>

<div class="content-block" id="portfolio" style="background-color: #cccc;">
	<img src="{{ asset('nevada/nevada1/logoss/gateways-font.png') }}" alt="" class="img img-responsive col-md-8 col-md-offset-2">
	<div class="container portfolio-sec">
		<header class="block-heading cleafix">
			<!--<a href="#" class="btn btn-o btn-lg pull-right">View All</a>-->
			<div class="title-page">
				<p class="main-header">Our Events </p>
			    <!--<p class="sub-header">Take a look at some of our recent products</p>-->
		    </div>
		</header>
		<section class="block-body">
			<div class="row">
				<div class="col-sm-4 recent-button">
					<a href="#" class="recent-work" style="background-image:url({{ asset('nevada/nevada1/logoss/EventIcons/AdMake.jpg') }})">
						<span class="btn btn-o-white" data-toggle="modal" data-target="#ad-making-event">Click-Bait...</span>
					</a>
				  	<div class="modal fade" id="ad-making-event" role="dialog">
						<div class="modal-dialog"><div class="modal-content">
						<div class="modal-header">
				  			<button type="button" class="close" data-dismiss="modal">&times;</button>
				  			<h4 class="modal-title"><strong style="color: rgb(219, 82, 82);">Click-Bait</strong> &nbsp; <small>(Ad Making)</small></h4>
						</div>
						<div class="modal-body">
							<p style="color: rgb(219, 82, 82); text-align: justify;"><i>
								You know those annoying things that interrupt your videos for 10 seconds? Be on the money making side of them.
								</i>
							</p>
							<h4>Rules:</h4>
					  		<p><ul>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Maximum 2 participants in a team.</li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Maximum 2 teams per college.</li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; The topic for the ad will be given to the participants in the respective venue. </li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; The video must be shot within the campus premise of Christ University. </li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Participants must bring their own camera, laptop, usb drive or any other gadgets necessary for the ad making. </li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; The video shall not contain any vulgar remark or act.</li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; The duration of the video should be minimum  30 seconds and maximum 1 minute including all titles and credits. </li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; The playback format of the video must be in mp4.</li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; The video must be submitted to the event coordinators in a usb drive on the 2nd day between 1.30pm and 2pm.</li><br>
					  		</ul></p>
						</div><!--medal-body-->
				  		</div></div> <!--medal-content.medal-dialog-->
				  	</div> <!--medal-->						
				</div>
				<div class="col-sm-4 recent-button">
					<a href="#" class="recent-work" style="background-image:url({{ asset('nevada/nevada1/logoss/EventIcons/AppProto.jpg') }})">
						<span class="btn btn-o-white" data-toggle="modal" data-target="#app-prototyping-event">Intent Not Found...</span>
					</a>
				  	<div class="modal fade" id="app-prototyping-event" role="dialog">
						<div class="modal-dialog"><div class="modal-content">
						<div class="modal-header">
				  			<button type="button" class="close" data-dismiss="modal">&times;</button>
				  			<h4 class="modal-title"><strong style="color: rgb(219, 82, 82);">Intent Not Found</strong> &nbsp; <small>(App Prototyping)</small></h4>
						</div>
						<div class="modal-body">
							<p style="color: rgb(219, 82, 82); text-align: justify;"><i>
								Come up with a design and user experience people (And the judges) will never forget.
								</i>
							</p>
							<h4>Rules:</h4>
					  		<p><ul>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Maximum two members in a team (No individual participation).</li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Participants should carry a laptop with necessary software.</li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Internet will be provided.</li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; The decision made by the judges will be final.</li><br>
					  		</ul></p>
						</div><!--medal-body-->
				  		</div></div> <!--medal-content.medal-dialog-->
				  	</div> <!--medal-->	
				</div>
				<div class="col-sm-4 recent-button">
					<a href="#" class="recent-work" style="background-image:url({{ asset('nevada/nevada1/logoss/EventIcons/EventX.jpg') }})">
						<span class="btn btn-o-white" data-toggle="modal" data-target="#event-x-event">Event X...</span>
					</a>
					<div class="modal fade" id="event-x-event" role="dialog">
						<div class="modal-dialog"><div class="modal-content">
						<div class="modal-header">
				  			<button type="button" class="close" data-dismiss="modal">&times;</button>
				  			<h4 class="modal-title"><strong style="color: rgb(219, 82, 82);">Event X</strong></h4>
						</div>
						<div class="modal-body">
							<p style="color: rgb(219, 82, 82); text-align: justify;"><i>
								Be mysterious you say? CHALLENGE ACCEPTED!
								</i>
							</p>
							<h4>Rules:</h4>
					  		<p><ul>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; 2 participants per college.</li>
					  				<br>
									<li><i style="color: rgb(219, 82, 82);">That’s All We can Say!</i></li>
					  		</ul></p>
						</div><!--medal-body-->
				  		</div></div> <!--medal-content.medal-dialog-->
				  	</div> <!--medal-->	
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 recent-button">
					<a href="#" class="recent-work" style="background-image:url({{ asset('nevada/nevada1/logoss/EventIcons/Mock.jpg') }})">
						<span class="btn btn-o-white" data-toggle="modal" data-target="#mock-parliament-event">Verbal Wars...</span>
					</a>
						<div class="modal fade" id="mock-parliament-event" role="dialog">
						<div class="modal-dialog"><div class="modal-content">
						<div class="modal-header">
				  			<button type="button" class="close" data-dismiss="modal">&times;</button>
				  			<h4 class="modal-title"><strong style="color: rgb(219, 82, 82);">Verbal Wars</strong> &nbsp; <small>(Mock Parliament)</small></h4>
						</div>
						<div class="modal-body">
							<p style="color: rgb(219, 82, 82); text-align: justify;"><i>
								Do you argue at the top of your voice even if you know you're wrong? Welcome to the government.
								</i>
							</p>
							<h4>Rules:</h4>
					  		<p><ul>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Maximum of 2 teams per college.</li>
					  				<br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; No. of members per team: 2</li>
									<br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Topics of discussion will be given on the spot.</li>
									<br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Teams will be given 5 mins to discuss on the topic.</li>
									<br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Any variation in the proceedings will be informed on the spot.</li>
									<br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; The speaker will be allotting time and turns to put forth points by a team.</li>
									<br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Students are not supposed to use slangs in any context.</li>
									<br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Students are advised to hold on to the time limit given by the speaker.</li>
									<br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; The decision of the judges will be considered as the final decision.</li>
									<br>
					  		</ul></p>
						</div><!--medal-body-->
				  		</div></div> <!--medal-content.medal-dialog-->
				  	</div> <!--medal-->	
				</div>
				<div class="col-sm-4 recent-button">
					<a href="#" class="recent-work" style="background-image:url({{ asset('nevada/nevada1/logoss/EventIcons/Photography.jpg') }})">
						<span class="btn btn-o-white" data-toggle="modal" data-target="#photography-event">Freeze Frame...</span>
					</a>
					<div class="modal fade" id="photography-event" role="dialog">
						<div class="modal-dialog"><div class="modal-content">
						<div class="modal-header">
				  			<button type="button" class="close" data-dismiss="modal">&times;</button>
				  			<h4 class="modal-title"><strong style="color: rgb(219, 82, 82);">Freeze Frame</strong> &nbsp; <small>(Photography)</small></h4>
						</div>
						<div class="modal-body">
							<p style="color: rgb(219, 82, 82); text-align: justify;"><i>
								You can be the next Okanisakikama. Just take an intriguing snapshot of the world around you and express it with a photograpgh. BTW, that person in the first sentence doesn't exist.
								</i>
							</p>
							<h4>Rules:</h4>
					  		<p><ul>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Only one participates from one college.</li>
					  				<br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Picture can be taken from Any device or iPhone, you can also use DSLR but picture format must be RAW.</li>
									<br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Picture should be captured only within the university premises.</li>
									<br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Editing is allowed only with LIGHTROOM. (DETAILS will be checked of file).</li>
									<br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Caption is mandatory. (NOTE - CAPTION & TOPIC are different, caption will describe the story of the picture and picture must be taken based on TOPIC).</li>
									<br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; One participates can submit only one picture for contest with ORIGINAL AND EDITIED FILES.</li>
									<br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Topic and time limit will be introduced at the time of INAUGRATION CEREMONY.</li>
									<br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; The picture submission folder name must your first name and then college name, ex: THOMASCHRIST and inside of that folder create artist_detail.txt and add details (NAME, COURSE AND SEMESTER and COLLEGE NAME) of photographer.</li>
									<br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; If any image is downloaded or copied from any other source, that participate will be eliminated immediately.</li>
									<br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Photographs should be submitted within the time allotted (3 pm to 3: 30 pm)</li>
									<br>
					  		</ul></p>
						</div><!--medal-body-->
				  		</div></div> <!--medal-content.medal-dialog-->
				  	</div> <!--medal-->	
				</div>
				<div class="col-sm-4 recent-button">
					<a href="#" class="recent-work" style="background-image:url({{ asset('nevada/nevada1/logoss/EventIcons/Gaming.jpg') }})">
						<span class="btn btn-o-white" data-toggle="modal" data-target="#gaming-event">Game-o-Tronix...</span>
					</a>
					<div class="modal fade" id="gaming-event" role="dialog">
						<div class="modal-dialog"><div class="modal-content">
						<div class="modal-header">
				  			<button type="button" class="close" data-dismiss="modal">&times;</button>
				  			<h4 class="modal-title"><strong style="color: rgb(219, 82, 82);">Game-o-Tronix</strong> &nbsp; <small>(Gaming)</small></h4>
						</div>
						<div class="modal-body">
							<p style="color: rgb(219, 82, 82); text-align: justify;"><i>
								AFK. CLUTCH ACE. NOICE. GGWP. n1. www.downloadfreessd.com. HAX. AIMBOT. If you can decode these, then this is where you belong.
								</i>
							</p>
							<h4>Games:</h4>
							<p class="no-padding">
								<div class="row">
									<div class="col-md-6 col-md-offset-1">
										<table style="border-style: hidden;" class="table-responsive" width="100%">
											<tr style="border-style: hidden;">
												<td style="border-style: hidden;"><strong><i class="fa fa-soccer-ball-o" style="color: rgb(219, 82, 82);"></i></strong></td>
												<td style="border-style: hidden;">FIFA '18</td>
												<td style="border-style: hidden;">1 Player</td>
											</tr>
											<tr style="border-style: hidden;">
												<td style="border-style: hidden;"><strong><i class="fa fa-cab" style="color: rgb(219, 82, 82);"></i></strong></td>
												<td style="border-style: hidden;">Blur</td>
												<td style="border-style: hidden;">2 Players</td>
											</tr>
											<tr style="border-style: hidden;">
												<td style="border-style: hidden;"><strong><i class="fa fa-crosshairs" style="color: rgb(219, 82, 82);"></i></strong></td>
												<td style="border-style: hidden;">Counter Strike 1.6</td>
												<td style="border-style: hidden;">5 Players</td>
											</tr>
										</table>
									</div>
								</div>
							</p>
							<h4>Rules:</h4>
					  		<p><ul>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; The above mentioned games will be played as 3 different events.</li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; All three events will start simultaneously.</li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Players are not allowed to switch between game events.</li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Players can only participate in one Event (CS, FIFA or Blur). Therefore a college can have maximum of 8 participants (1 for Fifa, 2 for Blur, 5 for CS).</li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Participants are suggested bring their own peripherals (mouse, earphone, controller etc.). If the participant is unable to bring his own peripherals, generic peripherals will be provided.</li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; If a participant damages any peripherals provided, he/she will be held responsible.</li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Raging is not encouraged. Raging unnecessarily can get participants disqualified.</li><br>
					  		</ul></p>
						</div><!--medal-body-->
				  		</div></div> <!--medal-content.medal-dialog-->
				  	</div> <!--medal-->	
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 recent-button">
					<a href="#" class="recent-work" style="background-image:url({{ asset('nevada/nevada1/logoss/EventIcons/Quiz.jpg') }})">
						<span class="btn btn-o-white" data-toggle="modal" data-target="#quiz-event">Question Mark...</span>
					</a>
					<div class="modal fade" id="quiz-event" role="dialog">
						<div class="modal-dialog"><div class="modal-content">
						<div class="modal-header">
				  			<button type="button" class="close" data-dismiss="modal">&times;</button>
				  			<h4 class="modal-title"><strong style="color: rgb(219, 82, 82);">Question Mark</strong> &nbsp; <small>(Quiz)</small></h4>
						</div>
						<div class="modal-body">
							<p style="color: rgb(219, 82, 82); text-align: justify;"><i>
								Pure genius or guesswork? Didn't press the buzzer too fast, did you? This ain't buzzfeed, this is the real deal.
								</i>
							</p>
							<h4>Rules:</h4>
					  		<p><ul>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Maximum 2 teams per college.</li><br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; members per team.</li><br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Participants will not be allowed to use mobile or other electronic gadgets.</li><br>
					  		</ul></p>
						</div><!--medal-body-->
				  		</div></div> <!--medal-content.medal-dialog-->
				  	</div> <!--medal-->	
				</div>
				<div class="col-sm-4 recent-button">
					<a href="#" class="recent-work" style="background-image:url({{ asset('nevada/nevada1/logoss/EventIcons/Treasure.jpg') }})">
						<span class="btn btn-o-white" data-toggle="modal" data-target="#treasure-hunt-event">Gold Rush...</span>
					</a>
					<div class="modal fade" id="treasure-hunt-event" role="dialog">
						<div class="modal-dialog"><div class="modal-content">
						<div class="modal-header">
				  			<button type="button" class="close" data-dismiss="modal">&times;</button>
				  			<h4 class="modal-title"><strong style="color: rgb(219, 82, 82);">Gold Rush</strong> &nbsp; <small>(Treasure Hunt)</small></h4>
						</div>
						<div class="modal-body">
							<p style="color: rgb(219, 82, 82); text-align: justify;"><i>
								Love sniffing out clues? Consider yourself a detective? Wanna be puzzled?
								<br>Requirements: Wit, a magnifying glass and a sidekick.
								<br><u>Recommend</u>: Comfortable shoes.
								</i>
							</p>
							<h4>Rules:</h4>
					  		<p><ul>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Maximum of 2 teams per college.</li><br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Team of 3 players. 2 players are mandatory for each round.</li><br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Electronic devices are not allowed.</li><br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Violation of general code of conduct will lead to disqualification of participants from the event.</li><br>
					  		</ul></p>
						</div><!--medal-body-->
				  		</div></div> <!--medal-content.medal-dialog-->
				  	</div> <!--medal-->	
				</div>
				<div class="col-sm-4 recent-button">
					<a href="#" class="recent-work" style="background-image:url({{ asset('nevada/nevada1/logoss/EventIcons/Web.jpg') }})">
						<span class="btn btn-o-white" data-toggle="modal" data-target="#coding-debugging-event">Coding And Debugging...</span>
					</a>
					<div class="modal fade" id="coding-debugging-event" role="dialog">
						<div class="modal-dialog"><div class="modal-content">
						<div class="modal-header">
				  			<button type="button" class="close" data-dismiss="modal">&times;</button>
				  			<h4 class="modal-title"><strong style="color: rgb(219, 82, 82);">Bug Smash</strong> &nbsp; <small>(Coding & Debugging)</small></h4>
						</div>
						<div class="modal-body">
							<p style="color: rgb(219, 82, 82); text-align: justify;"><i>
								Think in JAVA, dream in C and debug the world around you? Come show us your ways with Sensei.
								</i>
							</p>
							<h4>Rules:</h4>
					  		<p><ul>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; 2 members per team.</li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Maximum of 2 teams per college.</li><br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Systems will be provided.</li><br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Internet usage is strictly prohibited.</li><br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Participants can code in any of the following languages: C, C++, Java or Python.</li><br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Time taken to solve each problem will be noted.</li><br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; The lines of code and logic used will be noted.</li><br>
					  		</ul></p>
						</div><!--medal-body-->
				  		</div></div> <!--medal-content.medal-dialog-->
				  	</div> <!--medal-->	
				</div>
			</div>
			<div class="row">
				
				<div class="col-sm-4 recent-button">
					<a href="#" class="recent-work" style="background-image:url({{ asset('nevada/nevada1/logoss/EventIcons/Hackathon.jpg') }})">
						<span class="btn btn-o-white" data-toggle="modal" data-target="#hackathon-event">The Grand Hackathon...</span>
					</a>
					<div class="modal fade" id="hackathon-event" role="dialog">
						<div class="modal-dialog"><div class="modal-content">
						<div class="modal-header">
				  			<button type="button" class="close" data-dismiss="modal">&times;</button>
				  			<h4 class="modal-title"><strong style="color: rgb(219, 82, 82);">The Grand Hackathon</strong></h4>
						</div>
						<div class="modal-body">
							<p style="color: rgb(219, 82, 82); text-align: justify;"><i>
								Develop an efficient and effective solution for a given problem. A full-time, high stakes event with everything to lose.
								</i>
							</p>
							<h4>Rules:</h4>
					  		<p><ul>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Only one team per college.</li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Max of 3 members in a team.</li><br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Participants are required to bring their own laptops and necessary accessories.</li><br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Pre-built projects won’t be entertained.</li><br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Participates of this event won’t be able to participate in any other event.</li><br>
					  		</ul></p>
						</div><!--medal-body-->
				  		</div></div> <!--medal-content.medal-dialog-->
				  	</div> <!--medal-->	
				</div>
				<div class="col-sm-4 recent-button">
					<a href="#" class="recent-work" style="background-image:url({{ asset('nevada/nevada1/logoss/EventIcons/ProdLaunch.jpg') }})">
						<span class="btn btn-o-white" data-toggle="modal" data-target="#product-launch-event">Release Edition...</span>
					</a>
					<div class="modal fade" id="product-launch-event" role="dialog">
						<div class="modal-dialog"><div class="modal-content">
						<div class="modal-header">
				  			<button type="button" class="close" data-dismiss="modal">&times;</button>
				  			<h4 class="modal-title"><strong style="color: rgb(219, 82, 82);">Release Edition</strong> &nbsp; <small>(Product Launch)</small></h4>
						</div>
						<div class="modal-body">
							<p style="color: rgb(219, 82, 82); text-align: justify;"><i>
								Create a solution that the market needs or create a market for your solution. Design the product of your dreams.
								</i>
							</p>
							<h4>Rules:</h4>
					  		<p><ul>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Each team can have a maximum of 2 members.</li>
					  				<br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Teams will be given 10-15 mins to discuss on the product before pitching the idea.</li>
									<br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Any changes in the event details would be informed on spot.</li>
									<br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Each team must stick to the time limit.</li>
									<br>
									<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; The decision of the judges will be considered as the final decision.</li>
									<br>
					  		</ul></p>
						</div><!--medal-body-->
				  		</div></div> <!--medal-content.medal-dialog-->
				  	</div> <!--medal-->	
				</div>
				<div class="col-sm-4 recent-button">
					<a href="#" class="recent-work" style="background-image:url({{ asset('nevada/nevada1/logoss/EventIcons/ITmanager.jpg') }})">
						<span class="btn btn-o-white" data-toggle="modal" data-target="#itmanager-event">Manager Mayhem...</span>
					</a>
					<div class="modal fade" id="itmanager-event" role="dialog">
						<div class="modal-dialog"><div class="modal-content">
						<div class="modal-header">
				  			<button type="button" class="close" data-dismiss="modal">&times;</button>
				  			<h4 class="modal-title"><strong style="color: rgb(219, 82, 82);">Manager Mayhem</strong> &nbsp; <small>(IT Manager)</small></h4>
						</div>
						<div class="modal-body">
							<p style="color: rgb(219, 82, 82); text-align: justify;"><i>
								Good at commandeering people around without them realising? Don't brag about it, come show us! This event will either make you or break you.
								</i>
							</p>
							<h4>Rules:</h4>
					  		<p><ul>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Each team can have 1 participant.</li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Participants are NOT allowed to participate in any other Event.</li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Participants are required to carry their own laptop.</li><br>
					  				<li><i class="fa fa-check" style="color: rgb(219, 82, 82);"></i> &nbsp; Participants are required to carry a pair of Extra Clothes and Necessary Bathing Items.</li><br>
					  		</ul></p>
						</div><!--medal-body-->
				  		</div></div> <!--medal-content.medal-dialog-->
				  	</div> <!--medal-->	
				</div>
			</div>
		</section>
	</div>
</div><!-- #portfolio -->

<div class="content-block parallax" id="services">
	<div class="container" style="overflow-x:auto;">
		<header class="block-heading cleafix">
			<div class="title-page">
				<p class="main-header" style="padding:10px;">Schedule</p>
			</div>
		</header>
		<div class="col-md-12">
			
			<div class="padding-none">
				<div class="row">
					<table class="table table-responsive">
						<thead>
							<tr>
								<th class="info" colspan="10"><h3><strong>Day 1</strong> <small class="pull-right">6 September 2018</small></h3></th>
							</tr>
						</thead>
						<thead>
							<tr>
								<th>VENUE</th>
								<th>9:00-10:00</th>
								<th>10:00-11:00</th>
								<th>11:00-12:00</th>
								<th>12:00-1:00</th>
								<th>Lunch (1:00-2:00)</th>
								<th>2:00-3:00</th>
								<th>3:00-4:00</th>
								<th>4:00-5:00</th>
								<th>5:00-6:00</th>
							</tr>
						</thead>
						<tbody>      
							<tr class="success">
								<td class="warning" >CAMPUS VIEW, 10TH FLOOR, CENTRAL BLOCK</td>
								<td  class="warning" colspan="2">INAUGURATION</td>
								<td class="warning">QUIZ</td>
								<td></td>
								<td class="danger"></td>
								<td  class="warning" colspan="3">QUIZ PRELIMS</td>
								<td></td>
							</tr>
							
							<tr class="success">
								<td class="warning">SKYVIEW, 10TH FLOOR, CENTRAL BLOCK</td>
								<td></td>
								<td></td>
								<td></td>
								<td class="warning">PRODUCT LAUNCH</td>
								<td  class="danger"></td>
								<td></td>
								<td ></td>
								<td ></td>
								<td></td>
							</tr>
							
							<tr class="success">
								<td class="warning">811 & 812, 8TH FLOOR, CENTRAL BLOCK</td>
								<td></td>
								<td></td>
								<td class="warning" colspan="2">IT MANAGER</td>
								<td class="danger"></td>
								<td class="warning" colspan="3">IT MANAGER</td>
								<td></td>
							</tr>
										  
							<tr class="success">
								<td class="warning">813, 8TH FLOOR, CENTRAL BLOCK</td>
								<td></td>
								<td></td>
								<td class="warning" colspan="2">AD-MAKING PRELIMS</td>
								<td class="danger"></td>
								<td class="warning" colspan="3">AD-MAKING PRELIMS</td>
								<td></td>
							</tr>
										  
							<tr class="success">
								<td class="warning">808, 8TH FLOOR, CENTRAL BLOCK</td>
								<td></td>
								<td></td>
								<td class="warning">EVENT-X PRELIMS (GROUND)</td>
								<td></td>
								<td  class="danger"></td>
								<td class="warning">EVENT-X PRELIMS (GROUND)</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
										  
							<tr class="success">
								<td class="warning">809, 8TH FLOOR, CENTRAL BLOCK</td>
								<td></td>
								<td></td>
								<td class="warning" colspan="2">MOCK PARLIMENT</td>
								<td class="danger"></td>
								<td class="warning" colspan="3">MOCK PARLIMENT</td>
								<td></td>
							</tr>
										 
							<tr class="success">
								<td class="warning" >BCA LAB, 1ST FLOOR, 2ND BLOCK</td>
								<td></td>
								<td></td>
								<td class="warning">CODING &amp; DEBUGGING</td>
								<td></td>
								<td class="danger"></td>
								<td class="warning" colspan="2">CODING &amp; DEBUGGING</td>
								<td></td>
								<td></td>
							</tr>
										  
							<tr class="success">
								<td class="warning">MCA & MSC LAB, 1ST FLOOR, 2ND BLOCK</td>
								<td></td>
								<td></td>
								<td class="warning" colspan="2">GAMING PRELIMS</td>
								<td class="danger"></td>
								<td class="warning" colspan="3">GAMING PRELIMS</td>
								<td></td>
							</tr>
										  
							<tr class="success">
								<td class="warning">IT LAB, 1ST FLOOR, 2ND BLOCK</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td class="danger"></td>
								<td class="warning" colspan="3">TREASURE HUNT PRELIMS</td>
								<td></td>
							</tr>
										  
							<tr class="success">
								<td class="warning">211, 2ND FLOOR, CENTRAL BLOCK</td>
								<td></td>
								<td></td>
								<td class="warning" colspan="2">APP PROTOTYPING</td>
								<td class="danger"></td>
								<td class="warning" colspan="4">APP PROTOTYPING</td>
							</tr>
						</tbody>
					</table>
				</div>
					  
				{{-- <hr> --}}
				
				<div class="row">
					<table class="table table-responsive">
						<thead>
							<tr>
								<th class="info" colspan="10"><h3><strong>Day 2</strong> <small class="pull-right">7 September 2018</small></h3></th>
							</tr>
						</thead>
						<thead>
							<tr>
								<th>VENUE</th>
								<th>9:00-10:00</th>
								<th>10:00-11:00</th>
								<th>11:00-12:00</th>
								<th>12:00-1:00</th>
								<th>Lunch (1:00-2:00)</th>
								<th>2:00-3:00</th>
								<th>3:00-4:00</th>
								<th>4:00-5:00</th>
								<th>5:00-6:00</th>
							</tr>
						</thead>
						<tbody>      
							<tr class="success">
								<td class="warning" >CAMPUS VIEW, 10TH FLOOR, CENTRAL BLOCK</td>
								<td class="warning" colspan="2">QUIZ</td>
								<td class="warning" colspan="2">PRODUCT LAUNCH</td>
								<td class="danger"></td>
								<td class="warning" colspan="2">IT MANAGER FINALS</td>
								<td class="warning" >VALEDICTORY</td>
								<td></td>
							</tr>
									  
							<tr class="success">
								<td class="warning">811 & 812, 8TH FLOOR, CENTRAL BLOCK</td>
								<td colspan="4" class="warning">HACKATHON</td>
								<td  class="danger"></td>
								<td colspan="2" class="warning">HACKATHON</td>
								<td ></td>
								<td ></td>
							</tr>
			
							<tr class="success">
								<td class="warning">911, 9TH FLOOR, CENTRAL BLOCK</td>
								<td class="warning" colspan="4">IT MANAGER</td>
								<td class="danger"></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
									  
							<tr class="success">
								<td class="warning">808, 8TH FLOOR, CENTRAL BLOCK</td>
								<td class="warning" colspan="4" >AD-MAKING FINALS</td>
								<td class="danger"></td>
								<td class="warning">AD-MAKING FINALS</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
									  
							<tr class="success">
								<td class="warning">808, 8TH FLOOR, CENTRAL BLOCK</td>
								<td></td>
								<td class="warning" colspan="3">EVENT X</td>
								<td class="danger"></td>
								<td class="warning" colspan="2">EVENT X FINALS</td>
								<td></td>
								<td></td>
							</tr>
									  
							<tr class="success">
								<td class="warning">809,  8TH FLOOR, CENTRAL BLOCK</td>
								<td></td>
								<td class="warning" colspan="3">EVENT X</td>
								<td class="danger"></td>
								<td class="warning" colspan="2">EVENT X FINALS</td>
								<td></td>
								<td></td>
							</tr>
									  
							<tr class="success">
								<td class="warning" >BCA LAB, 1ST FLOOR, 2ND BLOCK</td>
								<td></td>
								<td></td>
								<td  colspan="2" class="warning">CODING & DEBUGGING</td>
								<td class="danger"></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
									  
							<tr class="success">
								<td class="warning">MCA & MSC LAB, 1ST FLOOR, 2ND BLOCK</td>
								<td class="warning" colspan="4">GAMING FINALS</td>
								<td class="danger"></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
									  
							<tr class="success">
								<td class="warning">IT LAB, 1ST FLOOR, 2ND BLOCK</td>
								<td class="warning" colspan="4">APP PROTOTYPING FINALS</td>
								<td class="danger"></td>
								<td class="warning">APP PROTOTYPING FINALS</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
									  
							<tr class="success">
								<td class="warning">211, 2ND FLOOR, CENTRAL BLOCK</td>
								<td class="warning" colspan="4">PHOTOGRAPHY</td>
								<td class="danger"></td>
								<td class="warning">PHOTOGRAPHY</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>							  
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="content-block" id="blog">
	<div class="container blog-sec">
		<header class="block-heading cleafix">
			<!--<a href="#" class="btn btn-o btn-lg pull-right">View All</a>-->
			<div class="title-page">
				<p class="main-header">Campus View</p>
			    <!--<p class="sub-header">Keep up with the latest happenings.</p>-->
			</div>
		</header>
		<section class="block-body">
			<div class="row">
				<div class="col-sm-4 blog-post">
					<img src="{{ asset('nevada/nevada1/logoss/Campus_Insights/1.jpg') }}">
					<h2>CAMPUS</h2>
					<div style=" overflow: hidden; height: 80px;" id="campus_ins1">
						<p style="text-align: justify;">
						CHRIST (Deemed to be University) campus has been awarded the 'Best Institutional Buildings and Garden' award by the Bangalore Urban Arts Commission for three consecutive years. It won the 'Best Institutional Garden by the Mysore Horticulture Society. The campus is a zero waste campus and recycles its wet waste and used paper. Code of conduct on the campus includes protecting the university property, keeping the place clean and tidy and dressing decently. The university follows a dress code of boys in full pants and shirts and girls in salwars with respect to the Indian tradition. Only students of Christ (Deemed to be University) and parents can enter the University building.
						</p>
					</div>
					<br>
					<h6 class="text-info" onclick="campus_ins1();">Read More</h6>
				</div>
				<div class="col-sm-4 blog-post">
					<img src="{{ asset('nevada/nevada1/logoss/Campus_Insights/2.jpg') }}">
					<h2>INFRASTRUCTURE</h2>
					<div style=" overflow: hidden; height: 80px;" id="campus_ins2">
						<p style="text-align: justify;">
						State-of-the-art infrastructure amidst greenery is the hallmark of the University with wide varieties of trees and plants, a greenhouse and birds park. A choice of seminars halls, well-equipped labs, libraries, auditoriums, secured hostels, and modern gym for men and women, a sewage water treatment plant, Wi-Fi enabled campus and audio-visual enabled classrooms, and multi-sport grounds with sports facilities add to the ambience of this institution of higher learning.
						</p>
					</div>
					<br>
					<h6 class="text-info" onclick="campus_ins2()">Read More</h6>
				</div>
				<div class="col-sm-4 blog-post">
					<img src="{{ asset('nevada/nevada1/logoss/Campus_Insights/3.jpg') }}">
					<h2>AUDITORIUM</h2>
					<div style=" overflow: hidden; height: 80px;" id="campus_ins3">
						<p style="text-align: justify;">
						Our auditorium is one of the most attractive infrastructures in the campus. The auditorium has showcased many annual general meetings for various companies, cultural events and guest lectures by famous personalities and students. It is well air-conditioned, state-of-the-art audio visual for conducting various events and accommodates around 2000 people. There are 5 auditoriums available all over the campus. Other infrastructures like the assembly halls, panel rooms, seminar halls, prayer halls and counsel room available exclusively for institutional and departmental activities.
						</p>
					</div>
					<br>
					<h6 class="text-info" onclick="campus_ins3()">Read More</h6>
				</div>
			</div>
		</section>
	</div>
</div><!-- #blog -->

<script>
			
	function campus_ins1() {
		if (document.getElementById("campus_ins1").style.height == "auto") {
			document.getElementById("campus_ins1").style.height = "80px";
		} else {
			document.getElementById("campus_ins1").style.height = "auto";
		}
	}
	function campus_ins2() {
		if (document.getElementById("campus_ins2").style.height == "auto") {
			document.getElementById("campus_ins2").style.height = "80px";
		} else {
			document.getElementById("campus_ins2").style.height = "auto";
		}
	}
	function campus_ins3() {
		if (document.getElementById("campus_ins3").style.height == "auto") {
			document.getElementById("campus_ins3").style.height = "80px";
		} else {
			document.getElementById("campus_ins3").style.height = "auto";
		}
	}

</script>

<div class="content-block" id="testimonials" style="background-color: #cccc;">
	<div class="container testimonial-sec">

		<header class="block-heading cleafix">
			<div class="title-page  pull-left">
				<p class="main-header">Our Sponsors</p>
			    <!--<p class="sub-header"></p>-->
			</div>
		</header>
		
		<section class="block-body">
			<div class="row">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  	<!-- Indicators -->
				  	<ol class="carousel-indicators">
					    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
				  	</ol><!-- /.carousel-indicators -->
					
				  	<!-- Wrapper for slides -->
				  	<div class="carousel-inner" role="listbox">
					    <div class="item active">
					      	<div class="img-center">	
					      		<img src="{{ asset('nevada/nevada1/logoss/Sponsors/CollegeFever.png') }}">
					      	</div>	
					      	<h3>
					      		Ticketing Partner
					      	</h3>
					      	<a target="_blank" href="{{ url('https://www.thecollegefever.com/') }}" class="btn btn-default">Visit</a>
					    </div><!-- /.item -->
					    <div class="item">
					    	<div class="img-center">	
					      		<img src="{{ asset('nevada/nevada1/logoss/Sponsors/hackerearth.png') }}">
					      	</div>
					       	<h3>
					       		Platform Partner
					       	</h3>
					      	<a target="_blank" href="{{ url('https://www.hackerearth.com/') }}" class="btn btn-default">Visit</a>
					    </div><!-- /.item -->
					    <div class="item">
					    	<div class="img-center" >	
					      		<img src="{{ asset('nevada/nevada1/logoss/Sponsors/Mozilla.png') }}">
					        </div>
					       	<h3>
					       		Technical Partner
					       	</h3>
					       	<a target="_blank" href="{{ url('https://www.mozilla.org/en-US/') }}" class="btn btn-default">Visit</a>
					    </div><!-- /.item -->
				  	</div><!-- /.carousel-inner -->
				</div><!-- /.carousel slide -->
			</div>
			<div id="registration"></div>	
		</section><!-- /.block-body -->
	</div>
</div><!-- /#testimonials -->


<div class="content-block" id="footer" >
	<div class="container" >
		<div class="row"><!--row1-->
			<div class="col-sm-4 blog-post">
					<h2 class="footer-block">Create Account</h2>
					@if(count($errors) > 0)
					<center>
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
							<strong>
								You Have Errors while submitting. Please Fill up the information in the Fields that are Highlighted in Red.
							</strong>
							<hr>
							@foreach ($errors->all() as $error)
							{{ $error }} <br>
							@endforeach
						</div>
					</center>
					@endif
					@if (Session::has('messageError'))
						<div class="alert alert-danger">
							{!! Session::get('messageError') !!}
							<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
						</div>
					@endif
					<form action="{{ route('register') }}" id="contactForm" method="post" name="contactform" class="" role="form">
						
						{{-- {{ method_field('PUT') }} --}}

						<div class="form-group">
							<h4 style="color: #fff; font-style: italic;">Ticket Please...</h4>
						</div>

						<div class="form-group">
							<a href="{{ url('https://www.thecollegefever.com/events/gateways') }}" class="text-center btn btn-o-white" target="_blank"><strong><i class="fa fa-ticket"></i> Get Your Ticket</strong></a>
						</div>
						

						<div class="form-group">
							<li><i class="fa fa-exclamation-circle"></i> <i>Please enter the <strong>Ticket ID</strong> after you get your ticket.</i></li>
						</div>
						<hr>

					    <div class="form-group{{ $errors->has('ticket_id') ? ' has-error' : '' }}">
					    	<input type="text" class="form-control form-control-white" id="ticket_id" name="ticket_id" placeholder="Ticket ID" required value="{{old('ticket_id')}}">
						</div>
						
						<div class="form-group{{ $errors->has('Blr_clg') ? ' has-error' : '' }}">
						
							Accomodation required?<br>
							<input type="radio" name="Blr_clg" value="1">&nbsp;Yes &nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" name="Blr_clg" value="0">&nbsp;No
						</div>
					    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					    	<input type="password" class="form-control form-control-white" id="password" name="password" placeholder="Password" required>
						</div>
						<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
								<input type="password" class="form-control form-control-white" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
						</div>
					    <div id="contactFormResponse"></div>
					    <div class="form-group">
					    	<input type="submit" class="text-center btn btn-o-white" value="Register to Gateways 2018">
					  	</div>
					</form>
				</div>
				<div class="col-sm-8 blog-post">
					
					<h2 class="footer-block">Instructions</h2>
					<ul>
						<li><i class="fa fa-check"></i>Event starts on <strong>6 September 2018</strong>.</li><br>
						<li><i class="fa fa-check"></i>Maximum of 20 participants per college.</li>
						<br>
						<li><i class="fa fa-check"></i>Participants are required to carry their ID card.</li>
						<br>
						<li><i class="fa fa-check"></i>Laptops, Pen drives and Cameras needed for the events, have to be carried by the participants.</li>
						<br>
						<li><i class="fa fa-check"></i>Registration fee of Rs.100 per participant is to be paid. In no case, will the fee will be refunded.</li>
						<br>
						<li><i class="fa fa-check"></i>Registration can be done on the spot or online via app or website, on or before 6th September 2018.</li>
						<br>
						<li><i class="fa fa-check"></i>Outstation students should inform the fest organizers before 4th September 2018 for accommodation.</li>
						<br>
						<li><i class="fa fa-check"></i>Participants must report at the venue 15 mins prior to the event time.</li>
					</ul>
				</div>
				
	
		</div><!--row1-->
		
		<div class="row" style="padding-top:50px;"><!--row2-->
			
				<div class="col-sm-8 blog-post">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.5844676839224!2d77.60388741482166!3d12.934407390880287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae15b277a93807%3A0x88518f37b39dabd0!2sChrist+University!5e0!3m2!1sen!2sin!4v1535176306382" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
				<div class="col-sm-4 blog-post">
					
					<h2 class="footer-block">Contact Details</h2>
					<ul>
						<li class="address-sub"><i class="fa fa-map-marker"></i>University Address</li>
							<p>
								CHRIST (Deemed to be University)<br>
								Hosur Road,
								Bengaluru - 560029,<br>
								Karnataka, India
							</p>
						<li class="address-sub"><i class="fa fa-phone"></i>Mobile</li>
							<p>
								Sakina Naaz: 7976866285<br>
								Immanual A: 9535001753<br>
								Chaithra VD: 9620735728<br>
								Kunal Kala: 9314557890 
							</p>
						<li class="address-sub"><i class="fa fa-envelope-o"></i>Email Address</li>
							<p>
								sakina.naaz@mca.christuniversity.in<br>
								immanual.a@mca.christuniversity.in<br>
								chaithra.vd@cs.christuniversity.in<br>
								kunal.kala@cs.christuniversity.in

							</p>


					</ul>
					<div class="social">
						<a target="-blank" href="{{ url('https://www.twitter.com/@2k18Gateways') }}"><i class="fa fa-twitter"></i></a>
						<a target="-blank" href="{{ url('https://www.facebook.com/gateways2k18') }}"><i class="fa fa-facebook"></i></a>
						<a target="-blank" href="{{ url('https://www.instagram.com/2018gateways') }}"><i class="fa fa-instagram"></i></a>
						
					</div>
					
				</div>
		</div><!--row2-->
	</div>
</div>


@endsection

@section('pageSpecificScripts')

<script>	

// Event button
const $elems = document.querySelectorAll('.recent-button a')
var elems = Array.from($elems)
elems.map(a => {
	a.onclick = (e) => {
	e.preventDefault()
	}
});

if (screen.width > 992) {
	jQuery('.gateways').fadeOut(8500);
	jQuery('.departmentOfCompSci').fadeIn(3000);
	jQuery('.gateways2018Title').fadeIn(6000);

	jQuery('.departmentOfCompSci2').css('padding-top', (screen.height - screen.height*0.4).toString()+'px');
	jQuery('#infoOnMobile').css('display', 'none');
} else {
	jQuery('#parallax').css('margin-top', '250px');
}

</script>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Sep 6, 2018 09:00:00").getTime();



// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    timeInnerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s &nbsp;";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        timeInnerHTML = "It has Begun!";
    }

    jQuery('.timeRemaining').html(timeInnerHTML);

}, 1000);
</script>

@endsection