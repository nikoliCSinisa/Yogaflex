<?php
/**
 * 
 * @package yogaflex
 * 
 * =================================
 *      THEME CUSTOM POST TYPES
 * =================================
 */

 $contact = get_option( 'activate_contact');
    if( @$contact == 1){
       add_action( 'init', 'yogaflex_custom_contact_post_type' );
    }


/** Contact Custom Post Type */
function yogaflex_custom_contact_post_type(){
    $labels = array(
        'name'                  => 'Messages',
        'singular_name'         => 'Message',
        'manu_name'             => 'Messages',
        'name_admin_bar'        => 'Massage'
    );

    $args = array(
        'labels'                => $labels,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'capability_type'       => 'post',
        'hierarchical'          => false,
        'menu_position'         => 26,
        'menu_icon'             => 'dashicons-email-alt',
        'supports'              => array( 'title', 'editor', 'author' )
    );

    register_post_type( 'yogaflex-contact', $args );
}