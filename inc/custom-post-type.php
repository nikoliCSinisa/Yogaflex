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

        add_action( 'add_meta_boxes', 'yogaflex_contact_add_meta_box' );

        add_action( 'save_post', 'yogaflex_save_contact_email_data' );
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

        case 'message' :
            echo get_the_excerpt();
            break;

        case 'email' :
            $email = get_post_meta( $post_id, '_contact_email_value_key', true );
            echo '<a href="mailto:' . $email . '">' . $email . '</a>';
            break;
    }
}

/* Contact Meta boxes */

function yogaflex_contact_add_meta_box(){
    add_meta_box( 'contact_email', 'User Email', 'yogaflex_contact_email_callback', 'yogaflex-contact', 'side', 'default' );
}

function yogaflex_contact_email_callback( $post ){
    wp_nonce_field( 'yogaflex_save_contact_email_data', 'yogaflex_contact_email_meta_box_nonce' );

    $value = get_post_meta( $post->ID, '_contact_email_value_key', true );


    echo '<label for="yogaflex_contact_email_field">User email address: </label>';
    echo '<input type="email" id="yogaflex_contact_email_field" name="yogaflex_contact_email_field" value="' . esc_attr( $value ). '" size="25" />';
}

function yogaflex_save_contact_email_data( $post_id ){

    if( ! isset( $_POST['yogaflex_contact_email_meta_box_nonce'] ) ){
        return;
    }

    if( ! wp_verify_nonce( $_POST['yogaflex_contact_email_meta_box_nonce'], 'yogaflex_save_contact_email_data' ) ){
        return;
    }

    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
        return;
    }

    if( ! current_user_can( 'edit_post', $post_id ) ){
        return;
    }

    if( ! isset( $_POST['yogaflex_contact_email_field'] ) ){
        return;
    }

    $my_data = sanitize_text_field(  $_POST['yogaflex_contact_email_field'] );

    update_post_meta( $post_id, '_contact_email_value_key', $my_data );
}