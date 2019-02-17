<?php
/*

@package yogaflex

    ==================================
        ADMIN ENQUEUE FUNCTIONS
    ==================================
*/

function yogaflex_load_admin_scripts( $hook ){

    if('toplevel_page_yogaflex_theme' != $hook ){
        return;
    } 
    wp_register_style( 'yogaflex_admin', get_template_directory_uri().'/style/yogaflex.admin.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'yogaflex_admin' );

}

add_action( 'admin_enqueue_scripts', 'yogaflex_load_admin_scripts' );