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
        return;
    }
 }

 add_action( 'widgets_init', function() {
     register_widget('Yogaflex_Profile_Widget');
 } );
