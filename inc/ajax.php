<?php

/*

@package yogaflex

 ======================
    AJAX FUNCTION
 ======================
 */

 add_action( 'wp_ajax_nopriv_yogaflex_save_user_contact_form', 'yogaflex_save_contact' );
 add_action( 'wp_ajax_yogaflex_save_user_contact_form', 'yogaflex_save_contact' );

 function yogaflex_save_contact(){

    $name = wp_strip_all_tags( $_POST["name"] );
    $email = wp_strip_all_tags( $_POST["email"] );
    $subject = wp_strip_all_tags( $_POST["subject"] );
    $message = wp_strip_all_tags( $_POST["message"] );

    $args = array(
       'post title' => $subject,
       'post_message' => $message,
       'post_author'=> $name,
       'post_type' => 'yogaflex-contact',
       'meta_input' => array(
          'contact_email' => $email
       )
    );

    $postID = wp_insert_post( $args );

    echo $postID;

   die();
 }