<?php

/**
* Customizer Settings
*/

require get_stylesheet_directory() . '/customizer/woocommerce-category-menu.php';
require get_stylesheet_directory() . '/customizer/slider.php';
require get_stylesheet_directory() . '/customizer/services.php';
require get_stylesheet_directory() . '/customizer/sales-banner.php';
require get_stylesheet_directory() . '/customizer/categories.php';
require get_stylesheet_directory() . '/customizer/tab-products.php';
require get_stylesheet_directory() . '/customizer/product-repeater.php';
require get_stylesheet_directory() . '/customizer/blocks.php';
require get_stylesheet_directory() . '/customizer/clients.php';

add_action( 'wp_enqueue_scripts', 'bizberg_shop_chld_thm_parent_css' );
function bizberg_shop_chld_thm_parent_css() {

    $bizberg_shop_theme = wp_get_theme();
    $theme_version = $bizberg_shop_theme->get( 'Version' );

    wp_enqueue_style( 
    	'bizberg_shop_chld_css', 
    	trailingslashit( get_template_directory_uri() ) . 'style.css', 
    	array( 
    		'bootstrap',
    		'font-awesome-5',
    		'bizberg-main',
    		'bizberg-component',
    		'bizberg-style2',
    		'bizberg-responsive' 
    	),
        $theme_version
    );

    wp_enqueue_script( 'bizberg_shop_scripts', get_stylesheet_directory_uri() . '/script.js', array('jquery'), $theme_version );
    
}

add_action( 'customize_preview_init', 'bizberg_shop_customize_enqueue' );
function bizberg_shop_customize_enqueue() {
    $bizberg_shop_theme = wp_get_theme();
    $theme_version = $bizberg_shop_theme->get( 'Version' );
    wp_enqueue_script( 'bizberg_shop_customizer_js', get_stylesheet_directory_uri() . '/customizer.js' ,array('jquery') ,$theme_version ,false );
}

add_action( 'customize_register', 'bizberg_shop_customizer_css', 100 );
function bizberg_shop_customizer_css( $wp_customize ){

    $bizberg_shop_theme = wp_get_theme();
    $theme_version = $bizberg_shop_theme->get( 'Version' );
    wp_enqueue_style( 'bizberg_shop_customizer_css', get_stylesheet_directory_uri() . '/customizer.css' );

    /**
    * Remove sections/panels/control of parent theme
    */
    
    $wp_customize->remove_section("transparent_header");
    $wp_customize->remove_section("progress_bar");

    $wp_customize->remove_control("header_menu_color_hover_sticky_menu");
    $wp_customize->remove_control("header_menu_separator_sticky_menu");
    $wp_customize->remove_control("header_menu_text_color_sticky_menu");
    $wp_customize->remove_control("header_navbar_background_2_sticky_menu");
    $wp_customize->remove_control("header_navbar_background_1_sticky_menu");
    $wp_customize->remove_control("header_site_tagline_color_sticky_menu");
    $wp_customize->remove_control("header_site_title_color_sticky_menu");
    $wp_customize->remove_control("header_sticky_menu_options_heading");
    $wp_customize->remove_control("header_menu_child_menu_background_sticky_menu");
    $wp_customize->remove_control("header_menu_child_menu_border_sticky_menu");
    $wp_customize->remove_control("header_menu_child_menu_text_color_sticky_menu");
    $wp_customize->remove_control("header_button_color_sticky_menu");
    $wp_customize->remove_control("header_button_color_hover_sticky_menu");
    $wp_customize->remove_control("header_button_border_color_sticky_menu");
    $wp_customize->remove_control("header_menu_slide_in_animation");

}


add_action( 'init' , 'bizberg_shop_customizer_sections' );
function bizberg_shop_customizer_sections(){

    Kirki::add_panel( 'bizberg_shop_frontpage_woocommerce', array(
        'title'          => esc_html__( 'Ecommerce Frontpage', 'bizberg-shop' ),
        'priority'       => 1,
    ) );

    Kirki::add_section( 'bizberg_shop_frontpage_woocommerce_slider', array(
        'title'          => esc_html__( 'Slider', 'bizberg-shop' ),
        'panel'          => 'bizberg_shop_frontpage_woocommerce'
    ) );

    Kirki::add_section( 'bizberg_shop_frontpage_woocommerce_services', array(
        'title'          => esc_html__( 'Services', 'bizberg-shop' ),
        'panel'          => 'bizberg_shop_frontpage_woocommerce'
    ) );

    Kirki::add_section( 'bizberg_shop_frontpage_woocommerce_sales_banners', array(
        'title'          => esc_html__( 'Sales Banner', 'bizberg-shop' ),
        'panel'          => 'bizberg_shop_frontpage_woocommerce'
    ) );

    Kirki::add_section( 'bizberg_shop_frontpage_woocommerce_top_categories', array(
        'title'          => esc_html__( 'Product Categories', 'bizberg-shop' ),
        'panel'          => 'bizberg_shop_frontpage_woocommerce'
    ) );

    Kirki::add_section( 'bizberg_shop_frontpage_woocommerce_tab_products', array(
        'title'          => esc_html__( 'Tab Products', 'bizberg-shop' ),
        'panel'          => 'bizberg_shop_frontpage_woocommerce'
    ) );

    Kirki::add_section( 'bizberg_shop_frontpage_woocommerce_repeater_products', array(
        'title'          => esc_html__( 'Products ( Repeater )', 'bizberg-shop' ),
        'panel'          => 'bizberg_shop_frontpage_woocommerce'
    ) );

    Kirki::add_section( 'bizberg_shop_frontpage_woocommerce_gutenberg_blocks', array(
        'title'          => esc_html__( 'Gutenberg Blocks', 'bizberg-shop' ),
        'panel'          => 'bizberg_shop_frontpage_woocommerce'
    ) );

    Kirki::add_section( 'bizberg_shop_frontpage_woocommerce_clients_logo', array(
        'title'          => esc_html__( 'Clients Logo', 'bizberg-shop' ),
        'panel'          => 'bizberg_shop_frontpage_woocommerce'
    ) );

}

add_action( 'init', 'bizberg_shop_colors' );
function bizberg_shop_colors(){

    $options = array(
        'bizberg_read_more_background_color',
        'bizberg_theme_color', // Change the theme color
        'bizberg_header_menu_color_hover',
        'bizberg_header_button_color',
        'bizberg_link_color',
        'bizberg_background_color_2',
        'bizberg_link_color_hover',
        'bizberg_sidebar_widget_title_color',
        'bizberg_blog_listing_pagination_active_hover_color',
        'bizberg_heading_color',
        'bizberg_sidebar_widget_link_color_hover',
        'bizberg_footer_social_icon_color',
        'bizberg_footer_copyright_background',
        'bizberg_header_menu_color_hover_sticky_menu',
        'bizberg_shop_quick_view_background',
        'bizberg_shop_price_color',
        'bizberg_header_button_color',
        'bizberg_background_color_1',
        'bizberg_background_color_2'
    );

    foreach ( $options as $value ) {
        
        add_filter( $value , function(){
            return '#f5848c';
        });

    }

}

add_filter( 'bizberg_sticky_sidebar_margin_top_status', function(){
    return 30;
});

add_filter( 'bizberg_slider_banner_settings', function(){
    return 'none';
});

add_filter( 'bizberg_top_header_status', function(){
    return false;
});

add_filter( 'bizberg_sidebar_spacing_status', function(){
    return '0px';
});

add_filter( 'bizberg_sidebar_widget_background_color', function(){
    return 'rgba(251,251,251,0)';
});

add_filter( 'bizberg_sidebar_widget_border_color', function(){
    return 'rgba(251,251,251,0)';
});

add_filter( 'bizberg_primary_header_layout_bottom_border_color', function(){
    return '#f5848c';
});

add_filter( 'bizberg_primary_header_layout_bottom_border_size', function(){
    return 5;
});

add_filter( 'bizberg_last_item_html', function(){
    return '';
});

add_filter( 'bizberg_header_button_color_hover', function(){
    return '#f24955';
});

// Start Heading 1
add_filter( 'bizberg_body_typo_heading_1_status', function(){
    return true;
});
add_filter( 'bizberg_typography_h1', function(){
    return [
        'font-family'    => 'Poppins',
        'variant'        => '500',
        'font-size'      => '48.83px',
        'line-height'    => '1.1',
        'letter-spacing' => '0',
        'text-transform' => 'inherit'
    ];
});

add_filter( 'bizberg_typography_h1_tablet', 'bizberg_shop_typography_h1_tablet' );
function bizberg_shop_typography_h1_tablet(){
    return 45.78;
}

add_filter( 'bizberg_typography_h1_mobile', 'bizberg_shop_typography_h1_mobile' );
function bizberg_shop_typography_h1_mobile(){
    return 39.67;
}

// Start Heading 2
add_filter( 'bizberg_body_typo_heading_2_status', function(){
    return true;
});
add_filter( 'bizberg_typography_h2', function(){
    return [
        'font-family'    => 'Poppins',
        'variant'        => '500',
        'font-size'      => '39.06px',
        'line-height'    => '1',
        'letter-spacing' => '0',
        'text-transform' => 'inherit'
    ];
});

add_filter( 'bizberg_typography_h2_tablet', 'bizberg_shop_typography_h2_tablet' );
function bizberg_shop_typography_h2_tablet(){
    return 36.62;
}

add_filter( 'bizberg_typography_h2_mobile', 'bizberg_shop_typography_h2_mobile' );
function bizberg_shop_typography_h2_mobile(){
    return 31.74;
}

// Start Heading 3
add_filter( 'bizberg_body_typo_heading_3_status', function(){
    return true;
});
add_filter( 'bizberg_typography_h3', function(){
    return [
        'font-family'    => 'Poppins',
        'variant'        => '500',
        'font-size'      => '31.25px',
        'line-height'    => '1',
        'letter-spacing' => '0',
        'text-transform' => 'inherit'
    ];
});

add_filter( 'bizberg_typography_h3_tablet', 'bizberg_shop_typography_h3_tablet' );
function bizberg_shop_typography_h3_tablet(){
    return 29.30;
}

add_filter( 'bizberg_typography_h3_mobile', 'bizberg_shop_typography_h3_mobile' );
function bizberg_shop_typography_h3_mobile(){
    return 25.39;
}

// Start Heading 4
add_filter( 'bizberg_body_typo_heading_4_status', function(){
    return true;
});
add_filter( 'bizberg_typography_h4', function(){
    return [
        'font-family'    => 'Poppins',
        'variant'        => '500',
        'font-size'      => '25.00px',
        'line-height'    => '1.1',
        'letter-spacing' => '0',
        'text-transform' => 'inherit'
    ];
});
add_filter( 'bizberg_typography_h4_tablet', 'bizberg_shop_typography_h4_tablet' );
function bizberg_shop_typography_h4_tablet(){
    return 23.44;
}
add_filter( 'bizberg_typography_h4_mobile', 'bizberg_shop_typography_h4_mobile' );
function bizberg_shop_typography_h4_mobile(){
    return 20.31;
}

add_filter( 'bizberg_woo_product_color_status', function(){
    return true;
});

add_filter( 'bizberg_last_item_header', function(){
    return 'text';
});

add_filter( 'bizberg_header_columns', function(){
    return 'col-sm-3|col-sm-9';
});

/** 
* Body Font
*/
add_filter( 'bizberg_body_content_typo_status', function(){
    return true;
});

add_filter( 'bizberg_typography_body_content', function(){
    return [
        'font-family'    => 'Poppins',
        'variant'        => 'regular',
        'font-size'      => '15px',
        'line-height'    => '1.8'
    ];
});

/** 
* Enable Slick for this child theme
*/
add_filter( 'bizberg_slick_slider_status', function(){
    return true;
});

add_filter( 'bizberg_header_button_padding', function(){
    return array(
        'top'  => '4px',
        'bottom'  => '4px',
        'left' => '14px',
        'right' => '14px'
    );
});

add_filter( 'bizberg_site_title_font', function(){
    return [
        'font-family'    => 'Poppins',
        'variant'        => '600',
        'font-size'      => '23px',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'text-transform' => 'none',
        'text-align'     => 'left'
    ];
});

add_filter( 'bizberg_site_tagline_font', function(){
    return [
        'font-family'    => 'Poppins',
        'variant'        => '300',
        'font-size'      => '13px',
        'line-height'    => '1.8',
        'letter-spacing' => '0px',
        'text-transform' => 'none',
        'text-align'     => 'left'
    ];
});

add_filter( 'bizberg_sticky_header_status', function(){
    return 'false';
});

add_filter( 'bizberg_primary_header_layout', function(){
	return 'center';
});

add_filter( 'bizberg_header_2_position', function(){
	return 'left';
});

function bizberg_shop_get_menu_woocommerce_label(){

    ob_start();
    
    $woocommerce_category_menu_text = bizberg_get_theme_mod( 'woocommerce_category_menu_text' ); ?>

<i class="fas fa-bars"></i>
<span><?php echo esc_html( $woocommerce_category_menu_text ); ?></span>
<h1>h</h1>
<i class="fas fa-angle-down"></i>

<?php

    return ob_get_clean();

}

add_filter('wp_nav_menu_items', 'bizberg_shop_add_woo_cat_on_menus', 10, 2);
function bizberg_shop_add_woo_cat_on_menus( $items, $args ){

    $bizberg_shop_woo_cat_main_menu_status = bizberg_get_theme_mod( 'bizberg_shop_woo_cat_main_menu_status' );

	if( $args->theme_location == 'menu-1' && class_exists( 'WooCommerce' ) && $bizberg_shop_woo_cat_main_menu_status == true ){ 

		ob_start(); 

        $exclude_categories_unfilter =  bizberg_get_theme_mod( 'woo_exclude_categories' , array() );
        $exclude_categories_unfilter = is_array( $exclude_categories_unfilter ) ? $exclude_categories_unfilter : json_decode( urldecode( $exclude_categories_unfilter ), true );
        $exclude_categories_filter   = wp_list_pluck( $exclude_categories_unfilter, 'link_text' ); ?>

<li class="bizberg_shop_browse_cat <?php echo esc_attr( bizberg_get_theme_mod( 'default_woo_category_dropdown' ) ); ?>">

    <a href="javascript:void(0)" class="woo_cat_link">
        <?php echo wp_kses_post( bizberg_shop_get_menu_woocommerce_label() ); ?>
    </a>

    <?php
            // $args1 = array(
            //     'taxonomy'   => 'product_cat',
            //     'title_li'   => '',
            //     'hide_empty' => 1,
            //     'show_count' => 0,
            //     'exclude'    => array_filter( $exclude_categories_filter ),
            //     'depth'      => bizberg_get_theme_mod( 'woocommerce_category_menu_depth' )
            // );
             $args1 = array(
                'taxonomy'   => 'product_cat',
                'title_li'   => '',
                'hide_empty' => 1,
                'show_count' => 0,
                'exclude'    => array_filter( $exclude_categories_filter ),
                'depth'      => bizberg_get_theme_mod( 'woocommerce_category_menu_depth' )
            );
            $args = array(
        'post_type'      => 'product',
        'taxonomy'   => 'product_cat',
        'parent'    => 0 ,
        'number'=>12,
        // 'order' => 'desc',
    );
    // render category menu hiển thị menu category
    $categories = get_categories( $args );
        echo '<ul id="categories-menu-product-comestic" class="product_cats_menu">';
        echo '<li class="cat-item" > <img 
        src="https://bizweb.dktcdn.net/100/426/076/themes/877813/assets/menu_icon_1.png?1667286845678" alt ="ưu đãi"/> <a>Ưu đãi hot 49%</a>';
       forEach($categories as $category){
	    $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
       
        printf ('<li class="cat-item" >') ;
        printf('<img src="'.$image.'" alt="'.$category->name.'">') ;
        printf('<a href="%1$s" class="button"><span>%2$s</span> </a>',
        esc_url(get_category_link($category->term_id)),
        esc_html($category->name));
        printf('</li>');
}
            echo '</ul>'; 
     

   ?>

</li>

<?php

		$content = ob_get_clean();
      	$content .= $items;
		return $content;

	}

    return $items;

}

