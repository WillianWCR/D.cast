<?php

//LOAD STYLES
function load_css(){
    wp_register_style('D.cast Theme CSS', get_template_directory_uri().'/css/main.css');
    wp_enqueue_style( 'D.cast Theme CSS');
}
add_action( 'wp_enqueue_scripts', 'load_css');

//LOAD SCRIPTS
function load_js(){
    wp_enqueue_script('jquery');
    wp_register_script('Font Awesome', 'https://kit.fontawesome.com/ac7344cbc2.js', 'jquery');
    wp_enqueue_script( 'Font Awesome');
    wp_register_script('D.cast Theme JS', get_template_directory_uri().'/js/main.js', 'jquery', '1.0', true);
    wp_enqueue_script( 'D.cast Theme JS');
}
add_action( 'wp_enqueue_scripts', 'load_js');

//THEME OPTIONS
add_theme_support("menus");
add_theme_support("post-thumbnails");

//MENUS
register_nav_menus(

    array(
        "top-menu" => "Top Menu Location"
    )

);

//CUSTOM POSTS-TYPE

function explica_post_type(){

    $args = [
        'labels' => [
            'name' => 'D.cast Explica'
        ],
        'menu_icon' => 'dashicons-book-alt',
        'public' => true,
        'has_archive' => true,
        'supports' => [
            'title', 'editor', 'thumbnail'
        ],
        'rewrite' => [
            'slug' => 'explica'
        ],
        'show_in_rest' => true
    ];

    register_post_type('explica', $args);

}
add_action('init', 'explica_post_type');