<?php
/****************************
*
* Liquido - A Fluida Child Theme
* (c) 2019 Cryout Creations
* https://www.cryoutcreations.eu
*
*****************************/

/**
 * Load additional theme files
 */
require_once( get_stylesheet_directory() . '/includes/admin.php' );
require_once( get_stylesheet_directory() . '/includes/options.php' );
require_once( get_stylesheet_directory() . '/includes/notices.php' );
require_once( get_stylesheet_directory() . "/includes/custom-styles.php" );

/**
 * Enqueue parent styling
 */
function liquido_child_styling(){
	wp_enqueue_style( 'fluida-main', get_template_directory_uri() . '/style.css', array(), _CRYOUT_THEME_VERSION );  // restore correct parent stylesheet
	wp_enqueue_style( 'liquido', get_stylesheet_directory_uri() . '/style.css', array( 'fluida-main' ), _CRYOUT_THEME_VERSION  ); 		// enqueue child stylesheet
}
add_action( 'wp_enqueue_scripts', 'liquido_child_styling' );


/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function liquido_setup() {

	// Add support for flexible headers
	add_theme_support( 'custom-header', array(
		'default-image'	=> get_stylesheet_directory_uri() . '/resources/images/headers/waves.jpg',
	));

	// Default custom headers packaged with the theme.
	register_default_headers( array(
		'waves' => array(
			'url' => '%s/resources/images/headers/waves.jpg',
			'thumbnail_url' => '%s/resources/images/headers/waves.jpg',
			'description' => __( 'Waves', 'liquido' )
		),
	) );

	// Filters
	add_filter( 'fluida_custom_styles', 'liquido_custom_styles' );
	add_filter( 'cryout_theme_description', 'liquido_custom_description' );
	add_filter( 'cryout_admin_version', 'liquido_admin_version_output' );

	// Initialize first time notice
	new Cryout_Notice( array(
		'slug' => 'liquido',
		'strings' => array(
			1 => esc_html__( 'It appears that you might have already configured %1$s. For best results it is recommended to %2$s upon child theme activation.', 'liquido' ), // %1 is theme name, %2 is next string
			2 => esc_html__( 'reset the theme settings', 'liquido' ),
			3 => esc_html__( 'If you have already reset the options it is safe to dismiss this message.', 'liquido' ),
			4 => esc_html__( 'Do not display again', 'liquido' ),
		),
	) );

} // liquido_setup()
add_action( 'after_setup_theme', 'liquido_setup' );


/* FIN */