add_filter( 'bizberg_theme_output_css', function( $css ){

    $css[] = array(
        'element'  => 'header .navbar-default .navbar-nav > li.bizberg_shop_browse_cat > a',
        'property'      => 'background',
        'value_pattern' => '$'
    );

    $css[] =  array(
        'element'  => 'header .navbar-default .navbar-nav > li.bizberg_shop_browse_cat > a',
        'property' => 'border-color',
        'sanitize_callback' => 'bizberg_adjustBrightness',
    );

    return $css;

});

function bizberg_shop_get_woocommerce_categories( $only_parent = false, $woo_default_shortcodes = false ){

    $args = array(
        'taxonomy' => 'product_cat',
        'hide_empty' => true
    );

    if( $only_parent == true ){
        $args['parent'] = 0;
    }

    $terms = get_terms( $args );

    if( empty($terms) || !is_array( $terms ) ){
        return array();
    }

    $data = array();

    if( $woo_default_shortcodes ){
        $data['featured_products']     = '--- ' . esc_html__( 'FEATURED PRODUCTS', 'bizberg-shop' ) . ' ---';
        $data['sale_products']         = '--- ' . esc_html__( 'SALE PRODUCTS', 'bizberg-shop' ) . ' ---';
        $data['best_selling_products'] = '--- ' . esc_html__( 'BEST SELLING PRODUCTS', 'bizberg-shop' ) . ' ---';
        $data['recent_products']       = '--- ' . esc_html__( 'RECENT PRODUCTS', 'bizberg-shop' ) . ' ---';
        $data['top_rated_products']    = '--- ' . esc_html__( 'TOP RATED PRODUCTS', 'bizberg-shop' ) . ' ---';
    }

    foreach ( $terms as $key => $value) {
        $term_id = absint( $value->term_id );
        $data[$term_id] =  esc_html( $value->name );
    }

    $data[0] = esc_html__( 'None' , 'bizberg-shop' );

    return $data;

}

add_filter( 'bizberg_inline_style', 'bizberg_shop_add_inline_css_product_cat' );
function bizberg_shop_add_inline_css_product_cat( $css ){

    $width = bizberg_get_theme_mod( 'woocommerce_category_menu_width' , 260 );

    $css .= '.navbar-nav .product_cats_menu ul {left:' . ( $width - 1 ) . 'px}';

    return $css;

}

add_filter( 'bizberg_inline_style', 'bizberg_shop_add_inline_css_product_reapeater_title' );
function bizberg_shop_add_inline_css_product_reapeater_title( $css ){

    $data = bizberg_get_theme_mod( 'repeater_products_frontpage' );
    $data = is_array( $data ) ? $data : json_decode( urldecode( $data ), true );

    if( !empty( $data ) && is_array( $data ) ){

        foreach ( $data as $key => $value ) {
            
            if( !empty( $value['title_color'] ) ){

                $title_color = !empty( $value['title_color'] ) ? sanitize_text_field( $value['title_color'] ) : '';

                $css .= '.bs_repeater_product h3.product_title_' . absint( $key ) . '::before{ background : ' . $title_color . ' }';

            }

        }

    }

    return $css;

}

add_filter( 'bizberg_inline_style', 'bizberg_shop_add_inline_css_slider_transform' );
function bizberg_shop_add_inline_css_slider_transform( $css ){

    $data = bizberg_get_theme_mod( 'woo_slider_pages' );
    $data = is_array( $data ) ? $data : json_decode( urldecode( $data ), true );

    if( !empty( $data ) && is_array( $data ) ){

        foreach ( $data as $key => $value ) {
            
            if( !empty( $value['page'] ) && !empty( $value['translate_x'] ) ){

                $translate_x = !empty( $value['translate_x'] ) ? sanitize_text_field( $value['translate_x'] ) . '%' : '0%';

                $css .= '.slide_id_' . absint( $value['page'] ) . '{ transform: translate( ' . $translate_x . ', -50%) }';

            }

        }

    }

    return $css;

}

