<h1>Yogaflex Contact Form Options</h1>
<?php  settings_errors(); ?>
<div class="divider" style="width:35%; height:1px; margin: 40px 0 9px 0; overflow: hidden; background-color: #e5e5e5;"></div>

<form class="form-area contact-form text-right" id="yogaflexForm" action="options.php" method="post">
    <?php settings_fields( 'yogaflex-contact-options' ); ?>
    <?php do_settings_sections( 'yogaflex_theme_contact_form' ); ?>
    <?php submit_button( ); ?>
</form>
<!-- 


<div class="divider" style="width:35%; height:1px; margin: 20px 0; overflow: hidden; background-color: #e5e5e5;"></div>

<h3>Contact Form</h3>
<p>Use this <strong>shortcode</strong> to activate the Contact Form inside a Page or a Post</p>
<p><code>[contact_form]</code></p> 
-->