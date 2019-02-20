<?php
/**
 * ===============================
 *          Widget Class
 * ===============================
 *
 * @package yogaflex
 */

 
/*
    Search Widget
*/

class Yogaflex_Search_Widget extends WP_Widget {

    //setup the widget name, description, etc ...
    public function __construct(){
        $widget_sops = array(
            'classname' => 'search',
            'description' => 'Yogaflex search widget',
        );
        parent::__construct('yogaflex_search', 'Yogaflex Search', $widget_sops);
    }

    //back-end display of widget
    public function searchForm( $ins ){
        echo 'This is standard search form.';
    }

    //front-end display of widget
    public function widget( $args, $ins ){

        echo $args['before_widget'];
?>
        <form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	        <input type="text" placeholder="<?php echo esc_attr_x( 'Search Posts', 'placeholder', 'yogaflex' ); ?>" value="<?php echo get_search_query(); ?>" name="search" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'" >
	        <button type="submit"><i class="fa fa-search"></i></button>
        </form>
<?php
        echo $args['after_widget'];
    }
}
// activate widget by register custom class
add_action( 'widgets_init', function() {
    register_widget('Yogaflex_Search_Widget');
} );




/*
    Author Profile Widget
*/

 class Yogaflex_Profile_Widget extends WP_Widget {

    //setup the widget name, description, etc ...
    public function __construct(){
        $widget_ops = array(
            'classname' => 'user-info',
            'description' => 'Yogaflex author widget',
        );
        parent::__construct('yogaflex_profile', 'Yogaflex Profile', $widget_ops);
    }

    //back-end display of widget - Shows in widget settings in admin area > widgets
    public function form( $instance ){
        echo '<p><strong>No options for this Widget!</strong><br>You can control the fields of this Widget from <a href="./admin.php?page=yogaflex_theme">This Page</a></p>';
    }

    //front-end display of widget
    // variables used from yogaflex-admin.php
    public function widget( $args, $instance ){
        $picture = esc_attr( get_option( 'profile_picture' ));
        $firstName = esc_attr( get_option( 'first_name' ));
        $lastName = esc_attr( get_option( 'last_name' ));
        $fullName = $firstName .' '. $lastName;
        $description = esc_attr( get_option( 'user_description' ));
        $about = esc_attr( get_option( 'user_about' ));
        $facebook = esc_attr( get_option( 'facebook_handler' ));
        $twitter = esc_attr( get_option( 'twitter_handler' ));
        $git = esc_attr( get_option( 'git_handler' ));
        $behance = esc_attr( get_option( 'behance_handler' ));

        echo $args['before_widget'];        //add before widget tags set in function.php widget init

        // html code for front view widget on sidebar.php
?>
        <div class="image-container">
            <div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>);"></div>
        </div>
        <h4><?php print $fullName; ?></h4>
        <p><?php print $description; ?></p>
 <?php       echo '<ul class="social-links">';
                if( !empty($facebook) ):
                    echo '<li><a href="https://facebook.com/'.$facebook.'" target="_blank"><i class="fa fa-facebook"></i></a></li>';
                endif;
                if( !empty($twitter) ): 
                    echo '<li><a href="https://twitter.com/'.$twitter.'" target="_blank"><i class="fa fa-twitter"></i></a></li>';
                endif;
                if( !empty($git) ):
                    echo '<li><a href="https://github.com/'.$git.'" target="_blank"><i class="fa fa-github"></i></a></li>';
                endif;
                if( !empty($behance) ):
                    echo '<li><a href="https://www.behance.net/'.$behance.'" target="_blank"><i class="fa fa-behance"></i></a></li>';
                endif;
            echo '</ul>';
 ?>

        <p><?php print $about; ?></p>

 <?php
        echo $args['after_widget'];         //add after widget tags set in function.php widget init
    }
 }

 add_action( 'widgets_init', function() {
     register_widget('Yogaflex_Profile_Widget');
 } );

/*
    Popular posts widget
*/

// Counting posts views function type 2 - not added to single.php

function yogaflex_save_post_views( $postID ){
    $metaKey = 'yogaflex_post_views';
    $views = get_post_meta( $postID, $metaKey, true );

    $count = ( empty( $views ) ? 0 : $views);
    $count++;

    update_post_meta( $postID, $metaKey, $count );
}

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );


// Creating class of widget

class Yogaflex_Popular_Post_Widget extends WP_Widget{

        //setup the widget name, description, etc ...
        public function __construct(){
            $widget_ops = array(
                'classname' => 'popular-post',
                'description' => 'Yogaflex popular post widget',
            );
            parent::__construct('yogaflex_popular_posts', 'Yogaflex Popular Posts', $widget_ops);
        }

        //back-end display of widget - Shows in widget settings in admin area > widgets
        public function form( $instance ){

            $title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Popular Posts');
            $tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4);

            $output = '<p>';
            $output .= '<label for="'. esc_attr( $this->get_field_id( 'title' ) ). '">Title:</label>';
            $output .= '<input type="text" class="widefat" id="'. esc_attr( $this->get_field_id( 'title' ) ). '" 
        name="'. esc_attr( $this->get_field_name( 'title' ) ). '" value="'.esc_attr( $title ).'" >';
            $output .= '<p>';

            $output .= '<p>';
            $output .= '<label for="'. esc_attr( $this->get_field_id( 'tot' ) ). '">Number of posts:</label>';
            $output .= '<input type="number" class="widefat" id="'. esc_attr( $this->get_field_id( 'tot' ) ). '" 
        name="'. esc_attr( $this->get_field_name( 'tot' ) ). '" value="'.esc_attr( $tot ).'" >';
            $output .= '<p>';

            echo $output;
        }

        // update widget
        public function update( $new_instance, $old_instance ){

            $instance = array();
            $instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
            $instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( $new_instance[ 'tot' ] ) : 0 );

            return $instance;
        }

        // frontend dispaly of widget
        public function widget( $args, $instance ){

            $tot = absint( $instance[ 'tot' ] );

            $posts_args = array(
                'post_type'             => 'post',
                'posts_per_page'        => $tot,
                'meta_key'              => 'post_views_count',
                'orderby'               => 'meta_value_num',
                'order'                 => 'DESC'
            );

            $posts_query = new WP_Query( $posts_args );

            echo $args[ 'before_widget' ];

            if( !empty( $instance[ 'title' ] ) ):

                echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ]) . $args[ 'after_title' ]; 

            endif; 

            echo '<div class="popular-post-list">';

            if( $posts_query->have_posts() ):
                while( $posts_query->have_posts() ): $posts_query->the_post();
                        echo ' <div class="single-post-list d-flex flex-row align-items-center">';
                           
                                    echo '<div class="thumb" style="width: 100px; height: 60px;">';
                                        yogaflex_post_thumbnail(100, 60, false);
                                    echo '</div>
                                        <div class="details">';    
                                    echo '<a href="'. esc_url( get_permalink() ) .'"><h6>'.get_the_title().'</h6></a>';
                                    echo '<p>02 Hours ago</p>
                                        </div>
                                </div> ';
                endwhile;    
            endif;  
            
            echo '</div>';

            echo $args[ 'after_widget' ];

        }
}

add_action( 'widgets_init', function() {
    register_widget('Yogaflex_Popular_Post_Widget');
} );