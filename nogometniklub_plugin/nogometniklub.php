<?php
/*
Plugin Name: Nogometni klub
Plugin URI: https://vsmti.hr
Description: Dodatak za WP
Version: 1.0
Author:Domagoj Peršiæ
Author URI: https://vsmti.hr
Text Domain: vsmti
*/

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
			'add_new_item'			=> __( 'Dodaj novoga igraèa', 'vsmti' ),
			'add_new' 				=> __( 'Dodaj novi', 'vsmti' ),
			'new_item' 				=> __( 'Novi igrač', 'vsmti' ),
			'edit_item'				=> __( 'Uredi igrača', 'vsmti' ),
			'update_item' 			=> __( 'Ažuriraj igrača', 'vsmti' ),
			'view_item' 			=> __( 'Pogledaj igrača', 'vsmti' ),
			'view_items' 			=> __( 'Pogledaj igrača', 'vsmti' ),
			'search_items' 			=> __( 'Pretraži igrače', 'vsmti' ),
			'not_found' 			=> __( 'Nije pronaðeno', 'vsmti' ),
			'not_found_in_trash'    => __( 'Nije pronaðeno u smeću', 'vsmti' ),
			'featured_image' 	    => __( 'Glavna slika', 'vsmti' ),
			'set_featured_image'    => __( 'Postavi glavnu sliku', 'vsmti' ),
			'remove_featured_image' => __( 'Ukloni glavnu sliku', 'vsmti' ),
			'use_featured_image'    => __( 'Postavi za glavnu sliku', 'vsmti' ),
			'insert_into_item'      => __( 'Umentni', 'vsmti' ),
			'uploaded_to_this_item' => __( 'Preneseno', 'vsmti' ),
			'items_list'            => __( 'Lista', 'vsmti' ),
			'items_list_navigation' => __( 'Navigacija meðu igračima', 'vsmti' ),
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
					'choose_from_most_used' => __( 'Odaberi meðu najèešæima', 'vsmti' ),
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
					'choose_from_most_used' => __( 'Odaberi meðu najèešæima', 'vsmti' ),
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

function add_meta_box_info_igrac()
{
	add_meta_box( 'vsmti_info_igrac', 'Informacije o igraču', 'html_meta_box_info', 'igrac', 'side', 'high');
}

function html_meta_box_info($post)
{
	wp_nonce_field('spremi_info_o_igracu','info_igrac_godina_nonce');
	wp_nonce_field('spremi_info_o_igracu','info_igrac_ime_nonce');
	wp_nonce_field('spremi_info_o_igracu','info_igrac_prezime_nonce');


	$ime_igrac= get_post_meta($post->ID, 'ime_igrac',true);
	$prezime_igrac= get_post_meta($post->ID, 'prezime_igrac',true);
	$godina_rodjenja= get_post_meta($post->ID, 'godina_rodjenja',true);

	echo'
	<div>
		<div>
			<label for="ime_igrac">Ime : </label>
			<input type="text" id="ime_igrac" name="ime_igrac" value="'.$ime_igrac.'"/>
		</div>
		<br/>
		<div>
			<label for="prezime_igrac">Prezime: </label>
			<input type="text" id="prezime_igrac" name="prezime_igrac" value="'.$prezime_igrac.'"/>
		</div>
		<br/>
		<div>
			<label for="godina_rodjenja">Godina: </label>
			<input type="text" id="godina_rodjenja" name="godina_rodjenja" value="'.$godina_rodjenja.'"/>
		</div>
		<br/>
	</div>';
}


function spremi_info_o_igracu($post_id)
{
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce_godina_rodenja=(isset($_POST['info_igrac_godina_nonce'])&& wp_verify_nonce( $_POST[ 'info_igrac_godina_nonce' ],basename( __FILE__ ))) ? 'true' : 'false';

	$is_valid_nonce_ime_igrac=(isset($_POST['info_igrac_ime_nonce'])&& wp_verify_nonce( $_POST[ 'info_igrac_ime_nonce' ],basename( __FILE__ ))) ? 'true' : 'false';

	$is_valid_nonce_prezime_igrac=(isset($_POST['info_igrac_prezime_nonce'])&& wp_verify_nonce( $_POST[ 'info_igrac_prezime_nonce' ],basename( __FILE__ ))) ? 'true' : 'false';
	
 	if ( $is_autosave || $is_revision || !$is_valid_nonce_godina_rodenja || !$is_valid_nonce_ime_igrac || !$is_valid_nonce_prezime_igrac) 
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

	if(!empty($_POST['ime_igrac']))
	{
		update_post_meta($post_id, 'ime_igrac', $_POST['ime_igrac']);
	}
	else
	{
		delete_post_meta($post_id, 'ime_igrac');
	}

	if(!empty($_POST['prezime_igrac']))
	{
		update_post_meta($post_id, 'prezime_igrac', $_POST['prezime_igrac']);
	}
	else
	{
		delete_post_meta($post_id, 'prezime_igrac');
	}
}
add_action('add_meta_boxes','add_meta_box_info_igrac');
add_action('save_post','spremi_info_o_igracu');

