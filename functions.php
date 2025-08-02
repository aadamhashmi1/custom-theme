<?php

function custom_theme_assets() {
 
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'main-style',
        get_template_directory_uri() . '/main.css',
        [],
        filemtime(get_template_directory() . '/main.css') // Cache busting
    );

  
    wp_enqueue_script(
        'main-js',
        get_template_directory_uri() . '/main.js',
        [],
        filemtime(get_template_directory() . '/main.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'custom_theme_assets');



function custom_theme_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('menus');
}
add_action('after_setup_theme', 'custom_theme_setup');



function custom_register_menus() {
    register_nav_menus([
        'primary' => __('Primary Menu', 'custom-theme'),
    ]);
}
add_action('init', 'custom_register_menus');


function custom_register_sidebar() {
    register_sidebar([
        'name' => __('Main Sidebar', 'custom-theme'),
        'id' => 'main-sidebar',
        'description' => __('Widgets in this area will be shown in the sidebar.', 'custom-theme'),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'custom_register_sidebar');
