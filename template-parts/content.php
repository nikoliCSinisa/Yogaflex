<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yogaflex
 */

?>
	<div class="col-lg-9 col-md-9 ">
					<?php
					if ( is_singular() ) : ?>
						<div class="feature-img">
							<img class="img-fluid" src="<?php yogaflex_post_thumbnail(); ?>" alt="slika">
						</div>
					<?php
						the_title( '<h2 class="posts-title>', '</h2>' );
					else :?>
						<div class="feature-img">
							<img class="img-fluid" src="<?php yogaflex_post_thumbnail(); ?>" alt="slika">
						</div>
					<?php
						the_title( '<h3 class="posts-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					endif;
					 ?>

				<div class="entry-content">
					<?php
					the_content( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'yogaflex' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'yogaflex' ),
						'after'  => '</div>',
					) );
					?>
				</div><!-- .entry-content -->
				
	</div><!-- .posts-list -->

			<footer class="entry-footer">
				<?php yogaflex_entry_footer(); ?>
			</footer><!-- .entry-footer -->

