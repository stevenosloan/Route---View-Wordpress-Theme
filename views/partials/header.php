<!DOCTYPE HTML>
<html>

<head>

	<meta charset="UTF-8" />
	<?php
		$analytics_options = get_option('analytics_options');
		$analyticsID = $analytics_options['analyticsID'];
		$use_analytics = $analytics_options['use_analytics'];
	?>
	
	<title><?php bloginfo('name') ?><?php wp_title(' - '); ?></title>
	<link rel="icon" href="<?php echo $GLOBALS['asset_url']; ?>images/favicon.png" type="image/png" />

  <?php 
    include_stylesheet( 'site' );
    include_script( 'tests.min' ); 
  ?>
  <script type="text/javascript">
    
    // be sure to add a customized modernizr build
    Modernizr.load([
      {
        // jquery & init
        load: 
          ['http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js' , '<?php echo $GLOBALS['asset_url']; ?>scripts/init.<?php echo filemtime( $GLOBALS['asset_directory'] . "scripts/init.js"); ?>.js'],
          complete: function () {
            console.log('jquery & init loaded');
            jqueryInit();
          }
      },
      {
        // load other scripts that may depend on jquery      
      }
    ]);
    
  </script>
  
  <?php if( $use_analytics ) { ?>
    <script type="text/javascript">
  
      Modernizr.load([ ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'
      ]);
  
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', '<?php echo $analyticsID; ?>']);
      _gaq.push(['_trackPageview']);
      _gaq.push(['_trackPageLoadTime']);
    
    </script>
  <?php } ?>

<?php wp_head(); ?>
	
</head>

<body>