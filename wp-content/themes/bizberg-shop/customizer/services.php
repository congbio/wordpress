<?php

add_action( 'init' , 'bizberg_shop_services_section' );
function bizberg_shop_services_section(){

	Kirki::add_field( 'bizberg', [
		'type'        => 'toggle',
		'settings'    => 'bizberg_shop_services_status',
		'label'       => esc_html__( 'Enable / Disable Section', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_services',
		'default'     => ''
	] );

	Kirki::add_field( 'bizberg', [
		'type'        => 'advanced-repeater',
		'label'       => esc_html__( 'Services', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_services',
		'settings'     => 'woo_services',
		'choices' => [
			'limit' => 4,
            'row_label' => [
                'value' => esc_html__( 'Service', 'bizberg-shop' ),
            ],
            'fields' => [
                'icon' => [
                    'type'        => 'fontawesome',
                    'label'       => esc_html__( 'Icon', 'bizberg-shop' ),
                    'default'     => 'fa fa-gift',
                    'choices'     => bizberg_get_fontawesome_options()
                ],
                'icon_color' => [
                    'type'        => 'color',
                    'label'       => esc_html__( 'Title Color', 'bizberg-shop' ),
                    'default'     => '#dd3333'
                ],
                'title' => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Title', 'bizberg-shop' ),
                    'default'     => esc_html__( 'Special Gift Cards', 'bizberg-shop' )
                ],
                'subtitle' => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Subtitle', 'bizberg-shop' ),
                    'default'     => esc_html__( 'Give A Perfect Gift', 'bizberg-shop' )
                ],
            ],
		],
		'default'      => [
			[
				'icon'       => 'fa fa-gift',
				'icon_color' => '#F67C8E',
				'title'      => esc_html__( 'Special Gift Cards', 'bizberg-shop' ),
				'subtitle'   => esc_html__( 'Give A Perfect Gift', 'bizberg-shop' )
			],
			[
				'icon'       => 'fas fa-shield-alt',
				'icon_color' => '#56D7F4',
				'title'      => esc_html__( 'Secure Payment', 'bizberg-shop' ),
				'subtitle'   => esc_html__( '100% Secure Payment', 'bizberg-shop' )
			],
			[
				'icon'       => 'fas fa-headset',
				'icon_color' => '#00D280',
				'title'      => esc_html__( '24/7 Support', 'bizberg-shop' ),
				'subtitle'   => esc_html__( 'Online Support 24/7', 'bizberg-shop' )
			],
			[
				'icon'       => 'fas fa-shipping-fast',
				'icon_color' => '#8735C5',
				'title'      => esc_html__( 'Free Shipping', 'bizberg-shop' ),
				'subtitle'   => esc_html__( 'On Order Over $101', 'bizberg-shop' )
			],
		],
		'partial_refresh'    => [
			'woo_services' => [
				'selector'        => '.bs_services .container',
				'render_callback' => 'bizberg_shop_get_services_content'
			]
		],
		'active_callback'    => array(
            array(
                'setting'  => 'bizberg_shop_services_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
	] );

    Kirki::add_field( 'bizberg', [
        'type'        => 'typography',
        'settings'    => 'title_font_services',
        'label'       => esc_html__( 'Title Font', 'bizberg-shop' ),
        'section'     => 'bizberg_shop_frontpage_woocommerce_services',
        'default'     => [
            'font-family'    => 'Poppins',
            'variant'        => '500',
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '.bs_services .services-item-content h4',
            ],
        ],
        'active_callback'    => array(
            array(
                'setting'  => 'bizberg_shop_services_status',
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
                'section'  => 'bizberg_shop_frontpage_woocommerce_services',
                'settings' => 'bizberg_shop_frontpage_woocommerce_services_title_font_size',
                'global_active_callback'    => array(
                	array(
		                'setting'  => 'bizberg_shop_services_status',
		                'operator' => '==',
		                'value'    => true
		            )
                ),
                'fields'   => array(
                    'slider' => array(
                        'desktop' => array(
                            'label' => esc_html__( 'Title Font Size ( Desktop )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_frontpage_woocommerce_services_title_font_size',
                            'default'     => 19,  
                            'choices'     => [
                                'min'  => 10,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => '.bs_services .services-item-content h4',
                                    'property'      => 'font-size',
                                    'value_pattern' => '$px'
                                )
                            ),
                        ),
                        'tablet' => array(
                            'label' => esc_html__( 'Title Font Size ( Tablet )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_frontpage_woocommerce_services_title_font_size',
                            'default'     => 17,  
                            'choices'     => [
                                'min'  => 10,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => '.bs_services .services-item-content h4',
                                    'property'      => 'font-size',
                                    'value_pattern' => '$px',
                                    'media_query'   => '@media (min-width: 481px) and (max-width: 1024px)'
                                )
                            ),
                        ),
                        'mobile' => array(
                            'label' => esc_html__( 'Title Font Size ( Mobile )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_frontpage_woocommerce_services_title_font_size',
                            'default'     => 15, 
                            'choices'     => [
                                'min'  => 10,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => '.bs_services .services-item-content h4',
                                    'property'      => 'font-size',
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

    if( function_exists( 'bizberg_kirki_dtm_options' ) ){

        bizberg_kirki_dtm_options( 
            array(
                'display' => array(
                    'desktop' => 'desktop',
                    'tablet'  => 'tablet',
                    'mobile'  => 'mobile'
                ),
                'field_id' => 'bizberg',
                'section'  => 'bizberg_shop_frontpage_woocommerce_services',
                'settings' => 'bizberg_shop_frontpage_woocommerce_services_title_margin_bottom',
                'global_active_callback'    => array(
                	array(
		                'setting'  => 'bizberg_shop_services_status',
		                'operator' => '==',
		                'value'    => true
		            )
                ),
                'fields'   => array(
                    'slider' => array(
                        'desktop' => array(
                            'label' => esc_html__( 'Title Spacing Bottom ( Desktop )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_frontpage_woocommerce_services_title_margin_bottom',
                            'default'     => 0,  
                            'choices'     => [
                                'min'  => 0,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => '.bs_services .services-item-content h4',
                                    'property'      => 'margin-bottom',
                                    'value_pattern' => '$px'
                                )
                            ),
                        ),
                        'tablet' => array(
                            'label' => esc_html__( 'Title Spacing Bottom ( Tablet )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_frontpage_woocommerce_services_title_margin_bottom',
                            'default'     => 0,  
                            'choices'     => [
                                'min'  => 0,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => '.bs_services .services-item-content h4',
                                    'property'      => 'margin-bottom',
                                    'value_pattern' => '$px',
                                    'media_query'   => '@media (min-width: 481px) and (max-width: 1024px)'
                                )
                            ),
                        ),
                        'mobile' => array(
                            'label' => esc_html__( 'Title Spacing Bottom ( Mobile )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_frontpage_woocommerce_services_title_margin_bottom',
                            'default'     => 0, 
                            'choices'     => [
                                'min'  => 0,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => '.bs_services .services-item-content h4',
                                    'property'      => 'margin-bottom',
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

    if( function_exists( 'bizberg_kirki_dtm_options' ) ){

        bizberg_kirki_dtm_options( 
            array(
                'display' => array(
                    'desktop' => 'desktop',
                    'tablet'  => 'tablet',
                    'mobile'  => 'mobile'
                ),
                'field_id' => 'bizberg',
                'section'  => 'bizberg_shop_frontpage_woocommerce_services',
                'settings' => 'bizberg_shop_frontpage_woocommerce_services_subtitle_font_size',
                'global_active_callback'    => array(
                	array(
		                'setting'  => 'bizberg_shop_services_status',
		                'operator' => '==',
		                'value'    => true
		            )
                ),
                'fields'   => array(
                    'slider' => array(
                        'desktop' => array(
                            'label' => esc_html__( 'Subtitle Font Size ( Desktop )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_frontpage_woocommerce_services_subtitle_font_size',
                            'default'     => 11,  
                            'choices'     => [
                                'min'  => 10,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => '.bs_services .services-item-content p',
                                    'property'      => 'font-size',
                                    'value_pattern' => '$px'
                                )
                            ),
                        ),
                        'tablet' => array(
                            'label' => esc_html__( 'Subtitle Font Size ( Tablet )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_frontpage_woocommerce_services_subtitle_font_size',
                            'default'     => 11,  
                            'choices'     => [
                                'min'  => 10,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => '.bs_services .services-item-content p',
                                    'property'      => 'font-size',
                                    'value_pattern' => '$px',
                                    'media_query'   => '@media (min-width: 481px) and (max-width: 1024px)'
                                )
                            ),
                        ),
                        'mobile' => array(
                            'label' => esc_html__( 'Subtitle Font Size ( Mobile )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_frontpage_woocommerce_services_subtitle_font_size',
                            'default'     => 11, 
                            'choices'     => [
                                'min'  => 10,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => '.bs_services .services-item-content p',
                                    'property'      => 'font-size',
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

    if( function_exists( 'bizberg_kirki_dtm_options' ) ){

        bizberg_kirki_dtm_options( 
            array(
                'display' => array(
                    'desktop' => 'desktop',
                    'tablet'  => 'tablet',
                    'mobile'  => 'mobile'
                ),
                'field_id' => 'bizberg',
                'section'  => 'bizberg_shop_frontpage_woocommerce_services',
                'settings' => 'bizberg_shop_frontpage_woocommerce_services_icon_font_size',
                'global_active_callback'    => array(
                	array(
		                'setting'  => 'bizberg_shop_services_status',
		                'operator' => '==',
		                'value'    => true
		            )
                ),
                'fields'   => array(
                    'slider' => array(
                        'desktop' => array(
                            'label' => esc_html__( 'Icon Font Size ( Desktop )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_frontpage_woocommerce_services_icon_font_size',
                            'default'     => 28,  
                            'choices'     => [
                                'min'  => 10,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => '.bs_services .services-item i',
                                    'property'      => 'font-size',
                                    'value_pattern' => '$px'
                                )
                            ),
                        ),
                        'tablet' => array(
                            'label' => esc_html__( 'Icon Font Size ( Tablet )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_frontpage_woocommerce_services_icon_font_size',
                            'default'     => 28,  
                            'choices'     => [
                                'min'  => 10,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => '.bs_services .services-item i',
                                    'property'      => 'font-size',
                                    'value_pattern' => '$px',
                                    'media_query'   => '@media (min-width: 481px) and (max-width: 1024px)'
                                )
                            ),
                        ),
                        'mobile' => array(
                            'label' => esc_html__( 'Icon Font Size ( Mobile )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_frontpage_woocommerce_services_icon_font_size',
                            'default'     => 28, 
                            'choices'     => [
                                'min'  => 10,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => '.bs_services .services-item i',
                                    'property'      => 'font-size',
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

}