<?php
/**
 * Widget Class
 *
 * @package yogaflex
 */

 class Yogaflex_Profile_Widget extends WP_Widget {

    //setup the widget name, description, etc ...
    public function __construct(){
        $widget_ops = array(
            'classname' => 'Yogaflex-author-profile',
            'description' => 'Yogaflex author widget',
        );
        parent::__construct('yogaflex_profile', 'Yogaflex Profile', $widget_ops);
    }

    //back-end display of widget
    public function form( $instance ){
        echo '';
    }

    //front-end display of widget
    public function widget( $args, $instance ){
        echo '<div class="widget-wrap">
        <div class="single-sidebar-widget widget_text">
        <ul class="social-links">
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-github"></i></a></li>
        <li><a href="#"><i class="fa fa-behance"></i></a></li>
    </ul>
    </div>
    </div>';
    }
 }

 add_action( 'widgets_init', function() {
     register_widget('Yogaflex_Profile_Widget');
 } );
