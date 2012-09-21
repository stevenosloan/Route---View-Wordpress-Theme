<?php

	if( have_posts() ) : while( have_posts() ) : the_post();

		echo '<h1>Default Layout</h1>';
		echo '<ul>';
			render_loop('single');
		echo '</ul>';

	endwhile; endif;

?>