function bizberg_shop_fontawesome_unicode(){

    return ["abacus"=>"f640","acorn"=>"f6ae","ad"=>"f641","address-book"=>"f2b9","address-card"=>"f2bb","adjust"=>"f042","air-conditioner"=>"f8f4","air-freshener"=>"f5d0","alarm-clock"=>"f34e","alarm-exclamation"=>"f843","alarm-plus"=>"f844","alarm-snooze"=>"f845","album"=>"f89f","album-collection"=>"f8a0","alicorn"=>"f6b0","alien"=>"f8f5","alien-monster"=>"f8f6","align-center"=>"f037","align-justify"=>"f039","align-left"=>"f036","align-right"=>"f038","align-slash"=>"f846","allergies"=>"f461","ambulance"=>"f0f9","american-sign-language-interpreting"=>"f2a3","amp-guitar"=>"f8a1","analytics"=>"f643","anchor"=>"f13d","angel"=>"f779","angle-double-down"=>"f103","angle-double-left"=>"f100","angle-double-right"=>"f101","angle-double-up"=>"f102","angle-down"=>"f107","angle-left"=>"f104","angle-right"=>"f105","angle-up"=>"f106","angry"=>"f556","ankh"=>"f644","apple-alt"=>"f5d1","apple-crate"=>"f6b1","archive"=>"f187","archway"=>"f557","arrow-alt-circle-down"=>"f358","arrow-alt-circle-left"=>"f359","arrow-alt-circle-right"=>"f35a","arrow-alt-circle-up"=>"f35b","arrow-alt-down"=>"f354","arrow-alt-from-bottom"=>"f346","arrow-alt-from-left"=>"f347","arrow-alt-from-right"=>"f348","arrow-alt-from-top"=>"f349","arrow-alt-left"=>"f355","arrow-alt-right"=>"f356","arrow-alt-square-down"=>"f350","arrow-alt-square-left"=>"f351","arrow-alt-square-right"=>"f352","arrow-alt-square-up"=>"f353","arrow-alt-to-bottom"=>"f34a","arrow-alt-to-left"=>"f34b","arrow-alt-to-right"=>"f34c","arrow-alt-to-top"=>"f34d","arrow-alt-up"=>"f357","arrow-circle-down"=>"f0ab","arrow-circle-left"=>"f0a8","arrow-circle-right"=>"f0a9","arrow-circle-up"=>"f0aa","arrow-down"=>"f063","arrow-from-bottom"=>"f342","arrow-from-left"=>"f343","arrow-from-right"=>"f344","arrow-from-top"=>"f345","arrow-left"=>"f060","arrow-right"=>"f061","arrow-square-down"=>"f339","arrow-square-left"=>"f33a","arrow-square-right"=>"f33b","arrow-square-up"=>"f33c","arrow-to-bottom"=>"f33d","arrow-to-left"=>"f33e","arrow-to-right"=>"f340","arrow-to-top"=>"f341","arrow-up"=>"f062","arrows"=>"f047","arrows-alt"=>"f0b2","arrows-alt-h"=>"f337","arrows-alt-v"=>"f338","arrows-h"=>"f07e","arrows-v"=>"f07d","assistive-listening-systems"=>"f2a2","asterisk"=>"f069","at"=>"f1fa","atlas"=>"f558","atom"=>"f5d2","atom-alt"=>"f5d3","audio-description"=>"f29e","award"=>"f559","axe"=>"f6b2","axe-battle"=>"f6b3","baby"=>"f77c","baby-carriage"=>"f77d","backpack"=>"f5d4","backspace"=>"f55a","backward"=>"f04a","bacon"=>"f7e5","bacteria"=>"e059","bacterium"=>"e05a","badge"=>"f335","badge-check"=>"f336","badge-dollar"=>"f645","badge-percent"=>"f646","badge-sheriff"=>"f8a2","badger-honey"=>"f6b4","bags-shopping"=>"f847","bahai"=>"f666","balance-scale"=>"f24e","balance-scale-left"=>"f515","balance-scale-right"=>"f516","ball-pile"=>"f77e","ballot"=>"f732","ballot-check"=>"f733","ban"=>"f05e","band-aid"=>"f462","banjo"=>"f8a3","barcode"=>"f02a","barcode-alt"=>"f463","barcode-read"=>"f464","barcode-scan"=>"f465","bars"=>"f0c9","baseball"=>"f432","baseball-ball"=>"f433","basketball-ball"=>"f434","basketball-hoop"=>"f435","bat"=>"f6b5","bath"=>"f2cd","battery-bolt"=>"f376","battery-empty"=>"f244","battery-full"=>"f240","battery-half"=>"f242","battery-quarter"=>"f243","battery-slash"=>"f377","battery-three-quarters"=>"f241","bed"=>"f236","bed-alt"=>"f8f7","bed-bunk"=>"f8f8","bed-empty"=>"f8f9","beer"=>"f0fc","bell"=>"f0f3","bell-exclamation"=>"f848","bell-on"=>"f8fa","bell-plus"=>"f849","bell-school"=>"f5d5","bell-school-slash"=>"f5d6","bell-slash"=>"f1f6","bells"=>"f77f","betamax"=>"f8a4","bezier-curve"=>"f55b","bible"=>"f647","bicycle"=>"f206","biking"=>"f84a","biking-mountain"=>"f84b","binoculars"=>"f1e5","biohazard"=>"f780","birthday-cake"=>"f1fd","blanket"=>"f498","blender"=>"f517","blender-phone"=>"f6b6","blind"=>"f29d","blinds"=>"f8fb","blinds-open"=>"f8fc","blinds-raised"=>"f8fd","blog"=>"f781","bold"=>"f032","bolt"=>"f0e7","bomb"=>"f1e2","bone"=>"f5d7","bone-break"=>"f5d8","bong"=>"f55c","book"=>"f02d","book-alt"=>"f5d9","book-dead"=>"f6b7","book-heart"=>"f499","book-medical"=>"f7e6","book-open"=>"f518","book-reader"=>"f5da","book-spells"=>"f6b8","book-user"=>"f7e7","bookmark"=>"f02e","books"=>"f5db","books-medical"=>"f7e8","boombox"=>"f8a5","boot"=>"f782","booth-curtain"=>"f734","border-all"=>"f84c","border-bottom"=>"f84d","border-center-h"=>"f89c","border-center-v"=>"f89d","border-inner"=>"f84e","border-left"=>"f84f","border-none"=>"f850","border-outer"=>"f851","border-right"=>"f852","border-style"=>"f853","border-style-alt"=>"f854","border-top"=>"f855","bow-arrow"=>"f6b9","bowling-ball"=>"f436","bowling-pins"=>"f437","box"=>"f466","box-alt"=>"f49a","box-ballot"=>"f735","box-check"=>"f467","box-fragile"=>"f49b","box-full"=>"f49c","box-heart"=>"f49d","box-open"=>"f49e","box-tissue"=>"e05b","box-up"=>"f49f","box-usd"=>"f4a0","boxes"=>"f468","boxes-alt"=>"f4a1","boxing-glove"=>"f438","brackets"=>"f7e9","brackets-curly"=>"f7ea","braille"=>"f2a1","brain"=>"f5dc","bread-loaf"=>"f7eb","bread-slice"=>"f7ec","briefcase"=>"f0b1","briefcase-medical"=>"f469","bring-forward"=>"f856","bring-front"=>"f857","broadcast-tower"=>"f519","broom"=>"f51a","browser"=>"f37e","brush"=>"f55d","bug"=>"f188","building"=>"f1ad","bullhorn"=>"f0a1","bullseye"=>"f140","bullseye-arrow"=>"f648","bullseye-pointer"=>"f649","burger-soda"=>"f858","burn"=>"f46a","burrito"=>"f7ed","bus"=>"f207","bus-alt"=>"f55e","bus-school"=>"f5dd","business-time"=>"f64a","cabinet-filing"=>"f64b","cactus"=>"f8a7","calculator"=>"f1ec","calculator-alt"=>"f64c","calendar"=>"f133","calendar-alt"=>"f073","calendar-check"=>"f274","calendar-day"=>"f783","calendar-edit"=>"f333","calendar-exclamation"=>"f334","calendar-minus"=>"f272","calendar-plus"=>"f271","calendar-star"=>"f736","calendar-times"=>"f273","calendar-week"=>"f784","camcorder"=>"f8a8","camera"=>"f030","camera-alt"=>"f332","camera-home"=>"f8fe","camera-movie"=>"f8a9","camera-polaroid"=>"f8aa","camera-retro"=>"f083","campfire"=>"f6ba","campground"=>"f6bb","candle-holder"=>"f6bc","candy-cane"=>"f786","candy-corn"=>"f6bd","cannabis"=>"f55f","capsules"=>"f46b","car"=>"f1b9","car-alt"=>"f5de","car-battery"=>"f5df","car-building"=>"f859","car-bump"=>"f5e0","car-bus"=>"f85a","car-crash"=>"f5e1","car-garage"=>"f5e2","car-mechanic"=>"f5e3","car-side"=>"f5e4","car-tilt"=>"f5e5","car-wash"=>"f5e6","caravan"=>"f8ff","caravan-alt"=>"e000","caret-circle-down"=>"f32d","caret-circle-left"=>"f32e","caret-circle-right"=>"f330","caret-circle-up"=>"f331","caret-down"=>"f0d7","caret-left"=>"f0d9","caret-right"=>"f0da","caret-square-down"=>"f150","caret-square-left"=>"f191","caret-square-right"=>"f152","caret-square-up"=>"f151","caret-up"=>"f0d8","carrot"=>"f787","cars"=>"f85b","cart-arrow-down"=>"f218","cart-plus"=>"f217","cash-register"=>"f788","cassette-tape"=>"f8ab","cat"=>"f6be","cat-space"=>"e001","cauldron"=>"f6bf","cctv"=>"f8ac","certificate"=>"f0a3","chair"=>"f6c0","chair-office"=>"f6c1","chalkboard"=>"f51b","chalkboard-teacher"=>"f51c","charging-station"=>"f5e7","chart-area"=>"f1fe","chart-bar"=>"f080","chart-line"=>"f201","chart-line-down"=>"f64d","chart-network"=>"f78a","chart-pie"=>"f200","chart-pie-alt"=>"f64e","chart-scatter"=>"f7ee","check"=>"f00c","check-circle"=>"f058","check-double"=>"f560","check-square"=>"f14a","cheese"=>"f7ef","cheese-swiss"=>"f7f0","cheeseburger"=>"f7f1","chess"=>"f439","chess-bishop"=>"f43a","chess-bishop-alt"=>"f43b","chess-board"=>"f43c","chess-clock"=>"f43d","chess-clock-alt"=>"f43e","chess-king"=>"f43f","chess-king-alt"=>"f440","chess-knight"=>"f441","chess-knight-alt"=>"f442","chess-pawn"=>"f443","chess-pawn-alt"=>"f444","chess-queen"=>"f445","chess-queen-alt"=>"f446","chess-rook"=>"f447","chess-rook-alt"=>"f448","chevron-circle-down"=>"f13a","chevron-circle-left"=>"f137","chevron-circle-right"=>"f138","chevron-circle-up"=>"f139","chevron-double-down"=>"f322","chevron-double-left"=>"f323","chevron-double-right"=>"f324","chevron-double-up"=>"f325","chevron-down"=>"f078","chevron-left"=>"f053","chevron-right"=>"f054","chevron-square-down"=>"f329","chevron-square-left"=>"f32a","chevron-square-right"=>"f32b","chevron-square-up"=>"f32c","chevron-up"=>"f077","child"=>"f1ae","chimney"=>"f78b","church"=>"f51d","circle"=>"f111","circle-notch"=>"f1ce","city"=>"f64f","clarinet"=>"f8ad","claw-marks"=>"f6c2","clinic-medical"=>"f7f2","clipboard"=>"f328","clipboard-check"=>"f46c","clipboard-list"=>"f46d","clipboard-list-check"=>"f737","clipboard-prescription"=>"f5e8","clipboard-user"=>"f7f3","clock"=>"f017","clone"=>"f24d","closed-captioning"=>"f20a","cloud"=>"f0c2","cloud-download"=>"f0ed","cloud-download-alt"=>"f381","cloud-drizzle"=>"f738","cloud-hail"=>"f739","cloud-hail-mixed"=>"f73a","cloud-meatball"=>"f73b","cloud-moon"=>"f6c3","cloud-moon-rain"=>"f73c","cloud-music"=>"f8ae","cloud-rain"=>"f73d","cloud-rainbow"=>"f73e","cloud-showers"=>"f73f","cloud-showers-heavy"=>"f740","cloud-sleet"=>"f741","cloud-snow"=>"f742","cloud-sun"=>"f6c4","cloud-sun-rain"=>"f743","cloud-upload"=>"f0ee","cloud-upload-alt"=>"f382","clouds"=>"f744","clouds-moon"=>"f745","clouds-sun"=>"f746","club"=>"f327","cocktail"=>"f561","code"=>"f121","code-branch"=>"f126","code-commit"=>"f386","code-merge"=>"f387","coffee"=>"f0f4","coffee-pot"=>"e002","coffee-togo"=>"f6c5","coffin"=>"f6c6","coffin-cross"=>"e051","cog"=>"f013","cogs"=>"f085","coin"=>"f85c","coins"=>"f51e","columns"=>"f0db","comet"=>"e003","comment"=>"f075","comment-alt"=>"f27a","comment-alt-check"=>"f4a2","comment-alt-dollar"=>"f650","comment-alt-dots"=>"f4a3","comment-alt-edit"=>"f4a4","comment-alt-exclamation"=>"f4a5","comment-alt-lines"=>"f4a6","comment-alt-medical"=>"f7f4","comment-alt-minus"=>"f4a7","comment-alt-music"=>"f8af","comment-alt-plus"=>"f4a8","comment-alt-slash"=>"f4a9","comment-alt-smile"=>"f4aa","comment-alt-times"=>"f4ab","comment-check"=>"f4ac","comment-dollar"=>"f651","comment-dots"=>"f4ad","comment-edit"=>"f4ae","comment-exclamation"=>"f4af","comment-lines"=>"f4b0","comment-medical"=>"f7f5","comment-minus"=>"f4b1","comment-music"=>"f8b0","comment-plus"=>"f4b2","comment-slash"=>"f4b3","comment-smile"=>"f4b4","comment-times"=>"f4b5","comments"=>"f086","comments-alt"=>"f4b6","comments-alt-dollar"=>"f652","comments-dollar"=>"f653","compact-disc"=>"f51f","compass"=>"f14e","compass-slash"=>"f5e9","compress"=>"f066","compress-alt"=>"f422","compress-arrows-alt"=>"f78c","compress-wide"=>"f326","computer-classic"=>"f8b1","computer-speaker"=>"f8b2","concierge-bell"=>"f562","construction"=>"f85d","container-storage"=>"f4b7","conveyor-belt"=>"f46e","conveyor-belt-alt"=>"f46f","cookie"=>"f563","cookie-bite"=>"f564","copy"=>"f0c5","copyright"=>"f1f9","corn"=>"f6c7","couch"=>"f4b8","cow"=>"f6c8","cowbell"=>"f8b3","cowbell-more"=>"f8b4","credit-card"=>"f09d","credit-card-blank"=>"f389","credit-card-front"=>"f38a","cricket"=>"f449","croissant"=>"f7f6","crop"=>"f125","crop-alt"=>"f565","cross"=>"f654","crosshairs"=>"f05b","crow"=>"f520","crown"=>"f521","crutch"=>"f7f7","crutches"=>"f7f8","cube"=>"f1b2","cubes"=>"f1b3","curling"=>"f44a","cut"=>"f0c4","dagger"=>"f6cb","database"=>"f1c0","deaf"=>"f2a4","debug"=>"f7f9","deer"=>"f78e","deer-rudolph"=>"f78f","democrat"=>"f747","desktop"=>"f108","desktop-alt"=>"f390","dewpoint"=>"f748","dharmachakra"=>"f655","diagnoses"=>"f470","diamond"=>"f219","dice"=>"f522","dice-d10"=>"f6cd","dice-d12"=>"f6ce","dice-d20"=>"f6cf","dice-d4"=>"f6d0","dice-d6"=>"f6d1","dice-d8"=>"f6d2","dice-five"=>"f523","dice-four"=>"f524","dice-one"=>"f525","dice-six"=>"f526","dice-three"=>"f527","dice-two"=>"f528","digging"=>"f85e","digital-tachograph"=>"f566","diploma"=>"f5ea","directions"=>"f5eb","disc-drive"=>"f8b5","disease"=>"f7fa","divide"=>"f529","dizzy"=>"f567","dna"=>"f471","do-not-enter"=>"f5ec","dog"=>"f6d3","dog-leashed"=>"f6d4","dollar-sign"=>"f155","dolly"=>"f472","dolly-empty"=>"f473","dolly-flatbed"=>"f474","dolly-flatbed-alt"=>"f475","dolly-flatbed-empty"=>"f476","donate"=>"f4b9","door-closed"=>"f52a","door-open"=>"f52b","dot-circle"=>"f192","dove"=>"f4ba","download"=>"f019","drafting-compass"=>"f568","dragon"=>"f6d5","draw-circle"=>"f5ed","draw-polygon"=>"f5ee","draw-square"=>"f5ef","dreidel"=>"f792","drone"=>"f85f","drone-alt"=>"f860","drum"=>"f569","drum-steelpan"=>"f56a","drumstick"=>"f6d6","drumstick-bite"=>"f6d7","dryer"=>"f861","dryer-alt"=>"f862","duck"=>"f6d8","dumbbell"=>"f44b","dumpster"=>"f793","dumpster-fire"=>"f794","dungeon"=>"f6d9","ear"=>"f5f0","ear-muffs"=>"f795","eclipse"=>"f749","eclipse-alt"=>"f74a","edit"=>"f044","egg"=>"f7fb","egg-fried"=>"f7fc","eject"=>"f052","elephant"=>"f6da","ellipsis-h"=>"f141","ellipsis-h-alt"=>"f39b","ellipsis-v"=>"f142","ellipsis-v-alt"=>"f39c","empty-set"=>"f656","engine-warning"=>"f5f2","envelope"=>"f0e0","envelope-open"=>"f2b6","envelope-open-dollar"=>"f657","envelope-open-text"=>"f658","envelope-square"=>"f199","equals"=>"f52c","eraser"=>"f12d","ethernet"=>"f796","euro-sign"=>"f153","exchange"=>"f0ec","exchange-alt"=>"f362","exclamation"=>"f12a","exclamation-circle"=>"f06a","exclamation-square"=>"f321","exclamation-triangle"=>"f071","expand"=>"f065","expand-alt"=>"f424","expand-arrows"=>"f31d","expand-arrows-alt"=>"f31e","expand-wide"=>"f320","external-link"=>"f08e","external-link-alt"=>"f35d","external-link-square"=>"f14c","external-link-square-alt"=>"f360","eye"=>"f06e","eye-dropper"=>"f1fb","eye-evil"=>"f6db","eye-slash"=>"f070","fan"=>"f863","fan-table"=>"e004","farm"=>"f864","fast-backward"=>"f049","fast-forward"=>"f050","faucet"=>"e005","faucet-drip"=>"e006","fax"=>"f1ac","feather"=>"f52d","feather-alt"=>"f56b","female"=>"f182","field-hockey"=>"f44c","fighter-jet"=>"f0fb","file"=>"f15b","file-alt"=>"f15c","file-archive"=>"f1c6","file-audio"=>"f1c7","file-certificate"=>"f5f3","file-chart-line"=>"f659","file-chart-pie"=>"f65a","file-check"=>"f316","file-code"=>"f1c9","file-contract"=>"f56c","file-csv"=>"f6dd","file-download"=>"f56d","file-edit"=>"f31c","file-excel"=>"f1c3","file-exclamation"=>"f31a","file-export"=>"f56e","file-image"=>"f1c5","file-import"=>"f56f","file-invoice"=>"f570","file-invoice-dollar"=>"f571","file-medical"=>"f477","file-medical-alt"=>"f478","file-minus"=>"f318","file-music"=>"f8b6","file-pdf"=>"f1c1","file-plus"=>"f319","file-powerpoint"=>"f1c4","file-prescription"=>"f572","file-search"=>"f865","file-signature"=>"f573","file-spreadsheet"=>"f65b","file-times"=>"f317","file-upload"=>"f574","file-user"=>"f65c","file-video"=>"f1c8","file-word"=>"f1c2","files-medical"=>"f7fd","fill"=>"f575","fill-drip"=>"f576","film"=>"f008","film-alt"=>"f3a0","film-canister"=>"f8b7","filter"=>"f0b0","fingerprint"=>"f577","fire"=>"f06d","fire-alt"=>"f7e4","fire-extinguisher"=>"f134","fire-smoke"=>"f74b","fireplace"=>"f79a","first-aid"=>"f479","fish"=>"f578","fish-cooked"=>"f7fe","fist-raised"=>"f6de","flag"=>"f024","flag-alt"=>"f74c","flag-checkered"=>"f11e","flag-usa"=>"f74d","flame"=>"f6df","flashlight"=>"f8b8","flask"=>"f0c3","flask-poison"=>"f6e0","flask-potion"=>"f6e1","flower"=>"f7ff","flower-daffodil"=>"f800","flower-tulip"=>"f801","flushed"=>"f579","flute"=>"f8b9","flux-capacitor"=>"f8ba","fog"=>"f74e","folder"=>"f07b","folder-download"=>"e053","folder-minus"=>"f65d","folder-open"=>"f07c","folder-plus"=>"f65e","folder-times"=>"f65f","folder-tree"=>"f802","folder-upload"=>"e054","folders"=>"f660","font"=>"f031","font-case"=>"f866","football-ball"=>"f44e","football-helmet"=>"f44f","forklift"=>"f47a","forward"=>"f04e","fragile"=>"f4bb","french-fries"=>"f803","frog"=>"f52e","frosty-head"=>"f79b","frown"=>"f119","frown-open"=>"f57a","function"=>"f661","funnel-dollar"=>"f662","futbol"=>"f1e3","galaxy"=>"e008","game-board"=>"f867","game-board-alt"=>"f868","game-console-handheld"=>"f8bb","gamepad"=>"f11b","gamepad-alt"=>"f8bc","garage"=>"e009","garage-car"=>"e00a","garage-open"=>"e00b","gas-pump"=>"f52f","gas-pump-slash"=>"f5f4","gavel"=>"f0e3","gem"=>"f3a5","genderless"=>"f22d","ghost"=>"f6e2","gift"=>"f06b","gift-card"=>"f663","gifts"=>"f79c","gingerbread-man"=>"f79d","glass"=>"f804","glass-champagne"=>"f79e","glass-cheers"=>"f79f","glass-citrus"=>"f869","glass-martini"=>"f000","glass-martini-alt"=>"f57b","glass-whiskey"=>"f7a0","glass-whiskey-rocks"=>"f7a1","glasses"=>"f530","glasses-alt"=>"f5f5","globe"=>"f0ac","globe-africa"=>"f57c","globe-americas"=>"f57d","globe-asia"=>"f57e","globe-europe"=>"f7a2","globe-snow"=>"f7a3","globe-stand"=>"f5f6","golf-ball"=>"f450","golf-club"=>"f451","gopuram"=>"f664","graduation-cap"=>"f19d","gramophone"=>"f8bd","greater-than"=>"f531","greater-than-equal"=>"f532","grimace"=>"f57f","grin"=>"f580","grin-alt"=>"f581","grin-beam"=>"f582","grin-beam-sweat"=>"f583","grin-hearts"=>"f584","grin-squint"=>"f585","grin-squint-tears"=>"f586","grin-stars"=>"f587","grin-tears"=>"f588","grin-tongue"=>"f589","grin-tongue-squint"=>"f58a","grin-tongue-wink"=>"f58b","grin-wink"=>"f58c","grip-horizontal"=>"f58d","grip-lines"=>"f7a4","grip-lines-vertical"=>"f7a5","grip-vertical"=>"f58e","guitar"=>"f7a6","guitar-electric"=>"f8be","guitars"=>"f8bf","h-square"=>"f0fd","h1"=>"f313","h2"=>"f314","h3"=>"f315","h4"=>"f86a","hamburger"=>"f805","hammer"=>"f6e3","hammer-war"=>"f6e4","hamsa"=>"f665","hand-heart"=>"f4bc","hand-holding"=>"f4bd","hand-holding-box"=>"f47b","hand-holding-heart"=>"f4be","hand-holding-magic"=>"f6e5","hand-holding-medical"=>"e05c","hand-holding-seedling"=>"f4bf","hand-holding-usd"=>"f4c0","hand-holding-water"=>"f4c1","hand-lizard"=>"f258","hand-middle-finger"=>"f806","hand-paper"=>"f256","hand-peace"=>"f25b","hand-point-down"=>"f0a7","hand-point-left"=>"f0a5","hand-point-right"=>"f0a4","hand-point-up"=>"f0a6","hand-pointer"=>"f25a","hand-receiving"=>"f47c","hand-rock"=>"f255","hand-scissors"=>"f257","hand-sparkles"=>"e05d","hand-spock"=>"f259","hands"=>"f4c2","hands-heart"=>"f4c3","hands-helping"=>"f4c4","hands-usd"=>"f4c5","hands-wash"=>"e05e","handshake"=>"f2b5","handshake-alt"=>"f4c6","handshake-alt-slash"=>"e05f","handshake-slash"=>"e060","hanukiah"=>"f6e6","hard-hat"=>"f807","hashtag"=>"f292","hat-chef"=>"f86b","hat-cowboy"=>"f8c0","hat-cowboy-side"=>"f8c1","hat-santa"=>"f7a7","hat-winter"=>"f7a8","hat-witch"=>"f6e7","hat-wizard"=>"f6e8","hdd"=>"f0a0","head-side"=>"f6e9","head-side-brain"=>"f808","head-side-cough"=>"e061","head-side-cough-slash"=>"e062","head-side-headphones"=>"f8c2","head-side-mask"=>"e063","head-side-medical"=>"f809","head-side-virus"=>"e064","head-vr"=>"f6ea","heading"=>"f1dc","headphones"=>"f025","headphones-alt"=>"f58f","headset"=>"f590","heart"=>"f004","heart-broken"=>"f7a9","heart-circle"=>"f4c7","heart-rate"=>"f5f8","heart-square"=>"f4c8","heartbeat"=>"f21e","heat"=>"e00c","helicopter"=>"f533","helmet-battle"=>"f6eb","hexagon"=>"f312","highlighter"=>"f591","hiking"=>"f6ec","hippo"=>"f6ed","history"=>"f1da","hockey-mask"=>"f6ee","hockey-puck"=>"f453","hockey-sticks"=>"f454","holly-berry"=>"f7aa","home"=>"f015","home-alt"=>"f80a","home-heart"=>"f4c9","home-lg"=>"f80b","home-lg-alt"=>"f80c","hood-cloak"=>"f6ef","horizontal-rule"=>"f86c","horse"=>"f6f0","horse-head"=>"f7ab","horse-saddle"=>"f8c3","hospital"=>"f0f8","hospital-alt"=>"f47d","hospital-symbol"=>"f47e","hospital-user"=>"f80d","hospitals"=>"f80e","hot-tub"=>"f593","hotdog"=>"f80f","hotel"=>"f594","hourglass"=>"f254","hourglass-end"=>"f253","hourglass-half"=>"f252","hourglass-start"=>"f251","house"=>"e00d","house-damage"=>"f6f1","house-day"=>"e00e","house-flood"=>"f74f","house-leave"=>"e00f","house-night"=>"e010","house-return"=>"e011","house-signal"=>"e012","house-user"=>"e065","hryvnia"=>"f6f2","humidity"=>"f750","hurricane"=>"f751","i-cursor"=>"f246","ice-cream"=>"f810","ice-skate"=>"f7ac","icicles"=>"f7ad","icons"=>"f86d","icons-alt"=>"f86e","id-badge"=>"f2c1","id-card"=>"f2c2","id-card-alt"=>"f47f","igloo"=>"f7ae","image"=>"f03e","image-polaroid"=>"f8c4","images"=>"f302","inbox"=>"f01c","inbox-in"=>"f310","inbox-out"=>"f311","indent"=>"f03c","industry"=>"f275","industry-alt"=>"f3b3","infinity"=>"f534","info"=>"f129","info-circle"=>"f05a","info-square"=>"f30f","inhaler"=>"f5f9","integral"=>"f667","intersection"=>"f668","inventory"=>"f480","island-tropical"=>"f811","italic"=>"f033","jack-o-lantern"=>"f30e","jedi"=>"f669","joint"=>"f595","journal-whills"=>"f66a","joystick"=>"f8c5","jug"=>"f8c6","kaaba"=>"f66b","kazoo"=>"f8c7","kerning"=>"f86f","key"=>"f084","key-skeleton"=>"f6f3","keyboard"=>"f11c","keynote"=>"f66c","khanda"=>"f66d","kidneys"=>"f5fb","kiss"=>"f596","kiss-beam"=>"f597","kiss-wink-heart"=>"f598","kite"=>"f6f4","kiwi-bird"=>"f535","knife-kitchen"=>"f6f5","lambda"=>"f66e","lamp"=>"f4ca","lamp-desk"=>"e014","lamp-floor"=>"e015","landmark"=>"f66f","landmark-alt"=>"f752","language"=>"f1ab","laptop"=>"f109","laptop-code"=>"f5fc","laptop-house"=>"e066","laptop-medical"=>"f812","lasso"=>"f8c8","laugh"=>"f599","laugh-beam"=>"f59a","laugh-squint"=>"f59b","laugh-wink"=>"f59c","layer-group"=>"f5fd","layer-minus"=>"f5fe","layer-plus"=>"f5ff","leaf"=>"f06c","leaf-heart"=>"f4cb","leaf-maple"=>"f6f6","leaf-oak"=>"f6f7","lemon"=>"f094","less-than"=>"f536","less-than-equal"=>"f537","level-down"=>"f149","level-down-alt"=>"f3be","level-up"=>"f148","level-up-alt"=>"f3bf","life-ring"=>"f1cd","light-ceiling"=>"e016","light-switch"=>"e017","light-switch-off"=>"e018","light-switch-on"=>"e019","lightbulb"=>"f0eb","lightbulb-dollar"=>"f670","lightbulb-exclamation"=>"f671","lightbulb-on"=>"f672","lightbulb-slash"=>"f673","lights-holiday"=>"f7b2","line-columns"=>"f870","line-height"=>"f871","link"=>"f0c1","lips"=>"f600","lira-sign"=>"f195","list"=>"f03a","list-alt"=>"f022","list-music"=>"f8c9","list-ol"=>"f0cb","list-ul"=>"f0ca","location"=>"f601","location-arrow"=>"f124","location-circle"=>"f602","location-slash"=>"f603","lock"=>"f023","lock-alt"=>"f30d","lock-open"=>"f3c1","lock-open-alt"=>"f3c2","long-arrow-alt-down"=>"f309","long-arrow-alt-left"=>"f30a","long-arrow-alt-right"=>"f30b","long-arrow-alt-up"=>"f30c","long-arrow-down"=>"f175","long-arrow-left"=>"f177","long-arrow-right"=>"f178","long-arrow-up"=>"f176","loveseat"=>"f4cc","low-vision"=>"f2a8","luchador"=>"f455","luggage-cart"=>"f59d","lungs"=>"f604","lungs-virus"=>"e067","mace"=>"f6f8","magic"=>"f0d0","magnet"=>"f076","mail-bulk"=>"f674","mailbox"=>"f813","male"=>"f183","mandolin"=>"f6f9","map"=>"f279","map-marked"=>"f59f","map-marked-alt"=>"f5a0","map-marker"=>"f041","map-marker-alt"=>"f3c5","map-marker-alt-slash"=>"f605","map-marker-check"=>"f606","map-marker-edit"=>"f607","map-marker-exclamation"=>"f608","map-marker-minus"=>"f609","map-marker-plus"=>"f60a","map-marker-question"=>"f60b","map-marker-slash"=>"f60c","map-marker-smile"=>"f60d","map-marker-times"=>"f60e","map-pin"=>"f276","map-signs"=>"f277","marker"=>"f5a1","mars"=>"f222","mars-double"=>"f227","mars-stroke"=>"f229","mars-stroke-h"=>"f22b","mars-stroke-v"=>"f22a","mask"=>"f6fa","meat"=>"f814","medal"=>"f5a2","medkit"=>"f0fa","megaphone"=>"f675","meh"=>"f11a","meh-blank"=>"f5a4","meh-rolling-eyes"=>"f5a5","memory"=>"f538","menorah"=>"f676","mercury"=>"f223","meteor"=>"f753","microchip"=>"f2db","microphone"=>"f130","microphone-alt"=>"f3c9","microphone-alt-slash"=>"f539","microphone-slash"=>"f131","microphone-stand"=>"f8cb","microscope"=>"f610","microwave"=>"e01b","mind-share"=>"f677","minus"=>"f068","minus-circle"=>"f056","minus-hexagon"=>"f307","minus-octagon"=>"f308","minus-square"=>"f146","mistletoe"=>"f7b4","mitten"=>"f7b5","mobile"=>"f10b","mobile-alt"=>"f3cd","mobile-android"=>"f3ce","mobile-android-alt"=>"f3cf","money-bill"=>"f0d6","money-bill-alt"=>"f3d1","money-bill-wave"=>"f53a","money-bill-wave-alt"=>"f53b","money-check"=>"f53c","money-check-alt"=>"f53d","money-check-edit"=>"f872","money-check-edit-alt"=>"f873","monitor-heart-rate"=>"f611","monkey"=>"f6fb","monument"=>"f5a6","moon"=>"f186","moon-cloud"=>"f754","moon-stars"=>"f755","mortar-pestle"=>"f5a7","mosque"=>"f678","motorcycle"=>"f21c","mountain"=>"f6fc","mountains"=>"f6fd","mouse"=>"f8cc","mouse-alt"=>"f8cd","mouse-pointer"=>"f245","mp3-player"=>"f8ce","mug"=>"f874","mug-hot"=>"f7b6","mug-marshmallows"=>"f7b7","mug-tea"=>"f875","music"=>"f001","music-alt"=>"f8cf","music-alt-slash"=>"f8d0","music-slash"=>"f8d1","narwhal"=>"f6fe","network-wired"=>"f6ff","neuter"=>"f22c","newspaper"=>"f1ea","not-equal"=>"f53e","notes-medical"=>"f481","object-group"=>"f247","object-ungroup"=>"f248","octagon"=>"f306","oil-can"=>"f613","oil-temp"=>"f614","om"=>"f679","omega"=>"f67a","ornament"=>"f7b8","otter"=>"f700","outdent"=>"f03b","outlet"=>"e01c","oven"=>"e01d","overline"=>"f876","page-break"=>"f877","pager"=>"f815","paint-brush"=>"f1fc","paint-brush-alt"=>"f5a9","paint-roller"=>"f5aa","palette"=>"f53f","pallet"=>"f482","pallet-alt"=>"f483","paper-plane"=>"f1d8","paperclip"=>"f0c6","parachute-box"=>"f4cd","paragraph"=>"f1dd","paragraph-rtl"=>"f878","parking"=>"f540","parking-circle"=>"f615","parking-circle-slash"=>"f616","parking-slash"=>"f617","passport"=>"f5ab","pastafarianism"=>"f67b","paste"=>"f0ea","pause"=>"f04c","pause-circle"=>"f28b","paw"=>"f1b0","paw-alt"=>"f701","paw-claws"=>"f702","peace"=>"f67c","pegasus"=>"f703","pen"=>"f304","pen-alt"=>"f305","pen-fancy"=>"f5ac","pen-nib"=>"f5ad","pen-square"=>"f14b","pencil"=>"f040","pencil-alt"=>"f303","pencil-paintbrush"=>"f618","pencil-ruler"=>"f5ae","pennant"=>"f456","people-arrows"=>"e068","people-carry"=>"f4ce","pepper-hot"=>"f816","percent"=>"f295","percentage"=>"f541","person-booth"=>"f756","person-carry"=>"f4cf","person-dolly"=>"f4d0","person-dolly-empty"=>"f4d1","person-sign"=>"f757","phone"=>"f095","phone-alt"=>"f879","phone-laptop"=>"f87a","phone-office"=>"f67d","phone-plus"=>"f4d2","phone-rotary"=>"f8d3","phone-slash"=>"f3dd","phone-square"=>"f098","phone-square-alt"=>"f87b","phone-volume"=>"f2a0","photo-video"=>"f87c","pi"=>"f67e","piano"=>"f8d4","piano-keyboard"=>"f8d5","pie"=>"f705","pig"=>"f706","piggy-bank"=>"f4d3","pills"=>"f484","pizza"=>"f817","pizza-slice"=>"f818","place-of-worship"=>"f67f","plane"=>"f072","plane-alt"=>"f3de","plane-arrival"=>"f5af","plane-departure"=>"f5b0","plane-slash"=>"e069","planet-moon"=>"e01f","planet-ringed"=>"e020","play"=>"f04b","play-circle"=>"f144","plug"=>"f1e6","plus"=>"f067","plus-circle"=>"f055","plus-hexagon"=>"f300","plus-octagon"=>"f301","plus-square"=>"f0fe","podcast"=>"f2ce","podium"=>"f680","podium-star"=>"f758","police-box"=>"e021","poll"=>"f681","poll-h"=>"f682","poll-people"=>"f759","poo"=>"f2fe","poo-storm"=>"f75a","poop"=>"f619","popcorn"=>"f819","portal-enter"=>"e022","portal-exit"=>"e023","portrait"=>"f3e0","pound-sign"=>"f154","power-off"=>"f011","pray"=>"f683","praying-hands"=>"f684","prescription"=>"f5b1","prescription-bottle"=>"f485","prescription-bottle-alt"=>"f486","presentation"=>"f685","print"=>"f02f","print-search"=>"f81a","print-slash"=>"f686","procedures"=>"f487","project-diagram"=>"f542","projector"=>"f8d6","pump-medical"=>"e06a","pump-soap"=>"e06b","pumpkin"=>"f707","puzzle-piece"=>"f12e","qrcode"=>"f029","question"=>"f128","question-circle"=>"f059","question-square"=>"f2fd","quidditch"=>"f458","quote-left"=>"f10d","quote-right"=>"f10e","quran"=>"f687","rabbit"=>"f708","rabbit-fast"=>"f709","racquet"=>"f45a","radar"=>"e024","radiation"=>"f7b9","radiation-alt"=>"f7ba","radio"=>"f8d7","radio-alt"=>"f8d8","rainbow"=>"f75b","raindrops"=>"f75c","ram"=>"f70a","ramp-loading"=>"f4d4","random"=>"f074","raygun"=>"e025","receipt"=>"f543","record-vinyl"=>"f8d9","rectangle-landscape"=>"f2fa","rectangle-portrait"=>"f2fb","rectangle-wide"=>"f2fc","recycle"=>"f1b8","redo"=>"f01e","redo-alt"=>"f2f9","refrigerator"=>"e026","registered"=>"f25d","remove-format"=>"f87d","repeat"=>"f363","repeat-1"=>"f365","repeat-1-alt"=>"f366","repeat-alt"=>"f364","reply"=>"f3e5","reply-all"=>"f122","republican"=>"f75e","restroom"=>"f7bd","retweet"=>"f079","retweet-alt"=>"f361","ribbon"=>"f4d6","ring"=>"f70b","rings-wedding"=>"f81b","road"=>"f018","robot"=>"f544","rocket"=>"f135","rocket-launch"=>"e027","route"=>"f4d7","route-highway"=>"f61a","route-interstate"=>"f61b","router"=>"f8da","rss"=>"f09e","rss-square"=>"f143","ruble-sign"=>"f158","ruler"=>"f545","ruler-combined"=>"f546","ruler-horizontal"=>"f547","ruler-triangle"=>"f61c","ruler-vertical"=>"f548","running"=>"f70c","rupee-sign"=>"f156","rv"=>"f7be","sack"=>"f81c","sack-dollar"=>"f81d","sad-cry"=>"f5b3","sad-tear"=>"f5b4","salad"=>"f81e","sandwich"=>"f81f","satellite"=>"f7bf","satellite-dish"=>"f7c0","sausage"=>"f820","save"=>"f0c7","sax-hot"=>"f8db","saxophone"=>"f8dc","scalpel"=>"f61d","scalpel-path"=>"f61e","scanner"=>"f488","scanner-image"=>"f8f3","scanner-keyboard"=>"f489","scanner-touchscreen"=>"f48a","scarecrow"=>"f70d","scarf"=>"f7c1","school"=>"f549","screwdriver"=>"f54a","scroll"=>"f70e","scroll-old"=>"f70f","scrubber"=>"f2f8","scythe"=>"f710","sd-card"=>"f7c2","search"=>"f002","search-dollar"=>"f688","search-location"=>"f689","search-minus"=>"f010","search-plus"=>"f00e","seedling"=>"f4d8","send-back"=>"f87e","send-backward"=>"f87f","sensor"=>"e028","sensor-alert"=>"e029","sensor-fire"=>"e02a","sensor-on"=>"e02b","sensor-smoke"=>"e02c","server"=>"f233","shapes"=>"f61f","share"=>"f064","share-all"=>"f367","share-alt"=>"f1e0","share-alt-square"=>"f1e1","share-square"=>"f14d","sheep"=>"f711","shekel-sign"=>"f20b","shield"=>"f132","shield-alt"=>"f3ed","shield-check"=>"f2f7","shield-cross"=>"f712","shield-virus"=>"e06c","ship"=>"f21a","shipping-fast"=>"f48b","shipping-timed"=>"f48c","shish-kebab"=>"f821","shoe-prints"=>"f54b","shopping-bag"=>"f290","shopping-basket"=>"f291","shopping-cart"=>"f07a","shovel"=>"f713","shovel-snow"=>"f7c3","shower"=>"f2cc","shredder"=>"f68a","shuttle-van"=>"f5b6","shuttlecock"=>"f45b","sickle"=>"f822","sigma"=>"f68b","sign"=>"f4d9","sign-in"=>"f090","sign-in-alt"=>"f2f6","sign-language"=>"f2a7","sign-out"=>"f08b","sign-out-alt"=>"f2f5","signal"=>"f012","signal-1"=>"f68c","signal-2"=>"f68d","signal-3"=>"f68e","signal-4"=>"f68f","signal-alt"=>"f690","signal-alt-1"=>"f691","signal-alt-2"=>"f692","signal-alt-3"=>"f693","signal-alt-slash"=>"f694","signal-slash"=>"f695","signal-stream"=>"f8dd","signature"=>"f5b7","sim-card"=>"f7c4","sink"=>"e06d","siren"=>"e02d","siren-on"=>"e02e","sitemap"=>"f0e8","skating"=>"f7c5","skeleton"=>"f620","ski-jump"=>"f7c7","ski-lift"=>"f7c8","skiing"=>"f7c9","skiing-nordic"=>"f7ca","skull"=>"f54c","skull-cow"=>"f8de","skull-crossbones"=>"f714","slash"=>"f715","sledding"=>"f7cb","sleigh"=>"f7cc","sliders-h"=>"f1de","sliders-h-square"=>"f3f0","sliders-v"=>"f3f1","sliders-v-square"=>"f3f2","smile"=>"f118","smile-beam"=>"f5b8","smile-plus"=>"f5b9","smile-wink"=>"f4da","smog"=>"f75f","smoke"=>"f760","smoking"=>"f48d","smoking-ban"=>"f54d","sms"=>"f7cd","snake"=>"f716","snooze"=>"f880","snow-blowing"=>"f761","snowboarding"=>"f7ce","snowflake"=>"f2dc","snowflakes"=>"f7cf","snowman"=>"f7d0","snowmobile"=>"f7d1","snowplow"=>"f7d2","soap"=>"e06e","socks"=>"f696","solar-panel"=>"f5ba","solar-system"=>"e02f","sort"=>"f0dc","sort-alpha-down"=>"f15d","sort-alpha-down-alt"=>"f881","sort-alpha-up"=>"f15e","sort-alpha-up-alt"=>"f882","sort-alt"=>"f883","sort-amount-down"=>"f160","sort-amount-down-alt"=>"f884","sort-amount-up"=>"f161","sort-amount-up-alt"=>"f885","sort-circle"=>"e030","sort-circle-down"=>"e031","sort-circle-up"=>"e032","sort-down"=>"f0dd","sort-numeric-down"=>"f162","sort-numeric-down-alt"=>"f886","sort-numeric-up"=>"f163","sort-numeric-up-alt"=>"f887","sort-shapes-down"=>"f888","sort-shapes-down-alt"=>"f889","sort-shapes-up"=>"f88a","sort-shapes-up-alt"=>"f88b","sort-size-down"=>"f88c","sort-size-down-alt"=>"f88d","sort-size-up"=>"f88e","sort-size-up-alt"=>"f88f","sort-up"=>"f0de","soup"=>"f823","spa"=>"f5bb","space-shuttle"=>"f197","space-station-moon"=>"e033","space-station-moon-alt"=>"e034","spade"=>"f2f4","sparkles"=>"f890","speaker"=>"f8df","speakers"=>"f8e0","spell-check"=>"f891","spider"=>"f717","spider-black-widow"=>"f718","spider-web"=>"f719","spinner"=>"f110","spinner-third"=>"f3f4","splotch"=>"f5bc","spray-can"=>"f5bd","sprinkler"=>"e035","square"=>"f0c8","square-full"=>"f45c","square-root"=>"f697","square-root-alt"=>"f698","squirrel"=>"f71a","staff"=>"f71b","stamp"=>"f5bf","star"=>"f005","star-and-crescent"=>"f699","star-christmas"=>"f7d4","star-exclamation"=>"f2f3","star-half"=>"f089","star-half-alt"=>"f5c0","star-of-david"=>"f69a","star-of-life"=>"f621","star-shooting"=>"e036","starfighter"=>"e037","starfighter-alt"=>"e038","stars"=>"f762","starship"=>"e039","starship-freighter"=>"e03a","steak"=>"f824","steering-wheel"=>"f622","step-backward"=>"f048","step-forward"=>"f051","stethoscope"=>"f0f1","sticky-note"=>"f249","stocking"=>"f7d5","stomach"=>"f623","stop"=>"f04d","stop-circle"=>"f28d","stopwatch"=>"f2f2","stopwatch-20"=>"e06f","store"=>"f54e","store-alt"=>"f54f","store-alt-slash"=>"e070","store-slash"=>"e071","stream"=>"f550","street-view"=>"f21d","stretcher"=>"f825","strikethrough"=>"f0cc","stroopwafel"=>"f551","subscript"=>"f12c","subway"=>"f239","suitcase"=>"f0f2","suitcase-rolling"=>"f5c1","sun"=>"f185","sun-cloud"=>"f763","sun-dust"=>"f764","sun-haze"=>"f765","sunglasses"=>"f892","sunrise"=>"f766","sunset"=>"f767","superscript"=>"f12b","surprise"=>"f5c2","swatchbook"=>"f5c3","swimmer"=>"f5c4","swimming-pool"=>"f5c5","sword"=>"f71c","sword-laser"=>"e03b","sword-laser-alt"=>"e03c","swords"=>"f71d","swords-laser"=>"e03d","synagogue"=>"f69b","sync"=>"f021","sync-alt"=>"f2f1","syringe"=>"f48e","table"=>"f0ce","table-tennis"=>"f45d","tablet"=>"f10a","tablet-alt"=>"f3fa","tablet-android"=>"f3fb","tablet-android-alt"=>"f3fc","tablet-rugged"=>"f48f","tablets"=>"f490","tachometer"=>"f0e4","tachometer-alt"=>"f3fd","tachometer-alt-average"=>"f624","tachometer-alt-fast"=>"f625","tachometer-alt-fastest"=>"f626","tachometer-alt-slow"=>"f627","tachometer-alt-slowest"=>"f628","tachometer-average"=>"f629","tachometer-fast"=>"f62a","tachometer-fastest"=>"f62b","tachometer-slow"=>"f62c","tachometer-slowest"=>"f62d","taco"=>"f826","tag"=>"f02b","tags"=>"f02c","tally"=>"f69c","tanakh"=>"f827","tape"=>"f4db","tasks"=>"f0ae","tasks-alt"=>"f828","taxi"=>"f1ba","teeth"=>"f62e","teeth-open"=>"f62f","telescope"=>"e03e","temperature-down"=>"e03f","temperature-frigid"=>"f768","temperature-high"=>"f769","temperature-hot"=>"f76a","temperature-low"=>"f76b","temperature-up"=>"e040","tenge"=>"f7d7","tennis-ball"=>"f45e","terminal"=>"f120","text"=>"f893","text-height"=>"f034","text-size"=>"f894","text-width"=>"f035","th"=>"f00a","th-large"=>"f009","th-list"=>"f00b","theater-masks"=>"f630","thermometer"=>"f491","thermometer-empty"=>"f2cb","thermometer-full"=>"f2c7","thermometer-half"=>"f2c9","thermometer-quarter"=>"f2ca","thermometer-three-quarters"=>"f2c8","theta"=>"f69e","thumbs-down"=>"f165","thumbs-up"=>"f164","thumbtack"=>"f08d","thunderstorm"=>"f76c","thunderstorm-moon"=>"f76d","thunderstorm-sun"=>"f76e","ticket"=>"f145","ticket-alt"=>"f3ff","tilde"=>"f69f","times"=>"f00d","times-circle"=>"f057","times-hexagon"=>"f2ee","times-octagon"=>"f2f0","times-square"=>"f2d3","tint"=>"f043","tint-slash"=>"f5c7","tire"=>"f631","tire-flat"=>"f632","tire-pressure-warning"=>"f633","tire-rugged"=>"f634","tired"=>"f5c8","toggle-off"=>"f204","toggle-on"=>"f205","toilet"=>"f7d8","toilet-paper"=>"f71e","toilet-paper-alt"=>"f71f","toilet-paper-slash"=>"e072","tombstone"=>"f720","tombstone-alt"=>"f721","toolbox"=>"f552","tools"=>"f7d9","tooth"=>"f5c9","toothbrush"=>"f635","torah"=>"f6a0","torii-gate"=>"f6a1","tornado"=>"f76f","tractor"=>"f722","trademark"=>"f25c","traffic-cone"=>"f636","traffic-light"=>"f637","traffic-light-go"=>"f638","traffic-light-slow"=>"f639","traffic-light-stop"=>"f63a","trailer"=>"e041","train"=>"f238","tram"=>"f7da","transgender"=>"f224","transgender-alt"=>"f225","transporter"=>"e042","transporter-1"=>"e043","transporter-2"=>"e044","transporter-3"=>"e045","transporter-empty"=>"e046","trash"=>"f1f8","trash-alt"=>"f2ed","trash-restore"=>"f829","trash-restore-alt"=>"f82a","trash-undo"=>"f895","trash-undo-alt"=>"f896","treasure-chest"=>"f723","tree"=>"f1bb","tree-alt"=>"f400","tree-christmas"=>"f7db","tree-decorated"=>"f7dc","tree-large"=>"f7dd","tree-palm"=>"f82b","trees"=>"f724","triangle"=>"f2ec","triangle-music"=>"f8e2","trophy"=>"f091","trophy-alt"=>"f2eb","truck"=>"f0d1","truck-container"=>"f4dc","truck-couch"=>"f4dd","truck-loading"=>"f4de","truck-monster"=>"f63b","truck-moving"=>"f4df","truck-pickup"=>"f63c","truck-plow"=>"f7de","truck-ramp"=>"f4e0","trumpet"=>"f8e3","tshirt"=>"f553","tty"=>"f1e4","turkey"=>"f725","turntable"=>"f8e4","turtle"=>"f726","tv"=>"f26c","tv-alt"=>"f8e5","tv-music"=>"f8e6","tv-retro"=>"f401","typewriter"=>"f8e7","ufo"=>"e047","ufo-beam"=>"e048","umbrella"=>"f0e9","umbrella-beach"=>"f5ca","underline"=>"f0cd","undo"=>"f0e2","undo-alt"=>"f2ea","unicorn"=>"f727","union"=>"f6a2","universal-access"=>"f29a","university"=>"f19c","unlink"=>"f127","unlock"=>"f09c","unlock-alt"=>"f13e","upload"=>"f093","usb-drive"=>"f8e9","usd-circle"=>"f2e8","usd-square"=>"f2e9","user"=>"f007","user-alien"=>"e04a","user-alt"=>"f406","user-alt-slash"=>"f4fa","user-astronaut"=>"f4fb","user-chart"=>"f6a3","user-check"=>"f4fc","user-circle"=>"f2bd","user-clock"=>"f4fd","user-cog"=>"f4fe","user-cowboy"=>"f8ea","user-crown"=>"f6a4","user-edit"=>"f4ff","user-friends"=>"f500","user-graduate"=>"f501","user-hard-hat"=>"f82c","user-headset"=>"f82d","user-injured"=>"f728","user-lock"=>"f502","user-md"=>"f0f0","user-md-chat"=>"f82e","user-minus"=>"f503","user-music"=>"f8eb","user-ninja"=>"f504","user-nurse"=>"f82f","user-plus"=>"f234","user-robot"=>"e04b","user-secret"=>"f21b","user-shield"=>"f505","user-slash"=>"f506","user-tag"=>"f507","user-tie"=>"f508","user-times"=>"f235","user-unlock"=>"e058","user-visor"=>"e04c","users"=>"f0c0","users-class"=>"f63d","users-cog"=>"f509","users-crown"=>"f6a5","users-medical"=>"f830","users-slash"=>"e073","utensil-fork"=>"f2e3","utensil-knife"=>"f2e4","utensil-spoon"=>"f2e5","utensils"=>"f2e7","utensils-alt"=>"f2e6","vacuum"=>"e04d","vacuum-robot"=>"e04e","value-absolute"=>"f6a6","vector-square"=>"f5cb","venus"=>"f221","venus-double"=>"f226","venus-mars"=>"f228","vest"=>"e085","vest-patches"=>"e086","vhs"=>"f8ec","vial"=>"f492","vials"=>"f493","video"=>"f03d","video-plus"=>"f4e1","video-slash"=>"f4e2","vihara"=>"f6a7","violin"=>"f8ed","virus"=>"e074","virus-slash"=>"e075","viruses"=>"e076","voicemail"=>"f897","volcano"=>"f770","volleyball-ball"=>"f45f","volume"=>"f6a8","volume-down"=>"f027","volume-mute"=>"f6a9","volume-off"=>"f026","volume-slash"=>"f2e2","volume-up"=>"f028","vote-nay"=>"f771","vote-yea"=>"f772","vr-cardboard"=>"f729","wagon-covered"=>"f8ee","walker"=>"f831","walkie-talkie"=>"f8ef","walking"=>"f554","wallet"=>"f555","wand"=>"f72a","wand-magic"=>"f72b","warehouse"=>"f494","warehouse-alt"=>"f495","washer"=>"f898","watch"=>"f2e1","watch-calculator"=>"f8f0","watch-fitness"=>"f63e","water"=>"f773","water-lower"=>"f774","water-rise"=>"f775","wave-sine"=>"f899","wave-square"=>"f83e","wave-triangle"=>"f89a","waveform"=>"f8f1","waveform-path"=>"f8f2","webcam"=>"f832","webcam-slash"=>"f833","weight"=>"f496","weight-hanging"=>"f5cd","whale"=>"f72c","wheat"=>"f72d","wheelchair"=>"f193","whistle"=>"f460","wifi"=>"f1eb","wifi-1"=>"f6aa","wifi-2"=>"f6ab","wifi-slash"=>"f6ac","wind"=>"f72e","wind-turbine"=>"f89b","wind-warning"=>"f776","window"=>"f40e","window-alt"=>"f40f","window-close"=>"f410","window-frame"=>"e04f","window-frame-open"=>"e050","window-maximize"=>"f2d0","window-minimize"=>"f2d1","window-restore"=>"f2d2","windsock"=>"f777","wine-bottle"=>"f72f","wine-glass"=>"f4e3","wine-glass-alt"=>"f5ce","won-sign"=>"f159","wreath"=>"f7e2","wrench"=>"f0ad","x-ray"=>"f497","yen-sign"=>"f157","yin-yang"=>"f6ad","500px"=>"f26e","accessible-icon"=>"f368","accusoft"=>"f369","acquisitions-incorporated"=>"f6af","adn"=>"f170","adversal"=>"f36a","affiliatetheme"=>"f36b","airbnb"=>"f834","algolia"=>"f36c","alipay"=>"f642","amazon"=>"f270","amazon-pay"=>"f42c","amilia"=>"f36d","android"=>"f17b","angellist"=>"f209","angrycreative"=>"f36e","angular"=>"f420","app-store"=>"f36f","app-store-ios"=>"f370","apper"=>"f371","apple"=>"f179","apple-pay"=>"f415","artstation"=>"f77a","asymmetrik"=>"f372","atlassian"=>"f77b","audible"=>"f373","autoprefixer"=>"f41c","avianex"=>"f374","aviato"=>"f421","aws"=>"f375","bandcamp"=>"f2d5","battle-net"=>"f835","behance"=>"f1b4","behance-square"=>"f1b5","bimobject"=>"f378","bitbucket"=>"f171","bitcoin"=>"f379","bity"=>"f37a","black-tie"=>"f27e","blackberry"=>"f37b","blogger"=>"f37c","blogger-b"=>"f37d","bluetooth"=>"f293","bluetooth-b"=>"f294","bootstrap"=>"f836","btc"=>"f15a","buffer"=>"f837","buromobelexperte"=>"f37f","buy-n-large"=>"f8a6","buysellads"=>"f20d","canadian-maple-leaf"=>"f785","cc-amazon-pay"=>"f42d","cc-amex"=>"f1f3","cc-apple-pay"=>"f416","cc-diners-club"=>"f24c","cc-discover"=>"f1f2","cc-jcb"=>"f24b","cc-mastercard"=>"f1f1","cc-paypal"=>"f1f4","cc-stripe"=>"f1f5","cc-visa"=>"f1f0","centercode"=>"f380","centos"=>"f789","chrome"=>"f268","chromecast"=>"f838","cloudflare"=>"e07d","cloudscale"=>"f383","cloudsmith"=>"f384","cloudversify"=>"f385","codepen"=>"f1cb","codiepie"=>"f284","confluence"=>"f78d","connectdevelop"=>"f20e","contao"=>"f26d","cotton-bureau"=>"f89e","cpanel"=>"f388","creative-commons"=>"f25e","creative-commons-by"=>"f4e7","creative-commons-nc"=>"f4e8","creative-commons-nc-eu"=>"f4e9","creative-commons-nc-jp"=>"f4ea","creative-commons-nd"=>"f4eb","creative-commons-pd"=>"f4ec","creative-commons-pd-alt"=>"f4ed","creative-commons-remix"=>"f4ee","creative-commons-sa"=>"f4ef","creative-commons-sampling"=>"f4f0","creative-commons-sampling-plus"=>"f4f1","creative-commons-share"=>"f4f2","creative-commons-zero"=>"f4f3","critical-role"=>"f6c9","css3"=>"f13c","css3-alt"=>"f38b","cuttlefish"=>"f38c","d-and-d"=>"f38d","d-and-d-beyond"=>"f6ca","dailymotion"=>"e052","dashcube"=>"f210","deezer"=>"e077","delicious"=>"f1a5","deploydog"=>"f38e","deskpro"=>"f38f","dev"=>"f6cc","deviantart"=>"f1bd","dhl"=>"f790","diaspora"=>"f791","digg"=>"f1a6","digital-ocean"=>"f391","discord"=>"f392","discourse"=>"f393","dochub"=>"f394","docker"=>"f395","draft2digital"=>"f396","dribbble"=>"f17d","dribbble-square"=>"f397","dropbox"=>"f16b","drupal"=>"f1a9","dyalog"=>"f399","earlybirds"=>"f39a","ebay"=>"f4f4","edge"=>"f282","edge-legacy"=>"e078","elementor"=>"f430","ello"=>"f5f1","ember"=>"f423","empire"=>"f1d1","envira"=>"f299","erlang"=>"f39d","ethereum"=>"f42e","etsy"=>"f2d7","evernote"=>"f839","expeditedssl"=>"f23e","facebook"=>"f09a","facebook-f"=>"f39e","facebook-messenger"=>"f39f","facebook-square"=>"f082","fantasy-flight-games"=>"f6dc","fedex"=>"f797","fedora"=>"f798","figma"=>"f799","firefox"=>"f269","firefox-browser"=>"e007","first-order"=>"f2b0","first-order-alt"=>"f50a","firstdraft"=>"f3a1","flickr"=>"f16e","flipboard"=>"f44d","fly"=>"f417","font-awesome"=>"f2b4","font-awesome-alt"=>"f35c","font-awesome-flag"=>"f425","fonticons"=>"f280","fonticons-fi"=>"f3a2","fort-awesome"=>"f286","fort-awesome-alt"=>"f3a3","forumbee"=>"f211","foursquare"=>"f180","free-code-camp"=>"f2c5","freebsd"=>"f3a4","fulcrum"=>"f50b","galactic-republic"=>"f50c","galactic-senate"=>"f50d","get-pocket"=>"f265","gg"=>"f260","gg-circle"=>"f261","git"=>"f1d3","git-alt"=>"f841","git-square"=>"f1d2","github"=>"f09b","github-alt"=>"f113","github-square"=>"f092","gitkraken"=>"f3a6","gitlab"=>"f296","gitter"=>"f426","glide"=>"f2a5","glide-g"=>"f2a6","gofore"=>"f3a7","goodreads"=>"f3a8","goodreads-g"=>"f3a9","google"=>"f1a0","google-drive"=>"f3aa","google-pay"=>"e079","google-play"=>"f3ab","google-plus"=>"f2b3","google-plus-g"=>"f0d5","google-plus-square"=>"f0d4","google-wallet"=>"f1ee","gratipay"=>"f184","grav"=>"f2d6","gripfire"=>"f3ac","grunt"=>"f3ad","guilded"=>"e07e","gulp"=>"f3ae","hacker-news"=>"f1d4","hacker-news-square"=>"f3af","hackerrank"=>"f5f7","hips"=>"f452","hire-a-helper"=>"f3b0","hive"=>"e07f","hooli"=>"f427","hornbill"=>"f592","hotjar"=>"f3b1","houzz"=>"f27c","html5"=>"f13b","hubspot"=>"f3b2","ideal"=>"e013","imdb"=>"f2d8","innosoft"=>"e080","instagram"=>"f16d","instagram-square"=>"e055","instalod"=>"e081","intercom"=>"f7af","internet-explorer"=>"f26b","invision"=>"f7b0","ioxhost"=>"f208","itch-io"=>"f83a","itunes"=>"f3b4","itunes-note"=>"f3b5","java"=>"f4e4","jedi-order"=>"f50e","jenkins"=>"f3b6","jira"=>"f7b1","joget"=>"f3b7","joomla"=>"f1aa","js"=>"f3b8","js-square"=>"f3b9","jsfiddle"=>"f1cc","kaggle"=>"f5fa","keybase"=>"f4f5","keycdn"=>"f3ba","kickstarter"=>"f3bb","kickstarter-k"=>"f3bc","korvue"=>"f42f","laravel"=>"f3bd","lastfm"=>"f202","lastfm-square"=>"f203","leanpub"=>"f212","less"=>"f41d","line"=>"f3c0","linkedin"=>"f08c","linkedin-in"=>"f0e1","linode"=>"f2b8","linux"=>"f17c","lyft"=>"f3c3","magento"=>"f3c4","mailchimp"=>"f59e","mandalorian"=>"f50f","markdown"=>"f60f","mastodon"=>"f4f6","maxcdn"=>"f136","mdb"=>"f8ca","medapps"=>"f3c6","medium"=>"f23a","medium-m"=>"f3c7","medrt"=>"f3c8","meetup"=>"f2e0","megaport"=>"f5a3","mendeley"=>"f7b3","microblog"=>"e01a","microsoft"=>"f3ca","mix"=>"f3cb","mixcloud"=>"f289","mixer"=>"e056","mizuni"=>"f3cc","modx"=>"f285","monero"=>"f3d0","napster"=>"f3d2","neos"=>"f612","nimblr"=>"f5a8","node"=>"f419","node-js"=>"f3d3","npm"=>"f3d4","ns8"=>"f3d5","nutritionix"=>"f3d6","octopus-deploy"=>"e082","odnoklassniki"=>"f263","odnoklassniki-square"=>"f264","old-republic"=>"f510","opencart"=>"f23d","openid"=>"f19b","opera"=>"f26a","optin-monster"=>"f23c","orcid"=>"f8d2","osi"=>"f41a","page4"=>"f3d7","pagelines"=>"f18c","palfed"=>"f3d8","patreon"=>"f3d9","paypal"=>"f1ed","penny-arcade"=>"f704","perbyte"=>"e083","periscope"=>"f3da","phabricator"=>"f3db","phoenix-framework"=>"f3dc","phoenix-squadron"=>"f511","php"=>"f457","pied-piper"=>"f2ae","pied-piper-alt"=>"f1a8","pied-piper-hat"=>"f4e5","pied-piper-pp"=>"f1a7","pied-piper-square"=>"e01e","pinterest"=>"f0d2","pinterest-p"=>"f231","pinterest-square"=>"f0d3","playstation"=>"f3df","product-hunt"=>"f288","pushed"=>"f3e1","python"=>"f3e2","qq"=>"f1d6","quinscape"=>"f459","quora"=>"f2c4","r-project"=>"f4f7","raspberry-pi"=>"f7bb","ravelry"=>"f2d9","react"=>"f41b","reacteurope"=>"f75d","readme"=>"f4d5","rebel"=>"f1d0","red-river"=>"f3e3","reddit"=>"f1a1","reddit-alien"=>"f281","reddit-square"=>"f1a2","redhat"=>"f7bc","renren"=>"f18b","replyd"=>"f3e6","researchgate"=>"f4f8","resolving"=>"f3e7","rev"=>"f5b2","rocketchat"=>"f3e8","rockrms"=>"f3e9","rust"=>"e07a","safari"=>"f267","salesforce"=>"f83b","sass"=>"f41e","schlix"=>"f3ea","scribd"=>"f28a","searchengin"=>"f3eb","sellcast"=>"f2da","sellsy"=>"f213","servicestack"=>"f3ec","shirtsinbulk"=>"f214","shopify"=>"e057","shopware"=>"f5b5","simplybuilt"=>"f215","sistrix"=>"f3ee","sith"=>"f512","sketch"=>"f7c6","skyatlas"=>"f216","skype"=>"f17e","slack"=>"f198","slack-hash"=>"f3ef","slideshare"=>"f1e7","snapchat"=>"f2ab","snapchat-ghost"=>"f2ac","snapchat-square"=>"f2ad","soundcloud"=>"f1be","sourcetree"=>"f7d3","speakap"=>"f3f3","speaker-deck"=>"f83c","spotify"=>"f1bc","squarespace"=>"f5be","stack-exchange"=>"f18d","stack-overflow"=>"f16c","stackpath"=>"f842","staylinked"=>"f3f5","steam"=>"f1b6","steam-square"=>"f1b7","steam-symbol"=>"f3f6","sticker-mule"=>"f3f7","strava"=>"f428","stripe"=>"f429","stripe-s"=>"f42a","studiovinari"=>"f3f8","stumbleupon"=>"f1a4","stumbleupon-circle"=>"f1a3","superpowers"=>"f2dd","supple"=>"f3f9","suse"=>"f7d6","swift"=>"f8e1","symfony"=>"f83d","teamspeak"=>"f4f9","telegram"=>"f2c6","telegram-plane"=>"f3fe","tencent-weibo"=>"f1d5","the-red-yeti"=>"f69d","themeco"=>"f5c6","themeisle"=>"f2b2","think-peaks"=>"f731","tiktok"=>"e07b","trade-federation"=>"f513","trello"=>"f181","tumblr"=>"f173","tumblr-square"=>"f174","twitch"=>"f1e8","twitter"=>"f099","twitter-square"=>"f081","typo3"=>"f42b","uber"=>"f402","ubuntu"=>"f7df","uikit"=>"f403","umbraco"=>"f8e8","uncharted"=>"e084","uniregistry"=>"f404","unity"=>"e049","unsplash"=>"e07c","untappd"=>"f405","ups"=>"f7e0","usb"=>"f287","usps"=>"f7e1","ussunnah"=>"f407","vaadin"=>"f408","viacoin"=>"f237","viadeo"=>"f2a9","viadeo-square"=>"f2aa","viber"=>"f409","vimeo"=>"f40a","vimeo-square"=>"f194","vimeo-v"=>"f27d","vine"=>"f1ca","vk"=>"f189","vnv"=>"f40b","vuejs"=>"f41f","watchman-monitoring"=>"e087","waze"=>"f83f","weebly"=>"f5cc","weibo"=>"f18a","weixin"=>"f1d7","whatsapp"=>"f232","whatsapp-square"=>"f40c","whmcs"=>"f40d","wikipedia-w"=>"f266","windows"=>"f17a","wix"=>"f5cf","wizards-of-the-coast"=>"f730","wodu"=>"e088","wolf-pack-battalion"=>"f514","wordpress"=>"f19a","wordpress-simple"=>"f411","wpbeginner"=>"f297","wpexplorer"=>"f2de","wpforms"=>"f298","wpressr"=>"f3e4","xbox"=>"f412","xing"=>"f168","xing-square"=>"f169","y-combinator"=>"f23b","yahoo"=>"f19e","yammer"=>"f840","yandex"=>"f413","yandex-international"=>"f414","yarn"=>"f7e3","yelp"=>"f1e9","yoast"=>"f2b1","youtube"=>"f167","youtube-square"=>"f431","zhihu"=>"f63f"]
;

}

