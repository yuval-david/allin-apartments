<?php


//CREATE MENU
function wpb_custom_new_menu() {
    register_nav_menus(
      array(
        'main-menu' => __( 'Main menu' ),
        'footer-menu' => __( 'Footer Menu' )
      )
    );
  }

add_action( 'init', 'wpb_custom_new_menu' );

/* ADD OPTION - ACF */
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(

		'page_title' 	=> 'הגדרות כלליות',
		'menu_title'	=> 'הגדרות כלליות',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}


function load_style_js() {

  /* CONNECT - STYLE */

	  wp_register_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css', array(), 1, 'all');
    wp_enqueue_style('swiper-css');

	  wp_register_style('font-awesome', '"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), 1, 'all');
    wp_enqueue_style('font-awesome');

    wp_register_style('main-css', get_template_directory_uri() . '/css/style.css', array(), 1, 'all');
    wp_enqueue_style('main-css');


  /* CONNECT - JS */
	
	  wp_register_script('swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), 1, 'all');
    wp_enqueue_script('swiper');

    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), 1, 'all');
    wp_enqueue_script('jquery');
	
  	wp_register_script('main-js', get_template_directory_uri() . '/js/main.js', array(), 1, 'all');
    wp_enqueue_script('main-js');

} 

add_action( 'wp_enqueue_scripts', 'load_style_js' );


/////////////////////////
//    POST TYPES      //
///////////////////////