function daj_igrace( $slug )
{
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'igrac',
		'post_status' => 'publish',
		'tax_query' => array(
								array(
									'taxonomy' => 'selekcija',
									'field' => 'slug',
									'terms' => $slug
								)
	));
	$igraci = get_posts( $args );
	$sHtml = "<ul>";
	foreach ($igraci as $igrac)
	{
		$sIgrackUrl = $igrac->guid;
		$sIgracNaziv = $igrac->post_title;
		$sHtml .= '<li><a href="'.$sIgrackUrl.'">'.$sIgracNaziv.'</a></li>';
	}
	$sHtml .= "</ul>";
	return $sHtml;
}




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
			'not_found' 			=> __( 'Nije pronaðeno', 'vsmti' ),
			'not_found_in_trash'    => __( 'Nije pronaðeno u smeæu', 'vsmti' ),
			'featured_image' 	    => __( 'Glavna slika', 'vsmti' ),
			'set_featured_image'    => __( 'Postavi glavnu sliku', 'vsmti' ),
			'remove_featured_image' => __( 'Ukloni glavnu sliku', 'vsmti' ),
			'use_featured_image'    => __( 'Postavi za glavnu sliku', 'vsmti' ),
			'insert_into_item'      => __( 'Umentni', 'vsmti' ),
			'uploaded_to_this_item' => __( 'Preneseno', 'vsmti' ),
			'items_list'            => __( 'Lista', 'vsmti' ),
			'items_list_navigation' => __( 'Navigacija meðu trenerima', 'vsmti' ),
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

function registriraj_taksonomiju_selekcija_trener() 
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
		'choose_from_most_used' => __( 'Odaberi meðu najèešæima', 'vsmti' ),
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
	register_taxonomy( 'selekcija_treniranja', array( 'trener' ), $args );
}
add_action( 'init', 'registriraj_taksonomiju_selekcija_trener', 0 );

function registriraj_taksonomiju_titula() 
		{
				$labels = array(
					'name' => _x( 'Titule', 'Taxonomy General Name', 'vsmti' ),
					'singular_name' => _x( 'Titula', 'Taxonomy Singular Name', 'vsmti' ),
					'menu_name' => __( 'Titule', 'vsmti' ),
					'all_items' => __( 'Sve titule', 'vsmti' ),
					'parent_item' => __( 'Roditeljske titule', 'vsmti' ),
					'parent_item_colon' => __( 'Roditeljska titula', 'vsmti' ),
					'new_item_name' => __( 'Nova titula', 'vsmti' ),
					'add_new_item' => __( 'Dodaj novu titulu', 'vsmti' ),
					'edit_item' => __( 'Uredi titulu', 'vsmti' ),
					'update_item' => __( 'Ažuiriraj titulu', 'vsmti' ),
					'view_item' => __( 'Pogledaj titulu', 'vsmti' ),
					'separate_items_with_commas' => __( 'Odvojite titule sa zarezima', 'vsmti' ),
					'add_or_remove_items' => __( 'Dodaj ili ukloni titulu', 'vsmti' ),
					'choose_from_most_used' => __( 'Odaberi meðu najčeščima', 'vsmti' ),
					'popular_items' => __( 'Popularne titule', 'vsmti' ),
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
				register_taxonomy( 'titula', array( 'trener' ), $args );
		}
		add_action( 'init', 'registriraj_taksonomiju_titula', 0 );

function add_meta_box_info_trener()
{
	add_meta_box( 'vsmti_info_trener', 'Informacije o treneru', 'html_meta_box_info', 'trener', 'side', 'high');
}

function html_meta_box_info_trener($post)
{
	wp_nonce_field('spremi_info_o_igracu','info_trener_godina_nonce');
	wp_nonce_field('spremi_info_o_igracu','info_trener_ime_nonce');
	wp_nonce_field('spremi_info_o_igracu','info_trener_prezime_nonce');


	$ime_trenera= get_post_meta($post->ID, 'ime_trener',true);
	$prezime_trenera= get_post_meta($post->ID, 'prezime_trener',true);
	$godina_rodjenja= get_post_meta($post->ID, 'godina_rodjenja',true);

	echo'
	<div>
		<div>
			<label for="ime_trener">Ime : </label>
			<input type="text" id="ime_trener" name="ime_trener" value="'.$ime_trener.'"/>
		</div>
		<br/>
		<div>
			<label for="prezime_trener">Prezime: </label>
			<input type="text" id="prezime_trener" name="prezime_trener" value="'.$prezime_trener.'"/>
		</div>
		<br/>
		<div>
			<label for="godina_rodjenja">Godina: </label>
			<input type="text" id="godina_rodjenja" name="godina_rodjenja" value="'.$godina_rodjenja.'"/>
		</div>
		<br/>
	</div>';
}
function spremi_info_o_trenru($post_id)
{
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce_godina_rodenja=(isset($_POST['info_trener_godina_nonce'])&& wp_verify_nonce( $_POST[ 'info_trener_godina_nonce' ],basename( __FILE__ ))) ? 'true' : 'false';

	$is_valid_nonce_ime_trenera=(isset($_POST['info_trener_ime_nonce'])&& wp_verify_nonce( $_POST[ 'info_trener_ime_nonce' ],basename( __FILE__ ))) ? 'true' : 'false';

	$is_valid_nonce_prezime_trenera=(isset($_POST['info_trener_prezime_nonce'])&& wp_verify_nonce( $_POST[ 'info_trener_prezime_nonce' ],basename( __FILE__ ))) ? 'true' : 'false';
	
 	if ( $is_autosave || $is_revision || !$is_valid_nonce_godina_rodenja || !$is_valid_nonce_ime_trenera || !$is_valid_nonce_prezime_trenera) 
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

	if(!empty($_POST['ime_trener']))
	{
		update_post_meta($post_id, 'ime_trener', $_POST['ime_trener']);
	}
	else
	{
		delete_post_meta($post_id, 'ime_trener');
	}

	if(!empty($_POST['prezime_trener']))
	{
		update_post_meta($post_id, 'prezime_trener', $_POST['prezime_trener']);
	}
	else
	{
		delete_post_meta($post_id, 'prezime_trener');
	}
}
add_action('add_meta_boxes','add_meta_box_info_trener');
add_action('save_post','spremi_info_o_trenru');

function daj_trenere( $slug )
{
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'trener',
		'post_status' => 'publish',
		'tax_query' => array(
								array(
									'taxonomy' => 'titula',
									'field' => 'slug',
									'terms' => $slug
								)
	));
	$treneri = get_posts( $args );
	$sHtml = "<ul>";
	foreach ($treneri as $trener)
	{
		$sTrenerUrl = $trener->guid;
		$sTrenerNaziv = $trener->post_title;
		$sHtml .= '<li><a href="'.$sTrenerUrl.'">'.$sTrenerNaziv.'</a></li>';
	}
	$sHtml .= "</ul>";
	return $sHtml;
}