add_filter( 'bizberg_inline_style', 'bizberg_shop_add_inline_css_category_font' );
function bizberg_shop_add_inline_css_category_font( $css ){

    $woo_icon_categories = bizberg_get_theme_mod( 'woo_icon_categories' );
    $woo_icon_categories = is_array( $woo_icon_categories ) ? $woo_icon_categories : json_decode( urldecode( $woo_icon_categories ), true );

    if( !empty( $woo_icon_categories ) && is_array( $woo_icon_categories ) ){

        foreach ( $woo_icon_categories as $key => $value ) {
            
            $category  = !empty( $value['category'] ) ? absint( $value['category'] ) : '';
            $icon_code = !empty( $value['icon_code'] ) ? sanitize_text_field( $value['icon_code'] ) : '';
            $icon_code = str_replace( 'fa' , '', $icon_code );
            $icon_code = explode( '-' , $icon_code, 2 );

            $unicode_arr = bizberg_shop_fontawesome_unicode();

            if( is_array( $icon_code ) ){
                // $code =  !empty( $unicode_arr[$icon_code[1]] ) ? $unicode_arr[$icon_code[1]] : '';
            } else {
                $code = $icon_code; 
            }

            if( !empty( $category ) && !empty( $code ) ){
                $css .= '.navbar-nav .product_cats_menu > li.cat-item-' . absint( $category ) . ' > a::before{
                content: "' . "\\" . esc_attr( $code ) . '";
                font-family: "Font Awesome 5 Free";
                padding-right: 10px;
                font-size: 14px;
                font-weight: 900; }';
            }            

        }

    }

    return $css;

}

