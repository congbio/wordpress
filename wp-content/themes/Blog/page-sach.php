<?php get_header(); ?>
<main>
    <div class="content">
        <div class="sach">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php get_template_part('page/sach/product', 'card'); ?>


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