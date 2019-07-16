<?php
/**
 * The template for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
					<?php if ( function_exists('the_breadcrumb') && function_exists('the_title') ) {	?>
					<h1>
					<?php	the_title(); ?>
					</h1>
					<?php 
								the_breadcrumb();
						}
					?>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start post-content Area -->
	<section class="post-content-area single-post-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 posts-list">
					<div class="single-post row">
				<?php
							while ( have_posts() ) :
								the_post();
									
									/* Set the counter for number of views */
									setPostViews(get_the_ID());

								get_template_part( 'template-parts/content-single', get_post_type() );
								?>
					</div><!-- .single-post -->

				
						<div class="navigation-area">
							<div class="row">
								
									<?php 
									
									// Call a custom prev/next post navigation function
									 echo yogaflex_posts_navigation();

									?>
								
							</div>
						</div>
				
				
				<?php					

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
						
				?>

				</div> <!-- .posts-list -->	

				<?php	get_sidebar();  ?>

			</div> <!-- .row -->
		</div> <!-- .container -->
	</section>
	<!-- End post-content Area -->

<?php	

get_footer();
