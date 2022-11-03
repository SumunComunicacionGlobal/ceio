<?php

/**
 * Accordion Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'accordion--' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$image = get_field('accordion_image');
?>



    <div id="<?php echo esc_attr($id); ?>" class="accordion-block">
       
            <button class="accordion-btn title-has-image">
                <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                <?php the_field('accordion_title'); ?>
                <span><div class="screen-reader-text"><?php esc_html_e( 'Open', 'colegio-aleman' ); ?></div></span>
            </button>
            
            <div class="accordion-content">
                <InnerBlocks />
            </div>       
            
    </div>


<script>
/* eslint-disable no-undef */
( function( $ ) {
	$( document ).ready( function() {
		
		$( '.accordion-btn' ).click( function() {
			$( '.accordion-content' ).toggleClass( 'active' );
		} );
	} );
}( jQuery ) );
</script>