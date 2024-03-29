<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>@yield('title')</title>
		<meta name="keywords" content="your, awesome, keywords, here" />
		<meta name="author" content="Jon Doe" />
		<meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei." />

		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS
		================================================== -->
		<link href="{{{ URL::asset('css/bootstrap.min.css') }}}" rel="stylesheet">
		<link href="{{{ URL::asset('css/bootstrap-responsive.min.css') }}}" rel="stylesheet">
		<link href="{{{ URL::asset('css/font-awesome.min.css') }}}" rel="stylesheet">
		<link href="{{{ URL::asset('css/screen.css') }}}" rel="stylesheet">

                
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Favicons
		================================================== -->
	</head>

	<body>
		<!-- Navbar -->
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>

					<div class="nav-collapse collapse">
						{{ Menu::handler('main') }}
						{{ Menu::handler('user') }}
					</div>
					<!-- ./ nav-collapse -->
				</div>
			</div>
		</div>
		<!-- ./ navbar -->

		<!-- Container -->
		<div class="container">
                    
                    <div class="hero-unit">
			@yield('hero')                        
                    </div>
			
                    <div class="row">
                        @yield('content')                        
                    </div>
                    
		</div>
		<!-- ./ container -->

		<!-- Javascripts
		================================================== -->
		<script src="{{{ URL::asset('js/jquery.v1.8.3.min.js') }}}"></script>
		<script src="{{{ URL::asset('js/bootstrap/bootstrap.min.js') }}}"></script>
	</body>
</html>

