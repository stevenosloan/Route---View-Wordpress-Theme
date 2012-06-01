<?php  
  render_partial('header');
  
    echo '<h1>Default Layout</h1>';
    
    include_loop( 'default' );
  
  render_partial('footer');
?>