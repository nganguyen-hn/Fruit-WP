<?php
require get_template_directory() . '/include/widget_search.php';
require get_template_directory() . '/include/widget_new_post.php';
require get_template_directory() . '/include/widget_list_tag.php';
require get_template_directory() . '/include/widget_category_product.php';
require get_template_directory() . '/include/bs4navwalker.php';
require get_template_directory() . '/include/custom-widgets-elementor/my-widgets.php';
add_action( 'after_fruit_setup', 'fruit_setup' );
add_filter( 'widget_text', 'do_shortcode' );
function fruit_setup(){
	add_theme_support( 'post-thumbnails' ); // images admin
	add_image_size( 'archive_thumb', 570, 400, true ); // images category
    add_image_size( 'archive_product', 370, 300, true ); // images category product
	add_image_size( 'archive_single', 770, 480, true ); // images single
	add_image_size( 'img_single_sidebar', 85, 85, true ); // images single
register_nav_menu('main-menu', 'Main Menu Desktop');
}

add_action( 'widgets_init', 'fruit_setup' );


 function setup_woocommerce_support()
{
  add_theme_support('woocommerce');
}
add_action( 'after_setup_theme', 'setup_woocommerce_support' );


load_theme_textdomain( 'fruit', 'setup_woocommerce_support' );


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



if ( ! function_exists( 'fruit_comment_list' ) ) {
    function fruit_comment_list( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
            case 'pingback':
            case 'trackback':
                ?>
                <div class="comment-post-pingback">
                    <span><?php esc_html_e( 'Pingback:' ); ?></span><?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit' ) ); ?>
                </div>
                <?php
                break;
            default:
                ?>
                <div id="comment-<?php comment_ID(); ?>" class="comment-item align-items-center">
                    <div class="comment-avatar item">
                        <?php echo get_avatar( $comment, $size = 50 ); ?>
                    </div>
                    <div class="comment-content item">
                        <div class="comment-text">
                            <?php if ( '0' === $comment->comment_approved ) { ?>
                                <em>
                                    <?php esc_html_e( 'Your comment is awaiting moderation.' ); ?>
                                </em>
                            <?php } ?>
                            <?php comment_text(); ?>
                        </div>
                        <div class="d-flex flex-wrap author-date align-items-center">
                            <strong class="comment-author">
                                <a href="#comment-<?php comment_ID(); ?>" class="comment-author-name">
                                    <?php echo esc_html( get_comment_author() ); ?>
                                </a>
                                <span class="comment-time">
                                    <?php fruit_date_format(); ?>
                                </span>
                            </strong>
                            <div class="comment-info">
                                <i class="fa fa-share"></i>
                                <?php
                                    echo get_comment_reply_link(
                                        array_merge(
                                            $args,
                                            array(
                                                'depth'      => $depth,
                                                'reply_text' => esc_html__( 'Reply' ),
                                                'max_depth'  => $args['max_depth'],
                                            )
                                        )
                                    );
                                    ?>
                                <?php edit_comment_link( esc_html__( 'Edit' ), ' ', '' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                break;
        endswitch;
    }
}


function fruit_date_format() {
        $date_format = get_the_date( get_option( 'date_format' ) );
        return $date_format;
    }

?>

