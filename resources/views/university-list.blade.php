<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>University Information</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
	<link rel="icon" type="image/x-icon" href="https://cdn.jagonews24.com/media/setup/author/logo-20220115175102.jpg">
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

</head>
<body>
	<navbar id="home" style="position: relative;">
		<nav class="navbar navbar-default main-navber" id="sticker">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<a class="navbar-brand" href="{{ route('frontend.landingPage') }}"><img src="https://cdn.jagonews24.com/media/common/logo.png" class="img-responsive"></a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav" style="center">
						<li><a href="{{ route('frontend.programListPage') }}">প্রোগ্রাম </a></li>
						<li><a href="{{ route('frontend.universityListPage') }}">ইউনিভার্সিটি </a></li>
						<li><a href="scollership.html">স্কলারশিপ </a></li>
						<li><a href="news.html">নিউজ </a></li>
					</ul>
					
				</div>
			</div>
		</nav>
	</navbar>

	<section class="seat-tittl-section">
		<div class="container">
			<div class="row">

				<div class="col-md-12">
					<div class="seat-title-info text-center">
						<h2>বাংলাদেশের সকল বিশ্ববিদ্যালয়</h2>
						<h1>সরকারি  বেসরকারি  সকল বিশ্ববিদ্যালয় তথ্য </h1>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="" style="padding:50px 0px">
		<div class="container-fluid">
			<div class="col-sm-3 col-md-3"></div>
			<div class="col-md-9 col-sm-9">
				<div class="row row-flex" style="margin-top:50px">
					@foreach($universities as $university)
					<div class="col-md-4">
						<div class="participate-team-box">
							<a href="{{ route('frontend.universityDetailsPage', $university->id) }}">
								<div class="participate-team-thum">
									<img src="{{ Storage::url($university->img_path) }}" class="img-responsive">
									<div class="participate-team-name">
										<h2>{{ $university->title }}</h2>
									</div>
								</div>
								<div class="participate-team-info">

									<p>বিষয় - <span>{{ $university->university_programs_count }}</span></p>
									<p> {{ $university->division->division_name_bn }} </p>
								</div>
							</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>	
		</div>
	</section>

	<footer class="main-footer-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<address class="footer-address">
						<h4>ভারপ্রাপ্ত সম্পাদক: কে. এম. জিয়াউল হক</h4>
						<p class="small">
							<span>© 2022 সর্বস্বত্ব সংরক্ষিত | জাগোনিউজ২৪.কম, একেসি প্রাইভেট লিমিটেডের একটি প্রতিষ্ঠান</span><br>
							<i class="fa fa-map-marker"></i> আজহার কমফোর্ট কমপ্লেক্স (৫ম তলা), গ-১৩০/এ প্রগতি সরণি, মধ্যবাড্ডা, ঢাকা-১২১২
						</p>
					</address>
				</div>
			</div>
		</div>
	</footer>
	<section class="stcky-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="copyright-text">
						<p>কপিরাইট © <span><a href="https://www.jagonews24.com/" target="_blank">Jago Digital</a></span></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>