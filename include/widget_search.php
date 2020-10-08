<?php 
class wgsearch extends WP_Widget
{
 function __construct(){
    $widget_ops = array('description' => 'widget search');
    $control_ops = array('width' => 300, 'height' => 300);
    parent::__construct(false,$name='Search ',$widget_ops,$control_ops);
}
function form($instance){
    global $wpdb;
            //Defaults
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
        $title    = $instance['title'];
        ?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?> <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></label></p>
        <?php

}
/*Saves the settings. */
function update($new_instance, $old_instance){
    $instance          = $old_instance;
        $new_instance      = wp_parse_args( (array) $new_instance, array( 'title' => '' ) );
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        return $instance;
}
function widget($args, $instance) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        echo $args['before_widget'];
        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        // Use current theme search form if it exists
        get_search_form();
        echo $args['after_widget'];


}
}// end class
register_widget('wgsearch');

 ?>