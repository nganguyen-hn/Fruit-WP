<?php
get_header(); 
?>
<main>
<section class="breadcrumb_site text-center" >
        <div class="container container-v1">
            <h1 class="title-page mb-0"><?php single_cat_title(); ?></h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <?php   
                if(function_exists('bcn_display')) {
                    bcn_display(false,true,false,false); 
                } 
                ?>
                </ol>
            </nav>
        </div>
</section>
	<section class="blog-page">
		<div class="container container-v1">
			<div class="row">
				<?php
                    while (have_posts() ) { 
                the_post();                              
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
                                        By <?php the_author(); ?>
                                    </li>
                                    <li class="list-inline-item">
                                        <?php echo get_comments_number(); ?> comments
                                    </li>
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
				<?php 
                    }
                    wp_reset_postdata(); 
                ?>
			</div>
             <?php wpbeginner_numeric_posts_nav(); ?>

		</div>
	</section>
    
</main>

<?php
get_footer(); 
?>