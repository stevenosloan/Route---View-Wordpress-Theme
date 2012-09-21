<?php  
  render_partial('header');
    
    yield( $GLOBALS['view'] );
  
  render_partial('footer');
?>