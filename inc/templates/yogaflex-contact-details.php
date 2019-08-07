<h1>Yogaflex Contact Details</h1>

<?php  settings_errors(); ?>

<div class="divider" style="width:35%; height:1px; margin: 40px 0 9px 0; overflow: hidden; background-color: #e5e5e5;"></div>

<form class="form-area contact-form text-right" id="yogaflexForm" action="options.php" method="post">
    <?php do_settings_sections( 'yogaflex_theme_contact_details' ); ?>
    <?php settings_fields( 'yogaflex-details-group' ); ?>
    <?php submit_button( ); ?>
</form>