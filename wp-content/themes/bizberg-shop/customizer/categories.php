<?php

add_action( 'init' , 'bizberg_shop_top_categories' );
function bizberg_shop_top_categories(){

    if( !class_exists( 'WooCommerce' ) ){
        return;
    }

	Kirki::add_field( 'bizberg', [
		'type'        => 'toggle',
		'settings'    => 'bs_top_categories_status',
		'label'       => esc_html__( 'Enable / Disable', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_top_categories',
		'default'     => ''
	] );

	Kirki::add_field( 'bizberg', array(
        'type'        => 'custom',
        'settings'    => 'bs_top_categories_title_settings',
        'section'     => 'bizberg_shop_frontpage_woocommerce_top_categories',
        'default'     => '<div class="bizberg_customizer_custom_heading">' . esc_html__( 'Main Title Options', 'bizberg-shop' ) . '</div>',
        'active_callback'    => array(
            array(
                'setting'  => 'bs_top_categories_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
    ) );

	Kirki::add_field( 'bizberg', [
		'type'     => 'text',
		'settings' => 'bs_top_categories_title',
		'label'    => esc_html__( 'Title', 'bizberg-shop' ),
		'section'  => 'bizberg_shop_frontpage_woocommerce_top_categories',
		'default'  => esc_html__( 'Featured Categories', 'bizberg-shop' ),
		'active_callback'    => array(
            array(
                'setting'  => 'bs_top_categories_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
        'partial_refresh'    => [
			'bs_top_categories_title' => [
				'selector'        => '.top-categories .container',
				'render_callback' => 'bizberg_shop_get_top_categories_content'
			]
		],
	] );

    Kirki::add_field( 'bizberg', [
        'type'        => 'typography',
        'settings'    => 'title_font_top_categories',
        'label'       => esc_html__( 'Title Font', 'bizberg-shop' ),
        'section'     => 'bizberg_shop_frontpage_woocommerce_top_categories',
        'default'     => [
            'font-family'    => 'Poppins',
            'variant'        => '500',
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '.top-categories .container .title h3',
            ],
        ],
        'active_callback'    => array(
            array(
                'setting'  => 'bs_top_categories_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
    ] );

	Kirki::add_field( 'bizberg', [
		'type'        => 'slider',
		'settings'    => 'bs_top_categories_title_font_size',
		'label'       => esc_html__( 'Font Size', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_top_categories',
		'default'     => 25,
		'choices'     => [
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		],
		'active_callback'    => array(
            array(
                'setting'  => 'bs_top_categories_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element'       => '.top-categories .container .title h3',
                'property'      => 'font-size',
                'value_pattern' => '$px'
            )
        ),
	] );

	Kirki::add_field( 'bizberg', [
		'type'        => 'simple-color',
		'settings'    => 'bs_top_categories_title_color',
		'label'       => __( 'Title Color', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_top_categories',
		'default'     => '#f5848c',
		'active_callback'    => array(
            array(
                'setting'  => 'bs_top_categories_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element'       => '.top-categories .container .title h3',
                'property'      => 'color'
            ),
            array(
                'element'       => '.top-categories .title h3::before',
                'property'      => 'background'
            )
        ),
	] );

	Kirki::add_field( 'bizberg', array(
        'type'        => 'custom',
        'settings'    => 'bs_top_categories_cat_title_settings',
        'section'     => 'bizberg_shop_frontpage_woocommerce_top_categories',
        'default'     => '<div class="bizberg_customizer_custom_heading">' . esc_html__( 'Category Title Options', 'bizberg-shop' ) . '</div>',
        'active_callback'    => array(
            array(
                'setting'  => 'bs_top_categories_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
    ) );

    Kirki::add_field( 'bizberg', [
        'type'        => 'typography',
        'settings'    => 'cat_title_font_top_categories',
        'label'       => esc_html__( 'Category Font', 'bizberg-shop' ),
        'section'     => 'bizberg_shop_frontpage_woocommerce_top_categories',
        'default'     => [
            'font-family'    => 'Poppins',
            'variant'        => '500',
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'body .categories-logo h4',
            ],
        ],
        'active_callback'    => array(
            array(
                'setting'  => 'bs_top_categories_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
    ] );

    Kirki::add_field( 'bizberg', [
		'type'        => 'slider',
		'settings'    => 'bs_top_categories_cat_title_font_size',
		'label'       => esc_html__( 'Font Size', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_top_categories',
		'default'     => 16,
		'choices'     => [
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		],
		'active_callback'    => array(
            array(
                'setting'  => 'bs_top_categories_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element'       => 'body .categories-logo h4',
                'property'      => 'font-size',
                'value_pattern' => '$px'
            )
        ),
	] );

	Kirki::add_field( 'bizberg', [
		'type'        => 'simple-color',
		'settings'    => 'bs_top_categories_cat_title_color',
		'label'       => __( 'Title Color', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_top_categories',
		'default'     => '#333',
		'active_callback'    => array(
            array(
                'setting'  => 'bs_top_categories_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element'       => 'body .categories-logo h4',
                'property'      => 'color'
            )
        ),
	] );

	Kirki::add_field( 'bizberg', array(
        'type'        => 'custom',
        'settings'    => 'bs_top_categories_cat_settings',
        'section'     => 'bizberg_shop_frontpage_woocommerce_top_categories',
        'default'     => '<div class="bizberg_customizer_custom_heading">' . esc_html__( 'Category Options', 'bizberg-shop' ) . '</div>',
        'active_callback'    => array(
            array(
                'setting'  => 'bs_top_categories_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
    ) );

	Kirki::add_field( 'bizberg', [
		'type'        => 'advanced-repeater',
		'label'       => esc_html__( 'Categories', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_top_categories',
        'choices'     => [
            'row_label' => [
                'value' => esc_html__( 'Category', 'bizberg-shop' ),
            ],
            'fields' => [
                'image' => [
                    'type'        => 'image',
                    'label'       => esc_html__( 'Image', 'bizberg-shop' )
                ],
                'category' => [
                    'type'        => 'select',
                    'label'       => esc_html__( 'Select Category', 'bizberg-shop' ),
                    'choices'     => bizberg_shop_get_woocommerce_categories()
                ],
            ],
        ],		
		'settings'     => 'top_categories_cat',
		'default' => [],
		'partial_refresh'    => [
			'top_categories_cat' => [
				'selector'        => '.top-categories .container',
				'render_callback' => 'bizberg_shop_get_top_categories_content'
			]
		],
		'active_callback'    => array(
            array(
                'setting'  => 'bs_top_categories_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
	] );

    Kirki::add_field( 'bizberg', array(
        'type'        => 'custom',
        'settings'    => 'bs_top_categories_arrow_settings',
        'section'     => 'bizberg_shop_frontpage_woocommerce_top_categories',
        'default'     => '<div class="bizberg_customizer_custom_heading">' . esc_html__( 'Arrow Options', 'bizberg-shop' ) . '</div>',
        'active_callback'    => array(
            array(
                'setting'  => 'bs_top_categories_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
    ) );

    Kirki::add_field( 'bizberg', [
        'type'        => 'simple-color',
        'settings'    => 'bs_top_categories_arrow_background_color',
        'label'       => __( 'Background Color ( Normal )', 'bizberg-shop' ),
        'section'     => 'bizberg_shop_frontpage_woocommerce_top_categories',
        'default'     => '#f5848c',
        'active_callback'    => array(
            array(
                'setting'  => 'bs_top_categories_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element'       => '.top-categories .attract-slider .slick-prev::before, .top-categories .attract-slider .slick-next::before',
                'property'      => 'background-color'
            )
        ),
    ] );

    Kirki::add_field( 'bizberg', [
        'type'        => 'simple-color',
        'settings'    => 'bs_top_categories_arrow_background_color_hover',
        'label'       => __( 'Background Color ( Hover )', 'bizberg-shop' ),
        'section'     => 'bizberg_shop_frontpage_woocommerce_top_categories',
        'default'     => '#f24955',
        'active_callback'    => array(
            array(
                'setting'  => 'bs_top_categories_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element'       => '.top-categories .attract-slider .slick-prev:hover::before, .top-categories .attract-slider .slick-next:hover::before',
                'property'      => 'background-color'
            )
        ),
    ] );

    Kirki::add_field( 'bizberg', [
        'type'        => 'simple-color',
        'settings'    => 'bs_top_categories_arrow_color',
        'label'       => __( 'Color', 'bizberg-shop' ),
        'section'     => 'bizberg_shop_frontpage_woocommerce_top_categories',
        'default'     => '#fff',
        'active_callback'    => array(
            array(
                'setting'  => 'bs_top_categories_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element'       => '.top-categories .attract-slider .slick-prev::before, .top-categories .attract-slider .slick-next::before',
                'property'      => 'color'
            )
        ),
    ] );

}