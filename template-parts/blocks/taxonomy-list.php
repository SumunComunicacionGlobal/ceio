<?php

/**
 * Categoy page taxonomy list Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'CategoryList--' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}; ?>

<ul id="<?php echo esc_attr($id); ?>" class="is-style-icons-list">

<?php
// Get the Taxonomy term ID from ACF Block
$tax_id = get_field('taxonomy_list');

// WP_Query arguments
$args = array(
	'post_type'         => array( 'page' ),
	'posts_per_page'    => '-1',
	'orderby'           => 'menu_order',
    'tax_query'     => array(
        array(
            'taxonomy'  => 'category-page',
            'terms'     => $tax_id,
            'field'     => 'term_id',
        ),
    ),
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		// do something
        echo '<li><a href=" '. get_the_permalink() .' " title="'. get_the_title() .'">'. get_the_title() .'</a></li>';
	}
} else {
	// no posts found
}
// Restore original Post Data
wp_reset_postdata();?>
</ul>