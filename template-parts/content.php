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
		<?php	if ( is_singular() ) : 	?>
				<div class="feature-img">
					<?php yogaflex_post_thumbnail(); ?>
				</div>
			<?php	the_title( '<h2 class="posts-title>', '</h2>' );

				else :
			?>
				<div class="feature-img">
					<?php yogaflex_post_thumbnail(); ?>
				</div>
			<?php
				the_title( '<a class="posts-title" href="' . esc_url( get_permalink() ) . '" rel="bookmark"><h3>', '</h3></a>' );
				
				endif;
			?>

			<p class="excert">
				<?php	the_excerpt();	?>
			</p><!-- .excert -->
	</div><!-- .col-lg-9 -->
</div><!-- .single-post row -->


			

