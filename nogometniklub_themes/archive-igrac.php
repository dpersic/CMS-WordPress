<?php
	get_header();
?>
 <header class="masthead">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			 <div class="col-lg-8 col-md-10 mx-auto">
				 <div class="site-heading">
				 	<h1>Popis igrača</h1>
				 </div>
			 </div>
		</div>
	</div>
 </header>
 <main>
<?php
	echo '<h2>Igrači</h2>';
	echo '<h3>Seniori</h3>';
	echo daj_igrace( 'seniori' );

	
?>
 </main>
<?php
	get_footer();
?>
