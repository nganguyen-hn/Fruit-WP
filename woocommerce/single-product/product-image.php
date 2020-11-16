<div class="gallary-images">
	<div class="slider slider-imagebig">
		<div class="item-imagebig">
			<?php the_post_thumbnail('img_big_single', array('class' => 'img-fluid')); ?>
		</div>
		<?php
		global $product;
		$product_image_ids = $product->get_gallery_image_ids();
		foreach ($product_image_ids as $product_image_id) {
			$image_url = wp_get_attachment_image($product_image_id, 'img_big_single');
			?>
			<div>
				<?php echo $image_url; ?>
			</div>
			<?php
		}
		?>
	</div>
	<div class="slider slider-imagesmall">
		<div class="item-imagesmall">
			<?php //the_post_thumbnail('thumbnail_single', array('class' => 'img-fluid')); ?>
		</div>
		<?php
		foreach ($product_image_ids as $product_image_id) {
			$image_url = wp_get_attachment_image($product_image_id, 'thumbnail_single');
			?>
			<div class="item-imagesmall">
				<?php echo $image_url; ?>
			</div>
			<?php
		}
		?>
	</div>
</div>