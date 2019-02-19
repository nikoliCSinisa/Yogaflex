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
    add_submenu_page('yogaflex_theme', 'About Author Options', 'Author', 'manage_options', 'yogaflex_theme', 'yogaflex_theme_create_page' );
    add_submenu_page('yogaflex_theme' , 'Yogaflex CSS Options', 'Custom CSS', 'manage_options', 'yogaflex_theme_css', 'yogaflex_theme_settings_page' );

    // Activate custom settings
    add_action( "admin_init", 'yogaflex_custom_settings');
}

add_action('admin_menu', 'yogaflex_add_admin_page' );

function yogaflex_custom_settings(){
    register_setting( 'yogaflex-settings-group', 'profile_picture' );
    register_setting( 'yogaflex-settings-group', 'first_name' );
    register_setting( 'yogaflex-settings-group', 'last_name' );
    register_setting( 'yogaflex-settings-group', 'user_description' );
    register_setting( 'yogaflex-settings-group', 'user_about' );
    register_setting( 'yogaflex-settings-group', 'facebook_handler' );
    register_setting( 'yogaflex-settings-group', 'twitter_handler', 'yogaflex_sanitize_twitter_handler' );
    register_setting( 'yogaflex-settings-group', 'git_handler' );
    register_setting( 'yogaflex-settings-group', 'behance_handler' );

    add_settings_section( 'yogaflex-sidebar-options', 'Sidebar Option', 'yogaflex_sidebar_options', 'yogaflex_theme' );

    add_settings_field( 'sidebar-profile-picture', 'Profile Picture', 'yogaflex_sidebar_profile', 'yogaflex_theme', 'yogaflex-sidebar-options' );
    add_settings_field( 'sidebar-name', 'Full Name', 'yogaflex_sidebar_name', 'yogaflex_theme', 'yogaflex-sidebar-options' );
    add_settings_field( 'sidebar-description', 'Description', 'yogaflex_sidebar_description', 'yogaflex_theme', 'yogaflex-sidebar-options' );
    add_settings_field( 'sidebar-about', 'About author', 'yogaflex_sidebar_about', 'yogaflex_theme', 'yogaflex-sidebar-options' );
    add_settings_field( 'sidebar-facebook', 'Facebook handler', 'yogaflex_sidebar_facebook', 'yogaflex_theme', 'yogaflex-sidebar-options' );
    add_settings_field( 'sidebar-twitter', 'Twitter handler', 'yogaflex_sidebar_twitter', 'yogaflex_theme', 'yogaflex-sidebar-options' );
    add_settings_field( 'sidebar-git', 'Git handler', 'yogaflex_sidebar_git', 'yogaflex_theme', 'yogaflex-sidebar-options' );
    add_settings_field( 'sidebar-behance', 'Behance handler', 'yogaflex_sidebar_behance', 'yogaflex_theme', 'yogaflex-sidebar-options' );
}

function yogaflex_sidebar_options(){
    echo 'Customize sidebar Widget for Author details';
}

function yogaflex_sidebar_profile(){
    $picture = esc_attr( get_option( 'profile_picture' ));
    echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button">
    <input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'">';
}

function yogaflex_sidebar_name(){
    $firstName = esc_attr( get_option( 'first_name' ));
    $lastName = esc_attr( get_option( 'last_name' ));
    echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name"> 
    <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name">';
}

function yogaflex_sidebar_description(){
    $description = esc_attr( get_option( 'user_description' ));
    echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description">
    <p>Input Your Title here.</p>';
}

function yogaflex_sidebar_about(){
    $about = esc_attr( get_option( 'user_about' ));
    echo '<textarea type="text" name="user_about" placeholder="Write something about You">'.$about.'</textarea>';
}

function yogaflex_sidebar_facebook(){
    $facebook = esc_attr( get_option( 'facebook_handler' ));
    echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler">';
}

function yogaflex_sidebar_twitter(){
    $twitter = esc_attr( get_option( 'twitter_handler' ));
    echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler">
    <p>Input Your Twitter username without the @ character.</p>';
}

function yogaflex_sidebar_git(){
    $git = esc_attr( get_option( 'git_handler' ));
    echo '<input type="text" name="git_handler" value="'.$git.'" placeholder="Git handler">';
}

function yogaflex_sidebar_behance(){
    $behance = esc_attr( get_option( 'behance_handler' ));
    echo '<input type="text" name="behance_handler" value="'.$behance.'" placeholder="Behance handler">';
}

// Sanitization settings
function yogaflex_sanitize_twitter_handler( $input ){
    $output = sanitize_text_field( $input );
    $output = str_replace('@', '', $output);
    return $output;
}


function yogaflex_theme_create_page(){
    require_once(get_template_directory().'/inc/templates/yogaflex-admin.php');
}

function yogaflex_theme_settings_page(){
    // generation of our admin page
}