<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

if (! function_exists('\Roots\bootloader')) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://roots.io/acorn/docs/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

\Roots\bootloader()->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

    // register ACF blocks
    add_action( 'init', 'shop_register_acf_blocks' );

    function shop_register_acf_blocks() {
        register_block_type( get_template_directory() . '/blocks/promo');
        register_block_type( get_template_directory() . '/blocks/banner');
        register_block_type( get_template_directory() . '/blocks/home-carousel');
        register_block_type( get_template_directory() . '/blocks/special-offers-carousel');
        register_block_type( get_template_directory() . '/blocks/featured-categories');
        register_block_type( get_template_directory() . '/blocks/featured-brands');
        register_block_type( get_template_directory() . '/blocks/promo-columns');
        register_block_type( get_template_directory() . '/blocks/about-us-banner');
        register_block_type( get_template_directory() . '/blocks/contact-info-cols');
        register_block_type( get_template_directory() . '/blocks/google-map');
    }

    function enqueue_sorting_script() {
        wp_enqueue_script(
            'sorting-filter',
            get_theme_file_uri('/resources/scripts/filters/sorting.filter.js'),
            [],
            filemtime(get_theme_file_path('/resources/scripts/filters/sorting.filter.js')),
            true 
        );

        // Pass AJAX URL to JavaScript
        wp_localize_script('sorting-filter', 'ajax_object', [
            'ajax_url' => admin_url('admin-ajax.php')
        ]);

        wp_enqueue_script(
            'custom-search-script',
            get_template_directory_uri() . '/resources/scripts/search/search-bar.js', 
            array('jquery'),
            null,
            true 
        );
        wp_enqueue_script(
            'nav-dropdown-script',
            get_template_directory_uri() . '/resources/scripts/nav/nav-dropdown.js', 
            array('jquery'),
            null,
            true
        );
        wp_enqueue_script(
            'slick-slider-script',
            get_template_directory_uri() . '/resources/scripts/slick/slick-slider.js',
            array('jquery'),
            null,
            true
        );

        wp_enqueue_script('wc-add-to-cart-variation');

    }

    
    
    add_action('wp_enqueue_scripts', 'enqueue_sorting_script');


    add_filter('template_include', function($template) {
        if (is_product_category()) {
            $blade_path = get_theme_file_path('resources/views/woocommerce/archive-product.blade.php');
            if (file_exists($blade_path)) {
                // Use Sage's view composer if available
                if (function_exists('App\\template')) {
                    return \App\template('woocommerce.archive-product');
                }
                // Fallback to direct rendering
                return get_theme_file_path('woocommerce/archive-product.php');
            }
        }
        return $template;
    }, 100);

    add_action( 'template_redirect', function() {
        if ( is_cart() && WC()->cart->is_empty() && !is_admin() ) {
            wp_safe_redirect( home_url() );
            exit;
        }
    });
    