<div id="hero-filter" class="container mt-6 mb-4">
    <div class="">
        <button class="toogle-hero-filter">
            <?php echo file_get_contents( get_stylesheet_directory_uri() . '/assets/icons/filter.svg' ); ?>
            <?php esc_html_e( 'Filtrar por:', 'ceio' ); ?>
        </button>
        <div id="hero-filter--container">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Filter')) : ?>
            <?php endif; ?>
        </div>
    </div>
</div>