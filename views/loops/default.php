<?php
class default{

  function render_before(){
  
    echo '<ul>';
  
  }
  
  function render_while(){
    
    echo '<li>'.get_the_title().'</li>';
    
  }
  
  function render_after(){
  
    echo '</ul>';
  
  }
  
}  
?>