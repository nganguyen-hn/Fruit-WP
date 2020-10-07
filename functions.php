<?php
add_action( 'after_setup_theme', 'setup_theme' );
function setup_theme(){
	add_theme_support('post-thumbnails');
	register_nav_menu('main-menu', 'Main Menu Desktop');
}

?>