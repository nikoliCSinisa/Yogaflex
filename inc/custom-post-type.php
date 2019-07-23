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
        
        add_filter( 'manage_yogaflex-contact_posts_columns', 'yogaflex_set_contact_columns' );
        add_action( 'manage_yogaflex-contact_posts_custom_column', 'yogaflex_contact_custom_column', 10, 2 );
    }


/** Contact Custom Post Type */
function yogaflex_custom_contact_post_type(){
    $labels = array(
        'name'                  => 'Messages',
        'singular_name'         => 'Message',
        'manu_name'             => 'Messages',
        'name_admin_bar'        => 'Message'
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

function yogaflex_set_contact_columns( $columns){
    $newColumns = array();
    $newColumns['title'] = 'Subject';
    $newColumns['message'] = 'Message';
    $newColumns['author'] = 'Full name';
    $newColumns['email'] = 'Email';
    $newColumns['date'] = 'Date';
    return $newColumns;
}

function yogaflex_contact_custom_column( $column, $post_id){

    switch( $column){

        case 'title' :
            echo 'Name';
            break;

        case 'subject' :
            echo 'Subject';
            break;

        case 'message' :
            echo get_the_excerpt();
            break;

        case 'email' :
            echo 'email adress';
            break;
    }
}