function bizberg_shop_get_slider_content(){ 

    ob_start();

    $bizberg_shop_woo_cat_main_menu_status = bizberg_get_theme_mod( 'bizberg_shop_woo_cat_main_menu_status' ); 
    $default_woo_category_dropdown         = bizberg_get_theme_mod( 'default_woo_category_dropdown' );

    $content_class = 'col-lg-12';
    if( $bizberg_shop_woo_cat_main_menu_status == true && $default_woo_category_dropdown == 'show' ){
        echo '<div class="col-lg-3"></div>';
        $content_class = 'col-lg-9';
    }

    $woo_slider_pages = bizberg_get_theme_mod( 'woo_slider_pages' , array() );
    $woo_slider_pages = is_array( $woo_slider_pages ) ? $woo_slider_pages : json_decode( urldecode( $woo_slider_pages ), true );

    $args = array(
        'post_type' => 'page',
        'post__in'  => wp_list_pluck( $woo_slider_pages, 'page' ),
        'orderby'  => 'post__in'
    );

    $slider_pages = new WP_Query( $args );

    if( $slider_pages->have_posts() ): ?>

<div class="<?php echo esc_attr( $content_class ); ?> col-sm-12">

    <?php 
            do_action( 'bizberg_shop_before_slider_section' );
            ?>

    <div class="slider bizberg_shop_slider">

        <div class="swiper-container swiper-main">

            <div class="swiper-wrapper">

                <?php 

                        while( $slider_pages->have_posts() ): $slider_pages->the_post(); 

                            global $post; 

                            $image_url = has_post_thumbnail() ? get_the_post_thumbnail_url( $post, 'large' ) : '';

                            $align         = bizberg_shop_get_slider_meta( $woo_slider_pages , 'align' , $post->ID , '' , '' ); 
                            $content_width = bizberg_shop_get_slider_meta( $woo_slider_pages , 'content_width' , $post->ID , '' , '' );
                            $content_width = is_numeric( $content_width ) ? absint( $content_width ) . '%' : '90%';

                            $color_title = bizberg_shop_get_slider_meta( $woo_slider_pages , 'color_title' , $post->ID , '' , '' ); 
                            $color_subtitle = bizberg_shop_get_slider_meta( $woo_slider_pages , 'color_subtitle' , $post->ID , '' , '' );
                            $color_content = bizberg_shop_get_slider_meta( $woo_slider_pages , 'color_content' , $post->ID , '' , '' ); ?>

                <div class="swiper-slide">
                    <div class="slide-inner">
                        <div class="slide-image" style="background-image: url(<?php echo esc_url( $image_url ); ?>)">
                        </div>
                        <div class="swiper-content <?php echo esc_attr( $align ) . ' slide_id_' . absint( $post->ID ); ?>"
                            style="width: <?php echo esc_attr( $content_width ); ?>">
                            <?php 
                                        echo wp_kses_post( bizberg_shop_get_slider_meta( $woo_slider_pages , 'subtitle' , $post->ID , '<h4 class="elementor-exclude" style="color:' . esc_attr( $color_subtitle ) . '">' , '</h4>' ) );
                                        ?>

                            <h2 class="elementor-exclude" style="color: <?php echo esc_attr( $color_title ); ?>">
                                <?php the_title(); ?>
                            </h2>

                            <div style="color: <?php echo esc_attr( $color_content ); ?>;">
                                <?php the_excerpt(); ?>
                            </div>

                            <?php
                                        $button_link = bizberg_shop_get_slider_meta( $woo_slider_pages , 'button_link' , $post->ID , '' , '' ); 
                                        $button_text = bizberg_shop_get_slider_meta( $woo_slider_pages , 'button_text' , $post->ID , '' , '' ); 

                                        if( !empty( $button_link ) && !empty( $button_text ) ) { ?>
                            <a href="<?php echo esc_url( $button_link ); ?>"
                                class="btn btn-primary menu_custom_btn woo_slider_button">
                                <?php echo esc_html( $button_text ); ?>
                            </a>
                            <?php 
                                        } ?>

                        </div>
                        <div class="overlay"></div>
                    </div>
                </div>

                <?php 

                        endwhile; ?>

            </div>

        </div>

    </div>

    <?php 
            do_action( 'bizberg_shop_after_slider_section' );
            ?>

</div>

<?php 

    endif; 

    return ob_get_clean();
}

