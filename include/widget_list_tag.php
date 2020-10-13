<?php
add_action('widgets_init', 'list_tag');
function list_tag(){
	register_widget('list_tag');	
}
class list_tag extends WP_Widget{		
	function __construct(){			
		parent::__construct(				
			'list_tag', 				
			'List Tag', 				
			array('description' => 'List Tag sidebar')				
		);		
	}		
	function form($instance){			
		echo 'Title widget: <input type="text" class="widefat" name="'.$this->get_field_name('title').'" value="'.$instance['title'].'" />';			
		echo 'Number tag: <input type="text" class="widefat" name="'.$this->get_field_name('tag_number').'" value="'.$instance['tag_number'].'" />';				
	}		
	function update($new_instance, $old_instance){			
		$instance = $old_instance;			
		$instance['title'] = $new_instance['title'];			
		$instance['tag_number'] = $new_instance['tag_number'];					
		return $instance;		
	}		
	function widget($args, $instance){						
		$args = array(
			'number'     => $instance['tag_number'] ,
			'orderby'    => 'name',
			'order'      => 'ASC',
			'taxonomy'   => 'product_tag',
			'post_type'  => '',
			'echo'       => false,
			'show_count' => 0,
		);					
		$tags = wp_tag_cloud( $args );			
		?>
		<div class="sidebar_title">
			<h3 class="title-sidebar text-uppercase mb-0"><?php echo $instance['title']; ?></h3>
		</div>
		<div class="list_tag">
			<?php print_r($tags); ?>
		</div>
		<?php													
	}	
}