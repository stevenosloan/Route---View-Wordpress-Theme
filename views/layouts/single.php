<?php  
  render_partial('header');
  
    echo '<h1>Single Layout</h1>';
    
    include_loop( 'single' );
  
  render_partial('footer');
?>