<?php
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
function enqueue_child_theme_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
 
function congbio_styles()
{
/*
* Hàm get_stylesheet_uri() sẽ trả về giá trị dẫn đến file style.css của theme
* Nếu sử dụng child theme, thì file style.css này vẫn load ra từ theme mẹ
*/

// import reponsive js header
 

wp_register_style('main-style', get_template_directory_uri() . '/css/app.css', 'all');
wp_enqueue_style('main-style');
wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/app.css',false,'1.1','all');
 
}
add_action('wp_enqueue_scripts', 'congbio_styles');
?>