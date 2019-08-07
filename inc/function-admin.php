<?php
/*

@package yogaflex

    ==================================
                ADMIN PAGE
    ==================================
*/

function yogaflex_add_admin_page(){

    // Generate Yogaflex admin page
    add_menu_page('Yogaflex Theme Options', 'Yogaflex', 'manage_options', 'yogaflex_theme', 'yogaflex_theme_create_page', get_template_directory_uri().'/img/icon.png', 110);

    //Generate admin sub-menu pages
    add_submenu_page('yogaflex_theme', 'About Author Options', 'Author Widget', 'manage_options', 'yogaflex_theme', 'yogaflex_theme_create_page' );
    add_submenu_page('yogaflex_theme' , 'Yogaflex Contact Form', 'Contact Form', 'manage_options', 'yogaflex_theme_contact_form', 'yogaflex_contact_form_page' );
    add_submenu_page('yogaflex_theme' , 'Yogaflex Contact Details', 'Contact Details', 'manage_options', 'yogaflex_theme_contact_details', 'yogaflex_theme_contact_details_page' );

    // Activate custom settings
    add_action( "admin_init", 'yogaflex_custom_settings');

}

add_action('admin_menu', 'yogaflex_add_admin_page' );

function yogaflex_custom_settings(){
    //Sidebar Author Options
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


    // Contact Form Options
    register_setting( 'yogaflex-contact-options', 'activate_contact' );

    add_settings_section( 'yogaflex-contact-section', 'Messages page', 'yogaflex_contact_section', 'yogaflex_theme_contact_form' );

    add_settings_field( 'activate-form', 'Activate Messages page', 'yogaflex_activate_contact', 'yogaflex_theme_contact_form', 'yogaflex-contact-section' );


    // Contact Details Options
    register_setting( 'yogaflex-details-group', 'telephone1' );
    register_setting( 'yogaflex-details-group', 'telephone2' );
    register_setting( 'yogaflex-details-group', 'telephone3' );
    register_setting( 'yogaflex-details-group', 'telephone4' );
    register_setting( 'yogaflex-details-group', 'hoursfrom' );
    register_setting( 'yogaflex-details-group', 'hourstill' );
    register_setting( 'yogaflex-details-group', 'state' );
    register_setting( 'yogaflex-details-group', 'city' );
    register_setting( 'yogaflex-details-group', 'street' );
    register_setting( 'yogaflex-details-group', 'housenumber' );
    register_setting( 'yogaflex-details-group', 'zipcode' );
    register_setting( 'yogaflex-details-group', 'localpart' );
    register_setting( 'yogaflex-details-group', 'domain' );
    register_setting( 'yogaflex-details-group', 'facebook_details' );
    register_setting( 'yogaflex-details-group', 'twitter_details', 'yogaflex_sanitize_twitter_handler' );
    register_setting( 'yogaflex-details-group', 'instagram_details' );
    register_setting( 'yogaflex-details-group', 'youtube_details' );

    add_settings_section( 'yogaflex-contact-detail-section', 'Phone Numbers', 'yogaflex_contact_detail_section', 'yogaflex_theme_contact_details' );
    add_settings_section( 'yogaflex-address-detail-section', 'Address Details', 'yogaflex_address_detail_section', 'yogaflex_theme_contact_details' );
    add_settings_section( 'yogaflex-social-detail-section', 'Social Networks Details', 'yogaflex_social_detail_section', 'yogaflex_theme_contact_details' );

    add_settings_field( 'details-header-phone', 'Header Telephone Number', 'yogaflex_header_phone', 'yogaflex_theme_contact_details', 'yogaflex-contact-detail-section' );
    add_settings_field( 'details-footer-phone', 'Footer Telephone Numbers', 'yogaflex_footer_phone', 'yogaflex_theme_contact_details', 'yogaflex-contact-detail-section' );
    add_settings_field( 'details-contact-page-phone', 'Contact Page Telephone Number', 'yogaflex_contact_page_phone', 'yogaflex_theme_contact_details', 'yogaflex-contact-detail-section' );
    add_settings_field( 'details-contact-hours', 'Contact hours', 'yogaflex_contact_hours', 'yogaflex_theme_contact_details', 'yogaflex-contact-detail-section' );
    add_settings_field( 'details-state', 'State', 'yogaflex_state', 'yogaflex_theme_contact_details', 'yogaflex-address-detail-section' );
    add_settings_field( 'details-city', 'City', 'yogaflex_city', 'yogaflex_theme_contact_details', 'yogaflex-address-detail-section' );
    add_settings_field( 'details-street', 'Street', 'yogaflex_street', 'yogaflex_theme_contact_details', 'yogaflex-address-detail-section' );
    add_settings_field( 'details-housenumber', 'House Number', 'yogaflex_housenumber', 'yogaflex_theme_contact_details', 'yogaflex-address-detail-section' );
    add_settings_field( 'details-zip-code', 'Zip Code', 'yogaflex_zip_code', 'yogaflex_theme_contact_details', 'yogaflex-address-detail-section' );
    add_settings_field( 'details-email', 'e-mail address', 'yogaflex_email', 'yogaflex_theme_contact_details', 'yogaflex-address-detail-section' );
    add_settings_field( 'details-social-facebook', 'Facebook handler', 'yogaflex_details_facebook', 'yogaflex_theme_contact_details', 'yogaflex-social-detail-section' );
    add_settings_field( 'details-social-twitter', 'Twitter handler', 'yogaflex_details_twitter', 'yogaflex_theme_contact_details', 'yogaflex-social-detail-section' );
    add_settings_field( 'details-social-instagram', 'Instagram handler', 'yogaflex_details_instagram', 'yogaflex_theme_contact_details', 'yogaflex-social-detail-section' );
    add_settings_field( 'details-social-youtube', 'YouTube handler', 'yogaflex_details_youtube', 'yogaflex_theme_contact_details', 'yogaflex-social-detail-section' );
}

