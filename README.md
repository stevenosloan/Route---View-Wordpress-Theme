Route & View Based Wordpress Theme
==================================

R&V is a light theme framework intended to make development of complex Wordpress-as-CMS themes a bit more sane. It comes as a few helper functions and an organizational guideline.


Routes
------

Routes are defined in the `/routes.php` file and drive what layout is displayed on any given condition. A full list of the conditional tags available through Wordpress is available [here](http://codex.wordpress.org/Conditional_Tags). An simple example would be:

    if( is_single() ){
      render_layout( 'single' );
    } else { 
      render_layout( 'default' );
    }

It is suggested to leave a last `else` statement pointing to a default layout.


Helper Functions
----------------


### Layouts
`render_layout( $layout_name );`

If you are coming from some other environments, layouts will act a little different than expected. They act as actualy separate layouts vs. wrappers you'd see in something like RoR. So it's suggested to keep create a `header` and/or `footer` partial to keep things DRY.

### Partials
`render_partial( $partial_name );`

### Loops
`include_loop( $loop_name );`

### Assets
Currently there are two helper functions for including [rev'd](https://github.com/h5bp/html5-boilerplate/wiki/cachebusting) versions of stylesheets and scripts.


`include_stylesheet( $stylesheet_name );`

Will include a link to the stylesheet at `/assets/css/$stylesheet_name.css` with a revision number applied


`include_script( $script_name );`

Will include a link to the script at `/assets/scripts/$script_name.js` with a revision number applied
