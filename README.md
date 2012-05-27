Route & View Based Wordpress Theme
==================================

R&V is a light theme framework intended to make development of complex Wordpress-as-CMS themes a bit more sane. It comes as a few helper functions and an organizational guideline.


Helper Functions
----------------


### Layouts
`render_layout( $layout_name );`

If you are coming from some other environments, layouts will act a little different than expected. They act as actualy separate layouts vs. wrappers you'd see in something like RoR. So it's suggested to keep create a `header` and/or `footer` partial to keep things DRY.

### Partials
`render_partial( $partial_name );`

### Loops
`render_loop( $loop_name, $query_args /*array, optional*/ );`

In R&V loops are partials written in a specific way. They are placed in the `/views/loops` folder, and the loops name and file name must match. Each loop is a class with a `render_while` method, and an optional `render_before` and `render_after` method.

    class LOOP_NAME{
      function render_before(){ /* optional */
        // do stuff before the loop, if there are posts
      }

      function render_while(){
        // do stuff during the loop
      }

      function render_after(){ /* optional */
        // do stuff after the loop, if there are posts
      }
    }
