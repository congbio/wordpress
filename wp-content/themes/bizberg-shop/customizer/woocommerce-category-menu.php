<?php

add_action( 'init' , 'bizberg_shop_kirki_fields' );
function bizberg_shop_kirki_fields(){

	if( !class_exists( 'WooCommerce' ) ){
        return;
    }

	Kirki::add_section( 'bizberg_shop_woo_cat_main_menu', array(
	    'title'          => esc_html__( 'WooCommerce Category ( Main Menu )', 'bizberg-shop' ),
	    'section'        => 'woocommerce_header',
	    'priority'       => 1,
	) );

	Kirki::add_field( 'bizberg', [
		'type'        => 'toggle',
		'settings'    => 'bizberg_shop_woo_cat_main_menu_status',
		'label'       => esc_html__( 'Show / Hide WooCommerce Categories', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_woo_cat_main_menu',
		'default'     => '1'
	] );

	Kirki::add_field( 'bizberg', [
		'type'     => 'text',
		'settings' => 'woocommerce_category_menu_text',
		'label'    => esc_html__( 'Title', 'bizberg-shop' ),
		'section'  => 'bizberg_shop_woo_cat_main_menu',
		'default'  => esc_html__( 'Browse Categories', 'bizberg-shop' ),
		'active_callback'    => array(
            array(
                'setting'  => 'bizberg_shop_woo_cat_main_menu_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
        'partial_refresh'    => [
			'woocommerce_category_menu_text' => [
				'selector'        => '.woo_cat_link',
				'render_callback' => 'bizberg_shop_get_menu_woocommerce_label'
			]
		],
	] );

	Kirki::add_field( 'bizberg', [
		'type'        => 'simple-color',
		'settings'    => 'bizberg_shop_woo_cat_main_menu_background_color',
		'label'       => __( 'Background', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_woo_cat_main_menu',
		'default'     => '#f5848c',
		'active_callback'    => array(
            array(
                'setting'  => 'bizberg_shop_woo_cat_main_menu_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
        'transport' => 'auto',
        'output' => array(
			array(
				'element'       => '.bizberg_shop_browse_cat > a,header .navbar-default .navbar-nav .bizberg_shop_browse_cat > a:hover',
				'property'      => 'background-color',
				'value_pattern' => '$ !important'
			),
			array(
				'element'       => 'header .navbar-default .navbar-nav li.bizberg_shop_browse_cat ul',
				'property'      => 'border-top-color',
				'value_pattern' => '$ !important'
			)
		),
	] );

	Kirki::add_field( 'bizberg', [
		'type'        => 'slider',
		'settings'    => 'woocommerce_category_menu_depth',
		'label'       => esc_html__( 'Depth', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_woo_cat_main_menu',
		'default'     => 3,
		'choices'     => [
			'min'  => 0,
			'max'  => 10,
			'step' => 1,
		],
		'active_callback'    => array(
            array(
                'setting'  => 'bizberg_shop_woo_cat_main_menu_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
	] );

	Kirki::add_field( 'bizberg', [
		'type'        => 'slider',
		'settings'    => 'woocommerce_category_menu_width',
		'label'       => esc_html__( 'Width', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_woo_cat_main_menu',
		'default'     => 260,
		'choices'     => [
			'min'  => 200,
			'max'  => 400,
			'step' => 1,
		],
		'transport' => 'auto',
		'output' => array(
			array(
				'element'       => 'li.bizberg_shop_browse_cat',
				'property'      => 'width',
				'value_pattern' => '$px'
			),
			array(
				'element'       => '.navbar-nav ul.product_cats_menu li, .navbar-nav ul.product_cats_menu, .navbar-nav ul.product_cats_menu ul, .navbar-nav ul.product_cats_menu ul li',
				'property'      => 'width',
				'value_pattern' => '$px'
			),
		),
		'active_callback'    => array(
            array(
                'setting'  => 'bizberg_shop_woo_cat_main_menu_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
	] );

	Kirki::add_field( 'bizberg', [
		'type'        => 'radio-buttonset',
		'settings'    => 'default_woo_category_dropdown',
		'label'       => esc_html__( 'Default Category Dropdown', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_woo_cat_main_menu',
		'default'     => 'show',
		'choices'     => [
			'show'   => esc_html__( 'Show', 'bizberg-shop' ),
			'hide1'   => esc_html__( 'Hide', 'bizberg-shop' )
		],
		'description' => esc_html__( 'By default, the WooCommerce category will be visible on the homepage. This settings will be used for Ecommerce homepage only.', 'bizberg-shop' ),
		'active_callback'    => array(
            array(
                'setting'  => 'bizberg_shop_woo_cat_main_menu_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
	] );

	Kirki::add_field( 'bizberg', [
		'type'        => 'advanced-repeater',
		'label'       => esc_html__( 'Exclude Categories', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_woo_cat_main_menu',
		'choices'     => [
			'row_label' => [
				'value' => esc_html__( 'Category', 'bizberg-shop' ),
			],
			'fields' => [
				'link_text' => [
					'type'        => 'select',
					'label'       => esc_html__( 'Categories', 'bizberg-shop' ),
					'description' => esc_html__( 'Note: If the parent category is selected, then all the child categories will also be hidden.', 'bizberg-shop' ),
					'choices'      => bizberg_shop_get_woocommerce_categories()
				]
			],
		],
		'settings'     => 'woo_exclude_categories',
		'default'      => [],
		'active_callback'    => array(
            array(
                'setting'  => 'bizberg_shop_woo_cat_main_menu_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
	] );

	Kirki::add_field( 'bizberg', [
		'type'        => 'advanced-repeater',
		'label'       => esc_html__( 'Add icons on categories', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_woo_cat_main_menu',
		'choices'     => [
			'row_label' => [
				'value' => esc_html__( 'Icon', 'bizberg-shop' ),
			],
			'fields' => [
				'category' => [
					'type'        => 'select',
					'label'       => esc_html__( 'WooCommerce Categories', 'bizberg-shop' ),
					'choices'     => bizberg_shop_get_woocommerce_categories( $only_parent = true )
				],
				'icon_code' => [
					'type'        => 'fontawesome',
					'label'       => esc_html__( 'Icon', 'bizberg-shop' ),
					'choices'     => bizberg_get_fontawesome_options()
				]
			],
		],
		'settings'     => 'woo_icon_categories',
		'default'      => [],
		'active_callback'    => array(
            array(
                'setting'  => 'bizberg_shop_woo_cat_main_menu_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
	] );

}