// Author sidebar form functions

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
    <input type="text" name="last_name" id="lastname" value="'.$lastName.'" placeholder="Last Name">';
}

function yogaflex_sidebar_description(){
    $description = esc_attr( get_option( 'user_description' ));
    echo '<input type="text" name="user_description" id="title" value="'.$description.'" placeholder="Input Your Title here">';
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

        // include admin page custom file
function yogaflex_theme_create_page(){
    require_once( get_template_directory().'/inc/templates/yogaflex-admin.php' );
}



// Contact Form functions

function yogaflex_contact_section(){
    echo 'Activate and Deactivate the built-in Messages admin page to handle Contact Form messages.';
}

function yogaflex_activate_contact(){
    $options = get_option('activate_contact');
    $checked = ( $options == 1 ? 'checked' : '');
    echo '<label><input type="checkbox" id="activate_contact"  name="activate_contact" value="1" '.$checked.' /></label>';
}

        // include contact form page file
function yogaflex_contact_form_page(){
    require_once( get_template_directory().'/inc/templates/yogaflex-contact-form.php' );
}




// Contact Details functions

//Phone numbers section
function yogaflex_contact_detail_section(){
    echo 'Insert telephone numbers for header, footer and contact page.';
}

function yogaflex_header_phone(){
    $phone1 = esc_attr( get_option( 'telephone1' ));
    echo '<p>Input Your telephone number for header section.</p>
    <input type="tel" name="telephone1" id="telephone1" value="'.$phone1.'" placeholder="Header phone number">';
}

function yogaflex_footer_phone(){
    $phone2= esc_attr( get_option( 'telephone2' ));
    $phone3 = esc_attr( get_option( 'telephone3' ));
    echo '<p>Input Your telephone numbers for footer section.</p>
    <input type="tel" name="telephone2" id="telephone2" value="'.$phone2.'" placeholder="First phone number">
    <input type="tel" name="telephone3" id="telephone3" value="'.$phone3.'" placeholder="Second phone number">';
}

function yogaflex_contact_page_phone(){
    $phone4 = esc_attr( get_option( 'telephone4' ));
    echo '<p>Input Your main telephone number for contact page.</p>
    <input type="tel" name="telephone4" id="telephone4" value="'.$phone4.'" placeholder="Main phone number"><br/>';
}

function yogaflex_contact_hours(){
    $hoursfrom = esc_attr( get_option( 'hoursfrom' ));
    $hourstill = esc_attr( get_option( 'hourstill' ));
    echo '<p>Define calling time available to contact Your phone (time format <strong>hour : minutes am/pm</strong>).</p>
    <span>From: </span><input type="time" maxlength="5" size="5" name="hoursfrom" id="hoursfrom" value="'.$hoursfrom.'" placeholder="From"><span style="margin-right:30px;"> hours; </span>
    <span>Till: </span><input type="time" maxlength="5" size="5" name="hourstill" id="hourstill" value="'.$hourstill.'" placeholder="Till"><span> hours; </span>';
}

//Address details section

function yogaflex_address_detail_section(){
    echo 'Insert address details for contact page.';
}

function yogaflex_state(){
    $state = esc_attr( get_option( 'state' ));
    echo '<p>Input Your State.</p>
    <input type="text" name="state" value="'.$state.'" placeholder="State">';
}

function yogaflex_city(){
    $city = esc_attr( get_option( 'city' ));
    echo '<p>Input Your City.</p>
    <input type="text" name="city" value="'.$city.'" placeholder="City">';
}

function yogaflex_street(){
    $street = esc_attr( get_option( 'street' ));
    echo '<p>Input Your Street.</p>
    <input type="text" name="street" value="'.$street.'" placeholder="Street">';
}

function yogaflex_housenumber(){
    $number = esc_attr( get_option( 'housenumber' ));
    echo '<p>Input Your House Number.</p>
    <input type="text" name="housenumber" id="housenumber" value="'.$number.'" placeholder="House Number">';
}

function yogaflex_zip_code(){
    $zipcode = esc_attr( get_option( 'zipcode' ));
    echo '<p>Input Your Zip Code.</p>
    <input type="text" name="zipcode" value="'.$zipcode.'" placeholder="Zip Code">';
}

function yogaflex_email(){
    $localpart = esc_attr( get_option( 'localpart' ));
    $domain = esc_attr( get_option( 'domain' ));
    echo '<p>Input Your e-mail address.</p>
    <input type="text" name="localpart" value="'.$localpart.'" placeholder="Local Part"><span>@</span>
    <input type="text" name="domain" id="domain" value="'.$domain.'" placeholder="Domain">';
}

// Social network section

function yogaflex_social_detail_section(){
    echo 'Enter Your social networks details for header and footer section.';
}

function yogaflex_details_facebook(){
    $yogaflex_facebook = esc_attr( get_option( 'facebook_details' ));
    echo '<input type="text" name="facebook_details" value="'.$yogaflex_facebook.'" placeholder="Facebook handler">';
}

function yogaflex_details_twitter(){
    $yogaflex_twitter = esc_attr( get_option( 'twitter_details' ));
    echo '<input type="text" name="twitter_details" value="'.$yogaflex_twitter.'" placeholder="Twitter handler">
    <p>Input Your Twitter username without the @ character.</p>';
}

function yogaflex_details_instagram(){
    $yogaflex_instagram = esc_attr( get_option( 'instagram_details' ));
    echo '<input type="text" name="instagram_details" value="'.$yogaflex_instagram.'" placeholder="Instagram handler">';
}

function yogaflex_details_youtube(){
    $yogaflex_youtube = esc_attr( get_option( 'youtube_details' ));
    echo '<input type="text" name="youtube_details" value="'.$yogaflex_youtube.'" placeholder="YouTube handler">';
}


        // include contact details page file
function yogaflex_theme_contact_details_page(){
    require_once( get_template_directory().'/inc/templates/yogaflex-contact-details.php' );
}


