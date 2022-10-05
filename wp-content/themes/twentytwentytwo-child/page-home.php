<?php get_header(); ?>
<main>
    <div class="content">
        <div class="main-content">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php the_content() ?>


            <?php endwhile ?>

            <?php else : ?>
            <?php get_template_part('teamplate-content/content-post/content', 'none'); ?>
            <?php endif; ?>
        </div>

    </div>
    <div class="sidebar ">
        <?php get_sidebar(); ?>
    </div>
</main>
</div>
<?php get_footer(); ?>