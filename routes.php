<?php  
  /* 
  **  refer to wordpress conditionals for cases
  **  http://codex.wordpress.org/Conditional_Tags
  */
  
  if( is_single() ){
    render_layout( 'single' );
  } else { 
    render_layout( 'default' );
  }
?>