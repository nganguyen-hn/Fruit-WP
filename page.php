<?php get_header(); ?>
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
<div class="single_page_elementor">
	<div class="container container-v2">
		<?php while (have_posts()): the_post(); ?>
			<!-- <h1><?php the_title(); ?></h1> -->
			<p><?php the_content(); ?></p>
		<?php endwhile; ?>
	</div>
</div>
<?php get_footer(); ?>