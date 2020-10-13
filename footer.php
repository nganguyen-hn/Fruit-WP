	<footer>
		<div class="footer-top">
			<div class="container container-v1">
				<div class="row">
					<div class="col-lg-4">
						<?php dynamic_sidebar( 'footer_v1' ); ?>
						<!-- <a href="<?php echo get_home_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="img-fluid">
						</a>
						<ul class="mb-0 list-unstyled">
							<li><a href=""><i class="fa fa-envelope"></i> contact@orgamic.com</a></li>
							<li><a href=""><i class="fa fa-home"></i> 546 TWard Street, New York, USA</a></li>
							<li><a href=""><i class="fa fa fa-phone"></i> 55 6435 321</a></li>
						</ul> -->
					</div>
					<div class="col-lg-2 padding-item-top">
						<?php dynamic_sidebar( 'footer_v2' ); ?>
						<!-- <h3 class="title-footer"></h3>
						<ul class="mb-0 list-unstyled">
							<li><a href="">About Us</a></li>
							<li><a href="">Gallery</a></li>
							<li><a href="">Our Team</a></li>
							<li><a href="">Our Blog</a></li>
						</ul> -->
					</div>
					<div class="col-lg-2 padding-item-top">
						<?php dynamic_sidebar( 'footer_v3' ); ?>
						<!-- <h3 class="title-footer"></h3>
						<ul class="mb-0 list-unstyled">
							<li><a href="">Contact Us</a></li>
							<li><a href="">FAQ</a></li>
							<li><a href="">Privacy Policy</a></li>
							<li><a href="">Secure Shopping</a></li>
						</ul> -->
					</div>
					<div class="col-lg-4 padding-item-top">
						<?php dynamic_sidebar( 'footer_v4' ); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright">
			

		</div>

	</footer>
</div>
        <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/myjs.js"></script>
		<?php wp_footer(); ?>
	</body>
</html>