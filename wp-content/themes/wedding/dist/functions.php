<?php

/* -- Load Styles, Fonts, JS and conditional IE -- */
function theme_styles() {
    global $wp_styles;
	wp_enqueue_style( 'theme_css', get_template_directory_uri() . '/dist/css/wedding_theme.min.css' );
 	//wp_enqueue_style( 'css_ie', get_template_directory_uri() . '/dist/css/ie_theme.min.css', array( 'theme_css' ) );
  	//$wp_styles->add_data( 'css_ie', 'conditional', 'gte IE 9' );
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

function load_fonts() {
	wp_register_style( 'opensans', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,800,700,300' );
    wp_register_style( 'tangerine', 'https://fonts.googleapis.com/css?family=Tangerine' );
    wp_enqueue_style( 'opensans' );
    wp_enqueue_style( 'tangerine' );
}
add_action( 'wp_print_styles', 'load_fonts' );

function theme_js() {
	global $wp_scripts;

    wp_deregister_script( 'jquery' );

    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', '', '', false );
    wp_enqueue_script( 'jquery' );

    wp_register_script( 'jquery_ui', 'http://code.jquery.com/ui/1.11.3/jquery-ui.min.js', array( 'jquery' ), '', false );
    wp_enqueue_script( 'jquery_ui' );

    wp_enqueue_script( 'modernizr_js', get_template_directory_uri() . '/dist/js/modernizr-custom.min.js', '', '', false );
    wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/dist/js/bootstrap.min.js', array( 'jquery', 'jquery_ui' ), '', false );

    if( is_page( 42 ) ) :
        wp_enqueue_script( 'googlemaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDCZWYpl9LmnGh1Ldl48T6Rwkv8vB-NgMM&sensor=false&extension=.js', '', '', true );
        //wp_enqueue_script( 'contactmap', get_template_directory_uri() . '/dist/js/contactmap.js', array( 'googlemaps' ), '', true );
    endif;

    wp_enqueue_script( 'theme_rjr_js', get_template_directory_uri() . '/dist/js/wedding_scripts.min.js', array( 'jquery', 'jquery_ui', 'bootstrap_js' ), '', true );

	wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', false );
	wp_register_script( 'respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', false );
	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );


}
add_action('wp_enqueue_scripts', 'theme_js');

/* -- Theme Menus -- */
function add_thememenu_support() {
	register_nav_menus(
    	array(
    		'main-menu' => __( 'Main Navigation' ),
    	)
  	);
}
add_action( 'init', 'add_thememenu_support' );

/* -- Theme Support and Removals -- */
add_theme_support( 'post-thumbnails' );

/* -- Walker Class -- */
class Wedding_Walker_Nav_Menu extends Walker_Nav_Menu {

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat( "\t", $depth );
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

        global $wp_query, $wpdb;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $main_nav = wp_get_nav_menu_object( 'Top Menu' );

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names . '>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $active_attributes = ! empty( $item->url ) ? ' href="'   . esc_attr( $item->url ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes . $active_attributes . '>' . $item->title;
        $item_output .= $args->link_before . $args->link_after;
        $item_output .= '</a>';

        if( $item->menu_order < $main_nav->count ) :
            $item_output .= '<span>&#124;</span>';
        endif;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
    }
}

/* -- User Access & Menu Items -- */
function show_current_user_attachments( $query = array() ) {
    if( !current_user_can( 'administrator' ) ) {
        $user_id = get_current_user_id();
        if( $user_id ) {
            $query[ 'author' ] = $user_id;
        }
    }
    return $query;
}
add_filter( 'ajax_query_attachments_args', 'show_current_user_attachments', 10, 1 );

function filter_site_upload_size_limit( $size ) {
    if( !current_user_can( 'administrator' ) ) {
        $size = 1024;
    }
    return $size;
}
add_filter( 'upload_size_limit', 'filter_site_upload_size_limit', 20 );

