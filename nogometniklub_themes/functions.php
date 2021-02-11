<?php
//Ukljičivanje teme
if ( ! function_exists( 'inicijaliziraj_temu' ) )
{
	function inicijaliziraj_temu()
	{
		add_theme_support( 'post-thumbnails' );
		register_nav_menus( array(
			'glavni-menu' => "Glavni navigacijski izbornik"
		) );
		add_theme_support( 'custom-background', apply_filters(
			'test_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'title-tag' );
	}
}
add_action( 'after_setup_theme', 'inicijaliziraj_temu' );

//učitavanje CSS datoteka
function ucitaj_css_datoteke()
{
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/vendor/fontawesome-free/css/all.min.css');
	wp_enqueue_style( 'googlefonts1-css', 'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' );
	wp_enqueue_style( 'fontawesome2-css', 'hhttps://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' );
	wp_enqueue_style( 'theme-css', get_template_directory_uri() . '/vendor/magnific-popup/magnific-popup.css' );
	/*wp_enqueue_style( 'main-css', get_template_directory_uri() . '/css/creative.min.css' );
	wp_enqueue_style( 'main-css1', get_template_directory_uri() . '/css/creative.css' );
	wp_enqueue_style( 'main-css2', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'main-css2', get_template_directory_uri() . '/css/creative.css' );
	wp_enqueue_style( 'main-css2', get_template_directory_uri() . '/css/creative.min.css' );*/



	// Naknadno uključivanje
	/*wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.css' );


	wp_enqueue_style( 'bootstrap1', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap-grid.min.css' );
	wp_enqueue_style( 'bootstrap2', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap-grid.css' );
	wp_enqueue_style( 'bootstrap3', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap-reboot.min.css' );
	wp_enqueue_style( 'bootstrap4', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap-reboot.css' );*/
}
add_action( 'wp_enqueue_scripts', 'ucitaj_css_datoteke' );

/*function ucitaj_select2()
{
	wp_enqueue_style( 'select2css', get_template_directory_uri() . '/assets/select2/select2.min.css' );
	wp_enqueue_script('select2js', get_template_directory_uri().'/assets/select2/select2.min.js', array('jquery'), true);
	wp_enqueue_script('select2-admin-js', get_template_directory_uri().'/js/init_select2.js', array('jquery'), true);
}
add_action( 'admin_enqueue_scripts', 'ucitaj_select2' );*/


//učitavanje javascript datoteka
function ucitaj_js_datoteke() 
{
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/vendor/jquery/jquery.min.js', array('jquery'), true);
	wp_enqueue_script('theme-js', get_template_directory_uri().'/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), true);
	wp_enqueue_script('bootstrap-js1', get_template_directory_uri().'/vendor/jquery-easing/jquery.easing.min.js', array('jquery'), true);
	
	wp_enqueue_script('bootstrap-js3', get_template_directory_uri().'/vendor/magnific-popup/jquery.magnific-popup.min.js', array('jquery'), true);


	//Naknadno uključivanje

	wp_enqueue_script('JS', get_template_directory_uri().'/vendor/bootstrap/js/bootstrap.bundle.js', array('jquery'), true);
	wp_enqueue_script('JS1', get_template_directory_uri().'/vendor/bootstrap/js/bootstrap.min.bundle.js', array('jquery'), true);
	wp_enqueue_script('JS2', get_template_directory_uri().'/vendor/bootstrap/js/bootstrap.js', array('jquery'), true);
	wp_enqueue_script('JS3', get_template_directory_uri().'/vendor/bootstrap/js/bootstrap.min.js', array('jquery'), true);
}
add_action( 'wp_enqueue_scripts', 'ucitaj_js_datoteke', 1);



// regsitracija sidebar-a
function aktiviraj_sidebar()
{
	 register_sidebar(
		 array (
		 'name' => "Glavni sidebar",
		 'id' => 'glavni-sidebar',
		 'description' => "Glavni sidebar",
		 'before_widget' => '<div class="widget-content">',
		 'after_widget' => "</div>",
		 'before_title' => '<h3 class="widget-title">',
		 'after_title' => '</h3>',
		 )
	 );
}
add_action( 'widgets_init', 'aktiviraj_sidebar' );


//registracija Igraca !
function registriraj_igrac_cpt() {
$labels = array(
			'name' 					=> _x( 'Igrači', 'Post Type General Name', 'vsmti' ),
			'singular_name' 		=> _x( 'Igrač', 'Post Type Singular Name', 'vsmti' ),
			'menu_name' 			=> __( 'Igrači', 'vsmti' ),
			'name_admin_bar'		=> __( 'Igrači', 'vsmti' ),
			'archives' 				=> __( 'Igrači arhiva', 'vsmti' ),
			'attributes'			=> __( 'Atributi', 'vsmti' ),
			'parent_item_colon' 	=> __( 'Roditeljski element', 'vsmti' ),
			'all_items' 			=> __( 'Svi Igrači', 'vsmti' ),
			'add_new_item'			=> __( 'Dodaj novoga igrača', 'vsmti' ),
			'add_new' 				=> __( 'Dodaj novi', 'vsmti' ),
			'new_item' 				=> __( 'Novi igrač', 'vsmti' ),
			'edit_item'				=> __( 'Uredi igrača', 'vsmti' ),
			'update_item' 			=> __( 'Ažuriraj igrača', 'vsmti' ),
			'view_item' 			=> __( 'Pogledaj igrača', 'vsmti' ),
			'view_items' 			=> __( 'Pogledaj igrača', 'vsmti' ),
			'search_items' 			=> __( 'Pretraži igrače', 'vsmti' ),
			'not_found' 			=> __( 'Nije pronađeno', 'vsmti' ),
			'not_found_in_trash'    => __( 'Nije pronađeno u smeću', 'vsmti' ),
			'featured_image' 	    => __( 'Glavna slika', 'vsmti' ),
			'set_featured_image'    => __( 'Postavi glavnu sliku', 'vsmti' ),
			'remove_featured_image' => __( 'Ukloni glavnu sliku', 'vsmti' ),
			'use_featured_image'    => __( 'Postavi za glavnu sliku', 'vsmti' ),
			'insert_into_item'      => __( 'Umentni', 'vsmti' ),
			'uploaded_to_this_item' => __( 'Preneseno', 'vsmti' ),
			'items_list'            => __( 'Lista', 'vsmti' ),
			'items_list_navigation' => __( 'Navigacija među igračima', 'vsmti' ),
			'filter_items_list'     => __( 'Filtriranje igrača', 'vsmti' ),
);

$args = array(
		'label' 	  	  => __( 'Igrač', 'vsmti' ),
		'description' 	  => __( 'Igrač post type', 'vsmti' ),
		'labels'      	  => $labels,
		'supports'   	  => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'hierarchica'     => false,
		'public'    	  => true,
		'show_ui'     	  => true,
		'show_in_menu'    => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-groups', //dashicons-sos
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => false,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'page',
		);
	register_post_type( 'igrac', $args );
	}
add_action( 'init', 'registriraj_igrac_cpt', 0 );


//registracija Trenera !
function registriraj_trener_cpt() {
$labels = array(
			'name' 					=> _x( 'Treneri', 'Post Type General Name', 'vsmti' ),
			'singular_name' 		=> _x( 'Trener', 'Post Type Singular Name', 'vsmti' ),
			'menu_name' 			=> __( 'Treneri', 'vsmti' ),
			'name_admin_bar'		=> __( 'Treneri', 'vsmti' ),
			'archives' 				=> __( 'Treneri arhiva', 'vsmti' ),
			'attributes'			=> __( 'Atributi', 'vsmti' ),
			'parent_item_colon' 	=> __( 'Roditeljski element', 'vsmti' ),
			'all_items' 			=> __( 'Svi Treneri', 'vsmti' ),
			'add_new_item'			=> __( 'Dodaj novoga trenera', 'vsmti' ),
			'add_new' 				=> __( 'Dodaj novi', 'vsmti' ),
			'new_item' 				=> __( 'Novi trener', 'vsmti' ),
			'edit_item'				=> __( 'Uredi trenera', 'vsmti' ),
			'update_item' 			=> __( 'Ažuriraj trenera', 'vsmti' ),
			'view_item' 			=> __( 'Pogledaj trenera', 'vsmti' ),
			'view_items' 			=> __( 'Pogledaj trenera', 'vsmti' ),
			'search_items' 			=> __( 'Pretraži trenere', 'vsmti' ),
			'not_found' 			=> __( 'Nije pronađeno', 'vsmti' ),
			'not_found_in_trash'    => __( 'Nije pronađeno u smeću', 'vsmti' ),
			'featured_image' 	    => __( 'Glavna slika', 'vsmti' ),
			'set_featured_image'    => __( 'Postavi glavnu sliku', 'vsmti' ),
			'remove_featured_image' => __( 'Ukloni glavnu sliku', 'vsmti' ),
			'use_featured_image'    => __( 'Postavi za glavnu sliku', 'vsmti' ),
			'insert_into_item'      => __( 'Umentni', 'vsmti' ),
			'uploaded_to_this_item' => __( 'Preneseno', 'vsmti' ),
			'items_list'            => __( 'Lista', 'vsmti' ),
			'items_list_navigation' => __( 'Navigacija među trenerima', 'vsmti' ),
			'filter_items_list'     => __( 'Filtriranje trenera', 'vsmti' ),
);

$args = array(
		'label' 	  	  => __( 'Trener', 'vsmti' ),
		'description' 	  => __( 'Trener post type', 'vsmti' ),
		'labels'      	  => $labels,
		'supports'   	  => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'hierarchica'     => false,
		'public'    	  => true,
		'show_ui'     	  => true,
		'show_in_menu'    => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-groups', //dashicons-sos
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => false,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'page',
		);
	register_post_type( 'trener', $args );
	}
add_action( 'init', 'registriraj_trener_cpt', 0 );


//registracija Clana !
function registriraj_clan_cpt() {
$labels = array(
			'name' 					=> _x( 'Članovi', 'Post Type General Name', 'vsmti' ),
			'singular_name' 		=> _x( 'Član', 'Post Type Singular Name', 'vsmti' ),
			'menu_name' 			=> __( 'Članovi', 'vsmti' ),
			'name_admin_bar'		=> __( 'Članovi', 'vsmti' ),
			'archives' 				=> __( 'Članovi arhiva', 'vsmti' ),
			'attributes'			=> __( 'Atributi', 'vsmti' ),
			'parent_item_colon' 	=> __( 'Roditeljski element', 'vsmti' ),
			'all_items' 			=> __( 'Svi Članovi', 'vsmti' ),
			'add_new_item'			=> __( 'Dodaj novoga člana', 'vsmti' ),
			'add_new' 				=> __( 'Dodaj novi', 'vsmti' ),
			'new_item' 				=> __( 'Novi član', 'vsmti' ),
			'edit_item'				=> __( 'Uredi člana', 'vsmti' ),
			'update_item' 			=> __( 'Ažuriraj člana', 'vsmti' ),
			'view_item' 			=> __( 'Pogledaj člana', 'vsmti' ),
			'view_items' 			=> __( 'Pogledaj člana', 'vsmti' ),
			'search_items' 			=> __( 'Pretraži člana', 'vsmti' ),
			'not_found' 			=> __( 'Nije pronađeno', 'vsmti' ),
			'not_found_in_trash'    => __( 'Nije pronađeno u smeću', 'vsmti' ),
			'featured_image' 	    => __( 'Glavna slika', 'vsmti' ),
			'set_featured_image'    => __( 'Postavi glavnu sliku', 'vsmti' ),
			'remove_featured_image' => __( 'Ukloni glavnu sliku', 'vsmti' ),
			'use_featured_image'    => __( 'Postavi za glavnu sliku', 'vsmti' ),
			'insert_into_item'      => __( 'Umentni', 'vsmti' ),
			'uploaded_to_this_item' => __( 'Preneseno', 'vsmti' ),
			'items_list'            => __( 'Lista', 'vsmti' ),
			'items_list_navigation' => __( 'Navigacija među članovima', 'vsmti' ),
			'filter_items_list'     => __( 'Filtriranje člana', 'vsmti' ),
);

$args = array(
		'label' 	  	  => __( 'Član', 'vsmti' ),
		'description' 	  => __( 'Član post type', 'vsmti' ),
		'labels'      	  => $labels,
		'supports'   	  => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'hierarchica'     => false,
		'public'    	  => true,
		'show_ui'     	  => true,
		'show_in_menu'    => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-groups', //dashicons-sos
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => false,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'page',
		);
	register_post_type( 'clan', $args );
	}
add_action( 'init', 'registriraj_clan_cpt', 0 );

//Registracija taksonomije
function registriraj_taksonomiju_selekcija() 
		{
				$labels = array(
					'name' => _x( 'Selekcije', 'Taxonomy General Name', 'vsmti' ),
					'singular_name' => _x( 'Selekcija', 'Taxonomy Singular Name', 'vsmti' ),
					'menu_name' => __( 'Selekcije', 'vsmti' ),
					'all_items' => __( 'Sve selekcije', 'vsmti' ),
					'parent_item' => __( 'Roditeljske selekcije', 'vsmti' ),
					'parent_item_colon' => __( 'Roditeljska selekcija', 'vsmti' ),
					'new_item_name' => __( 'Nova selekcija', 'vsmti' ),
					'add_new_item' => __( 'Dodaj novu selekciju', 'vsmti' ),
					'edit_item' => __( 'Uredi selekciju', 'vsmti' ),
					'update_item' => __( 'Ažuiriraj selekciju', 'vsmti' ),
					'view_item' => __( 'Pogledaj selekciju', 'vsmti' ),
					'separate_items_with_commas' => __( 'Odvojite selekcije sa zarezima', 'vsmti' ),
					'add_or_remove_items' => __( 'Dodaj ili ukloni selekciju', 'vsmti' ),
					'choose_from_most_used' => __( 'Odaberi među najčešćima', 'vsmti' ),
					'popular_items' => __( 'Popularne selekcije', 'vsmti' ),
					'search_items' => __( 'Pretraga', 'vsmti' ),
					'not_found' => __( 'Nema rezultata', 'vsmti' ),
					'no_terms' => __( 'Nema selekcije', 'vsmti' ),
					'items_list' => __( 'Lista selekcija', 'vsmti' ),
					'items_list_navigation' => __( 'Navigacija', 'vsmti' ),
				);
				$args = array(
					'labels' 			=> 		$labels,
					'hierarchical' 		=> 		true,
					'public' 			=> 		true,
					'show_ui' 			=> 		true,
					'show_admin_column' => 		true,
					'show_in_nav_menus' => 		true,
					'show_tagcloud' 	=> 		true,
				);
				register_taxonomy( 'selekcija', array( 'igrac' ), $args );
		}
		add_action( 'init', 'registriraj_taksonomiju_selekcija', 0 );

function registriraj_taksonomiju_pozicija() 
		{
				$labels = array(
					'name' => _x( 'Pozicije', 'Taxonomy General Name', 'vsmti' ),
					'singular_name' => _x( 'Pozicija', 'Taxonomy Singular Name', 'vsmti' ),
					'menu_name' => __( 'Pozicije', 'vsmti' ),
					'all_items' => __( 'Sve pozicije', 'vsmti' ),
					'parent_item' => __( 'Roditeljske pozicije', 'vsmti' ),
					'parent_item_colon' => __( 'Roditeljska pozicija', 'vsmti' ),
					'new_item_name' => __( 'Nova pozicija', 'vsmti' ),
					'add_new_item' => __( 'Dodaj novu poziciju', 'vsmti' ),
					'edit_item' => __( 'Uredi poziciju', 'vsmti' ),
					'update_item' => __( 'Ažuiriraj poziciju', 'vsmti' ),
					'view_item' => __( 'Pogledaj poziciju', 'vsmti' ),
					'separate_items_with_commas' => __( 'Odvojite pozicije sa zarezima', 'vsmti' ),
					'add_or_remove_items' => __( 'Dodaj ili ukloni poziciju', 'vsmti' ),
					'choose_from_most_used' => __( 'Odaberi među najčešćima', 'vsmti' ),
					'popular_items' => __( 'Popularne pozicije', 'vsmti' ),
					'search_items' => __( 'Pretraga', 'vsmti' ),
					'not_found' => __( 'Nema rezultata', 'vsmti' ),
					'no_terms' => __( 'Nema pozicije', 'vsmti' ),
					'items_list' => __( 'Lista pozicija', 'vsmti' ),
					'items_list_navigation' => __( 'Navigacija', 'vsmti' ),
				);
				$args = array(
					'labels' 			=> 		$labels,
					'hierarchical' 		=> 		true,
					'public' 			=> 		true,
					'show_ui' 			=> 		true,
					'show_admin_column' => 		true,
					'show_in_nav_menus' => 		true,
					'show_tagcloud' 	=> 		true,
				);
				register_taxonomy( 'pozicija', array( 'igrac' ), $args );
		}
		add_action( 'init', 'registriraj_taksonomiju_pozicija', 0 );


function add_meta_box_godina_rodjenja()
{
	add_meta_box( 'vsmti_godina_rodjenja', 'Godina rodjenja', 'html_meta_box_godina', 'igrac', 'side', 'high');
}

function html_meta_box_godina($post)
{
	wp_nonce_field('spremi_godinu_rodjenja','godina_rodenja_nonce');
	$godina_rodjenja= get_post_meta($post->ID, 'godina_rodjenja',true);

	echo'
	<div>
		<div>
			<label for="godina_rodjenja">Godina: </label>
			<input type="text" id="godina_rodjenja" name="godina_rodjenja" value="'.$godina_rodjenja.'"/>
		</div>
	</div>';
}

function spremi_godinu_rodjenja($post_id)
{
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce_godina_rodenja=(isset($_POST['godina_rodenja_nonce'])&& wp_verify_nonce( $_POST[ 'godina_rodenja_nonce' ],basename( __FILE__ ))) ? 'true' : 'false';
	
 	if ( $is_autosave || $is_revision || !$is_valid_nonce_godina_rodenja) 
 	{
 		return;
 	}

	if(!empty($_POST['godina_rodjenja']))
	{
		update_post_meta($post_id, 'godina_rodjenja', $_POST['godina_rodjenja']);
	}
	else
	{
		delete_post_meta($post_id, 'godina_rodjenja');
	}
}
add_action('add_meta_boxes','add_meta_box_godina_rodjenja');
add_action('save_post','spremi_godinu_rodjenja');

function daj_igrace($slug)
{
	$args=array(
		'posts_per_page'=> -1,
		'post_type'=>'igrac',
		'post_status'=>'publish',
		'tax_query'=> array(
								array(
									'taxonomy'=>'selekcija',
									'field'=>'slug',
									'terms'=>$slug

							)
	));
	$igraci=get_posts($args);
	$sHtml="<ul>";
	foreach ($igraci as $igrac) 
	{
		$sIgracUrl=$igrac->guid;
		$sIgracIme=$igrac->post_title;
		$shtml.='<li><a href="'.$sIgracUrl.'">'.$sIgracIme.'</a></li>';
	}
	$sHtml.="</ul>";
	return $sHtml;
}


?>