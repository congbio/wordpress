<?php

add_action( 'init' , 'bizberg_shop_sales_banner' );
function bizberg_shop_sales_banner(){

    if( !class_exists( 'WooCommerce' ) ){
        return;
    }

	Kirki::add_field( 'bizberg', [
		'type'        => 'toggle',
		'settings'    => 'bs_sales_banner_status',
		'label'       => esc_html__( 'Enable / Disable', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_sales_banners',
		'default'     => ''
	] );

	Kirki::add_field( 'bizberg', [
		'type'        => 'advanced-repeater',
		'label'       => esc_html__( 'Banners', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_sales_banners',
        'choices'     => [
            'row_label' => [
                'value' => esc_html__( 'Banner', 'bizberg-shop' ),
            ],
            'fields' => [
                'image' => [
                    'type'        => 'image',
                    'label'       => esc_html__( 'Image', 'bizberg-shop' )
                ],
                'link' => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Link', 'bizberg-shop' ),
                    'default'     => ''
                ],
            ],
        ],
		'settings'     => 'woo_banner_sale_slider',
		'default'      => [
			[
				'image' => '',
				'link'  => ''
			],
			[
				'image' => '',
				'link'  => ''
			],
			[
				'image' => '',
				'link'  => ''
			],
			[
				'image' => '',
				'link'  => ''
			],
		],
		'partial_refresh'    => [
			'woo_banner_sale_slider' => [
				'selector'        => '.bs_banner_sales .container',
				'render_callback' => 'bizberg_shop_get_sales_banner_content'
			]
		],
		'active_callback'    => array(
            array(
                'setting'  => 'bs_sales_banner_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
	] );

    Kirki::add_field( 'bizberg', [
        'type'        => 'simple-color',
        'settings'    => 'sales_banner_background_color',
        'label'       => __( 'Background Color', 'bizberg-shop' ),
        'section'     => 'bizberg_shop_frontpage_woocommerce_sales_banners',
        'default'     => '#ddd',
        'active_callback'    => array(
            array(
                'setting'  => 'bs_sales_banner_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
        'choices'     => [
            'alpha' => true,
        ],
        'transport' => 'auto',
        'output' => array(
            array(
                'element'  => '.bs_banner_sales .banner-listing-item',
                'property' => 'background-color',
            ),
        ),
    ] );

    if( function_exists( 'bizberg_kirki_dtm_options' ) ){

        bizberg_kirki_dtm_options( 
            array(
                'display' => array(
                    'desktop' => 'desktop',
                    'tablet'  => 'tablet',
                    'mobile'  => 'mobile'
                ),
                'field_id' => 'bizberg',
                'section'  => 'bizberg_shop_frontpage_woocommerce_sales_banners',
                'settings' => 'bizberg_shop_frontpage_woocommerce_sales_banner_slides_show',
                'global_active_callback'    => array(
                    array(
                        'setting'  => 'bs_sales_banner_status',
                        'operator' => '==',
                        'value'    => true
                    )
                ),
                'fields'   => array(
                    'slider' => array(
                        'desktop' => array(
                            'label' => esc_html__( 'Slider to Show ( Desktop )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_frontpage_woocommerce_sales_banner_slides_show',
                            'default'     => 3,  
                            'choices'     => [
                                'min'  => 1,
                                'max'  => 4,
                                'step' => 1,
                            ],
                            'partial_refresh'    => [
                                'number_setting_desktop_bizberg_shop_frontpage_woocommerce_sales_banner_slides_show' => [
                                    'selector'        => '.bs_banner_sales .container',
                                    'render_callback' => 'bizberg_shop_get_sales_banner_content'
                                ]
                            ],
                        ),
                        'tablet' => array(
                            'label' => esc_html__( 'Slider to Show ( Tablet )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_frontpage_woocommerce_sales_banner_slides_show',
                            'default'     => 2,  
                            'choices'     => [
                                'min'  => 1,
                                'max'  => 3,
                                'step' => 1,
                            ],
                            'partial_refresh'    => [
                                'number_setting_tablet_bizberg_shop_frontpage_woocommerce_sales_banner_slides_show' => [
                                    'selector'        => '.bs_banner_sales .container',
                                    'render_callback' => 'bizberg_shop_get_sales_banner_content'
                                ]
                            ],
                        ),
                        'mobile' => array(
                            'label' => esc_html__( 'Slider to Show ( Mobile )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_frontpage_woocommerce_sales_banner_slides_show',
                            'default'     => 1, 
                            'choices'     => [
                                'min'  => 1,
                                'max'  => 2,
                                'step' => 1,
                            ],
                            'partial_refresh'    => [
                                'number_setting_mobile_bizberg_shop_frontpage_woocommerce_sales_banner_slides_show' => [
                                    'selector'        => '.bs_banner_sales .container',
                                    'render_callback' => 'bizberg_shop_get_sales_banner_content'
                                ]
                            ],
                        )
                    ),
                )
                
            ) 
        );

    }

	Kirki::add_field( 'bizberg', [
		'type'        => 'radio-buttonset',
		'settings'    => 'sales_banner_background_size',
		'label'       => esc_html__( 'Image Size', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_sales_banners',
		'default'     => 'contain',
		'choices'     => [
			'contain'   => esc_html__( 'Normal', 'bizberg-shop' ),
			'cover'     => esc_html__( 'Stretch', 'bizberg-shop' )
		],
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => '.bs_banner_sales .banner-listing-item',
				'property' => 'background-size',
			),
		),
		'active_callback'    => array(
            array(
                'setting'  => 'bs_sales_banner_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
	] );

	if( function_exists( 'bizberg_kirki_dtm_options' ) ){

        bizberg_kirki_dtm_options( 
            array(
                'display' => array(
                    'desktop' => 'desktop',
                    'tablet'  => 'tablet',
                    'mobile'  => 'mobile'
                ),
                'field_id' => 'bizberg',
                'section'  => 'bizberg_shop_frontpage_woocommerce_sales_banners',
                'settings' => 'bizberg_shop_frontpage_woocommerce_sales_banner_height',
                'global_active_callback'    => array(
                	array(
		                'setting'  => 'bs_sales_banner_status',
		                'operator' => '==',
		                'value'    => true
		            )
                ),
                'fields'   => array(
                    'number' => array(
                        'desktop' => array(
                            'label' => esc_html__( 'Height ( Desktop )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_frontpage_woocommerce_sales_banner_height',
                            'default'     => 300,  
                            'choices'     => [
                                'min'  => 0,
                                'max'  => 500,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => '.bs_banner_sales .banner-listing-item',
                                    'property'      => 'height',
                                    'value_pattern' => '$px'
                                )
                            ),
                        ),
                        'tablet' => array(
                            'label' => esc_html__( 'Height ( Tablet )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_frontpage_woocommerce_sales_banner_height',
                            'default'     => 300,  
                            'choices'     => [
                                'min'  => 0,
                                'max'  => 500,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => '.bs_banner_sales .banner-listing-item',
                                    'property'      => 'height',
                                    'value_pattern' => '$px',
                                    'media_query'   => '@media (min-width: 481px) and (max-width: 1024px)'
                                )
                            ),
                        ),
                        'mobile' => array(
                            'label' => esc_html__( 'Height ( Mobile )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_frontpage_woocommerce_sales_banner_height',
                            'default'     => 300, 
                            'choices'     => [
                                'min'  => 0,
                                'max'  => 500,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => '.bs_banner_sales .banner-listing-item',
                                    'property'      => 'height',
                                    'value_pattern' => '$px',
                                    'media_query'   => '@media (min-width: 320px) and (max-width: 480px)'
                                )
                            ),
                        )
                    ),
                )
                
            ) 
        );

    }

    Kirki::add_field( 'bizberg', array(
        'type'        => 'custom',
        'settings'    => 'bs_sales_banner_arrow_settings',
        'section'     => 'bizberg_shop_frontpage_woocommerce_sales_banners',
        'default'     => '<div class="bizberg_customizer_custom_heading">' . esc_html__( 'Arrow Options', 'bizberg-shop' ) . '</div>',
        'active_callback'    => array(
            array(
                'setting'  => 'bs_sales_banner_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
    ) );

    Kirki::add_field( 'bizberg', [
        'type'        => 'simple-color',
        'settings'    => 'sales_banner_arrrow_background_color',
        'label'       => __( 'Arrow Background Color ( Normal )', 'bizberg-shop' ),
        'section'     => 'bizberg_shop_frontpage_woocommerce_sales_banners',
        'default'     => '#f5848c',
        'active_callback'    => array(
            array(
                'setting'  => 'bs_sales_banner_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
        'choices'     => [
            'alpha' => true,
        ],
        'transport' => 'auto',
        'output' => array(
            array(
                'element'  => '.bs_banner_sales.banner-listing .slick-prev::before,.bs_banner_sales.banner-listing .slick-next::before',
                'property' => 'background-color'
            ),
        ),
    ] );

    Kirki::add_field( 'bizberg', [
        'type'        => 'simple-color',
        'settings'    => 'sales_banner_arrrow_background_color_hover',
        'label'       => __( 'Arrow Background Color ( Hover )', 'bizberg-shop' ),
        'section'     => 'bizberg_shop_frontpage_woocommerce_sales_banners',
        'default'     => '#f24955',
        'active_callback'    => array(
            array(
                'setting'  => 'bs_sales_banner_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
        'choices'     => [
            'alpha' => true,
        ],
        'transport' => 'auto',
        'output' => array(
            array(
                'element'  => '.bs_banner_sales.banner-listing .slick-prev:hover::before,.bs_banner_sales.banner-listing .slick-next:hover::before',
                'property' => 'background-color'
            ),
        ),
    ] );

    Kirki::add_field( 'bizberg', [
        'type'        => 'simple-color',
        'settings'    => 'sales_banner_arrrow_color',
        'label'       => __( 'Arrow Color', 'bizberg-shop' ),
        'section'     => 'bizberg_shop_frontpage_woocommerce_sales_banners',
        'default'     => '#fff',
        'active_callback'    => array(
            array(
                'setting'  => 'bs_sales_banner_status',
                'operator' => '==',
                'value'    => true
            )
        ),
        'choices'     => [
            'alpha' => true,
        ],
        'transport' => 'auto',
        'output' => array(
            array(
                'element'  => '.bs_banner_sales.banner-listing .slick-prev::before,.bs_banner_sales.banner-listing .slick-next::before',
                'property' => 'color'
            ),
        ),
    ] );

}