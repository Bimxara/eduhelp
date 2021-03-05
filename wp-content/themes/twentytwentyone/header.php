<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

$template_path = "http://localhost/eduhelp/wp-content/themes/twentytwentyone/";


?>

<!DOCTYPE html>
<html lang="en">

<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php //wp_head(); ?>

	<!-- Favicons-->
    <link rel="shortcut icon" href="<?php echo $template_path; ?>img/favicon.ico" type="<?php echo $template_path; ?>image/x-icon">
    <link rel="apple-touch-icon" type="<?php echo $template_path; ?>image/x-icon" href="<?php echo $template_path; ?>img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="<?php echo $template_path; ?>image/x-icon" sizes="72x72" href="<?php echo $template_path; ?>img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="<?php echo $template_path; ?>image/x-icon" sizes="114x114" href="<?php echo $template_path; ?>img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="<?php echo $template_path; ?>image/x-icon" sizes="144x144" href="<?php echo $template_path; ?>img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="<?php echo $template_path; ?>css/bootstrap_customized.min.css" rel="stylesheet">
    <link href="<?php echo $template_path; ?>css/style.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="<?php echo $template_path; ?>css/detail-page.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="<?php echo $template_path; ?>css/custom.css" rel="stylesheet">


</head>

<body>
<!-- 
navigation header should come here -->
	<header class="header_in clearfix">
		<div class="container">
		<div id="logo">
			<a href="index.html">
				<img src="<?php echo $template_path; ?>img/logo_sticky.svg" width="140" height="35" alt="">
			</a>
		</div>
		<ul id="top_menu">
			<li><a href="#sign-in-dialog" id="sign-in" class="login">Sign In</a></li>
			<li><a href="wishlist.html" class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li>
		</ul>
		<!-- /top_menu -->
		<a href="#0" class="open_close">
			<i class="icon_menu"></i><span>Menu</span>
		</a>
		<nav class="main-menu">
			<div id="header_menu">
				<a href="#0" class="open_close">
					<i class="icon_close"></i><span>Menu</span>
				</a>
				<a href="index.html"><img src="<?php echo $template_path; ?>img/logo.svg" width="140" height="35" alt=""></a>
			</div>
			<ul>
				<li class="submenu">
					<a href="#0" class="show-submenu">Home</a>
					<ul>
						<li><a href="index.html">Default</a></li>
						<li><a href="index-2.html">Video Background</a></li>
						<li><a href="index-3.html">Slider</a></li>
						<li><a href="index-4.html">GDPR Cookie Bar EU Law</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#0" class="show-submenu">Listing</a>
					<ul>
						<li class="third-level"><a href="#0">List pages</a>
							<ul>
								<li><a href="grid-listing-filterscol.html">List default</a></li>
								<li><a href="grid-listing-filterscol-map.html">List with map</a></li>
								<li><a href="grid-listing-filterscol-full-width.html">List full width</a></li>
								<li><a href="grid-listing-filterscol-full-masonry.html">List Masonry Filter</a></li>
							</ul>
						</li>
						<li><a href="detail-restaurant.html">Detail page 1</a></li>
						<li><a href="detail-restaurant-2.html">Detail page 2</a></li>
						<li><a href="submit-restaurant.html">Submit Restaurant</a></li>
						<li><a href="wishlist.html">Wishlist</a></li>
						<li><a href="admin_section/index.html" target="_blank">Admin Section</a></li>
						
					</ul>
				</li>
				<li class="submenu">
					<a href="#0" class="show-submenu">Other Pages</a>
					<ul>
						<li><a href="404.html">404 Error</a></li>
						<li><a href="confirm.html">Confirm Booking</a></li>
						<li><a href="help.html">Help and Faq</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="booking.html">Booking</a></li>
						<li><a href="leave-review.html">Leave a review</a></li>
						<li><a href="contacts.html">Contacts</a></li>
						<li><a href="coming_soon/index.html">Coming Soon</a></li>
						<li><a href="account.html">Sign Up</a></li>
						<li><a href="icon-pack-1.html">Icon Pack 1</a></li>
						<li><a href="icon-pack-2.html">Icon Pack 2</a></li>
					</ul>
				</li>
				<li><a href="submit-restaurant.html">Submit</a></li>
				<li><a href="#0">Buy this template</a></li>
			</ul>
		</nav>
	</div>
	</header>
	<!-- /header -->