function remove_menu_pages() {
    if( !current_user_can( 'administrator' ) ) {
        remove_menu_page( 'edit.php?post_type=hotels' );
        remove_menu_page( 'edit.php?post_type=people' );
        remove_menu_page( 'edit.php?post_type=messages' );
        remove_menu_page( 'edit.php?post_type=story' );
        remove_menu_page( 'wpcf7' );
    }
}
add_action( 'admin_init', 'remove_menu_pages' );

/* -- Custom Post Types -- */
function register_cpt_hotels() {

    $labels = array(
        'name' => _x( 'Hotels', 'hotels' ),
        'singular_name' => _x( 'Hotel', 'hotels' ),
        'add_new' => _x( 'Add New', 'hotels' ),
        'add_new_item' => _x( 'Add New Hotel', 'hotels' ),
        'edit_item' => _x( 'Edit Hotel', 'hotels' ),
        'new_item' => _x( 'New Hotel', 'hotels' ),
        'view_item' => _x( 'View Hotel', 'hotels' ),
        'search_items' => _x( 'Search Hotels', 'hotels' ),
        'not_found' => _x( 'No hotels found', 'hotels' ),
        'not_found_in_trash' => _x( 'No hotels found in Trash', 'hotels' ),
        'parent_item_colon' => _x( 'Parent Hotel:', 'hotels' ),
        'menu_name' => _x( 'Hotels', 'hotels' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies' => array( 'post_tag', 'page-category', 'hotels' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-building',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type( 'hotels', $args );
}
add_action( 'init', 'register_cpt_hotels' );

function register_cpt_people() {

    $labels = array(
        'name' => _x( 'People', 'people' ),
        'singular_name' => _x( 'People', 'people' ),
        'add_new' => _x( 'Add New', 'people' ),
        'add_new_item' => _x( 'Add New Person', 'people' ),
        'edit_item' => _x( 'Edit Person', 'people' ),
        'new_item' => _x( 'New Person', 'people' ),
        'view_item' => _x( 'View Person', 'people' ),
        'search_items' => _x( 'Search People', 'people' ),
        'not_found' => _x( 'No people found', 'people' ),
        'not_found_in_trash' => _x( 'No people found in Trash', 'people' ),
        'parent_item_colon' => _x( 'Parent Person:', 'people' ),
        'menu_name' => _x( 'People', 'people' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies' => array( 'post_tag', 'page-category', 'people' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-groups',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type( 'people', $args );
}
add_action( 'init', 'register_cpt_people' );

function taxonomies_people() {
    $labels = array(
        'name' => _x( 'People Categories', 'taxonomy general name' ),
        'singular_name' => _x( 'Person Category', 'taxonomy singular name' ),
        'search_items' => __( 'Search People Categories' ),
        'all_items' => __( 'All People Categories' ),
        'parent_item' => __( 'Parent Person Category' ),
        'parent_item_colon' => __( 'Parent Person Category:' ),
        'edit_item' => __( 'Edit People Category' ),
        'update_item' => __( 'Update People Category' ),
        'add_new_item' => __( 'Add New People Category' ),
        'new_item_name' => __( 'New People Category' ),
        'menu_name' => __( 'People Categories' )
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true
    );
    register_taxonomy( 'taxonomies_people', 'people', $args );
}
add_action( 'init', 'taxonomies_people', 0 );

function register_cpt_messages() {

    $labels = array(
        'name' => _x( 'Messages', 'messages' ),
        'singular_name' => _x( 'Message', 'messages' ),
        'add_new' => _x( 'Add New', 'messages' ),
        'add_new_item' => _x( 'Add New Message', 'messages' ),
        'edit_item' => _x( 'Edit Message', 'messages' ),
        'new_item' => _x( 'New Message', 'messages' ),
        'view_item' => _x( 'View Message', 'messages' ),
        'search_items' => _x( 'Search Messages', 'messages' ),
        'not_found' => _x( 'No messages found', 'messages' ),
        'not_found_in_trash' => _x( 'No messages found in Trash', 'messages' ),
        'parent_item_colon' => _x( 'Parent Message:', 'messages' ),
        'menu_name' => _x( 'Messages', 'messages' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies' => array( 'post_tag', 'page-category', 'messages' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-email-alt',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type( 'messages', $args );
}
add_action( 'init', 'register_cpt_messages' );

function register_cpt_story() {

    $labels = array(
        'name' => _x( 'Stories', 'story' ),
        'singular_name' => _x( 'Story', 'story' ),
        'add_new' => _x( 'Add New', 'story' ),
        'add_new_item' => _x( 'Add New Story', 'story' ),
        'edit_item' => _x( 'Edit Story', 'story' ),
        'new_item' => _x( 'New Story', 'story' ),
        'view_item' => _x( 'View Story', 'story' ),
        'search_items' => _x( 'Search Story', 'story' ),
        'not_found' => _x( 'No story found', 'story' ),
        'not_found_in_trash' => _x( 'No story found in Trash', 'story' ),
        'parent_item_colon' => _x( 'Parent Story:', 'story' ),
        'menu_name' => _x( 'Our Story', 'story' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies' => array( 'post_tag', 'page-category', 'story' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-book-alt',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type( 'story', $args );
}
add_action( 'init', 'register_cpt_story' );

/* -- Bespoke Functions -- */
function international_number_link( $number ) { // Adds international dialling prefix for GB
    $numbers = preg_replace( '/\s+/', '', $number );
    $str = substr( $numbers, 1 );
    $int_link = 'tel:+44' . $str;

    return $int_link;
}

function convert_to_numeric( $str ) { // Remove grammar from numeric figures and convert to float value
    $newstr = str_replace( array( ',', '.' ), '', $str );
    if( is_numeric( $newstr ) ) {
        $value = floatval( $newstr );

        return $value;
    }
    return false;
}

function read_time( $content ) { // Show average read time of an article
    $len = str_word_count( $content );
    $time = $len / 225; // 225 is average words read per minute.

    if( $time >= 1 && $time < 1.5 ) {
        $str = 'About a minute';
    }
    elseif( $time <= 1 ) {
        $str = 'Less than a minute';
    }
    else {
        $str = round( $time ) . ' minutes';
    }
    return $str;
}

/* -- Breadcrumbs -- */
/* https://www.thewebtaylor.com/articles/wordpress-creating-breadcrumbs-without-a-plugin */

function custom_breadcrumbs() {

    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'home';

    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';

    // Get the query & post information
    global $post, $wp_query;

    if ( is_front_page() ) {
        // Build the breadcrumbs
        echo '<ul role="navigation" id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

        // Home page
        echo '<li class="item-home item-current"><img src="' . get_template_directory_uri() . '/dist/svg/home_icon_grn.svg' . '" alt="Home" /></li>';

        echo '</ul>';
    }

    // Do not display on the homepage
    if ( !is_front_page() ) {

        // Build the breadcrums
        echo '<ul role="navigation" id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '"><img src="' . get_template_directory_uri() . '/dist/svg/home_icon_grn.svg' . '" alt="Home" /></a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';

        if ( ( is_archive() && !is_tax() && !is_category() && !is_tag() ) && !is_search() ) {

            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title( $prefix, false ) . '</strong></li>';

        } else if ( is_home() ) {

            echo '<li class="item-current item-home"><strong class="bread-current">News</strong></li>';

        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object( $post_type );
                $post_type_archive = get_post_type_archive_link( $post_type );

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';

            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';

        } else if ( is_single() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if( $post_type != 'post' ) {

                $post_type_object = get_post_type_object( $post_type );
                $post_type_archive = get_post_type_archive_link( $post_type );

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';

            }
            else if( $post_type == 'post' ) {
                echo '<li class="item-cat item-custom-post-type-post"><a class="bread-cat bread-custom-post-type-post" href="'. get_bloginfo( 'url' ) . '/news">news</a></li><li class="separator">' . $separator . '</li>';
            }

            // Get post category info
            $category = get_the_category();

            if( !empty( $category ) && ( $post_type != 'post' ) ) {

                // Get last category post is in
                $last_category = end( array_values( $category ) );

                // Get parent any categories and create array
                $get_cat_parents = rtrim( get_category_parents( $last_category->term_id, true, ',' ), ',' );
                $cat_parents = explode( ',', $get_cat_parents );

                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';

                foreach( $cat_parents as $parents ) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }

            }

            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists( $custom_taxonomy );
            if( empty( $last_category ) && !empty( $custom_taxonomy ) && $taxonomy_exists ) {

                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id = $taxonomy_terms[0]->term_id;
                $cat_nicename = $taxonomy_terms[0]->slug;
                $cat_link = get_term_link( $taxonomy_terms[0]->term_id, $custom_taxonomy );
                $cat_name = $taxonomy_terms[0]->name;

            }

            // Check if the post is in a category
            if( !empty( $last_category ) ) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            // Else if post is in a custom taxonomy
            } else if( !empty( $cat_id ) ) {

                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            } else {

                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            }

        } else if ( is_category() ) {

            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';

        } else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );

                // Get parents in the right order
                $anc = array_reverse( $anc );

                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents = '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }

                // Display parent pages
                echo $parents;

                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

            } else {

                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';

            }

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id        = get_query_var( 'tag_id' );
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;

            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';

        } else if ( is_author() ) {

            // Author archive
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';

        } else if ( get_query_var( 'paged' ) && ( !is_search() ) ) {

            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';

        } else if ( is_search() ) {

            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<li class="item-current"><strong>' . '404 error' . '</strong></li>';
        }

        echo '</ul>';

    }
}

/* -- Pagination -- */
function html5wp_pagination() {

    global $wp_query;

    $big = 999999999;

    echo paginate_links(
        array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var( 'paged' ) ),
        'total' => $wp_query->max_num_pages )
    );
}
add_action( 'init', 'html5wp_pagination' );

/* -- SEO Yoast Locale -- */
function override_og_locale( $locale ) {
    return "en_GB";
}
//add_filter( 'wpseo_locale', 'override_og_locale' );

/* -- Add Global Site Options Page -- */

function theme_settings_page() { ?>

    <div class="wrap">
        <?php settings_errors(); ?>
        <h1>Wedding Theme Panel &amp; Settings</h1>
        <form method="POST" action="options.php">

            <?php
                settings_fields( 'options-section' );
                do_settings_sections( 'options-section' );
            ?>

            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                <tr>
                    <td><label for="twitter_url">Twitter </label></td>
                    <td><input type="text" id="twitter_url" name="twitter_url" size="45" value="<?php echo esc_attr( get_option( 'twitter_url' ) ); ?>" /></td>
                </tr>

                <tr>
                    <td><label for="instagram_url">Instagram </label></td>
                    <td><input type="text" id="instagram_url" name="instagram_url" size="45" value="<?php echo esc_attr( get_option( 'instagram_url' ) ); ?>" /></td>
                </tr>

                <tr>
                    <td><label for="pinterest_url">Pinterest </label></td>
                    <td><input type="text" id="pinterest_url" name="pinterest_url" size="45" value="<?php echo esc_attr( get_option( 'pinterest_url' ) ); ?>" /></td>
                </tr>

                <tr>
                    <td><label for="email_address">Email Address </label></td>
                    <td><input type="text" id="email_address" name="email_address" size="45" value="<?php echo esc_attr( get_option( 'email_address' ) ); ?>" /></td>
                </tr>

                <tr>
                    <td><label for="analytics">Analytics </label></td>
                    <td><textarea id="analytics" name="analytics" rows="5" cols="75"><?php echo esc_attr(get_option( 'analytics' ) ); ?></textarea></td>
                </tr>

                <tr>
                    <td><?php submit_button(); ?></td>
                </tr>
                </tbody>
            </table>

        </form>
    </div>

<?php
}

function register_sections_settings() {
    register_setting( 'options-section', 'twitter_url' );
    register_setting( 'options-section', 'instagram_url' );
    register_setting( 'options-section', 'pinterest_url' );
    register_setting( 'options-section', 'email_address' );
    register_setting( 'options-section', 'analytics' );
}

function add_theme_menu_item() {
    add_menu_page( 'Theme Panel', 'Theme Settings', 'manage_options', 'theme-panel', 'theme_settings_page', null, 99 );
    add_action( 'admin_init', 'register_sections_settings' );
}
add_action( 'admin_menu', 'add_theme_menu_item' );

?>
