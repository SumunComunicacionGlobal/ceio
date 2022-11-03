<header id="hero">
    
    <div class="entry-header container">
    <?php
        
        if (is_archive()) {
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="archive-description">', '</div>' );
        }
        if (is_home()) {
            echo'<h1 class="entry-title">';
            single_post_title();
            echo'</h1>';
        }
        if ( is_search() ) {
            /* translators: %s: search query. */
            echo '<h1 class="page-title">';
            printf( esc_html__('Looking results for: %s', 'colegio-aleman' ), '<span>' . get_search_query() . '</span></h1>' );
        };
        if ( is_404() ) {
            /* translators: %s: search query. */
            echo '<h1 class="page-title">';
            printf( esc_html_e( 'Oops! That page can&rsquo;t be found.', 'colegio-aleman' ), '<span>' . get_search_query() . '</span>' );
            echo'</h1>';
        };

        if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs();
    ?>
    </div>
</header><!-- .entry-header -->

