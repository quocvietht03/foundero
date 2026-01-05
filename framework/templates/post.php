<article <?php post_class('bt-post'); ?>>
	<div class="bt-post--infor">
		<?php
		echo foundero_post_category_render();
		if (is_single()) {
			echo foundero_single_post_title_render();
		} else {
			echo foundero_post_title_render();
		}
		echo foundero_post_meta_single_render();
		?>
	</div>
	<?php
		echo foundero_post_featured_render();
		echo foundero_post_content_render();
	?>
</article>