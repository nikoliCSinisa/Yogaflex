<?php

/**
 * Template for custom comment section 
 * 
 * 
 * @package yogaflex
 */

/**
 * =======================================================================================
 *                                CUSTOM COMMENT DISPLAY
 * =======================================================================================
 */
function yogaflex_comments( $comment, $args, $depth ) {
	global $post;
	$author_id = $post->post_author;
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
        // Display trackbacks differently than normal comments. 
?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>></li>
		<div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e( 'Pingback:', 'yogaflex' ); ?></span> <?php comment_author_link(); ?></div>
<?php
		break;
		default :
        // Proceed with normal comments. 

        if( $depth < 2 ) { 
            echo '<div class="comment-list">';
        }
        else {
            echo '<div class="comment-list left-padding">';
        }
?>
    
    <div class="single-comment justify-content-between d-flex">	
        <div class="user justify-content-between d-flex">

            <div class="thumb">
				<?php echo get_avatar( $comment, 60 ); ?>
			</div><!-- .thumb -->
            
            <div class="desc">
                <h5><a href="#"><?php comment_author_link(); ?></a></h5>
                    <p class="date">
                      <?php printf( '<time datetime="%2$s">%3$s</time>',
                                    esc_url( get_comment_link( $comment->comment_ID ) ),
                                    get_comment_time( 'c' ),
                                    sprintf( _x( '%1$s', '1: date', 'yogaflex' ), get_comment_date() ) ); 
                            esc_html_e( ' at ', 'yogaflex' ); 
                            comment_time(); 
                        ?>
					</p><!-- .date -->
				
                    <?php if ( '0' == $comment->comment_approved ) : ?>
                        <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'yogaflex' ); ?></p>
                    <?php endif; ?>
				
                    <?php comment_text(); ?>

            </div><!-- .desc -->

        </div><!-- .user -->

            <div class="reply-btn">
                <span class="btn-reply text-uppercase">
					<?php comment_reply_link( array_merge( $args, array(
                        'class'        => 'btn-reply text-uppercase',
						'reply_text'    => esc_html__( 'reply', 'yogaflex' ),
						'depth'         => $depth,
                        'max_depth'	    => $args['max_depth'] )
                    ) ); ?>
                </span>
            </div><!-- .reply-btn -->
            
	</div><!-- .single-comment -->

	<?php
		break;
    endswitch; // End comment_type check.
    
    echo '</div><!-- .comment-list -->';
}

/**  ========================= END CUSTOM COMMENT DISPLAY =================================== */



/**
 * ===========================================================================================
 *                                  CUSTOM COMMENT FORM
 * ===========================================================================================
 */
//add_filter( 'comment_form_default_fields', 'yogaflex_comment_form_args' );

function yogaflex_comment_form_args(){
    // Comment fields args variables
    $args = wp_parse_args( $args );

 // Custom comment fields args
 $comment_fields_args = array(
     'class_form'           => '',
     'id_form'              => '',
     'comment_notes_before' => '',
     'comment_notes_after'  => '',
     'title_reply_before'   => '<h4>',
     'title_reply_after'    => '</h4>',
     'title_reply'          => 'Leave a Comment',
     'fields'               => $fields        
 );

 // Merge arguments
 $args = array_merge( $args, $comment_fields_args );
 return $args;
}


