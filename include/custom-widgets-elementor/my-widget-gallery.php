<?php
class My_Elementor_Widget {
	protected static $instance = null;
	public static function get_instance() {
		if ( ! isset( static::$instance ) ) {
			static::$instance = new static;
		}
		return static::$instance;
	}
	protected function __construct() {
		require_once('widget_tab_gallery.php');
		add_action( 'elementor/widgets/widgets_registerd' , [ $this, 'register_widgets' ] );
	}
	public function register_widgets() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\widget_tab_gallery() );
	}
}
add_action( 'init' , 'my_elementor2' );
function my_elementor2(){
	My_Elementor_Widget::get_instance();
}
?>