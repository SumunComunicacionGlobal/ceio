<?php

/**
 * Adds support for editor color palette.
 */
add_action('after_setup_theme', function () 
{  
    /**
     * Read our compiled theme CSS and extract the WP colour palette so we can register
     * it with Gutenberg.
     */
     
    // Update the css path to your plugin's css file.
    $compiled_css_path = get_template_directory() . '/style-editor.css';
    
    $cache_key = md5_file( $compiled_css_path );
    $cached = get_option( '__theme_cached_color_palette_version', false );
    if ( $cached == $cache_key )
    {
        $colour_palette = get_option( '__theme_cached_color_palette', [] );
    }
    else
    {
        $theme_css = file_get_contents( $compiled_css_path );
        preg_match_all( '/\.has-([^}]*)-background-color\s*{\s*background-color[^\S\r\n]*:[^\S\r\n]*([^};]*);?\s*}/', $theme_css, $matches );
        $colour_palette = [];
        $assigned = [];
        if ( is_array($matches) && isset($matches[0]) && isset($matches[1]) && isset($matches[2]) )
        {
            // $full_match = $matches[0]; // The full matched string
            $colour_slugs = $matches[1]; // The colour slug pulled from .has-(\S+)-background-color
            $colour_values = $matches[2]; // The colour value
            if ( is_array($colour_slugs) && is_array($colour_slugs) )
            {
                foreach( $colour_slugs as $index => $slug )
                {
                    if ( !isset($colour_values[$index]) ) continue;
                    $colour_val = trim( $colour_values[$index] ); // Important to trim whitespace from regex extraction.
                    if ( in_array($colour_val, $assigned) ) continue;
                    $assigned[] = $colour_val;
                    $colour_palette[] = [
                        'name' => ucwords(str_replace( ['-', '_'], ' ', $slug )),
                        'slug' => $slug,
                        'color' => $colour_val,
                    ];
                }
            }
            update_option( '__theme_cached_color_palette_version', $cache_key );
            update_option( '__theme_cached_color_palette', $colour_palette );
        }
    }
    if ( $colour_palette )
    {
        add_theme_support( 'disable-custom-colors' );
        add_theme_support( 'editor-color-palette', $colour_palette );    
    }

}, 20);


/**
 * theme_custom_gradients.
 *
 * Add custom gradients to the Gutenberg editor.
 *
 */
function theme_custom_gradients()
{
    add_theme_support('editor-gradient-presets', array(
        array(
            'name' => __('Warm', 'ceio'),
            'gradient' => 'linear-gradient(90deg, #FA5554 0.97%, #FEDB66 131.91%)',
            'slug' => 'gradient-warm'
        ),
        array(
            'name' => __('Cold', 'ceio'),
            'gradient' => 'radial-gradient(43.82% 123% at 48.33% -29.33%, #2A9C8E 0%, #121E2D 86.27%)',
            'slug' => 'gradient-cold'
        ),
        
    ));
}

/**
 * Hook: after_setup_theme.
 *
 * @uses add_action() https://developer.wordpress.org/reference/functions/add_action/
 * @uses after_setup_theme https://developer.wordpress.org/reference/hooks/after_setup_theme/
 */
add_action('after_setup_theme', 'theme_custom_gradients');

// Disables custom colors in block color palette.
add_theme_support( 'disable-custom-gradients' );

// Add support for Block Styles.
add_theme_support( 'wp-block-styles' );

add_theme_support( 'align-wide' );
add_theme_support( 'align-full' );
add_theme_support( 'responsive-embeds' );

// Add support for editor styles.
add_theme_support( 'editor-styles' );

// Enqueue editor styles.
add_editor_style( 'style-editor.css' );


// Add custom block accordion ACF
function accordion_acf_init() {
	if(function_exists('acf_register_block')) {
		acf_register_block(array(
			'name' => 'accordion',
			'title' => __('Accordion'),
			'description' => __('Desplegables verticales', 'ceio'),
			'render_callback' => 'acf_block_callback',
			'category' => 'theme',
			'icon' => 'list-view',
			'mode' => 'preview',
            'supports'          => array(
				'jsx' => true, // innerblocks
			),
			'keywords' => array('accordion', 'tabs', 'ceio'),
		));
	}
}
add_action('acf/init', 'accordion_acf_init');


// Add custom block Faqs ACF
function faqs_acf_init() {
	if(function_exists('acf_register_block')) {
		acf_register_block(array(
			'name' => 'faqs',
			'title' => __('Faqs'),
			'description' => __('Preguntas frecuentes', 'ceio'),
			'render_callback' => 'acf_block_callback',
			'category' => 'theme',
			'icon' => 'editor-help',
			'mode' => 'auto',
			'keywords' => array('faqs', 'ceio'),
		));
	}
}
add_action('acf/init', 'faqs_acf_init');

// Add custom block link ofuscado ACF
function link_ofuscado_acf_init() {
	if(function_exists('acf_register_block')) {
		acf_register_block(array(
			'name' => 'link-ofuscado',
			'title' => __('Link Ofuscado'),
			'description' => __('Link Ofuscado', 'ceio'),
			'render_callback' => 'acf_block_callback',
			'category' => 'theme',
			'icon' => 'admin-links',
			'mode' => 'auto',
			'keywords' => array('link','boton','osfuscado', 'ceio'),
		));
	}
}
add_action('acf/init', 'link_ofuscado_acf_init');

// Add custom block Listado de taxonomia ACF
function taxonomy_list_acf_init() {
	if(function_exists('acf_register_block')) {
		acf_register_block(array(
			'name' => 'taxonomy-list',
			'title' => __('Listado Categoria'),
			'description' => __('Listado de categoría', 'ceio'),
			'render_callback' => 'acf_block_callback',
			'category' => 'theme',
			'icon' => 'editor-ul',
			'mode' => 'auto',
			'keywords' => array('Listado','Categorías', 'ceio'),
		));
	}
}
add_action('acf/init', 'taxonomy_list_acf_init');


function acf_block_callback($block) {
	$slug = str_replace('acf/', '', $block['name']);
	if( file_exists(STYLESHEETPATH . "/template-parts/blocks/{$slug}.php") ) {
		include( STYLESHEETPATH . "/template-parts/blocks/{$slug}.php" );
	}
}