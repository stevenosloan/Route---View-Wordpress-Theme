<?php 

/*********************************************************
****************  WORDPRESS FUNCTIONS  *******************
**********************************************************/

$themedirectory = get_bloginfo('template_url');

// include options page
//include $themedirectory . '/theme-options.php';
get_template_part('views/theme/analytics-options');

// clean up wp-head
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version


function the_category_unlinked($separator = '') {
    $categories = (array) get_the_category();

    $thelist = '';
    foreach($categories as $category) {    // concate
        $thelist .= $separator . $category->category_nicename;
    }

    return $thelist;
}

/*********************************************************
******************  THEME FUNCTIONS  *********************
**********************************************************/

define( 'THEME_DIR', dirname(__FILE__) );
$GOBALS['view'] = "default";

function render( $file_name ){
  include ( THEME_DIR . '/views/' . $file_name . '.php' );
}

function render_layout( $layout_name ){
  include ( THEME_DIR . '/views/layouts/' . $layout_name . '.php' );
}

function render_partial( $partial_name ){
  include ( THEME_DIR . '/views/partials/' . $partial_name . '.php') ;
}

function render_loop( $loop_name ){
  include ( THEME_DIR . '/views/loops/' . $loop_name . '.php');
}

function yield( $view_name = "default" ){
  render( $view_name );
}

function use_view( $view_name, $layout_name = "default" ){

  $GLOBALS['view'] = $view_name;
  render_layout( $layout_name );

}

function get_versioned_script( $script_name ){

  $script_url = get_bloginfo('template_url') . '/assets/scripts/';
  $script_directory = get_stylesheet_directory() . '/assets/scripts/';

  return $script_url . $script_name . '.' . filemtime( $script_directory . $script_name . ".js") . '.js';

}

function versioned_script( $script_name ){

  echo get_versioned_script( $script_name );

}

function include_script( $script_name ){

  echo '<script type="text/javascript" src="', get_versioned_script( $script_name ), '" ></script>';

}

function include_stylesheet( $stylesheet_name ){

  $stylesheet_url = get_bloginfo('template_url') . '/assets/css/';
  $stylesheet_directory = get_stylesheet_directory() . '/assets/css/';

  echo '<link rel="stylesheet" href="', $stylesheet_url, $stylesheet_name, '.', filemtime( $stylesheet_directory . $stylesheet_name . ".css"), '.css', '" />';

}

?>