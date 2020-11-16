<?php
/**
 * This file is part of a child theme called Starter Child.
 * Functions in this file will be loaded before the parent theme's functions.
 * For more information, please read
 * https://developer.wordpress.org/themes/advanced-topics/child-themes/
 */

/**
 * Load the frontend parent and child theme styles
 */
function starter_child_enqueue_styles() {
	$parent_style = 'twentytwenty-style';

	wp_enqueue_style(
		$parent_style,
		get_template_directory_uri() . '/style.css',
		array(),
		wp_get_theme()->parent()->get( 'Version' )
	);

	wp_enqueue_style(
		'starter-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'starter_child_enqueue_styles' );

// Load translation files from your child theme instead of the parent theme
function starter_child_locale() {
	load_child_theme_textdomain( 'starter-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'starter_child_locale', 11 );

/**
 * Load the block editor parent and child theme styles
 */
function starter_child_block_editor_styles() {
	wp_enqueue_style(
		'twentytwenty-block-editor-styles',
		get_theme_file_uri( '/assets/css/editor-style-block.css' ),
		array(),
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style(
		'starter-child-block-editor-styles',
		get_theme_file_uri( '/assets/css/editor-style-block.css' ),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'enqueue_block_editor_assets', 'starter_child_block_editor_styles', 1 );


/*  Block Editor
    ======================================== */

//Add Gutenberg Support
/**
 * Registers support for Gutenberg Color Palette
 */
function starter_child_gutenberg_support() {

	// Add theme support for custom color palette.
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => esc_html__( 'Blue Sapphire', 'starter-child' ),
			'slug'  => 'blue-sapphire',
			'color' => '#0b4f6c',
		),
		array(
			'name'  => esc_html__( 'Celadon Blue', 'starter-child' ),
			'slug'  => 'celadon-blue',
			'color' => '#117aa7',
		),
		array(
			'name'  => esc_html__( 'Blue Purple', 'starter-child' ),
			'slug'  => 'blue-purple',
			'color' => '#c7b8ea',
		),
		array(
			'name'  => esc_html__( 'Pink Lavender', 'starter-child' ),
			'slug'  => 'pink-lavender',
			'color' => '#d8a7ca',
		),
		array(
			'name'  => esc_html__( 'Cool Grey', 'starter-child' ),
			'slug'  => 'cool-grey',
			'color' => '#9b97b2',
		),
		array(
			'name'  => esc_html__( 'White', 'starter-child' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		),
		array(
			'name'  => esc_html__( 'Dark Grey', 'starter-child' ),
			'slug'  => 'dark-grey',
			'color' => '#444444',
		),
	) );

	// Add theme support for custom color gradients
	add_theme_support( 'editor-gradient-presets', array(
			array(
				'name'     => __( 'Blue Sapphire to Celadon Blue', 'starter-child' ),
				'gradient' => 'linear-gradient(307deg, rgba(11,79,108,1) 0%, rgba(17,122,167,1) 66%)',
				'slug'     => 'blue-sapphire-to-celadon-blue',
			),
			array(
				'name'     => __( 'Blue Purple to Pink Lavender', 'starter-child' ),
				'gradient' => 'linear-gradient(90deg, rgba(199,184,234,1) 0%, rgba(216,167,202,1) 69%)',
				'slug'     => 'blue-purple-to-pink-lavender',
			),
		)
	);

	//Disable the custom color picker.
	add_theme_support( 'disable-custom-colors' );


	}
add_action( 'after_setup_theme', 'starter_child_gutenberg_support', 11 );

/* Register Block Patterns */

register_block_pattern(
	'unique-pattern-name',
	array(
		'title' => __( 'Teaser', 'starter-child' ),
		'description' => _x( 'Here should be a descirption of the pattern', 'Block pattern description', 'starter-child' ),
		'categories'  => array('buttons'),
		'content'     => "Code vom Block Editor",
	)
);

