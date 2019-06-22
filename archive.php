<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yogaflex
 */

get_header();
?>
	<!-- start banner Area -->
		<section class="banner-area relative about-banner" id="home">
				<img class="cta-img img-fluid" src=" <?php bloginfo('template_url'); ?> /img/cta-img.png" alt="">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							 	<header class="page-header">
									<?php
										the_archive_title( '<h1>', '</h1>' );
										the_archive_description( '<div>', '</div>' );
									?>
								</header>
							<p class="link-nav"><a href="index.html">Home </a>
								<span class="lnr lnr-arrow-right"></span>
								<a href="blog-home.html">
									Blog
								</a>
								<span class="lnr lnr-arrow-right"></span>
								<a href="blog-single.html">
									Blog Details
								</a>
							</p>
						</div>
					</div>
				</div>
			</section>
	<!-- End banner Area -->


	<section class="post-content-area single-post-area">
		<div class="container">
			<div class="row">
				<?php if ( have_posts() ) : ?>
					<div class="col-lg-8 posts-list">
					<?php
					/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content', get_post_type() );

						endwhile;

						the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
					?>
					
					</div> <!-- .posts-list -->

					<?php get_sidebar();		?>	

			</div> <!-- .row -->
		</div> <!-- .container -->
	</section>

<?php

get_footer();
