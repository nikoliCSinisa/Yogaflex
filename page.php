<?php
/**
 * Template Name: Blog home page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yogaflex
 */

get_header();
?>
 <!-- start banner Area -->
 <section class="banner-area relative blog-home-banner" id="home">
		<div class="overlay overlay-bg"></div><!-- .overlay -->
			<div class="container">
				<div class="row d-flex align-items-center justify-content-center">
					<div class="about-content blog-header-content col-lg-12">
						<h1 class="text-uppercase text-white">
							<span>YogaFlex</span> to <br> Shape your body
						</h1>
						<a href="#" class="primary-btn mt-40">Become a Member</a>
					</div><!-- .about-content -->
				</div><!-- .row -->
			</div><!-- .container -->
 </section>
    <!-- End banner Area -->
    
    <!-- Start top-category-widget Area -->
	<section class="top-category-widget-area pt-90 pb-90 ">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="single-cat-widget">
						<div class="content relative">
							<div class="overlay overlay-bg"></div>
							<a href="#" target="_blank">
								<div class="thumb">
									<img class="content-image img-fluid d-block mx-auto" src="<?php bloginfo('template_url'); ?> /img/blog/cat-widget1.jpg" alt="">
								</div>
								<div class="content-details">
									<h4 class="content-title mx-auto text-uppercase">Social life</h4>
									<span></span>
									<p>Enjoy your social life together</p>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-cat-widget">
						<div class="content relative">
							<div class="overlay overlay-bg"></div>
							<a href="#" target="_blank">
								<div class="thumb">
									<img class="content-image img-fluid d-block mx-auto" src="<?php bloginfo('template_url'); ?> /img/blog/cat-widget2.jpg" alt="">
								</div>
								<div class="content-details">
									<h4 class="content-title mx-auto text-uppercase">Politics</h4>
									<span></span>
									<p>Be a part of politics</p>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-cat-widget">
						<div class="content relative">
							<div class="overlay overlay-bg"></div>
							<a href="#" target="_blank">
								<div class="thumb">
									<img class="content-image img-fluid d-block mx-auto" src="<?php bloginfo('template_url'); ?> /img/blog/cat-widget3.jpg" alt="">
								</div>
								<div class="content-details">
									<h4 class="content-title mx-auto text-uppercase">Food</h4>
									<span></span>
									<p>Let the food be finished</p>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End top-category-widget Area -->

	<!-- Start post-content Area -->
	<section class="post-content-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 posts-list">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</div><!-- #main -->
	</div><!-- #primary -->
	</div>
	</section>


<?php
get_sidebar();
get_footer();
