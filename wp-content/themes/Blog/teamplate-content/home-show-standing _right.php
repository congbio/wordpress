<div class="home_newpost">
<h2 class="right_header">
                Mới cập nhật
                </h2>
 
        <?php $postquery = new WP_Query(array('posts_per_page' => '7'));
		if ($postquery->have_posts()) {
			while ($postquery->have_posts()) : $postquery->the_post();
				$do_not_duplicate = $post->ID;
		?>
        <div class="post_format">
            <?php get_template_part('teamplate-content/content-post/lefImage_rightContent' )?>
        </div>
        <?php endwhile;
			?>
        <?php


		} ?>


</div>