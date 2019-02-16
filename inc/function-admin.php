<?php
/*

@package yogaflex

==================================
ADMIN PAGE
=================================
*/

function yogaflex_add_admin_page(){

    add_menu_page('Yogaflex Theme Options', 'Yogaflex', 'manage_options', 'yogaflex-theme', 
    'yogaflex_theme_create_page', get_template_directory_uri().'/img/icon.png', 110);

}

add_action( 'admin_menu', 'yogaflex_add_admin_page' );

function yogaflex_theme_create_page(){
    // generation of our admin page
}