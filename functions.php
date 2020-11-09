<?php
require get_template_directory() . '/include/widget_search.php';
require get_template_directory() . '/include/widget_new_post.php';
require get_template_directory() . '/include/widget_list_tag.php';
require get_template_directory() . '/include/widget_category_product.php';
require get_template_directory() . '/include/bs4navwalker.php';
require get_template_directory() . '/include/widget_bestsellers.php';
require get_template_directory() . '/include/custom-widgets-elementor/my-widgets.php';
add_action( 'after_fruit_setup', 'fruit_setup' );
add_filter( 'widget_text', 'do_shortcode' );
function fruit_setup(){
	add_theme_support( 'post-thumbnails' ); // images admin
	add_image_size( 'archive_thumb', 570, 400, true ); // images category
    add_image_size( 'archive_product', 370, 300, true ); // images category product
    add_image_size( 'archive_product_popup', 350, 500, true ); // images product popup
	add_image_size( 'archive_single', 770, 480, true ); // images single
	add_image_size( 'img_single_sidebar', 85, 85, true ); // images single

    add_image_size( 'img_big_single', 570, 570, true ); // img_big_single
    add_image_size( 'thumbnail_single', 170, 170, true ); // thumbnail_single
register_nav_menu('main-menu', 'Main Menu Desktop');
}

add_action( 'widgets_init', 'fruit_setup' );


function setup_woocommerce_support()
{
  add_theme_support('woocommerce');
  // add_theme_support( 'wc-product-gallery-zoom' );
  // add_theme_support( 'wc-product-gallery-lightbox' );
  // add_theme_support( 'wc-product-gallery-slider' );
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
        'name'          => __( 'Sidebar Archive', 'Fruit' ),
        'id'            => 'sidebar_archive',
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
    wp_register_style( 'styles-slick-theme', get_template_directory_uri() . '/css/slick-theme.css' );
    wp_enqueue_style( 'styles-slick-theme' );
    wp_register_style( 'styles-slick', get_template_directory_uri() . '/css/slick.css' );
    wp_enqueue_style( 'styles-slick' );
    }
add_action('wp_enqueue_scripts', 'fruit_css_style');

function fruit_all_file_js(){
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js',['jquery'], false, true );
    wp_enqueue_script('my-js', get_template_directory_uri() . '/js/fruit.js',['jquery'], false, true );
    wp_enqueue_script('slick-js', get_template_directory_uri() . '/js/slick.min.js',['jquery'], false, true );
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


// remove rating archive

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
add_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating', 11 );

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
add_action('woocommerce_single_product_summary','woocommerce_template_single_rating', 15 );

//name product in archive
function woocommerce_template_loop_product_title(){
    echo '<h6 class="product-name mb-0 text-uppercase">' . get_the_title() . '</h6>';
}
add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

//price product in archive
add_filter( 'woocommerce_get_price_html', 'fruit_price_edit', 100, 2 );
function fruit_price_edit($price, $product){
    if ( $product->is_on_sale()){
        return '<div class="product_price">' . get_woocommerce_currency_symbol(). $product->get_sale_price()  . '<span>' .get_woocommerce_currency_symbol() . $product->get_regular_price()  . '</span></div>' ;
    }
    else{
        return '<div class="product_price">' . get_woocommerce_currency_symbol() . $product->get_regular_price()  .  '</div>' ;
    }

}

//custom number product shop page

add_filter ('loop_shop_per_page', 'fruit_custom_number_product');
function fruit_custom_number_product( $products ){
    $product = 9;
    return $product;
}


// custom single product page




//remove sale
remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash', 10);


add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +
function woo_custom_cart_button_text() {

    return _e('<i class="fa fa-cart-arrow-down"></i> <span class="name-add-to-cart">Add to cart</span>', 'fruit');
}



add_action( 'woocommerce_after_add_to_cart_quantity', 'bbloomer_display_quantity_plus' );

function bbloomer_display_quantity_plus() {
    echo '<button type="button" class="plus" ><?xml version="1.0" encoding="iso-8859-1"?> <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  --> <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 409.6 409.6" style="enable-background:new 0 0 409.6 409.6;" xml:space="preserve"> <g> <g> <path d="M392.533,187.733H221.867V17.067C221.867,7.641,214.226,0,204.8,0s-17.067,7.641-17.067,17.067v170.667H17.067 C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h170.667v170.667c0,9.426,7.641,17.067,17.067,17.067 s17.067-7.641,17.067-17.067V221.867h170.667c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z"/> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg></button>';
}
add_action( 'woocommerce_before_add_to_cart_quantity', 'bbloomer_display_quantity_minus' );
function bbloomer_display_quantity_minus() {
    echo '<button type="button" class="minus" ><?xml version="1.0" encoding="iso-8859-1"?> <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  --> <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <g> <g> <rect y="236" width="512" height="40"/> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg></button>';
}


// -------------
// 2. Trigger jQuery script
add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );

function bbloomer_add_cart_quantity_plus_minus() {
    // Only run this on the single product page
    if ( ! is_product() ) return;
    ?>
        <script type="text/javascript">

        jQuery(document).ready(function($){
            $('form.cart').on( 'click', 'button.plus, button.minus', function() {

                // Get current quantity values
                var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
                var val = parseFloat(qty.val());
                var max = parseFloat(qty.attr( 'max' ));
                var min = parseFloat(qty.attr( 'min' ));
                var step = parseFloat(qty.attr( 'step' ));

                // Change the value if plus or minus
                if ( $( this ).is( '.plus' ) ) {
                    if ( max && ( max <= val ) ) {
                        qty.val( max );
                    } else {
                        qty.val( val + step );
                    }
                } else {
                    if ( min && ( min >= val ) ) {
                        qty.val( min );
                    } else if ( val > 1 ) {
                        qty.val( val - step );
                    }
                }
            });
        });
        </script>
    <?php
}


add_filter ( 'woocommerce_product_thumbnails_columns', 'bbloomer_change_gallery_columns' );

function bbloomer_change_gallery_columns() {
     return 1;
}

// Remove text Product Description in product detail
add_filter( 'woocommerce_product_description_heading', 'remove_product_description_heading' );
function remove_product_description_heading() {
return '';
}
// Remove text Additional in product detail
add_filter( 'woocommerce_product_additional_information_heading', 'remove_product_additional_information_heading' );
function remove_product_additional_information_heading() {
return '';
}


add_filter ('woocommerce_get_image_size_thumbnail', function( $size ){
    return array(
        'width' => 270,
        'height' => 230,
        'crop' => 1,
    );
});

add_filter ('woocommerce_get_image_size_single', function ($size){
    return array(
        'width' => 570,
        'height' => 570,
        'crop' => 1,
    );
});

add_filter ('woocommerce_get_image_size_gallery_thumbnail', function($size){
    return array(
        'width' => 170,
        'height' => 170,
        'crop' => 1,
    );
});

?>

