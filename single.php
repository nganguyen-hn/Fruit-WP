<?php get_header(); ?>
<main>
	<section class="breadcrumb_site text-center" >
        <div class="container container-v1">
        	<h1 class="title-page mb-0"><?php the_title(); ?></h1>
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
	<section class="blog-single">
		<div class="container container-v1">
			<div class="row">			
				<div class="col-lg-8 col-md-8">
					<?php
					while ( have_posts() ) { 
						the_post();
						?>
						<div class="image-single-blog">
							<?php the_post_thumbnail('archive_single', array('class'=>'w-100 img-fluid')); ?>
						</div>
						
						<div class="date-admin-cmt">
							<ul class="list-inline">
								<li class="list-inline-item">
									<?php echo get_the_date(); ?>
								</li>
								<li class="list-inline-item">
									<?php the_author(); ?>
								</li>
								<li class="list-inline-item">
									<?php echo get_comments_number(); ?> comments
								</li>
							</ul>
						</div>

						<div class="blog-single-content">
							<?php the_content(); ?>					
						</div>
						<div class="row">
					<div class="col-lg-12">
						<div class="list-tag-social d-flex flex-wrap">
							<div class="tag"><i class="fa fa-tag"></i><?php the_tags( 'Tags: ', ', ', '<br />' ); ?> </div>
							<div class="social-share">
								<ul class="list-inline list-unstyled float-right mb-0">
									<li class="list-inline-item"><a class="btn-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $actual_link; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
									<li class="list-inline-item"><a class="btn-social-icon btn-insta" href="https://instagram.com/share?url=<?php echo $actual_link; ?>" target="_blank"><i class="fa fa fa-instagram"></i></a></li>
									<li class="list-inline-item"><a class="btn-social-icon btn-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $actual_link; ?>&title=<?php echo get_the_title(get_the_ID()); ?>&source=http://localhost/Nga/Fruit" target="_blank"><i class="fa fa-linkedin"></i></a></li>
									<li class="list-inline-item"><a class="btn-social-icon btn-twitter" href="https://twitter.com/home?status=<?php echo $actual_link; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>


					<?php } ?>


					<?php if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif; ?>
				
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<?php
get_footer(); 
?>