function bizberg_shop_get_slider(){  ?>

<section class="ecommerce-banner">
    <div class="container">
        <div class="row">
            <?php 
                echo wp_kses_post( bizberg_shop_get_slider_content() );
                ?>
        </div>

    </div>

</section>

<?php

}

function bizberg_shop_get_slider_meta( $data, $field, $post_id, $start_wrapper = '', $end_wrapper = '' ){

    if( !empty( $data ) && is_array( $data ) ){

        foreach ( $data as $key => $value ) {
            
            if( $value['page'] == $post_id && !empty( $value[$field] ) ){

                return $start_wrapper . $value[$field] . $end_wrapper;

            }

        }

    }

    return;

}

function bizberg_shop_get_services(){ 

    $bizberg_shop_services_status = bizberg_get_theme_mod( 'bizberg_shop_services_status' );

    if( empty( $bizberg_shop_services_status ) ){
        return;
    } ?>

<section class="service bs_services">
    <div class="container">
        <?php echo wp_kses_post( bizberg_shop_get_services_content() ); ?>
    </div>
</section>

<?php
}

function bizberg_shop_get_services_content(){

    ob_start(); 

    $woo_services = bizberg_get_theme_mod( 'woo_services' );
    $woo_services = is_array( $woo_services ) ? $woo_services : json_decode( urldecode( $woo_services ), true );

    if( empty( $woo_services ) || !is_array( $woo_services ) ){
        return;
    } ?>

<div class="service-inner">

    <div class="row">

        <?php 

            $columns = count( $woo_services );
            $class   = '';

            switch ( $columns ) {
                case '4':
                    $class = 'col-lg-3 col-md-6 col-sm-6 col-xs-6';
                    break;

                case '3':
                    $class = 'col-lg-4 col-md-6 col-sm-6 col-xs-6';
                    break;

                case '2':
                    $class = 'col-lg-6 col-md-6 col-sm-6 col-xs-6';
                    break;
                
                default:
                    $class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
                    break;
            }

            foreach ( $woo_services as $key => $value ) {

                $title      = !empty( $value['title'] ) ? $value['title'] : '';
                $subtitle   = !empty( $value['subtitle'] ) ? $value['subtitle'] : ''; 
                $icon       = !empty( $value['icon'] ) ? $value['icon'] : ''; 
                $icon_color = !empty( $value['icon_color'] ) ? $value['icon_color'] : '#f5848c'; ?>

        <div class="<?php echo esc_attr( $class ); ?>">

            <div class="services-item">

                <?php 
                        if( !empty( $icon ) ){ ?>
                <i style="color: <?php echo esc_attr( $icon_color ); ?>" class="<?php echo esc_attr( $icon ); ?>"></i>
                <?php 
                        } ?>

                <div class="services-item-content">
                    <h4 class="elementor-exclude"><?php echo esc_html( $title ); ?></h4>
                    <p><?php echo esc_html( $subtitle ); ?></p>
                </div>

            </div>

        </div>

        <?php
            } ?>

    </div>

</div>

<?php

    return ob_get_clean();

}

