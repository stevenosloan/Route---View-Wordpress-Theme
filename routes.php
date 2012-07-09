<?php  
  /* 
  **  refer to wordpress conditionals for cases
  **  http://codex.wordpress.org/Conditional_Tags
  */
  $template_url = get_bloginfo( 'template_url' );
  $template_directory = get_stylesheet_directory();

  $GLOBALS = array(
    'template_url' => $template_url,
    'asset_url' => $template_url . '/assets/',
    'asset_directory' => $template_directory . '/assets/'
  );
  
  if( is_single() ){
    render_layout( 'single' );
  } else { 
    render_layout( 'default' );
  }
?>