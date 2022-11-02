<?php

add_action( 'init' , 'bizberg_shop_tab_products' );
function bizberg_shop_tab_products(){

    if( !class_exists( 'WooCommerce' ) ){
        return;
    }

	Kirki::add_field( 'bizberg', [
		'type'        => 'toggle',
		'settings'    => 'bs_tab_products_status',
		'label'       => esc_html__( 'Enable / Disable', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_tab_products',
		'default'     => ''
	] );

    Kirki::add_field( 'bizberg', [
        'type'        => 'checkbox',
        'settings'    => 'tab_product_masnory_status',
        'label'       => esc_html__( 'Enable Masonry', 'bizberg-shop' ),
        'section'     => 'bizberg_shop_frontpage_woocommerce_tab_products',
        'default'     => false,
        'active_callback'    => array(
            array(
                'setting'  => 'bs_tab_products_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
    ] );

	Kirki::add_field( 'bizberg', [
		'type'        => 'advanced-repeater',
		'label'       => esc_html__( 'Categories', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_tab_products',
        'choices'     => [
            'row_label' => [
                'value' => esc_html__( 'Category', 'bizberg-shop' ),
            ],
            'fields' => [
                'category_id' => [
                    'type'        => 'select',
                    'label'       => esc_html__( 'Category', 'bizberg-shop' ),
                    'choices'     => bizberg_shop_get_woocommerce_categories()
                ],
                'limit' => [
                    'type'        => 'select',
                    'label'       => esc_html__( 'Product Limit', 'bizberg-shop' ),
                    'default'     => 4,
                    'choices'     => [
                        1 => 1,
                        2 => 2,
                        3 => 3,
                        4 => 4,
                        5 => 5,
                        6 => 6,
                        7 => 7,
                        8 => 8,
                        9 => 9,
                        10 => 10,
                        11 => 11,
                        12 => 12
                    ]
                ],
                'columns' => [
                    'type'        => 'select',
                    'label'       => esc_html__( 'Columns', 'bizberg-shop' ),
                    'default'     => 4,
                    'choices'     => [
                        3 => 3,
                        4 => 4,
                        5 => 5
                    ]
                ],
            ],
        ],
		'settings'     => 'tab_product_categories',
		'default'      => [],
		'partial_refresh'    => [
			'tab_product_categories' => [
				'selector'        => '.tabproduct .container',
				'render_callback' => 'bizberg_shop_get_homepage_products_content'
			]
		],
		'active_callback'    => array(
            array(
                'setting'  => 'bs_tab_products_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
	] );

	Kirki::add_field( 'bizberg', array(
        'type'        => 'custom',
        'settings'    => 'bs_tab_products_title_settings',
        'section'     => 'bizberg_shop_frontpage_woocommerce_tab_products',
        'default'     => '<div class="bizberg_customizer_custom_heading">' . esc_html__( 'Main Title Options', 'bizberg-shop' ) . '</div>',
        'active_callback'    => array(
            array(
                'setting'  => 'bs_tab_products_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
    ) );

    Kirki::add_field( 'bizberg', [
		'type'     => 'text',
		'settings' => 'bs_tab_products_title',
		'label'    => esc_html__( 'Title', 'bizberg-shop' ),
		'section'  => 'bizberg_shop_frontpage_woocommerce_tab_products',
		'default'  => esc_html__( 'Exclusive Products', 'bizberg-shop' ),
		'active_callback'    => array(
            array(
                'setting'  => 'bs_tab_products_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
        'partial_refresh'    => [
			'bs_tab_products_title' => [
				'selector'        => '.tabproduct .container',
				'render_callback' => 'bizberg_shop_get_homepage_products_content'
			]
		],
	] );

    Kirki::add_field( 'bizberg', [
        'type'        => 'typography',
        'settings'    => 'tab_products_title_font',
        'label'       => esc_html__( 'Title Font', 'bizberg-shop' ),
        'section'     => 'bizberg_shop_frontpage_woocommerce_tab_products',
        'default'     => [
            'font-family'    => 'Poppins',
            'variant'        => '500',
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '.tabproduct .container h3.main_title',
            ],
        ],
        'active_callback'    => array(
            array(
                'setting'  => 'bs_tab_products_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
    ] );

	Kirki::add_field( 'bizberg', [
		'type'        => 'slider',
		'settings'    => 'bs_tab_products_title_font_size',
		'label'       => esc_html__( 'Font Size', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_tab_products',
		'default'     => 25,
		'choices'     => [
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		],
		'active_callback'    => array(
            array(
                'setting'  => 'bs_tab_products_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element'       => '.tabproduct .container h3.main_title',
                'property'      => 'font-size',
                'value_pattern' => '$px'
            )
        ),
	] );

	Kirki::add_field( 'bizberg', [
		'type'        => 'simple-color',
		'settings'    => 'bs_tab_products_title_color',
		'label'       => __( 'Title Color', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_tab_products',
		'default'     => '#f5848c',
		'active_callback'    => array(
            array(
                'setting'  => 'bs_tab_products_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element'       => '.tabproduct .container h3.main_title',
                'property'      => 'color'
            ),
            array(
                'element'       => '.tabproduct .container h3.main_title::before',
                'property'      => 'background'
            ),
        ),
	] );

	Kirki::add_field( 'bizberg', array(
        'type'        => 'custom',
        'settings'    => 'bs_tab_products_cat_title_settings',
        'section'     => 'bizberg_shop_frontpage_woocommerce_tab_products',
        'default'     => '<div class="bizberg_customizer_custom_heading">' . esc_html__( 'Category Title Options', 'bizberg-shop' ) . '</div>',
        'active_callback'    => array(
            array(
                'setting'  => 'bs_tab_products_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
    ) );

    Kirki::add_field( 'bizberg', [
		'type'        => 'slider',
		'settings'    => 'bs_tab_products_cat_title_font_size',
		'label'       => esc_html__( 'Font Size', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_tab_products',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		],
		'active_callback'    => array(
            array(
                'setting'  => 'bs_tab_products_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element'       => '.tabproduct-box .nav-tabs>li>a',
                'property'      => 'font-size',
                'value_pattern' => '$px'
            )
        ),
	] );

	Kirki::add_field( 'bizberg', [
		'type'        => 'simple-color',
		'settings'    => 'bs_tab_products_cat_title_active_color',
		'label'       => __( 'Color ( Active )', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_tab_products',
		'default'     => '#f5848c',
		'active_callback'    => array(
            array(
                'setting'  => 'bs_tab_products_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element'       => '.tabproduct .container .pro-navtab .nav-tabs>li.active>a',
                'property'      => 'color'
            )
        ),
	] );

	Kirki::add_field( 'bizberg', [
		'type'        => 'simple-color',
		'settings'    => 'bs_tab_products_cat_title_normal_color',
		'label'       => __( 'Color ( Normal )', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_tab_products',
		'default'     => '#555',
		'active_callback'    => array(
            array(
                'setting'  => 'bs_tab_products_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element'       => '.tabproduct .container .pro-navtab .nav-tabs > li > a',
                'property'      => 'color'
            )
        ),
	] );

}