function bizberg_shop_get_sales_banner(){

    if( !class_exists( 'WooCommerce' ) ){
        return;
    }

    $banner_status = bizberg_get_theme_mod( 'bs_sales_banner_status' );

    if( empty( $banner_status ) ){
        return;
    } ?>

<section class="banner-listing bs_banner_sales">
    <div class="container">
        <?php 
            echo wp_kses_post( bizberg_shop_get_sales_banner_content() );
            ?>
    </div>
</section>

<?php
}

function bizberg_shop_get_sales_banner_content(){ 

    ob_start();

    $sale_slider = bizberg_get_theme_mod( 'woo_banner_sale_slider' );
    $sale_slider = is_array( $sale_slider ) ? $sale_slider : json_decode( urldecode( $sale_slider ), true );

    if( empty( $sale_slider ) || !is_array( $sale_slider ) ){
        return;
    } ?>

<div class="row listing-slider banner_sale_slider">

    <?php 
        foreach ( $sale_slider as $key => $value ) { 

            $image_url = !empty( $value['image'] ) ? wp_get_attachment_url( $value['image'] ) : '';
            $link = !empty( $value['link'] ) ? $value['link'] : ''; ?>

    <div class="col-lg-4 slider-item">

        <?php 
                if( empty( $link ) ){ ?>
        <div class="banner-listing-item" style="background-image:url( <?php echo esc_url( $image_url ); ?> );"></div>
        <?php
                } else { ?>
        <a href="<?php echo esc_url( $link ); ?>">
            <div class="banner-listing-item" style="background-image:url( <?php echo esc_url( $image_url ); ?> );"></div>
        </a>
        <?php 
                } ?>

    </div>

    <?php
        } ?>

</div>

<?php

    return ob_get_clean();
}

function bizberg_shop_get_top_categories(){ 

    if( !class_exists( 'WooCommerce' ) ){
        return;
    }

    $bs_top_categories_status = bizberg_get_theme_mod( 'bs_top_categories_status' );

    if( empty( $bs_top_categories_status ) ){
        return;
    } ?>

<div class="top-categories">
    <div class="container">
        <?php 
            echo wp_kses_post( bizberg_shop_get_top_categories_content() );
            ?>
    </div>
</div>

<?php
}

function bizberg_shop_get_top_categories_content(){

    ob_start();

    $top_categories_cat = bizberg_get_theme_mod( 'top_categories_cat' );
    $top_categories_cat = is_array( $top_categories_cat ) ? $top_categories_cat : json_decode( urldecode( $top_categories_cat ), true );

    $categories_title = bizberg_get_theme_mod( 'bs_top_categories_title' ); ?>

<div class="title">
    <?php 
        if( !empty( $categories_title ) ){ ?>
    <h3 class="elementor-exclude">
        <?php 
                echo esc_html( $categories_title );
                ?>
    </h3>
    <?php 
        } ?>
</div>

<?php 
    if( !empty( $top_categories_cat ) && is_array( $top_categories_cat ) ){ ?>
<div class="row attract-slider">
    <?php 
            foreach ( $top_categories_cat as $key => $value ) { 
                $image_id = !empty( $value['image'] ) ? $value['image'] : ''; 
                $category_id = !empty( $value['category'] ) ? $value['category'] : '';
                $term_obj = get_term( $category_id ); ?>
    <div class="col-sm-2">
        <div class="categories-logo item">
            <a href="<?php echo esc_url( get_term_link( absint( $category_id ) ) ); ?>">
                <img src="<?php echo esc_url( wp_get_attachment_url( $image_id ) ); ?>">
                <h4 class="elementor-exclude">
                    <?php 
                                echo esc_html( !empty( $term_obj->name ) ? $term_obj->name : '' );
                                ?>
                </h4>
            </a>
        </div>
    </div>
    <?php
            } ?>
</div>
<?php 
    } ?>

<?php

    return ob_get_clean();

}

function bizberg_shop_get_homepage_products(){ 

    if( !class_exists( 'WooCommerce' ) ){
        return;
    }

    $products_status = bizberg_get_theme_mod( 'bs_tab_products_status' );

    if( empty( $products_status ) ){
        return;
    } ?>

<section class="tabproduct">
    <div class="container">
        <?php 
            echo wp_kses_post( bizberg_shop_get_homepage_products_content() ); 
            ?>
    </div>
</section>

<?php
}

