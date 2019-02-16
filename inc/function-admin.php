<?php
/*

@package yogaflex

    ==================================
                ADMIN PAGE
    ==================================
*/

function yogaflex_add_admin_page(){

    // Generate Yogaflex admin page
    add_menu_page('Yogaflex Theme Options', 'Yogaflex', 'manage_options', 'yogaflex_theme', 
    'yogaflex_theme_create_page', get_template_directory_uri().'/img/icon.png', 110);

    //Generate menu sub-menu pages
    add_submenu_page('yogaflex_theme', 'Yogaflex Sidebar Options', 'General', 'manage_options', 'yogaflex_theme', 'yogaflex_theme_create_page' );
    add_submenu_page('yogaflex_theme' , 'Yogaflex CSS Options', 'Custom CSS', 'manage_options', 'yogaflex_theme_css', 'yogaflex_theme_settings_page' );

    // Activate custom settings
    add_action( "admin_init", 'yogaflex_custom_settings');
}

add_action('admin_menu', 'yogaflex_add_admin_page' );

function yogaflex_custom_settings(){
    register_setting( 'yogaflex-settings-group', 'first_name' );
    add_settings_section( 'yogaflex-sidebar-options', 'Sidebar Option', 'yogaflex_sidebar_options', 'yogaflex_theme' );
}

function yogaflex_sidebar_options(){
    echo 'Customize sidebar';
}

function yogaflex_theme_create_page(){
    require_once(get_template_directory().'/inc/templates/yogaflex-admin.php');
}

function yogaflex_theme_settings_page(){
    // generation of our admin page
}