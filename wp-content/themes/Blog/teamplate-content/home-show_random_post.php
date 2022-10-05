<?php
// hướng danh : ttps://www.hoangweb.com/wordpress/hien-thi-bai-viet-ngau-nhien-trong-wordpress#:~:text=Hi%E1%BB%83n%20th%E1%BB%8B%20b%C3%A0i%20vi%E1%BA%BFt%20ng%E1%BA%ABu%20nhi%C3%AAn%20s%E1%BB%AD%20d%E1%BB%A5ng%20plugin&text=Sau%20khi%20k%C3%ADch%20ho%E1%BA%A1t%2C%20b%E1%BA%A1n,thay%20%C4%91%E1%BB%95i%20%26%20nh%E1%BA%A5n%20n%C3%BAt%20Save.
$args = array(
	'posts_per_page' => 9,  //Số lượng bài viết muốn lấy
	'orderby' => 'rand',
	'post_type' => 'post'
);
$featured = new WP_Query($args);
?>
<div class="home_newpost">

	<h3 class="title-news">Bài viết ngẫu nhiên</h3>
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