//Post type - HOUSES
// Our custom post type function
function houses_post_type() {

  $labels = array(

    'name' => _x( 'דירות', 'Post Type General Name', 'text_domain' ),
    'singular_name' => _x( 'דירות', 'Post Type Singular Name', 'text_domain' ),
    'menu_name' => __( 'דירות', 'text_domain' ),
    'name_admin_bar' => __( 'Post Type', 'text_domain' ),
    'archives' => __( 'Item Archives', 'text_domain' ),
    'attributes' => __( 'Item Attributes', 'text_domain' ),
    'parent_item_colon' => __( 'Parent Item:', 'text_domain' ),
    'all_items' => __( 'כל הדירות', 'text_domain' ),
    'add_new_item' => __( 'הוסף דירה חדשה', 'text_domain' ),
    'add_new' => __( 'הוסף דירה חדשה', 'text_domain' ),
    'new_item' => __( 'New Item', 'text_domain' ),
    'edit_item' => __( 'Edit Item', 'text_domain' ),
    'update_item' => __( 'Update Item', 'text_domain' ),
    'view_item' => __( 'View Item', 'text_domain' ),
    'view_items' => __( 'View Items', 'text_domain' ),
    'search_items' => __( 'Search Item', 'text_domain' ),
    'not_found' => __( 'Not found', 'text_domain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'text_domain' ),
    'featured_image' => __( 'Featured Image', 'text_domain' ),
    'set_featured_image' => __( 'Set featured image', 'text_domain' ),
    'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
    'use_featured_image' => __( 'Use as featured image', 'text_domain' ),
    'insert_into_item' => __( 'Insert into item', 'text_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
    'items_list' => __( 'Items list', 'text_domain' ),
    'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
    'filter_items_list' => __( 'Filter items list', 'text_domain' ),

  );

  $rewrite = array(

    'slug' => 'Houses',
    'with_front' => true,
    'pages' => true,
    'feeds' => true,

  );


  $args = array(


    'label' => __( 'Houses', 'text_domain' ),
    'description' => __( 'Houses', 'text_domain' ),
    'labels' => $labels,
    'supports' => array( 'title' ),
    'taxonomies' => array( 'houses_cat', 'post_tag' ),
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-admin-home',
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'page'

  );

  register_post_type( 'houses', $args );

}

add_action( 'init', 'houses_post_type', 0 );


// HOUSES TAXONOMY
function create_houses_taxonomy() {

    register_taxonomy(

        'houses_cat',
        'houses',
		
        array(

            'label' => ( 'קטגוריות הנכסים' ),
            'hierarchical' => true,
            'show_ui' => true,
            'show_in_rest' => true, 
            'show_admin_column' => true,
            'query_var' => true,
			

        )

    );

}

add_action( 'init', 'create_houses_taxonomy' );





//Post type - SERVICES
// Our custom post type function
function services_post_type() {

  $labels = array(

    'name' => _x( 'שירותים', 'Post Type General Name', 'text_domain' ),
    'singular_name' => _x( 'שירותים', 'Post Type Singular Name', 'text_domain' ),
    'menu_name' => __( 'שירותים', 'text_domain' ),
    'name_admin_bar' => __( 'Post Type', 'text_domain' ),
    'archives' => __( 'Item Archives', 'text_domain' ),
    'attributes' => __( 'Item Attributes', 'text_domain' ),
    'parent_item_colon' => __( 'Parent Item:', 'text_domain' ),
    'all_items' => __( 'כל השירותים', 'text_domain' ),
    'add_new_item' => __( 'הוסף שירות חדש', 'text_domain' ),
    'add_new' => __( 'הוסף שירות חדש', 'text_domain' ),
    'new_item' => __( 'New Item', 'text_domain' ),
    'edit_item' => __( 'Edit Item', 'text_domain' ),
    'update_item' => __( 'Update Item', 'text_domain' ),
    'view_item' => __( 'View Item', 'text_domain' ),
    'view_items' => __( 'View Items', 'text_domain' ),
    'search_items' => __( 'Search Item', 'text_domain' ),
    'not_found' => __( 'Not found', 'text_domain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'text_domain' ),
    'featured_image' => __( 'Featured Image', 'text_domain' ),
    'set_featured_image' => __( 'Set featured image', 'text_domain' ),
    'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
    'use_featured_image' => __( 'Use as featured image', 'text_domain' ),
    'insert_into_item' => __( 'Insert into item', 'text_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
    'items_list' => __( 'Items list', 'text_domain' ),
    'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
    'filter_items_list' => __( 'Filter items list', 'text_domain' ),

  );

  $rewrite = array(

    'slug' => 'Services',
    'with_front' => true,
    'pages' => true,
    'feeds' => true,

  );


  $args = array(


    'label' => __( 'Services', 'text_domain' ),
    'description' => __( 'Services', 'text_domain' ),
    'labels' => $labels,
    'supports' => array( 'title' ),
    'taxonomies' => array( 'services_cat', 'post_tag' ),
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-awards',
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'page'

  );

  register_post_type( 'services', $args );

}

add_action( 'init', 'services_post_type', 0 );




//Post type - Customers
// Our custom post type function
function customers_post_type() {

  $labels = array(

    'name' => _x( 'לקוחות ממליצים', 'Post Type General Name', 'text_domain' ),
    'singular_name' => _x( 'לקוחות ממליצים', 'Post Type Singular Name', 'text_domain' ),
    'menu_name' => __( 'לקוחות ממליצים', 'text_domain' ),
    'name_admin_bar' => __( 'Post Type', 'text_domain' ),
    'archives' => __( 'Item Archives', 'text_domain' ),
    'attributes' => __( 'Item Attributes', 'text_domain' ),
    'parent_item_colon' => __( 'Parent Item:', 'text_domain' ),
    'all_items' => __( 'כל הלקוחות הממליצים', 'text_domain' ),
    'add_new_item' => __( 'הוסף המלצה חדשה', 'text_domain' ),
    'add_new' => __( 'הוסף המלצה חדשה', 'text_domain' ),
    'new_item' => __( 'New Item', 'text_domain' ),
    'edit_item' => __( 'Edit Item', 'text_domain' ),
    'update_item' => __( 'Update Item', 'text_domain' ),
    'view_item' => __( 'View Item', 'text_domain' ),
    'view_items' => __( 'View Items', 'text_domain' ),
    'search_items' => __( 'Search Item', 'text_domain' ),
    'not_found' => __( 'Not found', 'text_domain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'text_domain' ),
    'featured_image' => __( 'Featured Image', 'text_domain' ),
    'set_featured_image' => __( 'Set featured image', 'text_domain' ),
    'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
    'use_featured_image' => __( 'Use as featured image', 'text_domain' ),
    'insert_into_item' => __( 'Insert into item', 'text_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
    'items_list' => __( 'Items list', 'text_domain' ),
    'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
    'filter_items_list' => __( 'Filter items list', 'text_domain' ),

  );

  $rewrite = array(

    'slug' => 'Customers',
    'with_front' => true,
    'pages' => true,
    'feeds' => true,

  );


  $args = array(


    'label' => __( 'Customers', 'text_domain' ),
    'description' => __( 'Customers', 'text_domain' ),
    'labels' => $labels,
    'supports' => array( 'title' ),
    'taxonomies' => array( 'customers_cat', 'post_tag' ),
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-heart',
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'page'

  );

  register_post_type( 'customers', $args );

}

add_action( 'init', 'customers_post_type', 0 );