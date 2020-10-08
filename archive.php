<?php
get_header(); 
?>
<main>
    <section>
        <nav class="breadcrumb-nav text-center" aria-label="breadcrumb">
            <h3>
                <?php
                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                }?>
            </h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>" title=""></a></li>
                <li class="breadcrumb-item">
                    <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                    }?>
                </li>
            </ol>
        </nav>
    </section>
	<section class="blog-page">
		<div class="container container-v1">
			<div class="row">
				<?php
	                $count=0;
	                if (have_posts()): while (have_posts()): the_post();
	            ?>
				 <div class="col-lg-6">
                    <div class="item-blog">
                        <div class="box-imgblog">
                            <a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
                                <?php the_post_thumbnail('archive_thumb', array('class'=>'img-fluid')); ?>
                            </a>
                        </div>
                        <div class="info-blog">
                            <h3 class="title-blog"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                            <div class="date-admin-cmt">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <?php echo get_the_date(); ?>
                                    </li>
                                    <li class="list-inline-item">
                                        <?php the_author(); ?>
                                    </li>
                                <!--     <li class="list-inline-item">
                                        <?php get_comment(); ?>
                                    </li> -->
                                </ul>
                            </div>
                            <div class="content-blog">
                                <?php echo wp_trim_words(get_the_content(), 29, '...'); ?>
                            </div>
                            <a class="button-blog text-uppercase" href="<?php the_permalink(); ?>">
                                Read more <i class="fa fa-angle-double-right"></i>
                            </a>
                        </div>
                    </div>
                </div> 
				<?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
			</div>
		</div>
	</section>


    
</main>
<?php
get_footer(); 
?>