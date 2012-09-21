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
`use_view( $view_name, $layout_name = 'default' );`

### Partials
`render_partial( $partial_name );`

### Loops
`include_loop( $loop_name );`

### Assets
Currently there are two helper functions for including [revisioned](https://github.com/h5bp/html5-boilerplate/wiki/cachebusting) versions of stylesheets and scripts.


`include_stylesheet( $stylesheet_name );`

Will include a link to the stylesheet at `/assets/css/$stylesheet_name.css` with a revision number applied


`include_script( $script_name );`

Will include a link to the script at `/assets/scripts/$script_name.js` with a revision number applied


Building
-------

For Ruby dev's (or anyone else comfortable on the command line), R&V includes a few rake tasks to make life a little nicer.

### Sass

run `rake sass:build` to process the sass/scss files in `/assets/css/scss` and builds them in `/assets/css`

running `rake sass:watch` watches the sass files and builds them on a change

### Scripts

R&S includes [juicer](http://cjohansen.no/en/ruby/juicer_a_css_and_javascript_packaging_tool) for script packaging. You can include scripts in other files by including the @depends directive at the head of the file

    /**
    **  @depends script.name.js
    **/    

Each js file to be processed needs to be added to the scripts array in the rake file and they will be processed from `assets/scripts/script.name.js` and output to `script.name.min.js`