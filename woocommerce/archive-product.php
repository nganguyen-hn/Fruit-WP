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
											?>
											<div class="col-lg-4">
												<div class="box-item-product position-relative js-inno-wrapper-popup">
													<div class="box-images">
														<a href="<?php the_permalink(); ?>">
															<?php the_post_thumbnail('archive_product', array('class' => 'img-fluid')); ?>
														</a>
													</div>

													<div class="info-product position-absolute text-center">
														<ul class="list-inline list-unstyled text-center mb-0 list-icon-product">
															<li class="list-inline-item item-icon-product">
																<a class="js_call_popup icon-list" href="javascript:void(0)">
																<?xml version="1.0" encoding="iso-8859-1"?> <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"> <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 254.309 254.309" style="enable-background:new 0 0 254.309 254.309;" xml:space="preserve"> <g> <path d="M246.809,0.046h-34.766c-4.142,0-7.5,3.357-7.5,7.5s3.358,7.5,7.5,7.5h16.66l-77.07,77.069 c-6.807-4.696-15.048-7.454-23.925-7.454c-9.161,0-17.642,2.94-24.571,7.915l-77.53-77.53h16.66c4.142,0,7.5-3.357,7.5-7.5 s-3.358-7.5-7.5-7.5H7.5c-4.142,0-7.5,3.357-7.5,7.5v34.766c0,4.143,3.358,7.5,7.5,7.5s7.5-3.357,7.5-7.5V25.653l77.674,77.673 c-4.549,6.738-7.208,14.853-7.208,23.577c0,8.853,2.743,17.075,7.416,23.871L15,228.655v-16.658c0-4.143-3.358-7.5-7.5-7.5 s-7.5,3.357-7.5,7.5v34.766c0,4.143,3.358,7.5,7.5,7.5h34.766c4.142,0,7.5-3.357,7.5-7.5s-3.358-7.5-7.5-7.5h-16.66l77.824-77.823 c6.874,4.847,15.246,7.705,24.277,7.705c23.292,0,42.242-18.949,42.242-42.241c0-9.008-2.844-17.36-7.667-24.224l77.026-77.026 v16.658c0,4.143,3.358,7.5,7.5,7.5s7.5-3.357,7.5-7.5V7.546C254.309,3.403,250.951,0.046,246.809,0.046z M127.708,154.145 c-15.021,0-27.242-12.221-27.242-27.241c0-15.021,12.221-27.242,27.242-27.242c6.792,0,13.006,2.504,17.782,6.631 c0.31,0.516,0.678,1.006,1.123,1.45c0.464,0.464,0.978,0.846,1.519,1.163c4.238,4.804,6.817,11.104,6.817,17.998 C154.949,141.924,142.729,154.145,127.708,154.145z"/> <path d="M246.809,204.497c-4.142,0-7.5,3.357-7.5,7.5v16.658l-56.24-56.239c-2.929-2.928-7.678-2.928-10.606,0 c-2.929,2.93-2.929,7.678,0,10.607l56.24,56.239h-16.66c-4.142,0-7.5,3.357-7.5,7.5s3.358,7.5,7.5,7.5h34.766 c4.142,0,7.5-3.357,7.5-7.5v-34.766C254.309,207.854,250.951,204.497,246.809,204.497z"/> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>

																</a>

																<div class="pupup-product-info js-popup-product-quikview">
																	<div class="box-content-popup-info">
																		<div class="box-all">
																			<a class="js_close_popup-product icon-close-popup" href="javascript:void(0)">
																				<i class="fa fa-times"></i>
																			</a>
																			<div class="box-infocontent">
																				<div class="row">
																					<div class="col-lg-6">
																						<a href="<?php the_permalink(); ?>">
																							<?php the_post_thumbnail('archive_product_popup', array('class' => 'img-fluid')); ?>
																						</a>
																					</div>
																					<div class="col-lg-6 text-left">
																						<h3 class="title-product-popup"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
																						<p class="price-product-popup">
																							<?php _e( 'Price:', 'Fruit' ); ?><?php echo get_post_meta( get_the_ID(), '_regular_price', true); ?>
																							<span class="price-sale ml-2">
																								<?php echo get_post_meta( get_the_ID(), '_sale_price', true ); ?>
																							</span>
																						</p>
																						<div class="content-info-popup">
																							<?php the_excerpt(); ?>
																						</div>
																						<a href="<?php the_permalink(); ?>" class="view-more-popup"><?php _e('View more', 'Fruit'); ?></a>
																					</div>
																				</div>
																			</div>

																		</div>


																	</div>

																</div>
														<div class="bgpupup-product-info js-bg-popup-product-quikview">

															</li>
															<li class="list-inline-item item-icon-product">
																<a href="<?php the_permalink(); ?>" class="icon-list">
																	<svg  enable-background="new 0 0 512.001 512.001" height="512" viewBox="0 0 512.001 512.001" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m124.216 512.001c-32.708.001-63.596-12.96-87.427-36.79-24.953-24.954-37.987-57.649-36.703-92.064 1.327-35.543 17.384-69.686 46.436-98.738l52.308-52.521c7.794-7.827 20.457-7.853 28.284-.058 7.826 7.794 7.853 20.458.058 28.284l-52.336 52.551c-42.411 42.411-46.413 97.61-9.761 134.262 36.653 36.655 91.852 32.652 134.232-9.732l71.887-71.887c21.789-21.788 33.805-46.667 34.748-71.945.865-23.17-8.019-45.291-25.015-62.287-5.695-5.694-11.996-10.526-18.729-14.361-9.598-5.467-12.947-17.68-7.48-27.277 5.468-9.598 17.681-12.946 27.277-7.48 9.838 5.604 18.995 12.614 27.217 20.835 24.953 24.953 37.987 57.648 36.703 92.063-1.327 35.543-17.384 69.687-46.436 98.738l-71.887 71.887c-29.053 29.052-63.195 45.108-98.738 46.436-1.548.055-3.097.084-4.638.084zm133.068-189.436c5.467-9.598 2.117-21.811-7.48-27.277-6.733-3.835-13.035-8.667-18.729-14.36-36.652-36.653-32.65-91.852 9.732-134.234l71.887-71.886c42.383-42.381 97.581-46.384 134.232-9.732 36.652 36.652 32.65 91.851-9.761 134.262l-52.336 52.551c-7.795 7.826-7.769 20.49.058 28.284 7.826 7.795 20.489 7.767 28.284-.058l52.308-52.522c29.052-29.052 45.108-63.195 46.436-98.737 1.284-34.415-11.75-67.111-36.703-92.064-24.954-24.954-57.666-37.986-92.064-36.704-35.543 1.327-69.686 17.384-98.737 46.436l-71.888 71.886c-29.052 29.052-45.108 63.195-46.436 98.737-1.284 34.415 11.75 67.111 36.703 92.065 8.221 8.22 17.378 15.229 27.217 20.834 3.124 1.779 6.524 2.625 9.88 2.625 6.953-.001 13.709-3.633 17.397-10.106z"/></svg>
																</a>
															</li>
														</ul>
														<h3 class="title-product mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h3>

														<?php
														$cate_name = wp_get_post_terms(get_the_ID(), 'product_cat');
														foreach ($cate_name as $term) {
															$cate_name_display = $term->name;
															$cate_link = get_term_link( $term->term_id, 'product_cat' );

															echo "<a href='".$cate_link."' class='category_lisit_item'>$cate_name_display<span>, </span></a>";
															$couter++;
														}

														 ?>
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