<?php
	
	// Add Link to Admin Menu
	function create_theme_options_page() {
		 add_theme_page(__( 'Analytics Settings'), __( 'Analytics Settings'), 'edit_themes', basename(__FILE__), 'options_page_view');
	}
	 
	add_action('admin_menu', 'create_theme_options_page');
	
	
	// add settings
	function analytics_settings() {
 
		register_setting('analytics_options', 'analytics_options');
		add_settings_section('analytics_section', 'Analytics Settings', 'section_cb', __FILE__);
		
		add_settings_field('use_analytics', 'Use Analytics?', 'analytics_on', __FILE__, 'analytics_section');
		add_settings_field('analyticsID', 'Analytics ID:', 'analytics_id', __FILE__, 'analytics_section');
	}
	 
	add_action('admin_init', 'analytics_settings');
	
	
	// settings section
	function section_cb() {
		echo '<hr />';
	}
	 
	function analytics_id() {
		$options = get_option('analytics_options');
		
		$value = 'UA-XXXXXXXX-X';
		if( $options['analyticsID'] != $value && $options['analyticsID'] != null){
			$value = $options['analyticsID'];
		}
		echo '<input type="text" name="analytics_options[analyticsID]" value="'.$value.'" />';
	}
	
	function analytics_on() {
		// checkbox for true/false use analytics
		$options = get_option('analytics_options');
		
		// check if box is checked
		if( $options['use_analytics'] ) { 
			$checked = 'checked="checked'; 
		}
		
		echo '<input ' . $checked . ' id="use_analytics" name="analytics_options[use_analytics]" type="checkbox" />';
	}

// options page layout
function options_page_view() {
?>
   <div class="wrap">
      <div class="icon32" id="icon-themes"></div>
 
      <h2>Theme Settings</h2>
			<?php $path = get_template_directory_uri(); ?>
 
 			<table width="100%" border="0" cellspacing="10" cellpadding="0">
      <tr><td valign="top">
      <form method="post" action="options.php" enctype="multipart/form-data">
         <?php settings_fields('analytics_options'); ?>
         <?php do_settings_sections(__FILE__); ?>
         <p class="submit">
            <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
         </p>
   		</form>
   		</td>
      </tr></table>
</div>
<?php
}
?>