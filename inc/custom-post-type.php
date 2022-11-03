<?php

// now let's add custom page categories 
register_taxonomy( 'category-page', 
array('location', 'page'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
array('hierarchical' => true,     /* if this is true, it acts like categories */             
    'labels' => array(
        'name' => __( 'Categorías', 'ceio' ), /* name of the custom taxonomy */
        'singular_name' => __( 'Categoría página', 'ceio' ), /* single taxonomy name */
        'search_items' =>  __( 'Search categories', 'ceio' ), /* search title for taxomony */
        'all_items' => __( 'All categories', 'ceio' ), /* all title for taxonomies */
        'parent_item' => __( 'Parent category', 'ceio' ), /* parent title for taxonomy */
        'parent_item_colon' => __( 'Parent category:', 'ceio' ), /* parent taxonomy title */
        'edit_item' => __( 'Edit Category', 'ceio' ), /* edit custom taxonomy title */
        'update_item' => __( 'Update Category', 'ceio' ), /* update title for taxonomy */
        'add_new_item' => __( 'Add new Category', 'ceio' ), /* add new title for taxonomy */
        'new_item_name' => __( 'New Category', 'ceio' ) /* name title for taxonomy */
    ),
    'show_admin_column' => true,
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => false,
    'query_var' => false,
    'has_archive' => false, /* you can rename the slug here */
    )
);