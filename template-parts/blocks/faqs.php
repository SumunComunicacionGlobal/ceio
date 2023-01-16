<?php

/**
 * Faqs Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'faqs--' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
?>


<?php if( have_rows('faqs') ): ?>
    <div id="<?php echo esc_attr($id); ?>" class="faqs-block mb-6">
        <?php while( have_rows('faqs') ): the_row(); ?>
            <button class="faqs-btn">
                <h3 class="mb-05 text-h6"><?php the_sub_field('faqs_title'); ?></h3>
                <span><div class="screen-reader-text"><?php esc_html_e( 'Open', 'colegio-aleman' ); ?></div></span>
            </button>
            
            <div class="faqs-content">   
                <div class="mt-1 mb-2"><?php the_sub_field('faqs_content'); ?></div>
            </div>       
            
        <?php endwhile; ?>
    </div>
<?php endif; ?>

<script>
var acc = document.getElementsByClassName("faqs-btn");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>