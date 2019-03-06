<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yogaflex
 */

?>
        <?php	if ( is_singular() ) : 	?>
        
            <div class="col-lg-12">
				<div class="feature-img">
					<?php yogaflex_post_thumbnail(); ?>
                </div>
            </div>

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
					<?php   endif;	 ?>
							</div><!-- .user-details -->
					
				</div>

		<div class="col-lg-9 col-md-9">
			<h3 class="mt-20 mb-20">
					<?php	the_title(); ?>
			</h3>
			
					<?php	the_content();	
			
				 endif; ?>

		</div><!-- .col-lg-9 -->




