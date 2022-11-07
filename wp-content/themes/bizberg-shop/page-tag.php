<?php
get_header();
$args = [
    'post_type' => 'product',
    'product_cat' => $cat_slug,
    'posts_per_page' => 8,
    'order' => 'desc',
];

$products = new \WP_Query($args);

$html = "";
$html .= "<div class='csw-catory-product'>";
$html .= "<div class='csw-poster'>";
$html .= "<img src='https://bizweb.dktcdn.net/100/426/076/themes/877813/assets/product_tag_banner.jpg?1667286845678'/>";
if ($products->have_posts()) {
    while ($products->have_posts()) {
        $products->the_post();

        global $product;
       

        $html .= "<div class='csw-product-item'>";

        $html .= "<h3 class='csw-title'><a href='" . get_the_permalink() . "'>" .$product->get_categories() . "</a></h3>";
        $html .= "</div>";
    }
}
wp_reset_postdata();
$html .= "</div>";
$html .= "<div class='csw-list-product'>";

if ($products->have_posts()) {
    while ($products->have_posts()) {
        $products->the_post();

        global $product;

        $html .= "<div class='csw-product-item'>";

        $html .= "<a class='csw-media' href='" . get_the_permalink() . "'>" . get_the_post_thumbnail(get_the_ID(), 'thumnail', array('class' => 'thumnail')) . "</a>";
        $html .= "<h3 class='csw-title'><a href='" . get_the_permalink() . "'>" . get_the_title() . "</a></h3>";
        $html .= "<div class='csw-product-price'>" . $product->get_price_html() . "</div>";
        $html .= "<a class='csw-add-cart' href='" . home_url() . "?add-to-cart=" . get_the_ID() . "'>" . esc_html__('Thêm vào giỏ hàng', 'ntl-csw') . "</a>";
        $html .= "</div>";
    }
}
wp_reset_postdata();
$html .= "</div>";

echo $html;
