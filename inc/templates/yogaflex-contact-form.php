<h1>Yogaflex Contact Form Options</h1>

<?php  settings_errors(); ?>

<form class="form-area contact-form text-right" id="yogaflexForm" action="options.php" method="post">
    <?php settings_fields( 'yogaflex-contact-options' ); ?>
    <?php do_settings_sections( 'yogaflex_theme_contact_form' ); ?>
    <?php submit_button( ); ?>
</form>