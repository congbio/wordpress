<?php
/*
	Template Name: Home Page
*/

get_header(); ?>
<section>
    <div class="home-container">

        <hr class="gradient-line">
        <?php get_template_part('teamplate-content/home', 'shownewpost'); ?>
    </div>
    <?php get_template_part('teamplate-content/home', 'show_standing_post'); ?>
    <?php get_template_part('teamplate-content/home', 'show_random_post'); ?>
    </div>

    </main>

    <?php get_footer(); ?>