function bizberg_shop_get_homepage_products_content(){ 

    ob_start();

    $products_title = bizberg_get_theme_mod( 'bs_tab_products_title' );
    $product_categories = bizberg_get_theme_mod( 'tab_product_categories' ); 
    $product_categories = is_array( $product_categories ) ? $product_categories : json_decode( urldecode( $product_categories ), true ); ?>

<div class="tabproduct-inner">
    <div class="tabproduct-box">

        <h3 class="elementor-exclude main_title">
            <?php 
                echo esc_html( $products_title );
                ?>
        </h3>

        <?php 
            if( !empty( $product_categories ) && is_array( $product_categories ) ){ ?>

        <div class="pro-navtab text-center mb-4">
            <ul class="nav nav-tabs bs_desktop">

                <?php 
                        foreach ( $product_categories as $key => $value ) {

                            $category_id = !empty( $value['category_id'] ) ? $value['category_id'] : '';
                            $category_obj = get_term( $category_id ); ?>

                <li class="<?php echo ( empty( $key ) ? 'active' : '' ); ?>">
                    <a data-toggle="tab" href="#bs_cat_id_<?php echo absint( $category_id ); ?>"
                        class="bs_woo_listings_frontpage">
                        <?php 
                                    echo esc_html( $category_obj->name );
                                    ?>
                    </a>
                </li>

                <?php
                        } ?>

            </ul>
            <div class="btn-group bs_tablet_mobile">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="fa fa-plus"></span>
                </button>
                <ul class="dropdown-menu">
                    <?php 
                            foreach ( $product_categories as $key => $value ) {

                                $category_id = !empty( $value['category_id'] ) ? $value['category_id'] : '';
                                $category_obj = get_term( $category_id ); ?>

                    <li class="<?php echo ( empty( $key ) ? 'active' : '' ); ?>">
                        <a data-toggle="tab" href="#bs_cat_id_<?php echo absint( $category_id ); ?>"
                            class="bs_woo_listings_frontpage">
                            <?php 
                                        echo esc_html( $category_obj->name );
                                        ?>
                        </a>
                    </li>

                    <?php
                            } ?>
                </ul>
            </div>
        </div>
        <?php 
            } ?>

    </div>

    <?php 
        if( !empty( $product_categories ) && is_array( $product_categories ) ){ ?>

    <div class="tab-content">

        <?php 
                foreach ( $product_categories as $key => $value ) {

                    $category_id  = !empty( $value['category_id'] ) ? $value['category_id'] : ''; 
                    $limit        = !empty( $value['limit'] ) ? $value['limit'] : '4'; 
                    $columns      = !empty( $value['columns'] ) ? $value['columns'] : '4'; 
                    $category_obj = get_term( $category_id ); ?>

        <div id="bs_cat_id_<?php echo absint( $category_id ); ?>"
            class="tab-pane <?php echo ( empty( $key ) ? 'in active' : '' ); ?>">
            <?php 
                        echo do_shortcode( '[products category="' . esc_attr( $category_obj->slug ) . '" limit="' . absint( $limit ) . '" columns="' . absint( $columns ) . '" class="frontpage_product_wrapper"]' );
                        ?>
        </div>

        <?php 
                } ?>

    </div>

    <?php 
        } ?>

</div>

<?php

    return ob_get_clean();

}

function bizberg_shop_get_repeater_products(){

    if( !class_exists( 'WooCommerce' ) ){
        return;
    }

    $repeater_products_frontpage = bizberg_get_theme_mod( 'repeater_products_frontpage' );    
    $repeater_products_frontpage = is_array( $repeater_products_frontpage ) ? $repeater_products_frontpage : json_decode( urldecode( $repeater_products_frontpage ), true );

    if( empty( $repeater_products_frontpage ) || !is_array( $repeater_products_frontpage ) ){
        return;
    } ?>

<section class="bs_repeater_product_wrapper">
    <div class="container">
        <?php 
            echo wp_kses_post( bizberg_shop_get_repeater_products_content() ); 
            ?>
    </div>
</section>

<?php
}

function bizberg_shop_get_repeater_products_content(){ 

    $repeater_products_frontpage = bizberg_get_theme_mod( 'repeater_products_frontpage' );
    $repeater_products_frontpage = is_array( $repeater_products_frontpage ) ? $repeater_products_frontpage : json_decode( urldecode( $repeater_products_frontpage ), true );

    foreach ( $repeater_products_frontpage as $key => $value ) { 

        $title_color = !empty( $value['title_color'] ) ? $value['title_color'] : '';
        $font_size = !empty( $value['font_size'] ) ? $value['font_size'] : '25'; ?>

<div class="bs_repeater_product">

    <div class="tabproduct-inner">

        <div class="tabproduct-box">

            <h3 class="elementor-exclude main_title <?php echo 'product_title_' . absint( $key ); ?>"
                style="color: <?php echo esc_attr( $title_color ); ?>;font-size: <?php echo esc_attr( $font_size ); ?>px">
                <?php 
                        echo esc_html( !empty( $value['title'] ) ? $value['title'] : '' );
                        ?>
            </h3>

        </div>

        <div class="tab-content">

            <?php 

                    $category_id  = !empty( $value['category'] ) ? $value['category'] : ''; 
                    $category_obj = get_term( $category_id );
                    $limit        = !empty( $value['limit'] ) ? $value['limit'] : '4';
                    $columns      = !empty( $value['columns'] ) ? $value['columns'] : '4'; ?>

            <div id="">

                <?php 

                        if( is_object( $category_obj ) && $category_id != 0 ){
                            echo do_shortcode( '[products category="' . esc_attr( $category_obj->slug ) . '" limit="' . absint( $limit ) . '" columns="' . absint( $columns ) . '" class="repeater_frontpage_product_wrapper"]' );
                        } else{

                            switch ( $category_id ) {

                                case 'featured_products':
                                    echo do_shortcode( '[featured_products limit="' . absint( $limit ) . '" columns="' . absint( $columns ) . '" class="repeater_frontpage_product_wrapper bs_featured_products"]' );
                                    break;

                                case 'sale_products':
                                    echo do_shortcode( '[sale_products limit="' . absint( $limit ) . '" columns="' . absint( $columns ) . '" class="repeater_frontpage_product_wrapper bs_sale_products"]' );
                                    break;

                                case 'best_selling_products':
                                    echo do_shortcode( '[best_selling_products limit="' . absint( $limit ) . '" columns="' . absint( $columns ) . '" class="repeater_frontpage_product_wrapper bs_best_selling_products"]' );
                                    break;

                                case 'recent_products':
                                    echo do_shortcode( '[recent_products limit="' . absint( $limit ) . '" columns="' . absint( $columns ) . '" class="repeater_frontpage_product_wrapper bs_recent_products"]' );
                                    break;

                                case 'top_rated_products':
                                    echo do_shortcode( '[top_rated_products limit="' . absint( $limit ) . '" columns="' . absint( $columns ) . '" class="repeater_frontpage_product_wrapper bs_top_rated_products"]' );
                                    break;
                                
                                default:
                                    # code...
                                    break;
                            }

                        }

                        ?>

            </div>

        </div>

    </div>

</div>

<?php

    }

}

add_filter( 'bizberg_localize_scripts', function( $data ){

    $data['banner_sales_slidesToShowDesktop'] = bizberg_get_theme_mod( 'number_setting_desktop_bizberg_shop_frontpage_woocommerce_sales_banner_slides_show' );
    $data['banner_sales_slidesToShowTablet']  = bizberg_get_theme_mod( 'number_setting_tablet_bizberg_shop_frontpage_woocommerce_sales_banner_slides_show' );
    $data['banner_sales_slidesToShowMobile']  = bizberg_get_theme_mod( 'number_setting_mobile_bizberg_shop_frontpage_woocommerce_sales_banner_slides_show' );
    $data['tab_product_masnory_status']       = bizberg_get_theme_mod( 'tab_product_masnory_status' );

    return $data;

});

add_action( 'wp_loaded', 'bizberg_shop_get_page_content' );
function bizberg_shop_get_page_content(){

    $pages = bizberg_get_theme_mod( 'gutenberg_blocks_repeater' );
    $pages = is_array( $pages ) ? $pages : json_decode( urldecode( $pages ), true );

    if( empty( $pages ) || !is_array( $pages ) ){
        return;
    }

    foreach ( $pages as $key => $value ) {
        
        $location = !empty( $value['location'] ) ? $value['location'] : '';
        $width = !empty( $value['width'] ) ? $value['width'] : 'box_width';
        $page_id = !empty( $value['page_id'] ) ? $value['page_id'] : '';

        if( !empty( $location ) && !empty( $page_id ) ){

            switch ( $location ) {

                case 'before_slider':
                    $action_name = 'bizberg_shop_before_slider_section';
                    break;

                case 'after_slider':
                    $action_name = 'bizberg_shop_after_slider_section';
                    break;

                case 'before_services':
                    $action_name = 'bizberg_shop_before_services_section';
                    break;

                case 'before_sales_banner':
                    $action_name = 'bizberg_shop_before_sales_banner_section';
                    break;

                case 'before_top_categories':
                    $action_name = 'bizberg_shop_before_top_categories_section';
                    break;

                case 'before_woo_tab_products':
                    $action_name = 'bizberg_shop_before_woocommerce_tab_products';
                    break;

                case 'before_repeater_products':
                    $action_name = 'bizberg_shop_before_repeater_products';
                    break;

                case 'before_clients_logo':
                    $action_name = 'bizberg_shop_before_clients_logo';
                    break;

                case 'before_footer':
                    $action_name = 'bizberg_shop_before_footer';
                    break;
                
                default:
                    # code...
                    break;
            }

            add_action( $action_name , function() use ( $page_id, $action_name, $width ) {

                $args = array(
                    'post_type' => 'page',
                    'posts_per_page' => 1,
                    'post__in' => array( $page_id )
                );

                $block_query = new WP_Query( $args );

                if( $block_query->have_posts() ):

                    while( $block_query->have_posts() ): $block_query->the_post();

                        if( $action_name == 'bizberg_shop_before_slider_section' || $action_name == 'bizberg_shop_after_slider_section' ){
                            the_content();
                        } else {

                            if( $width == 'box_width' ){
                                echo '<div class="container">';
                                the_content();
                                echo '</div>';
                            } else {
                                the_content();
                            }
                        }

                    endwhile;

                endif;

                wp_reset_postdata();

            });

        }

    }

}

function bizberg_shop_get_clients_logo(){

    $clients_logo = bizberg_get_theme_mod( 'clients_logo' );
    $clients_logo = is_array( $clients_logo ) ? $clients_logo : json_decode( urldecode( $clients_logo ), true );
     
    if( empty( $clients_logo ) || !is_array( $clients_logo ) ){
        return;
    } ?>

<div class="brands bs_brands">
    <div class="container">

        <?php 
                echo wp_kses_post( bizberg_shop_get_clients_logo_content() );
                ?>

    </div>
</div>

<?php
}

function bizberg_shop_get_clients_logo_content(){

    $clients_logo = bizberg_get_theme_mod( 'clients_logo' );
    $clients_logo = is_array( $clients_logo ) ? $clients_logo : json_decode( urldecode( $clients_logo ), true );

    ob_start(); 

    echo '<div class="row"><div class="bs_clients_logo">';

    foreach ( $clients_logo as $key => $value ) {

        $image_id = !empty( $value['image_id'] ) ? absint( $value['image_id'] ) : '';
        $link = !empty( $value['link'] ) ? $value['link'] : '';

        if( !empty( $image_id ) ){ ?>

<div class="col-sm-2">

    <div class="client-logo item">

        <?php 
                    if( !empty( $link ) ){ ?>
        <a href="<?php echo esc_url( $link ); ?>" target="_blank">
            <img src="<?php echo esc_url( wp_get_attachment_url( $image_id ) ); ?>" />
        </a>
        <?php
                    } else { ?>
        <img src="<?php echo esc_url( wp_get_attachment_url( $image_id ) ); ?>" />
        <?php
                    } ?>

    </div>

</div>

<?php
        } 

    } 

    echo '</div></div>';

    return ob_get_clean();

}

add_filter( 'bizberg_recommended_plugins', 'bizberg_shop_recommended_plugins' );
function bizberg_shop_recommended_plugins( $plugins ){

    $plugins = array(

        array(
            'name'     => esc_html__( 'One Click Demo Import', 'bizberg-shop' ),
            'slug'     => 'one-click-demo-import',
            'required' => false,
        ),
        array(
            'name'     => esc_html__( 'WooCommerce', 'bizberg-shop' ),
            'slug'     => 'woocommerce',
            'required' => false,
        ),
        array(
            'name'     => esc_html__( 'YITH WooCommerce Wishlist', 'bizberg-shop' ),
            'slug'     => 'yith-woocommerce-wishlist',
            'required' => false,
        ),
        array(
            'name'     => esc_html__( 'YITH WooCommerce Quick View', 'bizberg-shop' ),
            'slug'     => 'yith-woocommerce-quick-view',
            'required' => false
        ),
        array(
            'name'     => esc_html__( 'YITH WooCommerce Compare', 'bizberg-shop' ),
            'slug'     => 'yith-woocommerce-compare',
            'required' => false
        ),
        array(
            'name'     => esc_html__( 'Cyclone Demo Importer', 'bizberg-shop' ),
            'slug'     => 'cyclone-demo-importer',
            'required' => false
        )

    );

    return $plugins;

}

add_filter( 'bizberg_plugins', function( $plugins ){

    $plugins = array(
        array(
            'slug' => 'one-click-demo-import/one-click-demo-import.php',
            'zip'  => 'one-click-demo-import'
        ),
        array(
            'slug' => 'woocommerce/woocommerce.php',
            'zip'  => 'woocommerce'
        ),
        array(
            'slug' => 'yith-woocommerce-compare/init.php',
            'zip'  => 'yith-woocommerce-compare'
        ),
        array(
            'slug' => 'yith-woocommerce-quick-view/init.php',
            'zip'  => 'yith-woocommerce-quick-view'
        ), 
        array(
            'slug' => 'yith-woocommerce-wishlist/init.php',
            'zip'  => 'yith-woocommerce-wishlist'
        ),  
        array(
            'slug' => 'cyclone-demo-importer/index.php',
            'zip'  => 'cyclone-demo-importer'
        )           
    );

    return $plugins;

},999);

add_filter( 'bizberg_sidebar_widget_heading_font_size_status', 'bizberg_shop_sidebar_widget_heading_font_size_status' );
function bizberg_shop_sidebar_widget_heading_font_size_status(){
    return true;
}
 
add_filter( 'bizberg_number_setting_desktop_sidebar_widget_heading_font_sizes', 'bizberg_shop_number_setting_desktop_sidebar_widget_heading_font_sizes' );
function bizberg_shop_number_setting_desktop_sidebar_widget_heading_font_sizes(){
    return 25;
}
 
add_filter( 'bizberg_number_setting_tablet_sidebar_widget_heading_font_sizes', 'bizberg_shop_number_setting_tablet_sidebar_widget_heading_font_sizes' );
function bizberg_shop_number_setting_tablet_sidebar_widget_heading_font_sizes(){
    return 23.44;
}
 
add_filter( 'bizberg_number_setting_mobile_sidebar_widget_heading_font_sizes', 'bizberg_shop_number_setting_mobile_sidebar_widget_heading_font_sizes' );
function bizberg_shop_number_setting_mobile_sidebar_widget_heading_font_sizes(){
    return 20.31;
}

add_filter( 'bizberg_getting_started_screenshot', function(){
    return true;
});

add_action( 'after_setup_theme', 'bizberg_shop_setup_theme' );
function bizberg_shop_setup_theme() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
}