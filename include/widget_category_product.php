<?php
add_action('widgets_init', 'category_product');
function category_product(){
    register_widget('category_product');
}
class category_product extends WP_Widget{
    function __construct(){
        parent::__construct(
            'category_product',
            'Category Product',
            array('description' => 'Display Product Categories')
        );
    }
    function form($instance){
        echo 'Title widget: <input type="text" class="widefat" name="'.$this->get_field_name('title').'" value="'.$instance['title'].'" />';
    }
    function update($new_instance, $old_instance){
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        return $instance;
    }
    function widget($args, $instance){
        $cat_args = array(
            'taxonomy' => 'product_cat',
            'parent' => '0',
            'orderby' => 'id',
            'order'   => 'ASC'

        );
        $categories = get_categories( $cat_args );
        ?>
        <div class="sidebar_title">
            <h3 class="title-sidebar text-uppercase mb-0"><?php echo $instance['title']; ?></h3>
        </div>
        <ul class="list-unstyled mb-0 category-product">
            <?php
            foreach ($categories as $category)  {
                $category_id = $category->term_id;
                $url= esc_url(get_category_link( $category->cat_ID ));
                $thumbnail_id = get_term_meta( $category->cat_ID , 'thumbnail_id', true );
                $image = wp_get_attachment_url( $thumbnail_id );
                ?>
                <li class="item-category align-items-center">
                    <div class=" item icon-catergory">
                        <a href="<?php echo $url ; ?>" title="<?php echo $category->cat_name ; ?>">
                            <img src="<?php echo $image ; ?>" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class=" item title-catergory">
                        <h5 class="mb-0"><a href="<?php echo $url ; ?>" title="<?php echo $category->cat_name ; ?>"><?php echo $category->cat_name ; ?></a>
                        </h5>

                    </div>
                    <div class=" item ">
                        <span class="float-right number-count-product">(<?php echo $category->count ; ?>)</span>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
        <?php
    }
}

