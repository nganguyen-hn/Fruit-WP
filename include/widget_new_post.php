<?php
add_action('widgets_init', 'new_post');
function new_post(){
	register_widget('new_post');
}
class new_post extends WP_Widget{
	function __construct(){
		parent::__construct(
			'new_post',
			'New Post - Creat New',
			array('description' => 'New post sidebar')
		);
	}
	function form($instance){
		echo 'Title widget: <input type="text" class="widefat" name="'.$this->get_field_name('title').'" value="'.$instance['title'].'" />';
		echo 'Number: <input type="text" class="widefat" name="'.$this->get_field_name('post_number').'" value="'.$instance['post_number'].'" />';
	}
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['post_number'] = $new_instance['post_number'];
		return $instance;
	}
	function widget($args, $instance){
		$args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'orderby' => 'date',
			'order' => 'DESC',
			'posts_per_page'=> $instance['post_number'],
		);
		$query = new WP_Query($args);
		if($query->have_posts()){
			?>
			<div class="sidebar_title">
				<h3 class="title-sidebar text-uppercase mb-0"><?php echo $instance['title']; ?></h3>
			</div>
			<ul class="list-unstyled post-sidebar mb-0">
				<?php
				while ($query->have_posts() ) {
					$query->the_post();
					?>
					<li class="media">
						<div class="box-img">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_post_thumbnail('img_single_sidebar', array('class'=>'img-fluid')); ?>
							</a>
						</div>
						<div class="media-body content_sidebar">
							<h5 class="titlemedia mb-0">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</h5>
							<div class="date">
								<span class="date_submitted"> <?php echo get_the_date('d/m/Y'); ?></span>
							</div>
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