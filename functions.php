<?php
require_once get_theme_file_path('/inc/tgm.php');
if(class_exists('Attachments')){
    require_once "lib/attachments.php";
}

if (site_url() == "http://demo.themedev.com") {
   define("VERSION", time());
}else{
    define("VERSION", wp_get_theme() -> get("Version"));
}

function alpha_bootstrapping(){
	load_theme_textdomain("alpha");
	add_theme_support("title-tag");
    $alpha_custom_header_details = array(
        'header-text' => true,
        'default-text-color' => '#222',
        'width' => 1200,
        'height' => 600,
        'flex-height' => true,
        'flex-widht' => true
    );    
    $alpha_custom_logo_details = array(
        'height' => 100,
        'width' => 100
    );
	add_theme_support( 'post-thumbnails', array( 'post','page' ) );
    add_theme_support( "custom-header", $alpha_custom_header_details);
    add_theme_support( "custom-logo", $alpha_custom_logo_details);
    add_theme_support( "custom-background");
    add_theme_support( "post-formats", array("aside","link", "gallery", "image", "video", "quote", "audio", "chat") );
    register_nav_menu( 'topmenu', __('Top Menu','alpha') );
    register_nav_menu( "footermenu", __("Footer Menu", "alpha"));
    
    add_image_size( "alpha-square", 400, 400, true );
}
add_action("after_setup_theme", "alpha_bootstrapping");

function alpha_assets() {
    wp_enqueue_style( "bootstrap", '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    wp_enqueue_style( "featherlight-style", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css");
    wp_enqueue_style( "dashicons");
    wp_enqueue_style( "tns-slider", "//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css");
    wp_enqueue_style( "style-name", get_stylesheet_uri(), null, VERSION );

    wp_enqueue_script( 'fateher-light', '//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js',null, '1.0.0', true );
    wp_enqueue_script( 'fateher-light', '//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( "alpha-main", get_theme_file_uri("/assets/js/main.js"), array("jquery","fateher-light"), VERSION, true );
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
/*
function alpha_about_page_template(){
    if(is_page()){
        $alph_feat_image = get_the_post_thumbnail_url( null, "lerge" );
   ?> 
    <style>
        .page-header{
            background-image: url(<?php echo $alph_feat_image?>);
        }
    </style>
   <?
    }
    if(is_front_page()){
        if(current_theme_supports( "custom-header")){?>
            <style>
                .header{
                    background-image: url(<?php echo header_image();?>);
                    background-position: center;
                    margin-bottom: 30px;
                    background-size: cover;
                    background-repeat: no-repeat;
                }

                .header h1 a,.header h3.tagline{
                    color: #<?php echo get_header_textcolor();?>;

                    <?php 
                        if (!display_header_text()) {
                            echo "display:none";
                        }
                    ?>
                }
            </style>
        <?php
        }
    }
}
add_action( "wp_head", "alpha_about_page_template");
*/