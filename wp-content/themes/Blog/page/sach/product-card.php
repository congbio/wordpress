<?php

$params = array('posts_per_page' => 1, 'post_type' => 'product' );

$wc_query = new WP_Query($params);
?>

    <?php if ($wc_query->have_posts()) : ?>
        <ul class="products">
        <?php while ($wc_query->have_posts()) :
            $wc_query->the_post(); ?>
            <li class="product-card">
                <h3 class="product-title">
                    <a class="product-link" href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h3>
                <div class="product-image">
                    <?php the_post_thumbnail(); ?>
                </div>
                <p>
                    <span><?php echo get_post_meta(get_the_ID(), '_regular_price', true); ?></span>
                    <span>
                        <?php echo get_post_meta(get_the_ID(), '_sale_price', true); ?></span>
                </p>
            </li>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else :  ?>
        <li>
            <?php _e('No Products'); ?>
        </li>
    <?php endif; ?>
</ul>