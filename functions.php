<?php
add_action( 'wp_enqueue_scripts', 'minim_child_enqueue_styles', 100 );
function minim_child_enqueue_styles() {
    wp_enqueue_style( 'minim-parent', get_theme_file_uri('/style.css'), array(), '1.0' );
    wp_enqueue_style( 'generic-styles', get_theme_file_uri('/css/generic.css'), array(), '1.6' );
    wp_enqueue_style( 'custom-header-styles', get_theme_file_uri('/css/header.css'), array(), '1.0' );
    wp_enqueue_style( 'custom-footer-styles', get_theme_file_uri('/css/footer.css'), array(), '1.0' );
    wp_enqueue_style( 'custom-services-styles', get_theme_file_uri('/css/services.css'), array(), '1.0' );
    wp_enqueue_style( 'custom-form-styles', get_theme_file_uri('/css/customForm.css'), array(), '1.4' );

    wp_enqueue_script( 'custom-contactForms-scripts', get_theme_file_uri('/js/contactForms.js'), array(), '1.1', true );
    wp_enqueue_script( 'custom-services-scripts', get_theme_file_uri('/js/services.js'), array(), '1.0', true );
    wp_enqueue_script( 'custom-staffTiles-scripts', get_theme_file_uri('/js/staffTiles.js'), array(), '1.0', true );
    wp_enqueue_script( 'custom-font-awesome', 'https://kit.fontawesome.com/c5cc09af3e.js', array(), '1.0.0', true );
    wp_enqueue_script( 'custom-booking-widget', 'https://www.corepractice.is/Scripts/widget/client.js', array(), '1.0.0', true );
}

add_action('wp_head', 'cvf_ps_enqueue_datepicker');
function cvf_ps_enqueue_datepicker() {
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
   
}

/*
Activate HTML5 fallback support
See: http://contactform7.com/faq/does-contact-form-7-support-html5-input-types/
*/

add_filter( 'wpcf7_support_html5_fallback', '__return_true' );
?>
