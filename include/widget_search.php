<?php
add_action('widgets_init', 'widget_search');
function widget_search(){
    register_widget('widget_search');    
}
class widget_search extends WP_Widget{       
    function __construct(){         
        parent::__construct(                
            'widget_search',                 
            'Widget Search',                 
            array('description' => 'Widget Search sidebar')              
        );      
    }       
    function form($instance){           
      global $wpdb;
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
        $title    = $instance['title'];
        ?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?> <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></label></p>
        <?php

    }       
    function update($new_instance, $old_instance){          
        $instance          = $old_instance;
        $new_instance      = wp_parse_args( (array) $new_instance, array( 'title' => '' ) );
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        return $instance;      
    }       
    function widget($args, $instance){ ?>                     
        <form action="<?php bloginfo('url'); ?>/" method="GET" class="form-search" role="search">
                <div class="form-group">
                    <input type="text" name="s" class="form-control" id="" placeholder="<?php _e('Search products......'); ?>">
                </div>
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        <?php                                                   
    }   
}