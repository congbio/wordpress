<!DOCTYPE html>
<![if|E 8]>
<html <?php language_attributes(); ?> class="ie8">
<![endif]>
<![if!|E]>
<html <?php language_attributes(); ?>>
<![endif]>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="<?php bloginfo('charset'); ?>" />


    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/css/app.css' ?>">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" /> -->
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="profile" href="http://gmgp.org/xfn/11" /> -->

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="container">
        <header class="header">
            <div class="topheader">
                <nav>
                    <ul class="top">
                        <li>VTV 1</li>
                        <li>VTV 1</li>
                        <li>VTV 1</li>
                        <li>VTV 1</li>
                        <li>VTV 1</li>
                        <li>VTV 1</li>
                    </ul>
                </nav>
                <nav>
                    <ul class="vov">
                        <li>
                            <img class="icon" src="https://vov.vn/themes/custom/vovvn/logo.svg">
                        </li>
                        <li>
                            Thứ Tư, ngày 5 tháng 10 năm 2022
                        </li>
                        <li>
                            <img class="icon"
                                src="https://t4.ftcdn.net/jpg/03/92/71/99/360_F_392719944_L0LYv3e7QozB2tsj3CfUN0HPC8eZQOWb.jpg">

                        </li>
                        <li class="function">
                            listen and watch
                        </li>
                        <li>
                            English
                        </li>
                        <li>
                            <input type="text">
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="fuild-menu">

                <div class="header_mainmenu">
                    <div class="home-icon">
                        <a href="<?php echo get_home_url() ?>">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </a>
                    </div>
                    <ul>
                        <?php
        $categories = get_categories(array(
        "post_type"=>'post',
        "orderedby"=> "name",
        "parent" => 0
        ));

        forEach($categories as $category){
        printf ('<li class="category-name">') ;
            printf('<a href="%1$s" class="button"><span>%2$s</span> </a>',
            esc_url(get_category_link($category->term_id)),
            esc_html($category->name));
            printf('</li>');
        }
        ?>
                    </ul>
                </div>
            </div>