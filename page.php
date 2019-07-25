<?php
/**
 * Template Name: Template for displaying page.php
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

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		the_posts_navigation();
		?>

	


<?php
get_footer();
