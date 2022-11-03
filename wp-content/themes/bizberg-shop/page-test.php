<?php 
get_header();
 $args = array(
        'post_type'      => 'product',
        'taxonomy'   => 'product_cat',
        'parent'    => 0 
    );
    // render category menu
    $categories = get_categories( $args );
        echo '<ul class="product_cats_menu">';
       forEach($categories as $category){
	    $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
        var_dump($image);
        printf ('<li class="cat-item" >') ;
        printf('<img src="'.$image.'" alt="'.$category_name.'">') ;
        printf('<a href="%1$s" class="button"><span>%2$s</span> </a>',
        esc_url(get_category_link($category->term_id)),
        esc_html($category->name));
        printf('</li>');
}
            echo '</ul>'; 
            
            ?>