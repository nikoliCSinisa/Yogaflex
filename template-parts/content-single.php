<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yogaflex
 */

?>
<div class="col-lg-12">
	<div class="col-lg-9 col-md-9 ">
        <?php	if ( is_singular() ) : 	?>
        
            <div class="col-lg-12">
				<div class="feature-img">
					<?php yogaflex_post_thumbnail(); ?>
					<p>Singular je</p>
                </div>
            </div>


		<?php	the_title( '<h2 class="posts-title>', '</h2>' );

			/*	else :
        ?>
            <div class="col-lg-12">
				<div class="feature-img">
					<?php yogaflex_post_thumbnail(); ?>
                </div>
            </div>


		<?php	
				    the_title( '<a class="posts-title" href="' . esc_url( get_permalink() ) . '" rel="bookmark"><h3>', '</h3></a>' );	*/
				
				endif;		
		?>

			<p class="excert">
				<?php	the_post();	?>
			</p><!-- .excert -->
	</div><!-- .col-lg-9 -->
</div><!-- .col-lg-12 -->



