<?php
/**
 * yogaflex functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package yogaflex
 */

if ( ! function_exists( 'yogaflex_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function yogaflex_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on yogaflex, use a find and replace
		 * to change 'yogaflex' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'yogaflex', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
			add_image_size( 'img-fluid', 100, 100, array('center', 'center'));

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'yogaflex' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'yogaflex_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'yogaflex_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function yogaflex_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'yogaflex_content_width', 767 );
}
add_action( 'after_setup_theme', 'yogaflex_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function yogaflex_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Yogabar', 'yogaflex' ),
		'id'            => 'yogabar',
		'description'   => esc_html__( 'Add widgets here.', 'yogaflex' ),
		'before_widget' => '<div class="single-sidebar-widget %2$s-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="popular-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'yogaflex_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function yogaflex_scripts() {

	// enqueue styles

	wp_enqueue_style( 'yogaflex-style', get_template_directory_uri(). '/style.css' );
	wp_enqueue_style( 'yogaflex-style-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,700' );
	wp_enqueue_style( 'yogaflex-style-linearicons', get_template_directory_uri(). '/style/linearicons.css' );
	wp_enqueue_style( 'yogaflex-style-font-awesome', get_template_directory_uri(). '/style/font-awesome.min.css' );
	wp_enqueue_style( 'yogaflex-style-bootstrap', get_template_directory_uri(). '/style/bootstrap.css' );
	wp_enqueue_style( 'yogaflex-style-magnific-popup', get_template_directory_uri(). '/style/magnific-popup.css' );
	wp_enqueue_style( 'yogaflex-style-nice-select', get_template_directory_uri(). '/style/nice-select.css' );
	wp_enqueue_style( 'yogaflex-style-animate', get_template_directory_uri(). '/style/animate.min.css' );
	wp_enqueue_style( 'yogaflex-style-carousel', get_template_directory_uri(). '/style/owl.carousel.css' );
	wp_enqueue_style( 'yogaflex-style-jquery', get_template_directory_uri(). '/style/jquery-ui.css' );
	wp_enqueue_style( 'yogaflex-style-main', get_template_directory_uri(). '/style/main.css' );

	// enqueue scripts

	wp_enqueue_script( 'yogaflex-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'yogaflex-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'yogaflex-jquery-224', get_template_directory_uri() . '/js/vendor/jquery-2.2.4.min.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex-cloudflare', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array(), '0.1', false );
	//wp_enqueue_script( 'yogaflex-bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'yogaflex-easing', get_template_directory_uri() . '/js/easing.min.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex-hoverintent', get_template_directory_uri() . '/js/hoverIntent.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex-superfish', get_template_directory_uri() . '/js/superfish.min.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex-ajaxchimp', get_template_directory_uri() . '/js/jquery.ajaxchimp.min.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex-magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex-tabs', get_template_directory_uri() . '/js/jquery.tabs.min.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex-nice-select', get_template_directory_uri() . '/js/jquery.nice-select.min.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex-mail', get_template_directory_uri() . '/js/mail-script.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex-main', get_template_directory_uri() . '/js/main.js', array(), '0.1', true );
	wp_enqueue_script( 'yogaflex_admin_script', get_template_directory_uri().'/js/yogaflex.admin.js' , array('jquery'), '1.0.0', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'yogaflex_scripts' );

/**
 * 		==============================================================================
 * 									COUNTING POST VIEWS
 * 		==============================================================================
 */

// function to count post views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// function to display number of post views.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

//Removing rel links count as views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );


/**		============================  COUNTNG POSTS VIEW END  =============================== */

/**
 * 		====================================================================================
 * 									EXCERPT LENGTH FUNCTIONS
 * 		====================================================================================
 */

// Changing excerpt length
function new_excerpt_length($length) {
	return 60;
	}

add_filter('excerpt_length', 'new_excerpt_length');



// Changing excerpt more
function new_excerpt_more($more) {
	global $post;
	return '<p/><a class="primary-btn" href="'. get_permalink($post->ID) . '">View More</a>';
	}

add_filter('excerpt_more', 'new_excerpt_more');

/**		============================  EXCERPT LENGTH END  =================================== */


/**
 * 		================================================================================
 * 									TIME AGO POSTS PUBLISHED
 * 		================================================================================
 * 
 */


// Time ago calculating function
function yogaflex_time_ago() {
     
    global $post;
     
    $date = get_post_time('G', true, $post);
     
    // Array of time period chunks
    $chunks = array(
        array( 60 * 60 * 24 * 365 , __( 'year', 'yogaflex' ), __( 'years', 'yogaflex' ) ),
        array( 60 * 60 * 24 * 30 , __( 'month', 'yogaflex' ), __( 'months', 'yogaflex' ) ),
        array( 60 * 60 * 24 * 7, __( 'week', 'yogaflex' ), __( 'weeks', 'yogaflex' ) ),
        array( 60 * 60 * 24 , __( 'day', 'yogaflex' ), __( 'days', 'yogaflex' ) ),
        array( 60 * 60 , __( 'hour', 'yogaflex' ), __( 'hours', 'yogaflex' ) ),
        array( 60 , __( 'minute', 'yogaflex' ), __( 'minutes', 'yogaflex' ) ),
        array( 1, __( 'second', 'yogaflex' ), __( 'seconds', 'yogaflex' ) )
    );
 
    if ( !is_numeric( $date ) ) {
        $time_chunks = explode( ':', str_replace( ' ', ':', $date ) );
        $date_chunks = explode( '-', str_replace( ' ', '-', $date ) );
        $date = gmmktime( (int)$time_chunks[1], (int)$time_chunks[2], (int)$time_chunks[3], (int)$date_chunks[1], (int)$date_chunks[2], (int)$date_chunks[0] );
    }
     
    $current_time = current_time( 'mysql', $gmt = 0 );
    $newer_date = strtotime( $current_time );
 
    // Difference in seconds
    $since = $newer_date - $date;
 
    // Something went wrong with date calculation and we ended up with a negative date.
    if ( 0 > $since )
        return __( 'sometime', 'yogaflex' );
 
    /**
     * We only want to output one chunks of time here, eg:
     * x years
     * xx months
     * so there's only one bit of calculation below:
     */
 
    //Step one: the first chunk
    for ( $i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
 
        // Finding the biggest chunk (if the chunk fits, break)
        if ( ( $count = floor($since / $seconds) ) != 0 )
            break;
    }
 
    // Set output var
    $output = ( 1 == $count ) ? '1 '. $chunks[$i][1] : $count . ' ' . $chunks[$i][2];
     
 
    if ( !(int)trim($output) ){
        $output = '0 ' . __( 'seconds', 'yogaflex' );
    }
     
    $output .= __(' ago', 'yogaflex');
     
    return $output;
}
 
// Filter our yogaflex_time_ago() function into WP's the_time() function
add_filter('the_time', 'yogaflex_time_ago');


/**		================================ TIME AGO END ==================================== */


/**
 * 		=============================================================================================
 * 											NUMERIC PAGINATION
 * 		=============================================================================================
 */		

// Numeric posts pages navigation
function yogaflex_numeric_posts_nav(){

	if ( is_singular() )
		return;

	global $wp_query;

	/** Stop executionif there's only 1 page */
	if ( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint ( get_query_var( 'paged' ) ) : 1;
	$max = intval ( $wp_query->max_num_pages );

	/** Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/** Add the pages around the current page to the array */
	if ( $paged >= 2 ) {
		$links[] = $paged - 1;
	}

	if ( ( $paged + 1 ) <= $max ) {
		$links[] = $paged + 1;
	}

	echo '<nav class="blog-pagination justify-content-center d-flex"><ul class="pagination">';

	/** Previous Post Link */
	if ( 1 < $paged && $paged <= $max )
		printf ( '<li class="page-item"><a href="%s" class="page-link" aria-label="Previous"><span aria-hidden="true"><span class="lnr lnr-chevron-left"></span>
		</span></a></li>', get_pagenum_link ( $paged - 1 ) );

	/** Current page, plus pages in either direction */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' active ' : '';
		printf ( '<li class="page-item %s" ><a href="%s" class="page-link">0%s</a></li>', $class, esc_url( get_pagenum_link ( $link ) ), $link );
	}

	/** Next Post Link */
	if ( $paged < $max )
		printf( '<li class="page-item"><a href="%s" class="page-link" aria-label="Next"><span aria-hidden="true"><span class="lnr lnr-chevron-right"></span>
		</span></a></li>', get_pagenum_link ( $paged + 1 ) );

	echo '</ul></nav>';

}

/**		================================ END NUMERIC PAGINATION ===================================== */


/**
 * 		=============================================================================================
 * 								SINGLE POST NAVIGATION PREV/NEXT
 * 		=============================================================================================
 */

function yogaflex_posts_navigation( $args = array() ) {
		        $navigation = '';
		       
		                $args = wp_parse_args( $args, array(
							'prev_text'                  => __( '%link' ),
							'next_text'                  => __( '%link' ),
							'in_same_term'               => true,
							'taxonomy'                   => __( 'post_tag' ),
							'screen_reader_text' => __( 'Continue Reading' ),
							) 
						);
		
		                $next_link = get_previous_post_link( '<h4>' . $args['next_text'] . '</h4>' );
		                $prev_link = get_next_post_link( '<h4>' .$args['prev_text'] . '</h4>' );
		
		                if ( $prev_link ) {
								$navigation .= '<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
												<div class="detials"><p>Prev Post</p>' . $prev_link . '</div></div>';
						}
						else{
								$navigation .= '<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center"></div>';
						}
		
		                if ( $next_link ) {
								$navigation .= '<div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
								<div class="detials"><p>Next Post</p>' . $next_link . '</div></div>';
						}
						else{
								$navigation .= '<div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center"></div>';
						}
		      
		
				return $navigation;
	}


 /**	============================= SINGLE POST NAVIGATION END =================================== */

  /** 
  * =================================================================================================
  *								COMMENT FORM CUSTOMIZATION
  * =================================================================================================
  */

  //Remove unnesessary fields from comment form
  function yogaflex_remove_comment_fields( $fields ) {
	unset( $fields['author'] );
	unset( $fields['email'] );
	unset( $fields['url'] );
	unset( $fields['comment'] );
	return $fields;
	}
	 
	add_filter( 'comment_form_fields', 'yogaflex_remove_comment_fields' );

	//Add custom fields to comment form
	function yogaflex_custom_comment_fields($fields){
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$html_req = ( $req ? " aria-required='true'" : '' );
		$replace_author = __('Enter Name', 'yogaflex');
		$replace_email = __('Enter email adress', 'yogaflex');


		$fields['author'] 				= '<div class="form-group form-inline"><div class="form-group col-lg-6 col-md-12 name">
										   <input id="author" name="author" type="text" class="form-control"  placeholder="'.$replace_author.'" onfocus="this.placeholder = \'\'" 
										   onblur="this.placeholder = \'Enter Name\'" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $html_req . ' /></div>';
                    
		$fields['email'] 				= '<div class="form-group col-lg-6 col-md-12 email"><input id="email" name="email" type="text" class="form-control"
										   placeholder="'.$replace_email.'" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Enter email adress\'" 
										   value="' . esc_attr(  $commenter['comment_author_email'] ) .	'" size="30" maxlength="150"' . $html_req . ' /></div></div>';
    
        $fields['subject']    			= '<div class="form-group"><input type="text" class="form-control" id="subject" name="subject" placeholder="'.
                                    	  esc_attr__( 'Subject', 'text-domain' ) . '"onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Subject\'" 
										  value="' . esc_attr( $commenter['subject'] ) . '" size="30" maxlength="150" tabindex="3" /></div>';
												
        $fields['comment_field']    	= '<div class="form-group"><textarea class="form-control mb-10" rows="5" id="comment" name="comment" placeholder="'
                                    	  . _x( 'Message', 'noun' ) . '" onfocus="this.placeholder = \'\'" 
										  onblur="this.placeholder = \'Message\'" cols="45" rows="8" tabindex="4" ></textarea></div>';	
												 
		$fields['comment_notes_after']  = '<button type="submit" class="primary-btn">' . __('Post Comment') . '</button>';	
			
		return $fields;
	}

	add_filter('comment_form_fields', 'yogaflex_custom_comment_fields');

	// Save the comment meta data along with comment - add subject into metadata
	function yogaflex_save_comment_meta_data( $comment_id ) {
		if ( ( isset( $_POST['subject'] ) ) && ( $_POST['subject'] != '') )
		$title = wp_filter_nohtml_kses($_POST['subject']);
		add_comment_meta( $comment_id, 'subject', $title );
	}

	add_action( 'comment_post', 'yogaflex_save_comment_meta_data' );

	// Remove cancel reply link 
	add_filter( 'cancel_comment_reply_link', '__return_false' );

  /**	======================== COMMENT FORM CUSTOMIZATION END ===================================== */


/**
 * 	=================================================================================================	
 * 											BREADCRUMBS 
 * 	=================================================================================================
 */  

	function the_breadcrumb() {
		if ( ! is_home() ) {
			echo '<p class="link-nav">';
			echo '<a href="';
			echo get_option('home');
			echo '">';
			//Option 1: Your site name -> Page 1 -> Page 2 ->	Uncomment for this option
				//bloginfo('name');
			//Option 2: Home -> Page 1 -> Page 2 ->		Comment this option if You use Option 1
				echo 'Home';
			echo '</a> <span class="lnr lnr-arrow-right"></span> ';
				if ( is_category() || is_archive() ){
					the_archive_title( '<cite>', '</cite>' );
				}
				elseif( is_single() ){
					echo '<a href="';
					echo get_post_type_archive_link('post');
					echo '">Blog</a>';
					echo ' <span class="lnr lnr-arrow-right"></span> ';
					echo '<cite>';
						the_title();
					echo '</cite>';
				}
				elseif( is_page() ){
					echo '<cite>';
						the_title();
					echo '</cite>';
				}
			echo '</p>';
		}
	}

 /**	================================  BREADCRUMBS END  ========================================== */


/**
 *  ==================================================================================================
 * 											FILES INCLUDE
 *  ==================================================================================================
 */

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Include custom widget file
require get_template_directory() . '/inc/widgets.php';

// Include custom admin function files
require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/custom-post-type.php';


// Register Custom Navigation Walker
require_once get_template_directory() . '/classes/class-wp-bootstrap-navwalker.php';

// Include yogaflex comments list file
require_once( get_template_directory() .'/inc/yogaflex-comments.php' );

