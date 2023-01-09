<header id="hero">
    <?php ceio_post_thumbnail(); ?>
    <div class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <?php the_excerpt();?>
        <div class="entry-meta">
          <?php
          ceio_posted_on();
          ceio_posted_by();
          ?>
        </div><!-- .entry-meta -->
    </div>    
</header><!-- .entry-header -->

