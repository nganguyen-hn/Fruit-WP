<?php get_header(); ?>
<main>
	<section>
		<div>
			<nav class="breadcrumb-nav text-center" aria-label="breadcrumb">
				<?php the_title(); ?>
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

						<div class="blog-single">
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
