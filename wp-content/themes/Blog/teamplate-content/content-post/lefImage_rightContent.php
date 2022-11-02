<div class="post_lefimg_rightcontent">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-thumbnail">
            <?php congbio_thumbnail('large') ?>
        </div>
        
        
        <div class="entry-content">
            <h1 class="header-title">

                <?php congbio_entry_header(); ?>
            </h1>
            <!-- <?php congbio_entry_content(); ?> -->
            <?php (is_single() ? congbio_entry_tag() : ''); ?>
        </div>
    </article>
</div>