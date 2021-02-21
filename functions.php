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

/*
Activate HTML5 fallback support
See: http://contactform7.com/faq/does-contact-form-7-support-html5-input-types/
*/

add_filter( 'wpcf7_support_html5_fallback', '__return_true' );


/*
Add l18n for datepicker
See: http://wordpress.org/support/topic/adding-translation-to-ui-datepicker
Props: http://wordpress.org/support/profile/prometee
*/

/**
 * Get the locale according to the format available in the jquery ui i18n file list
 *
 * @url https://github.com/jquery/jquery-ui/tree/master/ui/i18n
 * @return string ex: "fr" ou "en-GB"
 */
function getJqueryUII18nLocale() {
	//replace _ by - in "en_GB" for example
	$locale = str_replace( '_', '-', get_locale() );
	switch ( $locale ) {
		case 'ar-DZ':
		case 'cy-GB':
		case 'en-AU':
		case 'en-GB':
		case 'en-NZ':
		case 'fr-CA':
		case 'fr-CH':
		case 'nl-BE':
		case 'pt-BR':
		case 'sr-SR':
		case 'zh-CN':
		case 'zh-HK':
		case 'zh-TW':
			// For all this locale do nothing the file already exist
			break;
		default:
			// for other locale keep the first part of the locale (ex: "fr-FR" -> "fr")
			$locale = substr( $locale, 0, strpos( $locale, '-' ) );
			// English is the default locale = empty string
			$locale = ( $locale == 'en' ) ? '' : $locale;
			break;
	}
	return $locale;
}

function add_l18n_datepicker_script() {
	// Just add l18n script if cf7 is really loaded on this page/post
	if ( ! wp_script_is( 'contact-form-7' ) ) { return; }

	// Get the WP built-in version from jQuery UI
	$wp_jquery_ui_ver = $GLOBALS['wp_scripts']->registered['jquery-ui-core']->ver;

	$locale = getJqueryUII18nLocale();
	if ( ''  != $locale ) { // Just add l18n if language is not EN (empty string)
		/* CDN */
		// wp_enqueue_script( 'jquery-ui-i18n-' . $locale, 'http://jquery-ui.googlecode.com/svn/tags/latest/ui/i18n/jquery.ui.datepicker-' . $locale . '.js', array( 'jquery-ui-datepicker' ), $wp_jquery_ui_ver, true );
		/* local */
		wp_enqueue_script( 'jquery-ui-i18n-' . $locale, get_theme_file_uri('/js/jquery.ui.datepicker-' . $locale . '.js') , array( 'jquery-ui-datepicker' ), $wp_jquery_ui_ver, true );
	}
}

add_action( 'wp_enqueue_scripts' , 'add_l18n_datepicker_script' );
?>
