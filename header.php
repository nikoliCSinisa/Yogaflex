<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yogaflex
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header id="header" >

		<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
						<?php 
								$yogaflex_facebook = esc_attr( get_option( 'facebook_details' ));
								$yogaflex_twitter = esc_attr( get_option( 'twitter_details' ));
								$yogaflex_instagram = esc_attr( get_option( 'instagram_details' ));
								$yogaflex_youtube = esc_attr( get_option( 'youtube_details' ));
							echo '<ul>';
								echo '<li><a href="https://facebook.com/'.$yogaflex_facebook.'"><i class="fa fa-facebook"></i></a></li>';
								echo '<li><a href="https://twitter.com/'.$yogaflex_twitter.'"><i class="fa fa-twitter"></i></a></li>';
								echo '<li><a href="https://instagram.com/'.$yogaflex_instagram.'"><i class="fa fa-instagram"></i></a></li>';
								echo '<li><a href="https://youtube.com/'.$yogaflex_youtube.'"><i class="fa fa-youtube"></i></a></li>';
							echo '</ul>';
						?>
						</div><!-- .header-top-left -->
						<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
							<?php 
								$phone1 = esc_attr( get_option( 'telephone1' ));
							?>
							<a href="tel:<?php echo $phone1; ?>">
								<span class="text"><?php echo $phone1; ?></span>
							</a>
							<a class="book-now" href="#">Book Now</a>
						</div><!-- .header-top-right -->
					</div><!-- .row -->
				</div><!-- .container -->
		</div><!-- .header-top -->

		<div class="container main-menu">
			<div class="row align-items-center justify-content-between d-flex">
				<div id="logo">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$yogaflex_description = get_bloginfo( 'description', 'display' );
					if ( $yogaflex_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $yogaflex_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div><!-- #logo -->
				
				<nav id="nav-menu-container" >
					<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php //esc_html_e( 'Primary Menu', 'yogaflex' ); ?></button>  -->
					<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
						'container'       => 'ul',
						'container_class' => 'nav-menu sf-js-enabled sf-arrows',
						'menu_class'      => 'nav-menu',
						'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
						'walker'          => new WP_Bootstrap_Navwalker(),
					) );
					?>
				</nav><!-- #site-navigation -->
			</div><!-- .align-items-center -->
		</div><!-- .container main-menu -->

		
	</header><!-- #header -->


