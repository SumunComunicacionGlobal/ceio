<?php

/**
 * Link Ofuscado Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'ofuscado--' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
?>

<div id="<?php echo esc_attr($id); ?>" class="link-ofuscado" onclick="location.href='<?php the_field('link_ofuscado');?>'"><?php the_field('title_ofuscado');?></div>