//registracija Clana !
function registriraj_clan_cpt() {
$labels = array(
			'name' 					=> _x( 'članovi', 'Post Type General Name', 'vsmti' ),
			'singular_name' 		=> _x( 'član', 'Post Type Singular Name', 'vsmti' ),
			'menu_name' 			=> __( 'članovi', 'vsmti' ),
			'name_admin_bar'		=> __( 'članovi', 'vsmti' ),
			'archives' 				=> __( 'članovi arhiva', 'vsmti' ),
			'attributes'			=> __( 'Atributi', 'vsmti' ),
			'parent_item_colon' 	=> __( 'Roditeljski element', 'vsmti' ),
			'all_items' 			=> __( 'Svi članovi', 'vsmti' ),
			'add_new_item'			=> __( 'Dodaj novoga èlana', 'vsmti' ),
			'add_new' 				=> __( 'Dodaj novi', 'vsmti' ),
			'new_item' 				=> __( 'Novi član', 'vsmti' ),
			'edit_item'				=> __( 'Uredi člana', 'vsmti' ),
			'update_item' 			=> __( 'Ažuriraj člana', 'vsmti' ),
			'view_item' 			=> __( 'Pogledaj člana', 'vsmti' ),
			'view_items' 			=> __( 'Pogledaj člana', 'vsmti' ),
			'search_items' 			=> __( 'Pretraži člana', 'vsmti' ),
			'not_found' 			=> __( 'Nije pronaðeno', 'vsmti' ),
			'not_found_in_trash'    => __( 'Nije pronaðeno u smeæu', 'vsmti' ),
			'featured_image' 	    => __( 'Glavna slika', 'vsmti' ),
			'set_featured_image'    => __( 'Postavi glavnu sliku', 'vsmti' ),
			'remove_featured_image' => __( 'Ukloni glavnu sliku', 'vsmti' ),
			'use_featured_image'    => __( 'Postavi za glavnu sliku', 'vsmti' ),
			'insert_into_item'      => __( 'Umentni', 'vsmti' ),
			'uploaded_to_this_item' => __( 'Preneseno', 'vsmti' ),
			'items_list'            => __( 'Lista', 'vsmti' ),
			'items_list_navigation' => __( 'Navigacija meðu članovima', 'vsmti' ),
			'filter_items_list'     => __( 'Filtriranje èlana', 'vsmti' ),
);

$args = array(
		'label' 	  	  => __( 'član', 'vsmti' ),
		'description' 	  => __( 'član post type', 'vsmti' ),
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

?>