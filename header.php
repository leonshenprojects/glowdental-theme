<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-T95VBPS');</script>
    <!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T95VBPS"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php
// loading
$loader = get_theme_mod( 'use-site-loader', minim_defaults('use-site-loader') );
if( !empty($loader) )
echo '<div class="loader"><div class="loader-inner ball-zig-zag"><div></div><div></div><div></div></div></div>';
// top hook
do_action( 'minim_hook_top' ); ?>

<!-- **Wrapper** -->
<div class="wrapper">
	<div class="inner-wrapper">

		<!-- **Header Wrapper** -->
        <?php 
		// header types
		$htype = get_theme_mod( 'header-type', minim_defaults('header-type') );

		$hdarkbg = get_theme_mod( 'enable-header-darkbg', minim_defaults('enable-header-darkbg') ); 
		$class = ( $hdarkbg ) ? 'dt-sc-dark-bg' : ''; ?>
		<div id="header-wrapper" class="<?php echo esc_attr( $class );?>">
            <!-- **Header** -->
            <header id="header"><?php
				// check header type
				if( $htype != "left-header" && $htype != "left-header-boxed" && $htype != "creative-header" && $htype != "overlay-header" ):
					// header position
					$headerpos = get_theme_mod( 'header-position', minim_defaults('header-position') );
					
					if( isset($headerpos) && $headerpos == 'below slider' ):
						echo minim_slider();
					endif;
				endif;

				//top bar
				$topbar 	=  get_theme_mod( 'enable-top-bar-content', minim_defaults('enable-top-bar-content') );
				$topcontent =  get_theme_mod( 'top-bar-content', '');
				if( ($topbar) && isset($topcontent) && $topcontent != '' ):?>
        	        <div class="top-bar">
            	        <div class="container">
                            <div class="topBar">
                                <div class="topBar__left">
                                    <a class="customButton1" href="/contact-us">
                                        <span>BOOK NOW</span>
                                    </a>
                                </div>

                                <div class="topBar__right">
                                    <a class="topBar__item customIconButton1" href="mailto:info@glowdental.co.nz" target="_blank">
                                        <i class="fa fa-envelope-o"></i>
                                    </a>

                                    <a class="topBar__item customIconButton1" href="https://www.facebook.com/glowdentalnz" target="_blank">
                                        <i class="fa fa-facebook-f"></i>
                                    </a>

                                    <a class="topBar__item customIconButton1" href="https://www.instagram.com/glowdentalnz" target="_blank">
                                        <i class="fa fa-instagram"></i>
                                    </a>

                                    <a class="topBar__item customButton1 customButton1--collapsableLabel" href="tel:+6496002774">
                                        <i class="fa fa-phone fa-flip-horizontal"></i>
                                        <span class="customButton1__label">(09) 600 2774</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><?php
				endif; ?>

            	<!-- **Main Header Wrapper** -->
            	<div id="main-header-wrapper" class="main-header-wrapper">

            		<div class="container">

            			<!-- **Main Header** -->
            			<div class="main-header"><?php
							if( isset($htype) && ($htype == 'fullwidth-header header-align-center fullwidth-menu-header') ):
								$header_left = get_theme_mod( 'enable-header-left-content', minim_defaults('enable-header-left-content') );
								if( !empty( $header_left ) ): ?>
									<div class="header-left"><?php									
									$leftcontent = get_theme_mod( 'header-left-content', minim_defaults('header-left-content') );
									if( isset($leftcontent) && $leftcontent != '') :
										$content = do_shortcode( stripcslashes( $leftcontent ) );
										echo minim_wp_kses( $content );
									endif; ?></div><?php
								endif;
							endif;
                            ?>
                            
                            <div class="headerContainer">
                                <?php minim_header_logo(); ?>

                                <div>
                                    <div class="dt-menu-toggle" id="dt-menu-toggle">
                                        <span class="dt-menu-toggle-icon"></span>
                                    </div>
                                </div>
                            </div>
                            
                            <?php
							if( isset($htype) && (($htype == 'fullwidth-header header-align-center fullwidth-menu-header') || 
								($htype == 'fullwidth-header header-align-left fullwidth-menu-header')) ):
								$header_right = get_theme_mod( 'enable-header-right-content', minim_defaults('enable-header-right-content') );
								if( !empty( $header_right ) ):?>
									<div class="header-right"><?php
										$rightcontent = get_theme_mod( 'header-right-content', minim_defaults('header-right-content') );
										if( isset($rightcontent) && $rightcontent != '') :
											$content = do_shortcode( stripcslashes( $rightcontent ) );
											echo minim_wp_kses( $content );
										endif; ?></div><?php
								endif;
							endif; ?>

            				<div id="menu-wrapper" class="menu-wrapper <?php echo get_theme_mod( 'menu-active-style', minim_defaults('menu-active-style') );?>">
                                <?php
								if( isset($htype) ):
									switch($htype):
										case 'split-header fullwidth-header':
										case 'split-header boxed-header':
												echo '<nav id="main-menu">';
												minim_wp_split_menu();
												echo '</nav>';
										break;
										
										case 'overlay-header':
												echo '<div class="overlay overlay-hugeinc">';
													echo '<div class="overlay-close"></div>';
													minim_wp_nav_menu(1);
												echo '</div>';
												echo '<div id="trigger-overlay"></div>';
										break;

										case 'fullwidth-header':
										case 'boxed-header':
										case 'two-color-header':
										default:
											minim_wp_nav_menu();
											require_once( MINIM_THEME_DIR .'/headers/default.php' );
										break;
									endswitch;
								endif; ?>
            				</div><?php
							// left header
                            if( isset($htype) && ( $htype == 'left-header' || $htype == 'left-header-boxed' || $htype == 'creative-header') ): ?>
                                <div class="left-header-footer"><?php
									$content = get_theme_mod( 'header-left-content', minim_defaults('header-left-content') );
									$content = do_shortcode( stripcslashes( $content ) );
									echo minim_wp_kses($content);?></div><?php
							endif; ?>
            			</div>
            		</div>
            	</div><!-- **Main Header** --><?php
				if( $htype != "left-header" && $htype != "left-header-boxed" && $htype != "creative-header" && $htype != "overlay-header" ):
					// header position
					if( isset($headerpos) && $headerpos != 'below slider' ):
						echo minim_slider();
					endif;
				endif;?>

			</header><!-- **Header - End** -->
		</div><!-- **Header Wrapper - End** -->

		<?php if( $htype == "creative-header" ) echo '<div id="toggle-sidebar"></div>'; ?>

        <!-- **Main** -->
        <div id="main"><?php

			if( $htype == "left-header" || $htype == "left-header-boxed" || $htype == "creative-header" || $htype == "overlay-header" ):
				echo minim_slider();
			endif;

			// subtitle & breadcrumb section
			if( is_page() ) :

				$tpl_default_settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
				$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();

				if(empty($tpl_default_settings)) $tpl_default_settings['enable-sub-title'] = 'true';

				if($tpl_default_settings['enable-sub-title'] == 'true' ):
					require_once( MINIM_THEME_DIR .'/headers/breadcrumb.php' );
				endif;

			elseif( function_exists( 'is_woocommerce' ) && is_shop() ):

				$pageid = get_option('woocommerce_shop_page_id');

				$tpl_default_settings = get_post_meta($pageid,'_tpl_default_settings',TRUE);
				$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();
			
				if(empty($tpl_default_settings)) $tpl_default_settings['enable-sub-title'] = 'true';

				if(isset($tpl_default_settings['enable-sub-title']) ):
					require_once( MINIM_THEME_DIR .'/headers/breadcrumb.php' );
				endif;	

			else:
				require_once( MINIM_THEME_DIR .'/headers/breadcrumb.php' );
			endif;

			$class = "container";
			if( is_page_template('tpl-portfolio.php') ) {
				$class = ( $tpl_default_settings['layout'] == 'fullwidth' ) ? "portfolio-fullwidth-container" : "container";
            }

			if( is_singular('tribe_events') ) {
				$tpl_default_settings = get_post_meta($post->ID,'_custom_settings',TRUE);
				$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();
				$post_style = array_key_exists( "event-post-style", $tpl_default_settings ) ? $tpl_default_settings['event-post-style'] : "type1";
				switch( $post_style ):
					case 'type2':
						$class = "event-type2-fullwidth";
						break;
					case 'type5':
						$class = "event-type5-fullwidth";
						break;
					default:
						$class = "container";
						break;
				endswitch;
			}

			if( is_singular() ) {
				$tpl_default_settings = get_post_meta($post->ID,'_custom_settings',TRUE);
				$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();
				$class =  ( isset( $tpl_default_settings['layout'] ) ) && ( $tpl_default_settings['layout'] == 'fullwidth-container') ? "show-in-fullwidth" : $class;
			} 

			if( is_archive() ) {
				$post_type = get_post_type();
				if($post_type == 'dt_portfolios') {
					$allow_fullwidth = cs_get_option( 'portfolio-allow-full-width' );
					if($allow_fullwidth) {
						$class =  'show-in-fullwidth';
					}
				}
			}

			if( is_page_template('tpl-wpsl_stores.php') ) {
				$tpl_default_settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
				$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();
				$class =  ( $tpl_default_settings['layout'] == 'content-full-width' ) ? "wpsl-stores-fullwidth-container" : "container"; 
            }

			if( is_singular('wpsl_stores') ) {
				$class =  "wpsl-stores-fullwidth-container"; 
            } ?>
            <!-- ** Container ** -->
            <div class="<?php echo esc_attr($class);?>"><?php
            do_action( 'minim_hook_content_before' ); ?>
            