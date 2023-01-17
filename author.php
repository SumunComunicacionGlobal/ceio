<?php
/**
 * The template for displaying single author
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CEIO
 */

get_header();

?>

<header id="hero">
    
    <div class="entry-header container">
        <div class="author-title middle-xs mb-2">
            <?php 
            echo get_avatar(get_the_author_meta('ID'));
            the_archive_title( '<h1 class="page-title mb-05">', '</h1>' );
        ?>
        </div>
        <div class="author-info">
        <?php       
            // Get author's field
            $user_website = get_the_author_meta('url');
            $user_email = get_the_author_meta('email');

            $author_id = get_the_author_meta('ID');
            $author_cv = get_field('author_cv', 'user_'. $author_id );

            echo '<ul class="horizontal">';

            // Check if author has a website in their profile
            if ( ! empty( $user_website ) ) {
                
                // Display author website link
                echo '<li class="dflex middle-xs"><img src="'.get_template_directory_uri().'/assets/icons/monitor.svg" alt="" class="icon" width="24" height="24" >';
                echo '<a class="pl-05" href="' . $user_website .'" target="_blank" rel="nofollow">Website</a></li>';
            };

            // Check if author has a website in their profile
            if ( ! empty( $user_email ) ) {
                
                // Display author website link
                echo '<li class="dflex middle-xs"><img src="'.get_template_directory_uri().'/assets/icons/mail.svg" alt="" class="icon" width="24" height="24" >';
                echo '<a class="pl-05" href="mailto:' . $user_email .'" target="_blank" rel="nofollow">Email</a></li>';
            };

            echo '</ul>';

            the_archive_description( '<div class="archive-description mt-3">', '</div>' );

            if ( ! empty( $author_cv ) ) {
                
                // Display author website link
                echo '<div class="mt-2"><a href="#author-CV" rel="nofollow"><strong>Leer más +</strong></a></div>';
            };

            //if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs();
        ?>
        </div>
    </div>
    
</header><!-- .entry-header -->

	<main id="primary" class="site-main container">

		<?php if ( have_posts() ) : 

			echo '<div class="grid-columns-3 mt-6 mb-4">';

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/card', get_post_type() );

			endwhile;

			echo '</div>';

			the_posts_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
        
        echo '<div class="mt-2 mb-4" id="author-CV"' .$author_cv. '</div>';
		?>

	</main><!-- #main -->

<?php
get_footer();
