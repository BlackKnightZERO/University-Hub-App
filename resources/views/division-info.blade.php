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
						<li><a href="{{ route('frontend.programListPage') }}">বিষয় </a></li>
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
						<h1>{{ $division->division_name_bn }} বিভাগের বিশ্ববিদ্যালয় সমূহ</h1>
						<h2></h2>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="" style="padding:50px 0px">
		<div class="container-fluid">
			<div class="row row-flex" style="margin-top:50px">
                @foreach($universities as $university)
				<div class="col-md-3">
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
	</section>
	<section class="election-news-list">
		<div class="container">
			<div class="row row-flex">
				<div class="col-md-12">
					<div class="election-section-tittle">
						<h1>ঢাকা বিভাগের নির্বাচনের সব খবর</h1>
					</div>
				</div>

				<div class="col-md-3">
					<div class="election-news-box">
						<a href="">
							<div class="election-news-thum">
								<img src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/11-20231227163553.jpg" class="img-responsive" alt="">
							</div>
							<div class="election-news-title">
								<h3>এবারও ক্ষমতায় এলে যা যা করবে আওয়ামী লীগ</h3>
							</div>
						</a>
					</div>   
				</div>
				<div class="col-md-3">
					<div class="election-news-box">
						<a href="">
							<div class="election-news-thum">
								<img src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/ec-20231227154832.jpg" class="img-responsive" alt="">
							</div>
							<div class="election-news-title">
								<h3>প্রতিদ্বন্দ্বী না থাকলে নির্বাচনের কোনো মান নেই: ইসি রাশেদা</h3>
							</div>
						</a>
					</div>   
				</div>
				<div class="col-md-3">
					<div class="election-news-box">
						<a href="">
							<div class="election-news-thum">
								<img src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/bbb-20231227154424.jpg" class="img-responsive" alt="">
							</div>
							<div class="election-news-title">
								<h3>প্রার্থিতা নিয়ে নৌকার বাহারের শুনানি চলছে</h3>
							</div>
						</a>
					</div>   
				</div>
				<div class="col-md-3">
					<div class="election-news-box">
						<a href="">
							<div class="election-news-thum">
								<img src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/bnp-cover-20231227145720.jpg" class="img-responsive" alt="">
							</div>
							<div class="election-news-title">
								<h3>দেশকে বিদেশিদের কাছে জিম্মি করে রেখেছে সরকার</h3>
							</div>
						</a>
					</div>   
				</div>
				<div class="col-md-3">
					<div class="election-news-box">
						<a href="">
							<div class="election-news-thum">
								<img src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/nazrul-20231227143033.jpg" class="img-responsive" alt="">
							</div>
							<div class="election-news-title">
								<h3>ঠেকাতে না পারলে অন্তত ভোট ডাকাতিতে সহযোগিতা করবেন না: নজরুল</h3>
							</div>
						</a>
					</div>   
				</div>
				<div class="col-md-3">
					<div class="election-news-box">
						<a href="">
							<div class="election-news-thum">
								<img src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/hc1-20231227142508.jpg" class="img-responsive" alt="">
							</div>
							<div class="election-news-title">
								<h3>সেনাবাহিনীর তত্ত্বাবধানে নির্বাচন চেয়ে রিট শুনতে অপারগ হাইকোর্ট</h3>
							</div>
						</a>
					</div>   
				</div>
				<div class="col-md-3">
					<div class="election-news-box">
						<a href="">
							<div class="election-news-thum">
								<img src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/iab-20231227132055.jpg" class="img-responsive" alt="">
							</div>
							<div class="election-news-title">
								<h3>নির্বাচন প্রত্যাখ্যানের ঘোষণা ইসলামী আন্দোলনের</h3>
							</div>
						</a>
					</div>   
				</div>
				<div class="col-md-3">
					<div class="election-news-box">
						<a href="">
							<div class="election-news-thum">
								<img src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/11-20231227163553.jpg" class="img-responsive" alt="">
							</div>
							<div class="election-news-title">
								<h3>নির্বাচিত হলে ২০৪১ সালের মধ্যে স্মার্ট বাংলাদেশ গড়ে তুলবো</h3>
							</div>
						</a>
					</div>   
				</div>

			</div>
		</div>

	</section>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	

</body>
</html>