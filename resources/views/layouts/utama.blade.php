<!DOCTYPE html>
<html lang="en" class="js">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Home Single Property HTML Template">
		<meta name="author" content="bestpixels">
		
		<!-- Fav Icon  -->
		<link rel="shortcut icon" href="images/majesta.png">
		<link href="images/majesta.png" rel="shortcut icon" type="image/x-icon">
		<link href="images/majesta.png" rel="icon" type="image/x-icon">
		
		<!-- Site Title  -->
		<title>Majesta Residence - Official</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.css" >

		<!-- icofont CSS -->
		<link rel="stylesheet" href="lib/icofont/css/icofont.css"/>
		
		<!-- BxSlider CSS -->
		<link rel="stylesheet" href="lib/BxSlider/jquery.bxslider.css"/>
		
		<!-- slick CSS -->
		<link rel="stylesheet" href="lib/slick/slick.css"/>
		
		<!-- Magnific PopUP CSS -->
		<link rel="stylesheet" href="lib/Magnific-Popup/dist/magnific-popup.css" />	
        
		<!-- Custom styles for this template -->
		<link href="css/font.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
		<style>
            table {
              border-collapse: collapse;
              width: 100%;
              margin-top: 20px;
            }
            th, td {
              border: 1px solid #ddd;
              padding: 8px;
              text-align: center;
            }
            th {
              background-color: #f2f2f2;
            }
            p {
              text-align: center;
            }
          </style>
	</head>
	<body>
		
		<!-- Start .top-bar -->
		<div id="navigation" class="top-bar">
			<nav class="navbar navbar-default">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#site-collapse-nav" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand nav-item" href="/dashboard"><img src="images/majesta.png" alt="logo" style="height: 54px; width: 84px;" /></a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="site-collapse-nav" style="margin-top: 10px;">
                    <ul class="navbar-right pt-30">
                        <li><a class="nav-item"> <form method="POST" action="{{ route('logout') }}">
                                @csrf<button type="submit" class="button sm" >Logout</button>
                            </form></a>
                        </li>						
                    </ul>
						<ul class="nav nav-list navbar-nav navbar-right">
							<li><a class="nav-item" href="/tiperumah">Tipe Rumah</a></li>
							<li><a class="nav-item" href="/galeri">Gallery</a></li>
                            <li><a class="nav-item" href="/booking">Booking Pertemuan</a></li>
							<li><a class="nav-item" href="/simulasikpr">Simulasi KPR</a></li>
							<li><a href="https://maps.google.com/maps?q=Majesta+Residence/" data-effect="mfp-3d-unfold" class="nav-item sm embaded-popup">Get Direction</a></li>
							<li><a class="nav-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container -->
			</nav>
		</div><!-- .top-bar -->
		
    <main>
        @yield('content')
    </main>
		
		<!-- Start .footer-section -->
		<div class="footer-section">
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-sm-5 mobile-center">
						<a href="index.html" class="footer-logo"><img src="images/majesta.png" alt="logo" style="height: 89px; width: 124px;" /></a>
					</div><!-- .col -->

					<div class="col-md-6 col-sm-2" style="margin-top: 20px;"> 
						<h6>Kantor Pemasaran</h6><br>
						<h6>Bintaro Trade Center (BTC) Blok D2 no. 24, <br/> Bintaro Jaya Sektor 7, Jl. Jend Sudirman Tangerang Selatan</h6><br>
					</div><!-- .col -->

					<div class="col-md-4 col-sm-5 text-right mobile-center">
						<ul class="footer-links">
							<li><a href="#"><i class="icofont icofont-youtube-play" target="_blank"></i></a></li>
							<li><a href="https://www.instagram.com/majesta.residence/" target="_blank"><i class="icofont icofont-social-instagram"></i></a></li>
							<li><a href="https://www.facebook.com/profile.php?id=100090449705409" target="_blank"><i class="icofont icofont-social-facebook" target="_blank"></i></a></li>
						</ul>
					</div><!-- .col -->
				</div><!-- .row -->
				<div class="col-md-4 col-sm-5 text-right mobile-center" style="float: right;">
					<ul class="footer-links mobile">
						<!-- <li><img src="images/bank/bsi.png" class="img-responsive" alt="Gallery" height="50px" width="50px"/></li>
						<li><img src="images/bank/bri.png" class="img-responsive" alt="Gallery" height="50px" width="50px"/></li>
						<li><img src="images/bank/btn.png" class="img-responsive" alt="Gallery" height="50px" width="50px"/></li> -->
					</ul>
				</div><!-- .col -->
				<h7 class="copyright-text">© Copyright Majesta Residence. All Rights Reserved </h7>
			</div><!-- .container -->
		</div><!-- .footer-section -->
		
		
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		
		<script src="js/jquery.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Magnific-Popup
		================================================== -->
		<script src="lib/Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>
		
		<!-- jQuery BxSlider
		================================================== -->
		<script src="lib/BxSlider/jquery.bxslider.min.js"></script>
		
		<!-- Vide
		================================================== -->
		<script type="text/javascript" src="lib/Vide/src/jquery.vide.js"></script>
        
		<!-- jQuery slick
		================================================== -->
		<script src="lib/slick/slick.min.js"></script>
		
		<!-- jQuery Custom
		================================================== -->
		<script src="js/custom.js" type="text/javascript"></script>
		
		<!-- Contact Form
		================================================== -->
		<script src="lib/contact-form/jquery.ajaxchimp.min.js" type="text/javascript"></script>
		<script src="lib/contact-form/validate.js" type="text/javascript"></script>		
		<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

	</body>
	<script>!function(){var e,t,n,a;window.MyAliceWebChat||((t=document.createElement("div")).id="myAliceWebChat",(n=document.createElement("script")).type="text/javascript",n.async=!0,n.src="https://myalice-widget.netlify.app/index.js",(a=(e=document.body.getElementsByTagName("script"))[e.length-1]).parentNode.insertBefore(n,a),a.parentNode.insertBefore(t,a),n.addEventListener("load",(function(){MyAliceWebChat.init({selector:"myAliceWebChat",number:"6281288476488",message:"Halo! Saya ingin mendapatkan informasi mengenai Majesta Residence",color:"#25D366",channel:"wa",boxShadow:"high",text:"WhatsApp Us",theme:"light"})})))}();</script>
	<script src="https://apps.elfsight.com/p/platform.js" defer></script>
</html>
