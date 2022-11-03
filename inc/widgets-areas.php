<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ceio_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ceio' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ceio' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<p class="widget-title text-h5">',
			'after_title'   => '</p>',
		)
	);
    register_sidebar(
		array(
			'name'          => esc_html__( 'Filter', 'ceio' ),
			'id'            => 'filter-archive',
			'description'   => esc_html__( 'Añadir widget aquí.', 'ceio' ),
			'before_widget' => '<section id="%1$s" class="mt-3 %2$s">',
			'after_widget'  => '</section>',
		)
    );

    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'ceio' ),
			'id'            => 'footer-widgets',
			'description'   => esc_html__( 'Añadir widget aquí.', 'ceio' ),
			'before_widget' => '<section id="%1$s" class="mt-3 %2$s">',
			'after_widget'  => '</section>',
		)
    );

}
add_action( 'widgets_init', 'ceio_widgets_init' );