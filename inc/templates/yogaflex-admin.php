<h1>About Author Options</h1>

<?php  settings_errors(); ?>
<?php 

$picture = esc_attr( get_option( 'profile_picture' ));
$firstName = esc_attr( get_option( 'first_name' ));
$lastName = esc_attr( get_option( 'last_name' ));
$fullName = $firstName .' '. $lastName;
$description = esc_attr( get_option( 'user_description' ));
$about = esc_attr( get_option( 'user_about' ));
$facebook = esc_attr( get_option( 'facebook_handler' ));
$twitter = esc_attr( get_option( 'twitter_handler' ));
$git = esc_attr( get_option( 'git_handler' ));
$behance = esc_attr( get_option( 'behance_handler' ));

?>

<div class="yogaflex-sidebar-preview">
    <div class="yogaflex-sidebar">
        <div class="image-container">
            <div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>);"></div>
        </div>
        <h4 class="yogaflex-username"><?php print $fullName; ?></h4>
        <p class="yogaflex-title"><?php print $description; ?></p>
        <ul class="social-links">
            <?php if( !empty($facebook) ); ?>
                <li><a href="https://facebook.com/<?php echo $facebook; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
             <?php if( !empty($twitter) ); ?>
                <li><a href="https://twitter.com/<?php echo $twitter; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <?php if( !empty($git) ); ?>
                <li><a href="https://github.com/<?php echo $git; ?>" target="_blank"><i class="fa fa-github"></i></a></li>
            <?php if( !empty($behance) ); ?>
                <li><a href="https://www.behance.net/<?php echo $behance; ?>" target="_blank"><i class="fa fa-behance"></i></a></li>
        </ul>
        <p class="yogaflex-about"><?php print $about; ?></p>
        
    </div>
</div>

<form method="post" action="options.php" class="yogaflex-general-form">
    <?php settings_fields( 'yogaflex-settings-group' );  ?>
    <?php do_settings_sections( 'yogaflex_theme' );?>
    <?php submit_button(); ?>
</form>
