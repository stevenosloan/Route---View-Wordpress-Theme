/**
**  @depends modernizr-build.js
**  @depends sizrizr.js
**/

Sizrizr.addPoint( 'small', 'under', 480 );
Sizrizr.addPoint( 'mid', 'between', [480, 1024]);
Sizrizr.addPoint( 'large', 'over', 1024 );

Sizrizr.init();


// debulked onresize handler - https://github.com/louisremi/jquery-smartresize
function on_resize(c,t){ onresize = function(){ clearTimeout(t); t = setTimeout(c,100); }; return c; }

on_resize( function(){
  Sizrizr.refresh();
});