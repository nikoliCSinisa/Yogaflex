<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yogaflex
 */

?>

<!-- <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> -->
	
	
	<section class="contact-page-area section-gap">
		<div class="container">	
								<?php
									if(is_page('contact')){
								?>
									<div class="row">
										<div class="map-wrap" style="width:100%; height: 445px;" id="map"></div>
											<div class="col-lg-4 d-flex flex-column address-wrap">
												<div class="single-contact-address d-flex flex-row">
													<div class="icon">
														<span class="lnr lnr-home"></span>
													</div>

													<div class="contact-details">
													</div>
												</div>
											</div>
										</div>


									</div>
								<?php
									}
									elseif(is_page('about')){
											the_content();
									}
									elseif(is_page('trainers')){
										the_content();
									}


									
								?>

		</div>
	</section>
	<!-- End contact-page Area	#post-<?php the_ID(); ?>	-->

