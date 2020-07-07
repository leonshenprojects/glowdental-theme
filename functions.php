<?php
add_action( 'wp_enqueue_scripts', 'minim_child_enqueue_styles', 100 );
function minim_child_enqueue_styles() {
    wp_enqueue_style( 'minim-parent', get_theme_file_uri('/style.css') );
    wp_enqueue_style( 'custom-header-styles', get_theme_file_uri('/css/header.css') );
}
?>
