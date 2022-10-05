<div class="home_newpost">

	<h3 class="title-news">Mới Nhất</h3>
	<ul class="news">
		<?php $postquery = new WP_Query(array('posts_per_page' => '6'));
		if ($postquery->have_posts()) {
			while ($postquery->have_posts()) : $postquery->the_post();
				$do_not_duplicate = $post->ID;
		?>
				<div class="post_format">
					<?php get_template_part('teamplate-content/content-post/content','' )?>
				</div>

			<?php endwhile;
		 
			?>
	



		<?php


		} ?>



	</ul>
	
</div>