<?php
include ('include/widget_search.php');
include('include/bs4navwalker.php');
add_action( 'after_setup_theme', 'setup_theme' );
function setup_theme(){
	add_theme_support( 'post-thumbnails' ); // images admin
	add_image_size( 'archive_thumb', 570, 400, true ); // images category
	add_image_size( 'archive_single', 770, 480, true ); // images single
register_nav_menu('main-menu', 'Main Menu Desktop');
}

function widget_theme(){
	 register_sidebar( array(
        'name'          => __( 'Sidebar', 'demo1' ),
        'id'            => 'sidebar_1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
	register_sidebar( array(
       'name'          => __( 'Search', 'theme_name' ),
        'id'            => 'search',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

}
add_action( 'widgets_init', 'widget_theme' );
?>