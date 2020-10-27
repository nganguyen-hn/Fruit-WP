<?php
/*Template Name: Archive Product*/
get_header();
?>
<main class="content">
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
	<section class="page-collection-product">
		<div class="container container-v1">
			<?php
			$count = 0;
			$couter = 0;
			$args = array(
				'hide_empty => 0',
				'orderby' => 'id',
				'order' => 'ASC',
			);
			$terms = get_terms( 'product_cat', $args );
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				?>
				<ul class="tab-title nav nav-pills justify-content-center" id="pills-tab" role="tablist">
					<?php
					foreach ( $terms as $term ) {
						$thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
						$image = wp_get_attachment_url( $thumbnail_id );
						?>
						<li class="nav-item">

							<a class="nav-link-item <?php if($count == 0) echo 'active' ?>"  data-toggle="pill" href="#tab-<?php echo $term->term_id ?>" role="tab" aria-controls="<?php echo $term->term_id ?>" >
								<img src="<?php echo $image; ?>" class="d-block m-auto">
								<?php echo $term->name ?></a>
						</li>
							<?php
							$count++ ;
						}
						?>
				</ul>

				<div class="tab-content" id="pills-tabContent">
					<?php
					foreach ( $terms as $term ) {
						?>
						<div class="tab-pane fade <?php if($couter == 0) echo 'show active' ?>" id="tab-<?php echo $term->term_id ?>" role="tabpanel" aria-labelledby="<?php echo $term->term_id ?>-tab">
							<div class="row">
								<?php
								$args = array(
									'post_type' => 'product',
									'post_status' => 'publish',
									'tax_query' => array(
										array(
											'taxonomy'  => 'product_cat',
											'field'     => 'id',
											'terms'     => $term->term_id
										)
									),
									'posts_per_page' => -1,
									'orderby' => 'date',
									'order' => 'DESC',
								);
								$query = new WP_Query($args);
								if ( $query->have_posts() ) {
									while ($query->have_posts() ) {
										$query->the_post();
										// global $post;
								  //      $terms = get_the_terms( $post->ID, 'product_cat' );
								  //      $nterms = get_the_terms( $post->ID, 'product_tag'  );
								  //       foreach ($terms  as $term  ) {
								  //           $product_cat_id = $term->term_id;
								  //           $product_cat_name = $term->name;
								  //           break;
								  //       }

										?>
											<div class="col-lg-4">
												<div class="box-item-product position-relative">
													<div class="box-images">
														<a href="<?php the_permalink(); ?>">
															<?php the_post_thumbnail('archive_product', array('class' => 'img-fluid')); ?>
														</a>
													</div>
													<div class="info-product position-absolute text-center">
														<ul class="list-inline list-unstyled text-center mb-0">
															<li class="list-inline-item">
																<a class="js_click_popup" href="javascript:void(0)">
																	<svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
																<defs>
																	<style>
																		.cls-1 {
																			fill: #699500;
																			fill-rule: evenodd;
																		}
																	</style>
																</defs>
																<path  data-name="Forma 1" class="cls-1" d="M15.914,1.082a3.713,3.713,0,0,0-5.237,0L8.092,3.666a3.7,3.7,0,0,0-.986,3.445A3.757,3.757,0,0,0,6.28,7.016,3.677,3.677,0,0,0,3.661,8.1L1.076,10.681a3.7,3.7,0,0,0,5.237,5.236L8.9,13.333a3.7,3.7,0,0,0,.986-3.445,3.767,3.767,0,0,0,.827.095A3.676,3.676,0,0,0,13.329,8.9l2.585-2.584A3.706,3.706,0,0,0,15.914,1.082ZM8.092,12.527L5.507,15.111a2.563,2.563,0,0,1-3.625-3.625L4.467,8.9a2.572,2.572,0,0,1,3.175-.356L5.433,10.755a0.57,0.57,0,1,0,.806.806L8.448,9.352A2.566,2.566,0,0,1,8.092,12.527Zm7.016-7.015L12.523,8.1a2.572,2.572,0,0,1-3.175.356l2.209-2.209a0.57,0.57,0,1,0-.806-0.806L8.542,7.647A2.566,2.566,0,0,1,8.9,4.472l2.585-2.584A2.563,2.563,0,0,1,15.108,5.512Z"/>
																	</svg>
																</a>
															</li>
															<li class="list-inline-item"><a href="<?php the_permalink(); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
																<defs>
																	<style>
																		.cls-1 {
																			fill: #699500;
																			fill-rule: evenodd;
																		}
																	</style>
																</defs>
																<path  data-name="Forma 1" class="cls-1" d="M15.914,1.082a3.713,3.713,0,0,0-5.237,0L8.092,3.666a3.7,3.7,0,0,0-.986,3.445A3.757,3.757,0,0,0,6.28,7.016,3.677,3.677,0,0,0,3.661,8.1L1.076,10.681a3.7,3.7,0,0,0,5.237,5.236L8.9,13.333a3.7,3.7,0,0,0,.986-3.445,3.767,3.767,0,0,0,.827.095A3.676,3.676,0,0,0,13.329,8.9l2.585-2.584A3.706,3.706,0,0,0,15.914,1.082ZM8.092,12.527L5.507,15.111a2.563,2.563,0,0,1-3.625-3.625L4.467,8.9a2.572,2.572,0,0,1,3.175-.356L5.433,10.755a0.57,0.57,0,1,0,.806.806L8.448,9.352A2.566,2.566,0,0,1,8.092,12.527Zm7.016-7.015L12.523,8.1a2.572,2.572,0,0,1-3.175.356l2.209-2.209a0.57,0.57,0,1,0-.806-0.806L8.542,7.647A2.566,2.566,0,0,1,8.9,4.472l2.585-2.584A2.563,2.563,0,0,1,15.108,5.512Z"/>
															</svg></a></li>
														</ul>
														<h3 class="title-product mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h3>
														<a href="" class="category"><!-- All product --></a>
													</div>
												</div>
											</div>

									<?php
								}
									$couter++;
							}
							?>
							</div>
					</div>
					<?php
				}
				?>
				</div>

				<?php
			}
			?>
		</div>

	</section>
</main>
<?php get_footer(); ?>