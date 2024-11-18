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
						<h2>{{ $university->title }}</h2>
						<p>{{ explode('।', $university->description)[0] ?? '' }}</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="candidate-profile-section">
		<div class="container-fluid">
			<div class="row">
				
				<div class="col-md-12" >


					<div class="panel panel-default cadidate-profile">
						<div class="panel-heading">
							<h3 class="panel-title">{{ $university->title }}</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3 " align="center"> 
									<img alt="User Pic" src="{{ Storage::url($university->img_path) }}" class="img-responsive">
								</div>


								<div class=" col-md-9 "> 
									<table class="table table-user-information table-bordered">
										<tbody>
											<tr>
												<th>বিশ্ববিদ্যালয়ের নাম</th>
												<td>{{ $university->title }}</td>
											</tr>
											<tr>
												<th>বিশ্ববিদ্যাল সম্পর্কে</th>
												<td>{{ $university->description }}</td>
											</tr>
											<tr>
												<th>মোট বিষয় </th>
												<td>{{ $university->university_programs_count }}</td> 
											</tr>
											<tr>
												<th>আসন সংখ্যা </th>
												<td>{{ $university->seat_count }}</td>
											</tr>
											<tr>
												<th>প্রোগ্রাম সমূহ </th>
												<td>
													@foreach($university->universityProgramTypes as $universityProgramType)
													{{ $universityProgramType->title }}@if (!$loop->last), @endif
													@endforeach
												</td>
											</tr>
											<tr>
												<th>বিভাগ সমূহ </th>
												<td>
													{{ implode(', ', $universityProgramSubjectTitle) }}
												</td>
											</tr>
											<tr>
												<th>ওয়েবসাইট </th>
												<td>{{ $university->web_link }}</td>
											</tr>


										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="candidate-profile-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="election-section-tittle">
						<h1>বিষয় সমূহ</h1>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach($university->universityPrograms as $universityProgram)
				<div class="col-md-6 col-sm-6">
					<div class="program-contentbox">
						<a href="{{ route('frontend.universityProgramDetailsPage', $universityProgram->id) }}">
							<div class="program-title">
								<h3>{{ $universityProgram->title }}</h3>
							</div>
							<div class="program-content">
								<!-- <p>মেকাট্রনিক্স ইঞ্জিনিয়ারিং , যাকে মেকাট্রনিক্সও বলা হয়, এটি প্রকৌশলের একটি আন্তঃবিভাগীয় শাখা যা যান্ত্রিক প্রকৌশল , বৈদ্যুতিক প্রকৌশল , ইলেকট্রনিক প্রকৌশল এবং সফ্টওয়্যার প্রকৌশলের একীকরণের উপর দৃষ্টি নিবদ্ধ করে, এবং এতে রোবোটিক্স , কম্পিউটার বিজ্ঞান , সিস্টেম নিয়ন্ত্রণ, টেলিযোগাযোগ নিয়ন্ত্রণের সংমিশ্রণ</p> -->
								<p>{{ $universityProgram->description }}</p>
								<span class="label label-primary">বিজ্ঞান বিভাগ </span>
								<span class="label label-default">{{ \App\Helpers\NumberHelper::convertToBangla($universityProgram->total_year) }} বছর</span>
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

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


		</body>
		</html>