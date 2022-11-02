<?php

add_action( 'init' , 'bizberg_shop_slider' );
function bizberg_shop_slider(){

	Kirki::add_field( 'bizberg', [
		'type'        => 'advanced-repeater',
		'label'       => esc_html__( 'Slider Pages', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_slider',
		'settings'     => 'woo_slider_pages',
		'choices' => [
			'limit' => 2,
            'row_label' => [
                'value' => esc_html__( 'Pages', 'bizberg-shop' ),
            ],
            'fields' => [
                'page' => [
                    'type'        => 'select',
                    'label'       => esc_html__( 'Select Page', 'bizberg-shop' ),
                    'choices'     => bizberg_get_all_pages()
                ],
                'align' => [
                    'type'        => 'select',
                    'label'       => esc_html__( 'Align', 'bizberg-shop' ),
                    'choices'     => [
                        'left' => esc_html__( 'Left', 'bizberg-shop' ),
                        'right' => esc_html__( 'Right', 'bizberg-shop' ),
                        'center' => esc_html__( 'Center', 'bizberg-shop' )
                    ],
                    'default' => 'center'
                ],
                'content_width' => [
                    'type'        => 'number',
                    'label'       => esc_html__( 'Content Width (in %)', 'bizberg-shop' ),
                    'default'     => 90
                ],
                'translate_x' => [
                    'type'        => 'number',
                    'label'       => esc_html__( 'TranslateX (in %)', 'bizberg-shop' ),
                    'default'     => -50,
                    'description' => esc_html__( 'Note: Default value is -50.', 'bizberg-shop' ),
                    'choices'     => [
                        'min'  => -99999,
                        'max'  => 99999,
                        'step' => 1,
                    ],
                ],
                'subtitle' => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Subtitle', 'bizberg-shop' )
                ],
                'button_text' => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Button Text', 'bizberg-shop' )
                ],
                'button_link' => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Button Link', 'bizberg-shop' )
                ],
                'color_title' => [
                    'type'        => 'color',
                    'label'       => esc_html__( 'Title Color', 'bizberg-shop' ),
                    'default'     => '#f5848c',
                ],
                'color_subtitle' => [
                    'type'        => 'color',
                    'label'       => esc_html__( 'Subtitle Color', 'bizberg-shop' ),
                    'default'     => '#f5848c',
                ],
                'color_content' => [
                    'type'        => 'color',
                    'label'       => esc_html__( 'Content Color', 'bizberg-shop' ),
                    'default'     => '#888',
                ]
            ],
		],
		'default'      => [],
		'partial_refresh'    => [
			'woo_slider_pages' => [
				'selector'        => '.ecommerce-banner .container .row',
				'render_callback' => 'bizberg_shop_get_slider_content'
			]
		],
	] );

	Kirki::add_field( 'bizberg', array(
	    'type'        => 'custom',
	    'settings'    => 'bs_slider_other_options',
	    'section'     => 'bizberg_shop_frontpage_woocommerce_slider',
	    'default'     => '<div class="bizberg_customizer_custom_heading">' . esc_html__( 'Slider Options', 'bizberg-shop' ) . '</div>',
	) );

	if( function_exists( 'bizberg_kirki_dtm_options' ) ){

        bizberg_kirki_dtm_options( 
            array(
                'display' => array(
                    'desktop' => 'desktop',
                    'tablet'  => 'tablet',
                    'mobile'  => 'mobile'
                ),
                'field_id' => 'bizberg',
                'section'  => 'bizberg_shop_frontpage_woocommerce_slider',
                'settings' => 'bizberg_shop_slider_height',
                'global_active_callback'    => array(),
                'fields'   => array(
                    'slider' => array(
                        'desktop' => array(
                            'label' => esc_html__( 'Height ( Desktop )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_slider_height',
                            'default'     => 500,  
                            'choices'     => [
                                'min'  => 100,
                                'max'  => 600,
                                'step' => 10,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => '.ecommerce-banner .slider',
                                    'property'      => 'height',
                                    'value_pattern' => '$px'
                                )
                            ),
                        ),
                        'tablet' => array(
                            'label' => esc_html__( 'Height ( Tablet )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_slider_height',
                            'default'     => 500,  
                            'choices'     => [
                                'min'  => 100,
                                'max'  => 600,
                                'step' => 25,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => '.ecommerce-banner .slider',
                                    'property'      => 'height',
                                    'value_pattern' => '$px',
                                    'media_query'   => '@media (min-width: 481px) and (max-width: 1024px)'
                                )
                            ),
                        ),
                        'mobile' => array(
                            'label' => esc_html__( 'Height ( Mobile )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_slider_height',
                            'default'     => 500, 
                            'choices'     => [
                                'min'  => 100,
                                'max'  => 600,
                                'step' => 25,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => '.ecommerce-banner .slider',
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

    Kirki::add_field( 'bizberg', [
		'type'        => 'simple-color',
		'settings'    => 'bs_slider_overlay',
		'label'       => __( 'Background Overlay', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_slider',
		'default'     => 'rgba(0, 0, 0, 0)',
		'choices'     => [
			'alpha' => true,
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element' => '.ecommerce-banner .overlay',
				'property' => 'background-color'
			],
		],
	] );

	Kirki::add_field( 'bizberg', array(
	    'type'        => 'custom',
	    'settings'    => 'bs_subtitle_font_options',
	    'section'     => 'bizberg_shop_frontpage_woocommerce_slider',
	    'default'     => '<div class="bizberg_customizer_custom_heading">' . esc_html__( 'Subtitle Font Options', 'bizberg-shop' ) . '</div>',
	) );

	Kirki::add_field( 'bizberg', [
		'type'        => 'typography',
		'settings'    => 'bs_slider_subtitle_font',
		'label'       => esc_html__( 'Subtitle Font', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_slider',
		'default'     => [
			'font-family'    => 'Raleway',
			'variant'        => '500',
			'letter-spacing' => '0',
			'text-transform' => 'uppercase',
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element' => 'body .bizberg_shop_slider h4',
			],
		],
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
                'section'  => 'bizberg_shop_frontpage_woocommerce_slider',
                'settings' => 'bizberg_shop_slider_subtitle_font_size',
                'global_active_callback'    => array(),
                'fields'   => array(
                    'slider' => array(
                        'desktop' => array(
                            'label' => esc_html__( 'Subtitle Font Size ( Desktop )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_slider_subtitle_font',
                            'default'     => 20,  
                            'choices'     => [
                                'min'  => 10,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => 'body .bizberg_shop_slider h4',
                                    'property'      => 'font-size',
                                    'value_pattern' => '$px'
                                )
                            ),
                        ),
                        'tablet' => array(
                            'label' => esc_html__( 'Subtitle Font Size ( Tablet )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_slider_subtitle_font',
                            'default'     => 18,  
                            'choices'     => [
                                'min'  => 10,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => 'body .bizberg_shop_slider h4',
                                    'property'      => 'font-size',
                                    'value_pattern' => '$px',
                                    'media_query'   => '@media (min-width: 481px) and (max-width: 1024px)'
                                )
                            ),
                        ),
                        'mobile' => array(
                            'label' => esc_html__( 'Subtitle Font Size ( Mobile )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_slider_subtitle_font',
                            'default'     => 16, 
                            'choices'     => [
                                'min'  => 10,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => 'body .bizberg_shop_slider h4',
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
                'section'  => 'bizberg_shop_frontpage_woocommerce_slider',
                'settings' => 'bizberg_shop_slider_subtitle_line_height',
                'global_active_callback'    => array(),
                'fields'   => array(
                    'slider' => array(
                        'desktop' => array(
                            'label' => esc_html__( 'Subtitle Line Height ( Desktop )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_slider_subtitle_line_height',
                            'default'     => 24,  
                            'choices'     => [
                                'min'  => 10,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => 'body .bizberg_shop_slider h4',
                                    'property'      => 'line-height',
                                    'value_pattern' => '$px'
                                )
                            ),
                        ),
                        'tablet' => array(
                            'label' => esc_html__( 'Subtitle Line Height ( Tablet )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_slider_subtitle_line_height',
                            'default'     => 24,  
                            'choices'     => [
                                'min'  => 10,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => 'body .bizberg_shop_slider h4',
                                    'property'      => 'line-height',
                                    'value_pattern' => '$px',
                                    'media_query'   => '@media (min-width: 481px) and (max-width: 1024px)'
                                )
                            ),
                        ),
                        'mobile' => array(
                            'label' => esc_html__( 'Subtitle Line Height ( Mobile )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_slider_subtitle_line_height',
                            'default'     => 22, 
                            'choices'     => [
                                'min'  => 10,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => 'body .bizberg_shop_slider h4',
                                    'property'      => 'line-height',
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
	    'settings'    => 'bs_title_font_options',
	    'section'     => 'bizberg_shop_frontpage_woocommerce_slider',
	    'default'     => '<div class="bizberg_customizer_custom_heading">' . esc_html__( 'Title Font Options', 'bizberg-shop' ) . '</div>',
	) );

	Kirki::add_field( 'bizberg', [
		'type'        => 'typography',
		'settings'    => 'bs_slider_title_font',
		'label'       => esc_html__( 'Title Font', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_slider',
		'default'     => [
			'font-family'    => 'Poppins',
			'variant'        => '700',
			'letter-spacing' => '0',
			'text-transform' => '',
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element' => 'body .bizberg_shop_slider h2',
			],
		],
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
                'section'  => 'bizberg_shop_frontpage_woocommerce_slider',
                'settings' => 'bizberg_shop_slider_title_font_size',
                'global_active_callback'    => array(),
                'fields'   => array(
                    'slider' => array(
                        'desktop' => array(
                            'label' => esc_html__( 'Title Font Size ( Desktop )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_slider_title_font',
                            'default'     => 38,  
                            'choices'     => [
                                'min'  => 10,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => 'body .bizberg_shop_slider h2',
                                    'property'      => 'font-size',
                                    'value_pattern' => '$px'
                                )
                            ),
                        ),
                        'tablet' => array(
                            'label' => esc_html__( 'Title Font Size ( Tablet )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_slider_title_font',
                            'default'     => 30,  
                            'choices'     => [
                                'min'  => 10,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => 'body .bizberg_shop_slider h2',
                                    'property'      => 'font-size',
                                    'value_pattern' => '$px',
                                    'media_query'   => '@media (min-width: 481px) and (max-width: 1024px)'
                                )
                            ),
                        ),
                        'mobile' => array(
                            'label' => esc_html__( 'Title Font Size ( Mobile )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_slider_title_font',
                            'default'     => 25, 
                            'choices'     => [
                                'min'  => 10,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => 'body .bizberg_shop_slider h2',
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
                'section'  => 'bizberg_shop_frontpage_woocommerce_slider',
                'settings' => 'bizberg_shop_slider_title_line_height',
                'global_active_callback'    => array(),
                'fields'   => array(
                    'slider' => array(
                        'desktop' => array(
                            'label' => esc_html__( 'Title Line Height ( Desktop )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_slider_title_line_height',
                            'default'     => 45,  
                            'choices'     => [
                                'min'  => 10,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => 'body .bizberg_shop_slider h2',
                                    'property'      => 'line-height',
                                    'value_pattern' => '$px'
                                )
                            ),
                        ),
                        'tablet' => array(
                            'label' => esc_html__( 'Title Line Height ( Tablet )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_slider_title_line_height',
                            'default'     => 40,  
                            'choices'     => [
                                'min'  => 10,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => 'body .bizberg_shop_slider h2',
                                    'property'      => 'line-height',
                                    'value_pattern' => '$px',
                                    'media_query'   => '@media (min-width: 481px) and (max-width: 1024px)'
                                )
                            ),
                        ),
                        'mobile' => array(
                            'label' => esc_html__( 'Title Line Height ( Mobile )', 'bizberg-shop' ),
                            'settings' => 'bizberg_shop_slider_title_line_height',
                            'default'     => 30, 
                            'choices'     => [
                                'min'  => 10,
                                'max'  => 50,
                                'step' => 1,
                            ],
                            'transport' => 'auto',
                            'output' => array(
                                array(
                                    'element'       => 'body .bizberg_shop_slider h2',
                                    'property'      => 'line-height',
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
	    'settings'    => 'bs_content_font_options',
	    'section'     => 'bizberg_shop_frontpage_woocommerce_slider',
	    'default'     => '<div class="bizberg_customizer_custom_heading">' . esc_html__( 'Content Font Options', 'bizberg-shop' ) . '</div>',
	) );

	Kirki::add_field( 'bizberg', [
		'type'        => 'typography',
		'settings'    => 'bs_slider_description_font',
		'label'       => esc_html__( 'Content Font', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_slider',
		'default'     => [
			'font-family'    => 'Open Sans',
			'variant'        => 'regular',
			'font-size'      => '13px',
			'line-height'    => '25px',
			'letter-spacing' => '0',
			'text-transform' => '',
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element' => '.bizberg_shop_slider .swiper-content p',
				'value_pattern' => '$'
			],
		],
	] );

	Kirki::add_field( 'bizberg', array(
	    'type'        => 'custom',
	    'settings'    => 'bs_button_font_options',
	    'section'     => 'bizberg_shop_frontpage_woocommerce_slider',
	    'default'     => '<div class="bizberg_customizer_custom_heading">' . esc_html__( 'Button Options', 'bizberg-shop' ) . '</div>',
	) );

	Kirki::add_field( 'bizberg', [
		'type'        => 'typography',
		'settings'    => 'bs_slider_button_font',
		'label'       => esc_html__( 'Button Font', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_slider',
		'default'     => [
			'font-family'    => 'Poppins',
			'variant'        => '500',
			'font-size'      => '14px',
			'line-height'    => '1',
			'letter-spacing' => '0',
			'text-transform' => 'uppercase',
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element' => '.btn-primary.woo_slider_button',
			],
		]
	] );

	Kirki::add_field( 'bizberg', [
		'type'        => 'simple-color',
		'settings'    => 'slider_read_more_background_normal',
		'label'       => __( 'Background Color ( Normal )', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_slider',
		'default'     => '#f5848c',
		'transport'   => 'auto',
		'output'      => [
			[
				'element'       => '.btn-primary.woo_slider_button',
				'property'      => 'background-color',
				'value_pattern' => '$ !important'
			],
		]
	] );

	Kirki::add_field( 'bizberg', [
		'type'        => 'simple-color',
		'settings'    => 'slider_read_more_background_hover',
		'label'       => __( 'Background Color ( Hover )', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_slider',
		'default'     => '#f24955',
		'transport'   => 'auto',
		'output'      => [
			[
				'element'       => '.btn-primary.woo_slider_button:hover',
				'property'      => 'background-color',
				'value_pattern' => '$ !important'
			],
		]
	] );

	Kirki::add_field( 'bizberg', [
		'type'        => 'simple-color',
		'settings'    => 'slider_read_more_text_color',
		'label'       => __( 'Text Color', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_slider',
		'default'     => '#fff',
		'transport'   => 'auto',
		'output'      => [
			[
				'element'       => '.btn-primary.woo_slider_button,.btn-primary.woo_slider_button:hover',
				'property'      => 'color',
				'value_pattern' => '$ !important'
			],
		]
	] );

}