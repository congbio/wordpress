<?php

add_action( 'init' , 'bizberg_shop_product_repeater' );
function bizberg_shop_product_repeater(){

	if( !class_exists( 'WooCommerce' ) ){
        return;
    }

    Kirki::add_field( 'bizberg', [
        'type'        => 'typography',
        'settings'    => 'repeater_products_title_font',
        'label'       => esc_html__( 'Title Font', 'bizberg-shop' ),
        'section'     => 'bizberg_shop_frontpage_woocommerce_repeater_products',
        'default'     => [
            'font-family'    => 'Poppins',
            'variant'        => '500',
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '.bs_repeater_product_wrapper h3.main_title',
            ],
        ]
    ] );

	Kirki::add_field( 'bizberg', [
		'type'        => 'advanced-repeater',
		'label'       => esc_html__( 'Categories', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_repeater_products',
		'choices'     => [
			'row_label' => [
				'value' => esc_html__( 'Category', 'bizberg-shop' ),
			],
			'fields' => [
				'category' => [
					'type'        => 'select',
					'label'       => esc_html__( 'Category', 'bizberg-shop' ),
					'choices'     => bizberg_shop_get_woocommerce_categories( false, true )
				],
				'title' => [
					'type'        => 'text',
					'label'       => esc_html__( 'Title', 'bizberg-shop' ),
					'default'     => esc_html__( 'Featured Products', 'bizberg-shop' )
				],
				'title_color' => [
					'type'        => 'color',
					'label'       => esc_html__( 'Title Color', 'bizberg-shop' ),
					'default'     => '#f5848c'
				],
				'font_size' => [
					'type'        => 'number',
					'label'       => esc_html__( 'Font Size', 'bizberg-shop' ),
					'default'     => '25'
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
		'settings'     => 'repeater_products_frontpage',
		'default'      => [],
		'partial_refresh'    => [
			'repeater_products_frontpage' => [
				'selector'        => '.bs_repeater_product_wrapper .container',
				'render_callback' => 'bizberg_shop_get_repeater_products_content'
			]
		],
	] );

}