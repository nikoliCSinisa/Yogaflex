<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yogaflex
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

echo '<div class="comments-area">';
	// You can start editing here -- including this comment!
	if ( have_comments() ) :

			$yogaflex_comment_count = get_comments_number();

			echo '<h4>';
				printf( 
					// translator: 1: comment count number
					esc_html( _nx( '%1$s Comment', '%1$s Comments', $yogaflex_comment_count, 'yogaflex' ) ),
					number_format_i18n( $yogaflex_comment_count )
				);	
			?>
			</h4>

	<?php 	the_comments_navigation(); 

			wp_list_comments( array(
				'callback' 		=> 'yogaflex_comments'
			) );
	?>
			
		

		<?php
		the_comments_navigation();

		echo '</div><!-- .comments-area -->';

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'yogaflex' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().
?>
	
		<div class="comment-form">
			<?php	comment_form(yogaflex_comment_form_args());	?>
		</div><!-- .comment-form -->
