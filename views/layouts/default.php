<?php  
  render_partial('header');
  
    echo '<h1>Default Layout</h1>';
    
    $loop_args = array(
      cat => 1
    );
    render_loop( 'default', $loop_args );
  
  render_partial('footer');
?>