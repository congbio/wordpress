<?php
$vnkings = new WP_Query(array(
'post_type'=>'post',
'post_status'=>'publish',
'cat' => 1,
'orderby' => 'ID',
'order' => 'DESC',
'posts_per_page'=> 4));
?>
<?php get_header(); ?>

<main>
    <div class="content">
        <div class="page">
            <?php if (have_posts()) : while ($vnkings->have_posts()) : $vnkings->the_post(); ?>
                    <?php get_template_part('teamplate-content/content-post/content') ?>
                    
                <?php endwhile ?>
            <?php else : ?>
                <?php get_template_part('teamplate-content/content-post/content', 'none'); ?>
            <?php endif; ?>
        </div>
     
    </div>
       <div class="sidebar">
            <?php get_sidebar(); ?>
        </div>
</main>

<?php get_footer(); ?>