<?php
$args = array(
	'posts_per_page' => 5,  //Số lượng bài viết muốn lấy
	'meta_key' => 'meta-checkbox',
	'meta_value' => 'yes'
);
$featured = new WP_Query($args);
?>
<div class="home_newpost">

	<h3 class="title-news">Nổi bật nhất</h3>
	<ul class="news">
		<?php  
		if ($featured->have_posts())
			while ($featured->have_posts()) : $featured->the_post();
				$do_not_duplicate = $post->ID;
		?>
			<div class="post_format">
				<?php get_template_part('teamplate-content/content-post/content', ''); ?>
			</div>
		<?php
			endwhile;
		?>

	</ul>

</div>