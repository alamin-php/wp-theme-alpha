<?php

function alpha_bootstrapping(){
	load_theme_textdomain("alpha");
	add_theme_support("title-tag");
	add_theme_support( 'post-thumbnails', array( 'post' ) );
}
add_action("after_setup_theme", "alpha_bootstrapping");

function alpha_assets() {
    wp_enqueue_style( "bootstrap", '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    wp_enqueue_style( "style-name", get_stylesheet_uri() );
}
add_action("wp_enqueue_scripts", "alpha_assets");

