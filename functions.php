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

function render_layout( $layout_name ){
  include ( THEME_DIR . '/views/layouts/' . $layout_name . '.php' );
}

function render_partial( $partial_name ){
  include ( THEME_DIR . '/views/partials/' . $partial_name . '.php') ;
}

function render_loop( $loop_name, $query_args = '' ){

  // get the before, during, and after functions of loop
  include THEME_DIR.'/views/loops/'.$loop_name.'.php';

  if( is_array($query_args) ){
  
    $query_object = new WP_Query( $query_args );
    
    if( $query_object->have_posts() ) :
    
      if_available( $loop_name, 'render_before' );
      
        while( $query_object->have_posts() ) : $query_object->the_post();
        
          if_available( $loop_name, 'render_while' );
          
        endwhile;
      
      if_available( $loop_name, 'render_after' );
    
    endif;
  
  } else {
    
    if( have_posts() ) :
    
      if_available( $loop_name, 'render_before' );
      
        while( have_posts() ) : the_post();
        
          if_available( $loop_name, 'render_while' );
          
        endwhile;
      
      if_available( $loop_name, 'render_after' );
    
    endif;

  }
  
}

function if_available( $class_name, $method_name ){
  
  if( method_exists( $class_name, $method_name ) ){
    call_user_func( $class_name.'::'.$method_name );
  }
  
}

function include_script( $script_name ){

  $script_url = get_bloginfo('template_url') . '/assets/scripts/';
  $script_directory = get_stylesheet_directory() . '/assets/scripts/';

  echo '<script type="text/javascript" src="', $script_url, $script_name, '.', filemtime( $script_directory . $script_name . ".js"), '.js', '" ></script>';

}

function include_stylesheet( $stylesheet_name ){

  $stylesheet_url = get_bloginfo('template_url') . '/assets/css/';
  $stylesheet_directory = get_stylesheet_directory() . '/assets/css/';

  echo '<link rel="stylesheet" href="', $stylesheet_url, $stylesheet_name, '.', filemtime( $stylesheet_directory . $stylesheet_name . ".css"), '.css', '" />';

}

?>