<?php  
  /* 
  **  refer to wordpress conditionals for cases
  **  http://codex.wordpress.org/Conditional_Tags
  */
  $template_url = get_bloginfo( 'template_url' );
  $template_directory = get_stylesheet_directory();
  $base = get_bloginfo('url');

  $GLOBALS = array(
    'template_url' => $template_url,
    'asset_url' => $template_url . '/assets/',
    'asset_directory' => $template_directory . '/assets/'
  );
  
  if( is_single() ){

    use_view( 'single' );
  
  } else { 
  
    use_view( 'default' );
  
  }
?>