<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
</head>
<body>
	<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark id="mainNav">
      <div class="container">
      	<?php
      		$sUrlLogotip = get_template_directory_uri() . '/img/logo.png';
      		$sUrlNaslovnica = get_site_url();
      	?>
        <a class="navbar-brand" href="<?php echo $sUrlNaslovnica ?>"><img src="<?php echo $sUrlLogotip; ?>" /></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
                <?php
        		$args = array(
					'theme_location' 	=> 	'glavni-menu',
					'menu_id' 			=> 	'vsmti-glavni-menu',
					'menu_class'		=>	'navbar-nav ml-auto',
					'container'			=> 	'div',
					'container_class'	=>	'collapse navbar-collapse',
					'container_id'		=>	'navbarResponsive'
					);
				wp_nav_menu( $args );

        	?>
      </div>
    </nav>
