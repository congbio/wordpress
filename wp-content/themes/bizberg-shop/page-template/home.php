<?php

/**
* Template Name: Ecommerce Homepage
*/

get_header();

bizberg_shop_get_slider();
// category
// bizberg_shop_add_woo_cat_on_menus file function
do_action( 'bizberg_shop_before_top_categories_section' );
bizberg_shop_get_top_categories();

 
renderProduct();


// do_action( 'bizberg_shop_before_services_section' );
// bizberg_shop_get_services();

// do_action( 'bizberg_shop_before_sales_banner_section' );
// bizberg_shop_get_sales_banner();

do_action( 'bizberg_shop_before_woocommerce_tab_products' );
bizberg_shop_get_homepage_products();

do_action( 'bizberg_shop_before_repeater_products' );
bizberg_shop_get_repeater_products();

do_action( 'bizberg_shop_before_clients_logo' );
bizberg_shop_get_clients_logo();

do_action( 'bizberg_shop_before_footer' );
?>
<!-- <script src="../showheh.js"></script> -->
<?php get_footer();