<?php
/*

@package yogaflex

    ==================================
        ADMIN ENQUEUE FUNCTIONS
    ==================================
*/

function yogaflex_load_admin_scripts( $hook ){

    if('toplevel_page_yogaflex_theme' != $hook ){ return; } 
    wp_register_style( 'yogaflex_admin', get_template_directory_uri().'/style/yogaflex.admin.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'yogaflex_admin' );

    wp_enqueue_media();
    
    wp_register_script( 'yogaflex_admin_script', get_template_directory_uri().'/js/yogaflex.admin.js' , array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'yogaflex_admin_script' );

}

add_action( 'admin_enqueue_scripts', 'yogaflex_load_admin_scripts' );