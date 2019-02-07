<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
					</div><!-- .content relative  -->
				</div><!-- .single-cat-widget -->
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
					</div><!-- .content relative  -->
				</div><!-- .single-cat-widget -->
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
					</div><!-- .content relative -->
				</div><!-- .single-cat-widget -->
			</div>

		</div><!-- .row -->
	</div><!-- .container -->
</section>
	<!-- End top-category-widget Area -->

	<!-- Start post-content Area -->
<section class="post-content-area">
	<div class="container">
		<div class="row">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
		?>
			<div class="col-lg-8 posts-list">
				<div class="single-post row">
					<?php
						/* Start the Loop */
							while ( have_posts() ) :
							the_post();
					?>	
					<div class="col-lg-3  col-md-3 meta-details">
						<?php
							if(get_the_tag_list()) {
								echo get_the_tag_list('<ul class="tags"><li>','</li>'.', '.'<li>','</li></ul>');
							}
						?>
							<div class="user-details row">
								<?php if ( 'post' === get_post_type() ) : ?>	
									<p class="user-name col-lg-12 col-md-12 col-6"><a href="#"><?php yogaflex_posted_by(); ?></a><span class="lnr lnr-user"></span></p>
									<p class="date col-lg-12 col-md-12 col-6"><a href="#"><?php yogaflex_posted_on(); ?></a> <span class="lnr lnr-calendar-full"></span></p>
									<p class="view col-lg-12 col-md-12 col-6"><a href="#"><?php echo getPostViews(get_the_ID()); ?></a> <span class="lnr lnr-eye"></span></p>
									<p class="comments col-lg-12 col-md-12 col-6"><a href="#"><?php comments_number(); ?></a> <span class="lnr lnr-bubble"></span></p>
								<?php endif; ?>
							</div><!-- .user-details -->
					
					</div>
					
						<?php
						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					//the_posts_navigation();
			endif;		
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
				?>

<?php	get_sidebar(); ?>

		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- .post-content-area -->


<?php get_footer(); ?>
