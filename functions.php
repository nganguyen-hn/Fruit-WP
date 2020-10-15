<?php
include ('include/widget_search.php');
include ('include/widget_new_post.php');
include ('include/widget_list_tag.php');
include ('include/widget_category_product.php');
include('include/bs4navwalker.php');
add_action( 'after_fruit_setup', 'fruit_setup' );
add_filter( 'widget_text', 'do_shortcode' );
function fruit_setup(){
	add_theme_support( 'post-thumbnails' ); // images admin
	add_image_size( 'archive_thumb', 570, 400, true ); // images category
	add_image_size( 'archive_single', 770, 480, true ); // images single
	add_image_size( 'img_single_sidebar', 85, 85, true ); // images single
register_nav_menu('main-menu', 'Main Menu Desktop');
}



load_theme_textdomain( 'fruit' );


function widget_themefruit(){
	 register_sidebar( array(
        'name'          => __( 'Sidebar', 'Fruit' ),
        'id'            => 'sidebar_1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
	 register_sidebar( array(
        'name'          => __( 'Footer V1', 'theme_name' ),
        'id'            => 'footer_v1',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
	  register_sidebar( array(
        'name'          => __( 'Footer V2', 'theme_name' ),
        'id'            => 'footer_v2',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
	   register_sidebar( array(
        'name'          => __( 'Footer V3', 'theme_name' ),
        'id'            => 'footer_v3',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
	    register_sidebar( array(
        'name'          => __( 'Footer V4', 'theme_name' ),
        'id'            => 'footer_v4',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
        register_sidebar( array(
        'name'          => __( 'Copyright Text', 'theme_name' ),
        'id'            => 'copyright_bottom_text',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
          register_sidebar( array(
        'name'          => __( 'Copyright link', 'theme_name' ),
        'id'            => 'copyright_bottom_link',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
}
add_action( 'widgets_init', 'widget_themefruit' );


/* add css*/
function fruit_css_style(){
    wp_register_style( 'styles-font-awesome',get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style( 'styles-font-awesome' );
    wp_register_style( 'styles-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'styles-bootstrap' );
    wp_register_style( 'styles-css', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'styles-css' );
    }
add_action('wp_enqueue_scripts', 'fruit_css_style');

function fruit_all_file_js(){
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js',['jquery'], false, true );
    wp_enqueue_script('my-js', get_template_directory_uri() . '/js/fruit.js',['jquery'], false, true );
}
add_action('wp_enqueue_scripts', 'fruit_all_file_js');
/* add js */



// hook title from commnet
function fruit_hook_title_formcm( $defaults ) {
  $defaults['title_reply'] = __( 'Leave a comment' );
  return $defaults;
}
add_filter( 'comment_form_defaults', 'fruit_hook_title_formcm' );


// adding Numeric Pagination Post
function wpbeginner_numeric_posts_navfruit() {
    if( is_singular() )
        return;
    global $wp_query;
    // Stop execution if there's only 1 page 
    if( $wp_query->max_num_pages <= 1 )
        return;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
    // Add current page to the array 
    if ( $paged >= 1 )
        $links[] = $paged;
    // Add the pages around the current page to the array 
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    echo '<div class="pagination-nav text-center"><ul class="p-0 mb-0 list-unstyled">' . "\n";
    // Previous Post Link 
    if ( get_previous_posts_link() )
        printf( '<li class="disabled">%s</li>' . "\n", get_previous_posts_link('<i class="fa fa-angle-left"></i>') );
    // Link to first page, plus ellipses if necessary 
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
        printf( '<li%s><a href="%s"  class="">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
    // Link to current page, plus 2 pages in either direction if necessary 
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s"  class="">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
    // Link to last page, plus ellipses if necessary 
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s"  class="">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
    // Next Post Link 
    if ( get_next_posts_link() )
        printf( '<li class="">%s</li>' . "\n", get_next_posts_link('<i class="fa fa-angle-right"></i>') );
    echo ' </ul></div>' . "\n";
}

?>

