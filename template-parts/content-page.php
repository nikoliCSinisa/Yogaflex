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
										$phone4 = esc_attr( get_option( 'telephone4' ));
										$state = esc_attr( get_option( 'state' ));
										$city = esc_attr( get_option( 'city' ));
										$street = esc_attr( get_option( 'street' ));
										$housenumber = esc_attr( get_option( 'housenumber' ));
										$localpart = esc_attr( get_option( 'localpart' ));
										$domain = esc_attr( get_option( 'domain' ));
										$hoursfrom = esc_attr( get_option( 'hoursfrom' ));
    									$hourstill = esc_attr( get_option( 'hourstill' ));
								?>
									<div class="row">
										<div class="col-lg-12 d-flex flex-column mb-5">
											<?php  
											// If there's a content in admin section it will be shown here
											the_content();	
											?>
										</div>
										<div class="col-lg-4 d-flex flex-column address-wrap">
											<div class="single-contact-address d-flex flex-row">
												<div class="icon">
													<span class="lnr lnr-home"></span>
												</div>
												<div class="contact-details">
													<h5><?php echo $city.', '.$state; ?></h5>
													<p>
														<?php echo $housenumber.' '.$street; ?>
													</p>
												</div>
											</div>
											<div class="single-contact-address d-flex flex-row">
												<div class="icon">
													<span class="lnr lnr-phone-handset"></span>
												</div>
												<div class="contact-details">
													<h5><?php echo $phone4; ?></h5>
													<p><?php echo 'Mon to Fri  '.$hoursfrom.' to '.$hourstill; ?></p>
												</div>
											</div>
											<div class="single-contact-address d-flex flex-row">
												<div class="icon">
													<span class="lnr lnr-envelope"></span>
												</div>
												<div class="contact-details">
													<h5><?php echo $localpart.'@'.$domain; ?></h5>
													<p>Send us your query anytime!</p>
												</div>
											</div>
										</div>
										<?php get_template_part( 'inc/contact', 'form' );	?>
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

