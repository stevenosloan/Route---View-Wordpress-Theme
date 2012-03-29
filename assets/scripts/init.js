function jqueryInit(){

  if( window.jQuery ){
  
    console.log('jquery loaded');
    
    $(document).ready(function(){
      // do stuff after jquery is loaded
      console.log('dom is ready');
    });
  
  } else {
  
    console.log('jquery not loaded');
  
  }

}



