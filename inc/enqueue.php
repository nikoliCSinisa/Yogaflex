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

    // enqueue jQuery library: Gridster
    wp_enqueue_style("gridster-style", "https://cdn.rawgit.com/ducksboard/gridster.js/master/dist/jquery.gridster.min.css", false);
    wp_enqueue_script("jquery-gridster", "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js", false);
    wp_enqueue_script("gridster-script", "https://cdn.rawgit.com/ducksboard/gridster.js/master/dist/jquery.gridster.min.js", false);
    wp_enqueue_style("gridster-script-extra", "https://cdn.rawgit.com/ducksboard/gridster.js/master/dist/jquery.gridster.with-extras.min.js", false);

}

add_action( 'admin_enqueue_scripts', 'yogaflex_load_admin_scripts' );