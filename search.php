<?php get_header() ?>
<div class="container product_section_container">
	<div class="row justify-content-center">
		<div class="col-lg-9 search_results">
			<h1>Search Results: <?php echo get_search_query(); ?></h1>
		</div>
	</div>
	<div class="row justify-content-center">	
		<div class="col-lg-9 ">
			<div class="panel">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<h1><?php the_title(); ?></h1>
						<a href="<?php the_permalink();?>" title="<?php the_title();?>">
                    <?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail('New_Arrivals', array('class' =>'product_image'));
                    }
                    else {
                        echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) 
                        . '/images/image-gia.jpg" />';
                    };?> 
                </a>
						<div class="text-justify pt-3"><?php echo wp_trim_words( get_the_content(), 40, '...' ); ?></div>
						<br><br>
						<hr color="black" height="20px">
					<?php endwhile;
						else: _e("No result found for your search! :(")
					 ?>
				<?php endif; ?>		
			</div>
		</div>
	</div>
</div>



<?php get_footer() ?>