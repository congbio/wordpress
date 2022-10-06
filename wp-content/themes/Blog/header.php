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
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="container">
        <header class="header">
            <div class="vov">
                <ul class="vov__name">
                    <!-- <li><i class="fa-solid fa-house"></i></li> -->
                    <li>VOV1</li>
                    <li>VOV2</li>
                    <li>VOV3</li>
                    <li>VOV4</li>
                    <li>VOV5</li>
                    <li>VOV6</li>
                    <li>VOV GT</li>
                    <li>VTC HD</li>
                </ul>
            </div>
            <div class="infor">
                <div>
                    <a href="" class="infor__logo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Logo_VOV.svg/1200px-Logo_VOV.svg.png"
                            alt="">
                    </a>
                </div>
                <div>
                    <p>Thứ 5, nagy 23 tháng 10 nă 2022</p>
                </div>
                <div class="infor__logoSocial">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-square-instagram"></i>
                    <i class="fa-brands fa-tiktok"></i>
                    <i class="fa-brands fa-youtube"></i>
                </div>
                <div>
                    <p>xem & nghe </p>
                </div>
                <div>
                    <p>English </p>
                </div>
                <div>
                    <input type="text" class="input">
                </div>
            </div>
    </div>
    <div class="fuild_header">
        <div class="header_mainmenu">
            <div class="home-icon">
                <a href="<?php echo  get_home_url() ?>"> <i class="fa fa-home" aria-hidden="true"></i>
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