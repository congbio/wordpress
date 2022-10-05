 <div class="category-container">
   <div class="home-category">

   <?php
// categories
// retrieve all list of categories
$categories = get_categories(array(
    "orderedby"=> "name",
    "parent" => 0
));

forEach($categories as $category){
  printf ('<div class="category-elementt">  <img src="https://i.ytimg.com/vi/re6wn6t96T8/maxresdefault.jpg" alt="">') ;
    printf('<a href="%1$s" class="button"><span>%2$s</span> </a>',
    esc_url(get_category_link($category->term_id)),
    esc_html($category->name));
    printf('</div>');
}
?>
   </div>
 </div>