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
	<!--<header class="entry-header">
		
	</header> .entry-header -->
	<P>Ovo je content-page.php</P>
	<div class="single-post row">
		<div class="col-lg-3  col-md-3 meta-details">

		<ul class="tags">
		<?php
			$tags = get_tags();
				if ( $tags ) :
					foreach ( $tags as $tag ) : 
		?>
						<li>
							<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" title="<?php echo esc_attr( $tag->name ); ?>"><?php echo esc_html( $tag->name ); ?></a>
						</li>
				<?php endforeach; ?>
			<?php endif; ?>
		</ul>
		

		<div class="col-lg-9 col-md-9 ">
			<div class="feature-img">
				<img class="img-fluid" src="<?php yogaflex_post_thumbnail(); ?>" alt="">
			</div>

		<a class="posts-title" href="blog-single.html"><?php  the_title( '<h3>', '</h3>' ); ?></a>

	<!-- <div class="entry-content"> -->
		<p class="excert">
		<?php
			the_content();
		?>
		</p>
		<?php wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'yogaflex' ),
			'after'  => '</div>',
		) );	
		?>
	</div><!-- .col-lg-9 -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'yogaflex' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
			<?php endif; ?>

		 </div><!-- .meta-details -->
	</div>
<!-- </article>#post-<?php the_ID(); ?> -->
