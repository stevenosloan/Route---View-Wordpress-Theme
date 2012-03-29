<!DOCTYPE HTML>
<html>

<head>

	<meta charset="UTF-8" />
	<?php
		$templateDirectory = get_bloginfo('template_url');
		
		$analytics_options = get_option('analytics_options');
		$analyticsID = $analytics_options['analyticsID'];
		$use_analytics = $analytics_options['use_analytics'];
	?>
	
	<title><?php bloginfo('name') ?><?php wp_title(' - '); ?></title>
	
	<link rel="stylesheet" href="<?php echo $templateDirectory; ?>/css/css<?php echo '.' . filemtime( get_stylesheet_directory() . '/css/css.css'); ?>.css" />
	<link rel="stylesheet" href="<?php echo $templateDirectory; ?>/css/plugins<?php echo '.' . filemtime( get_stylesheet_directory() . '/css/plugins.css'); ?>.css" />
	<link rel="icon" href="<?php echo $templateDirectory; ?>/images/favicon.png" type="image/png" />
	
	<script type="text/javascript" src="<?php echo $templateDirectory; ?>/scripts/modernizr-build<?php echo '.' . filemtime( get_stylesheet_directory() . '/scripts/modernizr-build.js'); ?>.js"></script>
  <script type="text/javascript">
    
    // be sure to add a customized modernizr build
    Modernizr.load([
      {
        // jquery & init
        load: 
          ['http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js' , '<?php echo $templateDirectory; ?>/scripts/init.<?php echo filemtime( get_stylesheet_directory() . "/scripts/init.js"); ?>.js'],
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