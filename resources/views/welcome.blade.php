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

	<section class="national_election_news_triger">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="national_election_wrap">
						  <div class="national_election_breaking"> ব্রেকিং নিউজ </div>
							  <div class="national_election_viewport">
							    <ul class="national_election_list" data-ticker="list">
							        
							        <li class="national_election_item" data-ticker="item">
							        	<a href="">রাজশাহী বিশ্ববিদ্যালয় শেখ রাসেল মডেল স্কুল অ্যান্ড কলেজে তালা</a> 
							        </li>
							        <li class="national_election_item" data-ticker="item">
							        	<a href="">রাষ্ট্রপতির পদত্যাগ দাবিতে উত্তাল বেরোবি</a>
							        </li>
							        <li class="national_election_item" data-ticker="item">
							        	<a href="">শাবিপ্রবিতে ছাত্রলীগ নিষিদ্ধ ও রাষ্ট্রপতির অপসারণ দাবি</a>
							        </li>
							        <li class="national_election_item" data-ticker="item">
							        	<a href="">ছাত্রশিবির রগ কাটে এমন কোনো রেকর্ড নেই: রাবি সভাপতি</a>
							        </li>
							    </ul>
							</div>
						</div>
				</div>
			</div>
		</div>
	</section>
	<section class="election-coundown-sec" id="animate-area">
		<div class="container">
			<div class="row ">
				<div class="col-md-12">
					<div class="national_election_coun">
						<h3>বাংলাদেশের সকল বিশ্ববিদ্যালয় তথ্য সমূহ </h3>
						<h4>সহযোগিতায় : জাগোনিউজ২৪.কম </h4>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="election-short-samary">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="election-section-tittle">
						<h1>বিভাগ অনুযায়ী খুজুন </h1>
					</div>
				</div>


				<div class="col-md-12 col-sm-12">
					<div class="row">
                        @foreach($divisionResult as $data)
                        <div class="col-md-3">
							<div class="election-seat-box">
								<a href="{{ route('frontend.divisionWiseUniversityPage', $data['id']) }}">
									<h3>{{ $data['division_name'] }}</h3>
									<p>সরকারি বিশ্ববিদ্যালয় <span>{{ $data['government_universities_count'] }}</span></p>
									<p>বেসরকারি বিশ্ববিদ্যালয় <span>{{ $data['non_government_universities_count'] }}</span></p>
								</a>
							</div>
						</div>
                        @endforeach
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<section class="participate-team-section">	
		<div class="container-fluid">
			<div class="row row-flex">
				<div class="col-md-12">
					<div class="election-section-tittle">
						<h1 style="margin-bottom: 50px;">সকল বিশ্ববিদ্যালয়</h1>
					</div>
				</div>
			</div>
			<div class="row row-flex">
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
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="election-section-tittle">
					<h1>সব খবর</h1>
				</div>
			</div>
		</div>
		<div class="row row-flex">
			<div class="col-md-12">
				<div class="row">
					
							<div class="col-md-3">
								<div class="election-news-box">
									<a href="">
										<div class="election-news-thum">
											<img src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/ru-20241022151311.jpg"
											class="img-responsive" alt="">
										</div>
										<div class="election-news-title">
											<h3>রাবিতে বিক্ষোভ, বঙ্গভবন ঘেরাওয়ের হুঁশিয়ারি</h3>
										</div>
									</a>
								</div>   
							</div>
							<div class="col-md-3">
								<div class="election-news-box">
									<a href="">
										<div class="election-news-thum">
											<img src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/ru-1-20241022130513.jpg"
											class="img-responsive" alt="">
										</div>
										<div class="election-news-title">
											<h3>রাজশাহী বিশ্ববিদ্যালয় শেখ রাসেল মডেল স্কুল অ্যান্ড কলেজে তালা</h3>
										</div>
									</a>
								</div>   
							</div>
							<div class="col-md-3">
								<div class="election-news-box">
									<a href="">
										<div class="election-news-thum">
											<img src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/sust-20241022084902.jpg"
											class="img-responsive" alt="">
										</div>
										<div class="election-news-title">
											<h3>শাবিপ্রবিতে ছাত্রলীগ নিষিদ্ধ ও রাষ্ট্রপতির অপসারণ দাবি</h3>
										</div>
									</a>
								</div>   
							</div>
						

			<div class="col-md-3">
				<div class="election-news-box">
					<a href="">
						<div class="election-news-thum">
							<img src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/rabi-20241021213752.jpg"
							class="img-responsive" alt="">
						</div>
						<div class="election-news-title">
							<h3>ছাত্রশিবির রগ কাটে এমন কোনো রেকর্ড নেই: রাবি সভাপতি</h3>
						</div>
					</a>
				</div>   
			</div>
			<div class="col-md-3">
				<div class="election-news-box">
					<a href="">
						<div class="election-news-thum">
							<img src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/rabi-1-20241021200359.jpg"
							class="img-responsive" alt="">
						</div>
						<div class="election-news-title">
							<h3>ভবিষ্যতে গার্মেন্টস সেক্টরকে ছাড়িয়ে যাবে বায়োটেকনোলজি</h3>
						</div>
					</a>
				</div>   
			</div>
			<div class="col-md-3">
				<div class="election-news-box">
					<a href="">
						<div class="election-news-thum">
							<img src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/du1-20241020212054.jpg"
							class="img-responsive" alt="">
						</div>
						<div class="election-news-title">
							<h3>নবাব সলিমুল্লাহ স্মৃতি ফুটবলে চ্যাম্পিয়ন ওয়াসিম আকরাম একাদশ</h3>
						</div>
					</a>
				</div>   
			</div>
			<div class="col-md-3">
				<div class="election-news-box">
					<a href="">
						<div class="election-news-thum">
							<img src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/rabi-20241020212818.jpg"
							class="img-responsive" alt="">
						</div>
						<div class="election-news-title">
							<h3>রাবিতে পরীক্ষা না দিয়েই বিভাগে প্রথম হলেন শিক্ষার্থী!
</h3>
						</div>
					</a>
				</div>   
			</div>
			<div class="col-md-3">
				<div class="election-news-box">
					<a href="">
						<div class="election-news-thum">
							<img src="https://cdn.jagonews24.com/media/imgAllNew/BG/2023March/iab-20231227132055.jpg"
							class="img-responsive" alt="">
						</div>
						<div class="election-news-title">
							<h3>নবাব সলিমুল্লাহ স্মৃতি ফুটবলে চ্যাম্পিয়ন ওয়াসিম আকরাম একাদশ</h3>
						</div>
					</a>
				</div>   
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