<h1>Yogaflex Theme Options</h1>

<?php  settings_errors(); ?>
<?php 

$picture = esc_attr( get_option( 'profile_picture' ));
$firstName = esc_attr( get_option( 'first_name' ));
$lastName = esc_attr( get_option( 'last_name' ));
$fullName = $firstName .' '. $lastName;
$description = esc_attr( get_option( 'user_description' ));
$about = esc_attr( get_option( 'user_about' ));

?>

<div class="yogaflex-sidebar-preview">
    <div class="yogaflex-sidebar">
        <div class="image-container">
            <div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>);"></div>
        </div>
        <h4 class="yogaflex-username"><?php print $fullName; ?></h4>
        <p class="yogaflex-title"><?php print $description; ?></p>
        <p class="yogaflex-about"><?php print $about; ?></p>
        <ul class="social-links">

        </ul>
    </div>
</div>

<form method="post" action="options.php" class="yogaflex-general-form">
    <?php settings_fields( 'yogaflex-settings-group' );  ?>
    <?php do_settings_sections( 'yogaflex_theme' );?>
    <?php submit_button(); ?>
</form>
