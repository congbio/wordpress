<?php

add_action( 'init' , 'bizberg_shop_clients_logo' );
function bizberg_shop_clients_logo(){

	Kirki::add_field( 'bizberg', [
		'type'        => 'advanced-repeater',
		'label'       => esc_html__( 'Clients Logo', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_clients_logo',
		'choices'     => [
			'row_label' => [
				'value' => esc_html__( 'Logo', 'bizberg-shop' ),
			],
			'fields' => [
				'image_id' => [
					'type'        => 'image',
					'label'       => esc_html__( 'Image', 'bizberg-shop' )
				],
				'link' => [
					'type'        => 'text',
					'label'       => esc_html__( 'URL', 'bizberg-shop' )
				],
			],
		],		
		'settings'     => 'clients_logo',
		'default'      => [],
		'partial_refresh'    => [
			'clients_logo' => [
				'selector'        => '.bs_brands .container',
				'render_callback' => 'bizberg_shop_get_clients_logo_content'
			]
		],
	] );


}