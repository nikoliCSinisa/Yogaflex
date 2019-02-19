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

        echo $args['after_widget'];
    }
}

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

    //back-end display of widget
    public function form( $instance ){
        echo '<p><strong>No options for this Widget!</strong><br>You can control the fields of this Widget from <a href="./admin.php?page=yogaflex_theme">This Page</a></p>';
    }

    //front-end display of widget
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

        echo $args['before_widget'];
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
        echo $args['after_widget'];
    }
 }

 add_action( 'widgets_init', function() {
     register_widget('Yogaflex_Profile_Widget');
 } );

/*
    Popular posts widget
*/

