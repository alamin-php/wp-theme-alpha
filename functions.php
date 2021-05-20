<?php

function alpha_bootstrapping(){
	load_theme_textdomain("alpha");
	add_theme_support("title-tag");
	add_theme_support( 'post-thumbnails', array( 'post' ) );
    register_nav_menu( 'topmenu', __('Top Menu','alpha') );
    register_nav_menu( "footermenu", __("Footer Menu", "alpha"));
}
add_action("after_setup_theme", "alpha_bootstrapping");

function alpha_assets() {
    wp_enqueue_style( "bootstrap", '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    wp_enqueue_style( "style-name", get_stylesheet_uri() );
}
add_action("wp_enqueue_scripts", "alpha_assets");

function alpha_sidebar_widget() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'alpha' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'alpha' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );    
    register_sidebar( array(
        'name'          => __( 'Footer Left', 'alpha' ),
        'id'            => 'footer-left',
        'description'   => __( 'Footer Left widget', 'alpha' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );    
    register_sidebar( array(
        'name'          => __( 'Footer Right', 'alpha' ),
        'id'            => 'footer-right',
        'description'   => __( 'Footer Right widget', 'alpha' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
}
add_action( 'widgets_init', 'alpha_sidebar_widget' );

function alpha_the_excerpt($excerpt){
    if (!post_password_required()) {
        return $excerpt;
    }else{
        echo get_the_password_form();
    }
}
add_filter('the_excerpt','alpha_the_excerpt');

function alpha_protected_title_change(){
    return "%s";
}
add_filter( "protected_title_format", "alpha_protected_title_change");

function alpha_menu_item_class($classes , $item){
    $classes[] = "list-inline-item";
    return $classes;
}
add_filter("nav_menu_css_class", "alpha_menu_item_class", 10, 2);

