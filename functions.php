<?php
/**
 * Snippethub child theme functions
 */

add_action('wp_enqueue_scripts', 'snippethub_enqueue_styles');
function snippethub_enqueue_styles() {
    // Parent style
    wp_enqueue_style('hello-elementor-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme('hello-elementor')->get('Version'));
    // Child style
    wp_enqueue_style('snippethub-style', get_stylesheet_uri(), array('hello-elementor-style'), '1.0.0');

    // Font Awesome (CDN)
    wp_enqueue_style('snippethub-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css', array(), '7.0.1');

    // Tailwind Browser script for prototyping (as in source)
    wp_enqueue_script('snippethub-tailwind-browser', 'https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4', array(), null, true);
}

add_action('after_setup_theme', 'snippethub_theme_setup');
function snippethub_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'snippethub'),
        'utility' => __('Utility Menu', 'snippethub'),
        'footer'  => __('Footer Menu', 'snippethub'),
    ));
}

// ACF Options page (if ACF exists)
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Snippethub Settings',
        'menu_title' => 'Snippethub Settings',
        'menu_slug'  => 'snippethub-settings',
        'capability' => 'manage_options',
        'redirect'   => false
    ));
}

/**
 * Helper to fetch fields with fallback.
 * Use $post_id = 'option' to fetch from ACF options.
 */
function hchild_field($key, $post_id = false, $default = '') {
    // If ACF not available, return default
    if (!function_exists('get_field')) {
        return $default;
    }

    if ($post_id === 'option') {
        $val = get_field($key, 'option');
    } elseif ($post_id) {
        $val = get_field($key, $post_id);
    } else {
        $val = get_field($key);
    }

    if ($val === null || $val === false) {
        return $default;
    }
    return $val;
}

// Include small template helpers
require_once get_stylesheet_directory() . '/template-parts/_helpers.php';
?>
