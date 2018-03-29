<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>

	<meta charset="utf-8">
	<title><?php bloginfo('name'); ?></title>

	<!-- Meta / og: tags -->
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
	================================================== -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<!-- Typography & Icon Fonts -->
	<?php the_field('primary_font_code', 'option'); ?>
	<?php the_field('secondary_font_code', 'option'); ?>
	<script type="text/javascript" src="//fast.fonts.net/jsapi/d83c48dc-a071-4201-8498-8171cd5f545e.js"></script>
	<!-- <link type="text/css" rel="stylesheet" href="//fast.fonts.net/cssapi/d83c48dc-a071-4201-8498-8171cd5f545e.css"/> -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<?php
	$primary_color = get_field('primary_color', 'option');
	?>
	<header style="background:<?php echo $primary_color ?>">
		<div class="container">
			<div class="row">
				<div class="columns-12">
					<a class="logo" href="#top">
						<?php
						$logo = get_field('site_logo', 'option');
						$logo_url = $logo['sizes']['medium'];
						?>
						<!-- <h1 class="site-title"><a href="<//?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><//?php bloginfo( 'name' ); ?></a></h1> -->
						<img src="<?php echo $logo_url ?>" alt="">
					</a>
					<nav class="main-navigation">
						<?php if(has_nav_menu('main_nav')){
									$defaults = array(
										'theme_location'  => 'main_nav',
										'menu'            => 'main_nav',
										'container'       => false,
										'container_class' => '',
										'container_id'    => '',
										'menu_class'      => 'menu',
										'menu_id'         => '',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'before'          => '',
										'after'           => '',
										'link_before'     => '',
										'link_after'      => '',
										'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'depth'           => 0,
										'walker'          => ''
									); wp_nav_menu( $defaults );
								}else{
									echo "<p><em>main_nav</em> doesn't exist! Create it and it'll render here.</p>";
								} ?>
					</nav>
				</div>
			</div>
		</div>
	</header>
