<?php
// hướng danh : ttps://www.hoangweb.com/wordpress/hien-thi-bai-viet-ngau-nhien-trong-wordpress#:~:text=Hi%E1%BB%83n%20th%E1%BB%8B%20b%C3%A0i%20vi%E1%BA%BFt%20ng%E1%BA%ABu%20nhi%C3%AAn%20s%E1%BB%AD%20d%E1%BB%A5ng%20plugin&text=Sau%20khi%20k%C3%ADch%20ho%E1%BA%A1t%2C%20b%E1%BA%A1n,thay%20%C4%91%E1%BB%95i%20%26%20nh%E1%BA%A5n%20n%C3%BAt%20Save.
$args = array(
	'posts_per_page' => 1,  //Số lượng bài viết muốn lấy
	'orderby' => 'rand',
	'post_type' => 'post'
);
$featured = new WP_Query($args);
?>
<div class="random-post">
    <?php $myposts=get_posts( $args ); foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
    <div class="entry-thumbnail">
        <?php congbio_thumbnail('large') ?>
    </div>
    <div class="entry-header">
        <?php congbio_entry_header(); ?>
    </div>
    <div class="entry-content">
        <?php congbio_entry_content(); ?>
        <?php (is_single() ? congbio_entry_tag() : ''); ?>
    </div>
    <?php endforeach;
wp_reset_postdata();?>

</div>