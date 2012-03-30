<?php
class single{

  function render_before(){
  
    echo '<ul>';
  
  }
  
  function render_while(){
    
    echo '<li><h2>'.get_the_title().'</h2>'.get_the_content().'</li>';
    
  }
  
  function render_after(){
  
    echo '</ul>';
  
  }

}  
?>