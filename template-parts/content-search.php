<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yogaflex
 */

?>
	<div class="col-lg-9 col-md-9 ">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="feature-img">
				<?php yogaflex_post_thumbnail(); ?>
			</div>

			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->



		</article><!-- #post-<?php the_ID(); ?> -->
	</div>	<!-- .col-lg-9 -->
</div>	<!-- single post end -->
