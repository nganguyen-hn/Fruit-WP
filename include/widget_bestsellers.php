<?php
add_action('widgets_init', 'product_bestseller' );
function product_bestseller(){
	register_widget('product_bestseller');
}

class product_bestseller extends WP_Widget{
	function __construct(){
		parent::__construct(
			'product_bestseller',
			'Product Bestseller',
			array('description' => 'Product Best Sellers')
		);
	}
	function form($instance){
		echo 'Title widget: <input type="text" class="widefat" name=" '.$this->get_field_name('title').'" value="'.$instance['title'].'" />';
		echo 'Number: <input type="text" class="widefat" name="'.$this->get_field_name('product_number') . '" value="'.$instance['product_number'].'" />';
	}
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['product_number'] = $new_instance['product_number'];
		return $instance;
	}
	function widget($args, $instance){
		$args = array(
			'post_status' => 'publish',
			'post_type' => 'product',
		    'meta_key' => 'total_sales',
		    'orderby' => 'meta_value_num',
			'posts_per_page' => $instance['product_number'],
		);
		$query = new WP_Query($args);
		if($query->have_posts()){
			?>
			<div class="sidebar_title">
				<h3 class="title-sidebar text-uppercase mb-0"><?php echo $instance['title']; ?></h3>
			</div>
			<ul class="list-unstyled mb-0 list-product-sidebar">
				<?php
					while ($query->have_posts()){
						$query->the_post();
				?>

				<li class="media item-product align-items-center">
					<?php
						global $product;
						if ( ! is_a( $product,'WC_Product' ))
						{
							return;
						}
					?>
					<div class="box-img">
						<a href="<?php the_permalink(); ?>">
							<?php
								if (has_post_thumbnail() ){
									the_post_thumbnail('img_single_sidebar', array('class' => 'img-fluid'));
								}
								else{
									echo 'img src="' .get_bloginfo('stylesheet_directory') . '/images/image-gia.jpg" />';
								};
							?>
						</a>
					</div>
					<div class="media-body info-product-sidebar">
						<h5 class="title-product mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						<div class="products_price"><?php echo $product->get_price_html(); ?></div>
					</div>
				</li>
					<?php
					}
					wp_reset_postdata();
					?>

			</ul>

			<?php
		}
	}
}