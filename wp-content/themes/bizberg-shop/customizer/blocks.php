<?php

add_action( 'init' , 'bizberg_shop_block_repeater' );
function bizberg_shop_block_repeater(){

	Kirki::add_field( 'bizberg', [
		'type'        => 'advanced-repeater',
		'label'       => esc_html__( 'Gutenberg Blocks', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_gutenberg_blocks',
		'choices'     => [
			'row_label' => [
				'value' => esc_html__( 'Page', 'bizberg-shop' ),
			],
			'fields' => [
				'page_id' => [
					'type'        => 'select',
					'label'       => esc_html__( 'Pages', 'bizberg-shop' ),
					'choices'     => bizberg_get_all_pages()
				],
				'width' => [
					'type'        => 'select',
					'label'       => esc_html__( 'Width', 'bizberg-shop' ),
					'default'     => 'box_width',
					'description' => esc_html__( 'Note: Full Width & Box Width will not work on before_slider & after_slider options below.', 'bizberg-shop' ),
					'choices'     => [
						'box_width'  => esc_html__( 'Box Width', 'bizberg-shop' ),
						'full_width' => esc_html__( 'Full Width', 'bizberg-shop' ),
					]
				],
				'location' => [
					'type'        => 'select',
					'label'       => esc_html__( 'Location', 'bizberg-shop' ),
					'default'     => '',
					'choices'     => [
						''                         => esc_html__( 'Select One From Below', 'bizberg-shop' ),
						'before_slider'            => esc_html__( 'Before Slider Section', 'bizberg-shop' ),
						'after_slider'             => esc_html__( 'After Slider Section', 'bizberg-shop' ),
						'before_services'          => esc_html__( 'Before Services Section', 'bizberg-shop' ),
						'before_sales_banner'      => esc_html__( 'Before Sales Banner Section', 'bizberg-shop' ),
						'before_top_categories'    => esc_html__( 'Before Top Categories Section', 'bizberg-shop' ),
						'before_woo_tab_products'  => esc_html__( 'Before WooCommerce Tab Products Section', 'bizberg-shop' ),
						'before_repeater_products' => esc_html__( 'Before Repeater Product Section', 'bizberg-shop' ),
						'before_clients_logo'      => esc_html__( 'Before Clients Logo Section', 'bizberg-shop' ),
						'before_footer'            => esc_html__( 'Before Footer Section', 'bizberg-shop' ),
					]
				],
			],
		],		
		'settings'     => 'gutenberg_blocks_repeater',
		'default'      => []
	] );

}