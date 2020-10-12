<?php get_header(); ?>
<main>
	<section class="breadcrumb_site text-center" >
            <div class="container">
            	<?php the_title(); ?>
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
		<div class="container">
			<div class="row">			
				<div class="col-lg-8">
					<?php
					while ( have_posts() ) { 
						the_post();
						?>

						<?php the_post_thumbnail('archive_single', array('class'=>'img-fluid')); ?>
						<div class="date-admin-cmt">
							<ul class="list-inline">
								<li class="list-inline-item">
									<?php echo get_the_date(); ?>
								</li>
								<li class="list-inline-item">
									<?php the_author(); ?>
								</li>
								<li class="list-inline-item">
									<a href="#"><?php get_comment(); ?></a>
								</li>
							</ul>
						</div>

						<div class="blog-single-content">
							<?php the_content(); ?>					
						</div>



					<?php } ?>


					<?php if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif; ?>
				</div>
				<div class="col-lg-4">
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