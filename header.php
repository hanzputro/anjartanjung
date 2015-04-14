<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Anjar Tanjung Website</title>
	<!-- <title><?php wp_title( '|', true, 'right' ); ?></title> -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
	<!-- <meta name="author" content="" />
	<meta name="keywords" content="" />	 -->
	<!-- <link rel="icon" type="image/png" href="assets/images/favicon-32x32.png"> -->
	<!-- Custom css -->
	<!-- <link type="text/css" rel="stylesheet" href="assets/css/styles.css"/> -->
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
	<div id="fb-root"></div>	
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.3&appId=1444827365810566";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>	

	<?php wp_head(); ?>
</head>

<body>
	<!-- <?php body_class(); ?> -->
	<!-- overlay blur -->
	<!-- <div class="overlay__blur"></div> -->
	<!-- menu header responsive -->
	<!-- <div id="hamburger--icon">
		<span></span>
		<span></span>
		<span></span>
		<span></span>
	</div> -->

	<div class="container">

		<div class="header__wrapper">
			<div class="header">
				<img class="logo__header" src="<?php bloginfo('template_url'); ?>/assets/images/logo.png"></img>
				<!-- <nav class="menubar--nav">
					<ul class="menubar--ul">
						<li class="menubar--li"><a href="index.php" class="menubar--a">HOME</a></li>
						<li class="menubar--li"><a href="portfolio.php" class="menubar--a">PORTFOLIO</a></li>
						<li class="menubar--li"><a href="information.php" class="menubar--a">INFORMATION</a></li>
						<li class="menubar--li"><a href="contactus.php" class="menubar--a">CONTACT US</a></li>
						<li class="menubar--li"><a href="blog.php" class="menubar--a">BLOG</a></li>
					</ul>
				</nav>	 -->
				<div class="responsive__wrapper">
					<p class="ag">MENU</p>
				</div>
				<?php wp_nav_menu( array('menu' => 'New Menu' )); ?>	
			</div>			
		</div>