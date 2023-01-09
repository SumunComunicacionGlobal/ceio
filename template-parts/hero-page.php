<section id="hero" class="<?php the_title();?>">
    <?php ceio_post_thumbnail(); ?>
    <div class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <?php the_excerpt();?>
        <div class="hero-btn__contact wp-block-button has-custom-width wp-block-button__width-100 is-style-fill mt-4"><a class="wp-block-button__link has-accent-magenta-background-color has-background" href="#">Consúltanos tu caso</a></div>
    </div>    
</section><!-- .entry-header -->