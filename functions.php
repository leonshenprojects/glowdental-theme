<?php
add_action( 'wp_enqueue_scripts', 'minim_child_enqueue_styles', 100 );
function minim_child_enqueue_styles() {
    wp_enqueue_style( 'minim-parent', get_theme_file_uri('/style.css') );
    wp_enqueue_style( 'generic-styles', get_theme_file_uri('/css/generic.css'), array(), time());
    wp_enqueue_style( 'custom-header-styles', get_theme_file_uri('/css/header.css'), array(), time());
    wp_enqueue_style( 'custom-footer-styles', get_theme_file_uri('/css/footer.css'), array(), time());
    wp_enqueue_style( 'custom-services-styles', get_theme_file_uri('/css/services.css'), array(), time());
    wp_enqueue_style( 'custom-form-styles', get_theme_file_uri('/css/customForm.css'), array(), time());

    wp_enqueue_script( 'custom-services-scripts', get_theme_file_uri('/js/services.js'), array(), time(), true );
    wp_enqueue_script( 'custom-staffTiles-scripts', get_theme_file_uri('/js/staffTiles.js'), array(), time(), true );
    wp_enqueue_script( 'custom-font-awesome', 'https://kit.fontawesome.com/c5cc09af3e.js', array(), '1.0.0', true );
}
?>
